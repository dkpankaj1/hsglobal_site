<?php

namespace App\Http\Controllers;

use App\Data\MockData;

class HomeController extends Controller
{
    public function index()
    {
        $school = MockData::aboutSchool();
        $home = MockData::homePage();

        return view('pages.home', compact('school', 'home'));
    }
}
