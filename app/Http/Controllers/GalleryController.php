<?php

namespace App\Http\Controllers;

use App\Data\MockData;

class GalleryController extends Controller
{
    public function photos()
    {
        $photos = MockData::galleryPhotos();

        return view('pages.gallery.photos', compact('photos'));
    }

    public function videos()
    {
        $videos = MockData::galleryVideos();

        return view('pages.gallery.videos', compact('videos'));
    }

    public function sportsEvents()
    {
        return $this->showEvents('sports');
    }

    public function culturalPrograms()
    {
        return $this->showEvents('cultural');
    }

    public function prizeDistribution()
    {
        return $this->showEvents('prize');
    }

    public function achievements()
    {
        return $this->showEvents('achievements');
    }

    private function showEvents(string $type)
    {
        $data = MockData::galleryEvents($type);

        return view('pages.gallery.events', compact('data'));
    }
}
