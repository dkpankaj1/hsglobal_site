<?php

namespace App\Http\Controllers;

use App\Data\MockData;

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
        $data = MockData::leaderMessage('chairman');

        return view('pages.about.message', compact('data'));
    }

    public function directorMessage()
    {
        $data = MockData::leaderMessage('director');

        return view('pages.about.message', compact('data'));
    }

    public function principalMessage()
    {
        $data = MockData::leaderMessage('principal');

        return view('pages.about.message', compact('data'));
    }
}
