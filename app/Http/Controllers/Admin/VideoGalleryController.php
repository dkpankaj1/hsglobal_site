<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoGallery;
use App\Support\Toastr;
use Exception;
use Illuminate\Http\Request;

class VideoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = VideoGallery::latest()->paginate(15);
        return view('admin.video-gallery.index', [
            'videos' => $videos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.video-gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'description'  => 'nullable|string',
            'yt_url'       => 'required|url|max:500',
            'is_published' => 'boolean',
        ]);

        try {
            $data = $request->only(['name', 'description', 'yt_url']);
            $data['is_published'] = $request->boolean('is_published');

            VideoGallery::create($data);

            Toastr::success(__('messages.success.created', ['item' => 'Video Gallery']));
            return redirect()->route('admin.video-gallery.index');
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(VideoGallery $videoGallery)
    {
        return view('admin.video-gallery.show', [
            'video' => $videoGallery
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VideoGallery $videoGallery)
    {
        return view('admin.video-gallery.edit', [
            'video' => $videoGallery
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VideoGallery $videoGallery)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'description'  => 'nullable|string',
            'yt_url'       => 'required|url|max:500',
            'is_published' => 'boolean',
        ]);

        try {
            $data = $request->only(['name', 'description', 'yt_url']);
            $data['is_published'] = $request->boolean('is_published');

            $videoGallery->update($data);

            Toastr::success(__('messages.success.updated', ['item' => 'Video Gallery']));
            return redirect()->route('admin.video-gallery.index');
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VideoGallery $videoGallery)
    {
        try {
            $videoGallery->delete();

            Toastr::success(__('messages.success.deleted', ['item' => 'Video Gallery']));
            return redirect()->route('admin.video-gallery.index');
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
            return redirect()->back();
        }
    }
}
