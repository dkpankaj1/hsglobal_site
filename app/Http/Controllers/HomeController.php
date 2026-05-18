<?php

namespace App\Http\Controllers;

use App\Data\MockData;

class HomeController extends Controller
{
    public function index()
    {
        $school = MockData::aboutSchool();
        $home = MockData::homePage();
        $authorities = [
            [
                'name' => 'Mr. Harish Sharma',
                'role' => 'Chairman',
                'summary' => 'The school is committed to nurturing confident, disciplined, and future-ready learners through value-based education and a supportive campus environment.',
                'photo' => asset('static/images/director.jpg'),
                'route' => 'about.chairman',
            ],
            [
                'name' => 'Mrs. Seema Gupta',
                'role' => 'Director',
                'summary' => 'With strong academic planning, experienced faculty, and a focus on holistic development, the institution creates a safe and inspiring learning journey for every child.',
                'photo' => asset('static/images/director.jpg'),
                'route' => 'about.director',
            ],
            [
                'name' => 'Dr. Anjali Verma',
                'role' => 'Principal',
                'summary' => 'The school fosters academic excellence, creativity, leadership, and character so students can grow into capable individuals prepared for an evolving world.',
                'photo' => asset('static/images/principal.jpg'),
                'route' => 'about.principal',
            ],
        ];

        return view('pages.home', compact('school', 'home', 'authorities'));
    }
}
