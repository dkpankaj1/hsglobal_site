<?php

namespace App\Http\Controllers;

use App\Models\AboutSetting;
use App\Models\Facility;
use App\Models\HomeStat;
use App\Models\ImageSlider;
use App\Models\ImportantNotice;
use App\Models\NoticeBoard;
use App\Models\SchoolAuthority;

class HomeController extends Controller
{
    public function index()
    {
        $school = AboutSetting::firstOrCreate([]);
        $stats  = HomeStat::orderBy('sort_order')->get();
        $heroSlides = ImageSlider::all()->map(function ($item) {
            return [
                'src' => $item->slider_image_url,
                'title' => $item->alt_text
            ];
        });

        $notices = NoticeBoard::where('is_publish', true)
            ->latest()
            ->take(5)
            ->get(['id', 'title']);

        $importantNotice = ImportantNotice::firstOrCreate();

        $authorities = SchoolAuthority::where('is_published', true)
            ->orderBy('id')
            ->get();

        $facilities = Facility::where('is_publish', true)
            ->latest()
            ->get();

        return view('pages.home', compact(
            'school',
            'notices',
            'stats',
            'authorities',
            'importantNotice',
            'heroSlides',
            'facilities'
        ));
    }
}
