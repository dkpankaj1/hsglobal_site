<?php

namespace App\Http\Controllers;

use App\Data\MockData;
use App\Models\SchoolAuthority;

class AboutController extends Controller
{
    public function school()
    {
        $data = MockData::aboutSchool();

        return view('pages.about.school', compact('data'));
    }

    public function vision()
    {
        $data = MockData::visionMission();

        return view('pages.about.vision', compact('data'));
    }

    public function chairmanMessage()
    {
        $data = SchoolAuthority::where('role', 'chairman')
            ->where('is_published', true)
            ->first();

        if (!$data) {
            abort(404);
        }

        return view('pages.about.message', compact('data'));
    }

    public function directorMessage()
    {
        $data = SchoolAuthority::where('role', 'director')
            ->where('is_published', true)
            ->first();

        if (!$data) {
            abort(404);
        }

        return view('pages.about.message', compact('data'));
    }

    public function principalMessage()
    {
        $data = SchoolAuthority::where('role', 'principal')
            ->where('is_published', true)
            ->first();

        if (!$data) {
            abort(404);
        }

        return view('pages.about.message', compact('data'));
    }
}
