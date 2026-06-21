<?php

namespace App\Http\Controllers;

use App\Models\Facility;

class FacilitiesController extends Controller
{
    /**
     * Show all published facilities (infrastructure listing page).
     */
    public function infrastructure()
    {
        $facilities = Facility::where('is_publish', true)
            ->latest()
            ->get();

        return view('pages.facilities.index', compact('facilities'));
    }

    /**
     * Show a specific facility by known slug.
     */
    public function smartClassrooms()
    {
        return $this->showBySlug('smart-classrooms');
    }

    public function library()
    {
        return $this->showBySlug('library');
    }

    public function scienceLab()
    {
        return $this->showBySlug('science-lab');
    }

    public function computerLab()
    {
        return $this->showBySlug('computer-lab');
    }

    public function sportsFacility()
    {
        return $this->showBySlug('sports');
    }

    /**
     * Display a dynamic facility by slug.
     */
    public function show(string $slug)
    {
        return $this->showBySlug($slug);
    }

    /**
     * Shared helper to fetch a published facility by slug.
     */
    private function showBySlug(string $slug)
    {
        $facility = Facility::where('slug', $slug)
            ->where('is_publish', true)
            ->firstOrFail();

        $allFacilities = Facility::where('is_publish', true)
            ->orderBy('name')
            ->get();

        return view('pages.facilities.dynamic-show', compact('facility', 'allFacilities'));
    }
}
