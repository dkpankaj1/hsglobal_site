<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImageSlider;
use App\Support\ImageHandler;
use App\Support\Toastr;
use Exception;
use Illuminate\Http\Request;

class ImageSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = ImageSlider::latest()->paginate(15);
        return view('admin.image-slider.index', [
            'sliders' => $sliders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.image-slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'alt_text'     => 'required|string|max:255',
            'slider_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        try {
            $imageHandler = new ImageHandler('sliders');

            $data = $request->only(['alt_text']);

            if ($request->hasFile('slider_image')) {
                $data['slider_image'] = $imageHandler->upload(
                    $request->file('slider_image'),
                    width: 2780,
                    height: 880
                );
            }

            ImageSlider::create($data);

            Toastr::success(__('messages.success.created', ['item' => 'Image Slider']));
            return redirect()->route('admin.image-slider.index');
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ImageSlider $imageSlider)
    {
        return view('admin.image-slider.show', [
            'slider' => $imageSlider
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ImageSlider $imageSlider)
    {
        return view('admin.image-slider.edit', [
            'slider' => $imageSlider
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ImageSlider $imageSlider)
    {
        $request->validate([
            'alt_text'     => 'required|string|max:255',
            'slider_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        try {
            $imageHandler = new ImageHandler('sliders');

            $data = $request->only(['alt_text']);

            if ($request->hasFile('slider_image')) {
                if ($imageSlider->slider_image) {
                    $imageHandler->delete($imageSlider->slider_image);
                }
                $data['slider_image'] = $imageHandler->upload(
                    $request->file('slider_image'),
                    width: 2780,
                    height: 880
                );
            }

            $imageSlider->update($data);

            Toastr::success(__('messages.success.updated', ['item' => 'Image Slider']));
            return redirect()->route('admin.image-slider.index');
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ImageSlider $imageSlider)
    {
        try {
            if ($imageSlider->slider_image) {
                $imageHandler = new ImageHandler('sliders');
                $imageHandler->delete($imageSlider->slider_image);
            }

            $imageSlider->delete();

            Toastr::success(__('messages.success.deleted', ['item' => 'Image Slider']));
            return redirect()->route('admin.image-slider.index');
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
            return redirect()->back();
        }
    }
}
