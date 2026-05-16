<?php

namespace App\Http\Controllers;

use App\Data\MockData;

class AcademicsController extends Controller
{
    public function curriculum()
    {
        $data = MockData::curriculum();

        return view('pages.academics.curriculum', compact('data'));
    }

    public function examinationPolicy()
    {
        $data = MockData::examinationPolicy();

        return view('pages.academics.examination-policy', compact('data'));
    }

    public function schoolTiming()
    {
        $data = MockData::schoolTiming();

        return view('pages.academics.school-timing', compact('data'));
    }

    public function rulesRegulations()
    {
        $data = MockData::rulesRegulations();

        return view('pages.academics.rules-regulations', compact('data'));
    }

    public function uniformRegulations()
    {
        $data = MockData::uniformRegulations();

        return view('pages.academics.uniform-regulations', compact('data'));
    }

    public function bookList()
    {
        $data = MockData::bookList();

        return view('pages.academics.book-list', compact('data'));
    }

    public function feeStructure()
    {
        $data = MockData::feeStructure();

        return view('pages.academics.fee-structure', compact('data'));
    }
}
