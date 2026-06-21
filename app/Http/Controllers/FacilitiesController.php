<?php

namespace App\Http\Controllers;

use App\Data\MockData;
use App\Models\Facility;

class FacilitiesController extends Controller
{
    public function infrastructure()
    {
        return $this->showStatic('infrastructure');
    }

    public function smartClassrooms()
    {
        return $this->showStatic('smart-classrooms');
    }

    public function library()
    {
        return $this->showStatic('library');
    }

    public function scienceLab()
    {
        return $this->showStatic('science-lab');
    }

    public function computerLab()
    {
        return $this->showStatic('computer-lab');
    }

    public function sportsFacility()
    {
        return $this->showStatic('sports');
    }

    private function showStatic(string $key)
    {
        $data = MockData::facility($key);

        return view('pages.facilities.show', compact('data'));
    }

    /**
     * Display a dynamic facility by slug.
     */
    public function show(string $slug)
    {
        $facility = Facility::where('slug', $slug)->where('is_publish', true)->firstOrFail();

        return view('pages.facilities.dynamic-show', compact('facility'));
    }
}
