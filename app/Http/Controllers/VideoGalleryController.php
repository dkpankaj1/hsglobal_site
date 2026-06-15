<?php

namespace App\Http\Controllers;

use App\Models\VideoGallery;

class VideoGalleryController extends Controller
{
    /**
     * Display all published videos.
     */
    public function index()
    {
        $videos = VideoGallery::where('is_published', true)
            ->latest()
            ->paginate(12);

        return view('pages.gallery.videos', compact('videos'));
    }
}
