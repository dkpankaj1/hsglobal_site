<?php

namespace App\Http\Controllers;

use App\Data\MockData;
use App\Models\ImageSlider;
use App\Models\ImportantNotice;
use App\Models\NoticeBoard;

class HomeController extends Controller
{
    public function index()
    {
        $school = MockData::aboutSchool();
        $home = MockData::homePage();
        $heroSlides  = ImageSlider::all()->map(function ($item) {
            return [
                'src' => $item->slider_image_url,
                'title' => $item->alt_text
            ];
        });

        $home['notices'] = NoticeBoard::where('is_publish', true)
            ->latest()
            ->take(5)
            ->get(['id', 'title'])
            ->toArray();

        $importantNotice = ImportantNotice::firstOrCreate();

        $authorities = [

            [
                'name' => 'Mr. Sushil Kumar Singh',
                'role' => 'Director',
                'summary' => 'Committed to providing quality education through innovation, discipline, and holistic development, ensuring every student reaches their full potential.',
                'photo' => asset('static/images/director.jpg'),
                'route' => 'about.director',
            ],
            [
                'name' => 'Mr. Roshan Singh',
                'role' => 'Principal',
                'summary' => 'Dedicated to nurturing academic excellence, strong values, and leadership skills, preparing students for success in a dynamic world.',
                'photo' => asset('static/images/principal.jpg'),
                'route' => 'about.principal',
            ],
        ];

        return view('pages.home', compact(
            'school',
            'home',
            'authorities',
            'importantNotice',
            'heroSlides'
        ));
    }
}
