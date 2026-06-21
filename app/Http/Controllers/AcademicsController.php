<?php

namespace App\Http\Controllers;

use App\Models\Page;

class AcademicsController extends Controller
{
    /**
     * Render a dynamic Academics page by slug.
     */
    protected function page(string $slug)
    {
        $page = Page::where('slug', $slug)->published()->firstOrFail();

        return view('pages.dynamic', [
            'page'       => $page,
            'section'    => 'Academics',
            'sectionUrl' => route('academics.curriculum'),
        ]);
    }

    public function curriculum()
    {
        return $this->page('curriculum');
    }
    public function examinationPolicy()
    {
        return $this->page('examination-policy');
    }
    public function schoolTiming()
    {
        return $this->page('school-timing');
    }
    public function rulesRegulations()
    {
        return $this->page('rules-regulations');
    }
    public function uniformRegulations()
    {
        return $this->page('uniform-regulations');
    }
    public function bookList()
    {
        return $this->page('book-list');
    }
    public function feeStructure()
    {
        return $this->page('fee-structure');
    }
}
