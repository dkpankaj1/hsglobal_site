<?php

namespace App\Http\Controllers;

use App\Data\MockData;

class FacilitiesController extends Controller
{
    public function infrastructure()
    {
        return $this->show('infrastructure');
    }

    public function smartClassrooms()
    {
        return $this->show('smart-classrooms');
    }

    public function library()
    {
        return $this->show('library');
    }

    public function scienceLab()
    {
        return $this->show('science-lab');
    }

    public function computerLab()
    {
        return $this->show('computer-lab');
    }

    public function sportsFacility()
    {
        return $this->show('sports');
    }

    private function show(string $key)
    {
        $data = MockData::facility($key);

        return view('pages.facilities.show', compact('data'));
    }
}
