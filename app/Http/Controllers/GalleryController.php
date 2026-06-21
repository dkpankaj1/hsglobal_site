<?php

namespace App\Http\Controllers;

use App\Models\Gallery;

class GalleryController extends Controller
{
    /**
     * Display all published photo galleries.
     */
    public function index()
    {
        $galleries = Gallery::with('images')
            ->where('is_published', true)
            ->latest()
            ->paginate(12);

        return view('pages.gallery.index', compact('galleries'));
    }

    /**
     * Display a single gallery with its images.
     */
    public function show(string $slug)
    {
        $gallery = Gallery::with('images')
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('pages.gallery.show', compact('gallery'));
    }
}
