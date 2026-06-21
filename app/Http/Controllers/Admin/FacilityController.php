<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Support\ImageHandler;
use App\Support\Toastr;
use Exception;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facilities = Facility::latest()->paginate(12);

        return view('admin.facility.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.facility.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'sort_description' => 'required|string|max:500',
            'description'      => 'nullable|string',
            'thumbnail'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'highlights'       => 'nullable|array',
            'highlights.*'     => 'string|max:255',
            'is_publish'       => 'boolean',
        ]);

        try {
            $data = $request->only(['name', 'sort_description', 'description', 'is_publish']);
            $data['is_publish'] = $request->boolean('is_publish');
            $data['highlights'] = $request->input('highlights', []);

            if ($request->hasFile('thumbnail')) {
                $imageHandler = new ImageHandler('facilities');
                $data['thumbnail'] = $imageHandler->upload($request->file('thumbnail'), 600, 400);
            }

            Facility::create($data);

            Toastr::success(__('messages.success.created', ['item' => 'Facility']));
            return redirect()->route('admin.facility.index');
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
            return redirect()->back()->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facility $facility)
    {
        return view('admin.facility.edit', compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facility $facility)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'sort_description' => 'required|string|max:500',
            'description'      => 'nullable|string',
            'thumbnail'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'highlights'       => 'nullable|array',
            'highlights.*'     => 'string|max:255',
            'is_publish'       => 'boolean',
        ]);

        try {
            $data = $request->only(['name', 'sort_description', 'description', 'is_publish']);
            $data['is_publish'] = $request->boolean('is_publish');
            $data['highlights'] = $request->input('highlights', []);

            if ($request->hasFile('thumbnail')) {
                $imageHandler = new ImageHandler('facilities');

                // Delete old thumbnail
                if ($facility->thumbnail) {
                    $imageHandler->delete($facility->thumbnail);
                }

                $data['thumbnail'] = $imageHandler->upload($request->file('thumbnail'), 600, 400);
            }

            $facility->update($data);

            Toastr::success(__('messages.success.updated', ['item' => 'Facility']));
            return redirect()->route('admin.facility.index');
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facility $facility)
    {
        try {
            if ($facility->thumbnail) {
                $imageHandler = new ImageHandler('facilities');
                $imageHandler->delete($facility->thumbnail);
            }

            $facility->delete();

            Toastr::success(__('messages.success.deleted', ['item' => 'Facility']));
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
        }

        return redirect()->route('admin.facility.index');
    }
}
