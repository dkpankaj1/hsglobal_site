<?php

namespace App\Http\Controllers;

use App\Models\AboutSetting;
use App\Models\CoreValue;
use App\Models\SchoolAuthority;
use App\Models\VisionMission;

class AboutController extends Controller
{
    public function school()
    {
        $data     = AboutSetting::firstOrCreate([]);
        $chairman = SchoolAuthority::where('role', 'chairman')
            ->where('is_published', true)
            ->first();

        return view('pages.about.school', compact('data', 'chairman'));
    }

    public function vision()
    {
        $data = VisionMission::firstOrCreate([]);
        $coreValues = CoreValue::orderBy('sort_order')->get();

        return view('pages.about.vision', compact('data', 'coreValues'));
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
