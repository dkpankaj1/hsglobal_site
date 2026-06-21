<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Support\ImageHandler;
use App\Support\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::withCount('images')
            ->with('images:id,gallery_id,image_path')
            ->latest()
            ->paginate(12);

        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created gallery with optional images.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'description'  => 'nullable|string',
            'is_published' => 'boolean',
            'images'       => 'nullable|array',
            'images.*'     => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        try {
            $data = $request->only(['name', 'description']);
            $data['slug']         = $this->generateUniqueSlug($request->name);
            $data['is_published'] = $request->boolean('is_published');

            $gallery = Gallery::create($data);

            if ($request->hasFile('images')) {
                $this->uploadImages($request->file('images'), $gallery->id);
            }

            Toastr::success(__('messages.success.created', ['item' => 'Gallery']));
            return redirect()->route('admin.gallery.show', $gallery);
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified gallery with its images.
     */
    public function show(Gallery $gallery)
    {
        $gallery->load(['images' => fn($q) => $q->latest()]);

        return view('admin.gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        $gallery->load(['images' => fn($q) => $q->latest()]);

        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified gallery.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'description'  => 'nullable|string',
            'is_published' => 'boolean',
            'images'       => 'nullable|array',
            'images.*'     => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        try {
            $data = $request->only(['name', 'description']);
            $data['is_published'] = $request->boolean('is_published');

            if ($request->name !== $gallery->name) {
                $data['slug'] = $this->generateUniqueSlug($request->name, $gallery->id);
            }

            $gallery->update($data);

            if ($request->hasFile('images')) {
                $this->uploadImages($request->file('images'), $gallery->id);
            }

            Toastr::success(__('messages.success.updated', ['item' => 'Gallery']));
            return redirect()->route('admin.gallery.show', $gallery);
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the gallery and all its images.
     */
    public function destroy(Gallery $gallery)
    {
        try {
            $imageHandler = new ImageHandler('galleries');

            foreach ($gallery->images as $image) {
                if ($image->image_path) {
                    $imageHandler->delete($image->image_path);
                }
            }

            $gallery->delete();

            Toastr::success(__('messages.success.deleted', ['item' => 'Gallery']));
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
        }

        return redirect()->route('admin.gallery.index');
    }

    // ----------------------------------------------------------------
    // Inline Image Management
    // ----------------------------------------------------------------

    /**
     * Upload multiple images to a gallery (AJAX).
     */
    public function uploadImagesAjax(Request $request, Gallery $gallery)
    {
        $request->validate([
            'images'   => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        try {
            $uploaded = $this->uploadImages($request->file('images'), $gallery->id);

            return response()->json([
                'success'  => true,
                'message'  => __('messages.success.created', ['item' => count($uploaded) . ' image(s)']),
                'images'   => $uploaded,
                'redirect' => route('admin.gallery.show', $gallery),
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => __('messages.error.default'),
            ], 500);
        }
    }

    /**
     * Delete a single image (AJAX / inline).
     */
    public function deleteImage(Gallery $gallery, GalleryImage $image)
    {
        try {
            if ($image->image_path) {
                (new ImageHandler('galleries'))->delete($image->image_path);
            }

            $image->delete();

            if (request()->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => __('messages.success.deleted', ['item' => 'Image']),
                ]);
            }

            Toastr::success(__('messages.success.deleted', ['item' => 'Image']));
        } catch (Exception $e) {
            if (request()->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => __('messages.error.default'),
                ], 500);
            }
            Toastr::error(__('messages.error.default'));
        }

        return redirect()->route('admin.gallery.show', $gallery);
    }

    /**
     * Toggle publish status of an image (AJAX).
     */
    public function toggleImage(Gallery $gallery, GalleryImage $image)
    {
        $image->update(['is_published' => !$image->is_published]);

        if (request()->expectsJson()) {
            return response()->json([
                'success'      => true,
                'is_published' => $image->is_published,
            ]);
        }

        Toastr::success(__('messages.success.updated', ['item' => 'Image status']));
        return redirect()->route('admin.gallery.show', $gallery);
    }

    /**
     * Bulk delete images.
     */
    public function bulkDeleteImages(Request $request, Gallery $gallery)
    {
        $request->validate(['ids' => 'required|array', 'ids.*' => 'integer|exists:gallery_images,id']);

        try {
            $imageHandler = new ImageHandler('galleries');
            $images = GalleryImage::whereIn('id', $request->ids)
                ->where('gallery_id', $gallery->id)
                ->get();

            foreach ($images as $image) {
                if ($image->image_path) {
                    $imageHandler->delete($image->image_path);
                }
                $image->delete();
            }

            return response()->json([
                'success' => true,
                'message' => __('messages.success.deleted', ['item' => count($request->ids) . ' image(s)']),
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => __('messages.error.default'),
            ], 500);
        }
    }

    // ----------------------------------------------------------------
    // Helpers
    // ----------------------------------------------------------------

    private function uploadImages(array $files, int $galleryId): array
    {
        $imageHandler = new ImageHandler('galleries');
        $uploaded = [];

        foreach ($files as $file) {
            $path = $imageHandler->upload($file, width: 1200, height: 800);

            if ($path) {
                $image = GalleryImage::create([
                    'gallery_id'   => $galleryId,
                    'image_path'   => $path,
                    'is_published' => true,
                ]);

                $uploaded[] = [
                    'id'         => $image->id,
                    'image_path' => $image->image_path,
                    'url'        => asset($image->image_path),
                ];
            }
        }

        return $uploaded;
    }

    private function generateUniqueSlug(string $name, ?int $excludeId = null): string
    {
        $slug = Str::slug($name);
        $original = $slug;
        $counter = 1;

        while (Gallery::where('slug', $slug)->when($excludeId, fn($q) => $q->where('id', '!=', $excludeId))->exists()) {
            $slug = $original . '-' . $counter++;
        }

        return $slug;
    }
}
