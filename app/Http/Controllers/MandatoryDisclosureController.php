<?php

namespace App\Http\Controllers;

use App\Data\MockData;
use App\Models\MandatoryDisclosure;

class MandatoryDisclosureController extends Controller
{
    /**
     * List all public disclosures.
     */
    public function index()
    {
        $disclosures = MandatoryDisclosure::where('is_public', true)
            ->orderBy('name')
            ->get();

        return view('pages.disclosure.index', compact('disclosures'));
    }

    /**
     * Show a single disclosure by slug.
     */
    public function show(string $slug)
    {
        $disclosure = MandatoryDisclosure::where('slug', $slug)
            ->where('is_public', true)
            ->firstOrFail();

        $disclosures = MandatoryDisclosure::where('is_public', true)
            ->orderBy('name')
            ->get();

        return view('pages.disclosure.show', compact('disclosure', 'disclosures'));
    }

    public function download(string $token)
    {
        $disclosure = MandatoryDisclosure::where('token', $token)->firstOrFail();

        if (empty($disclosure->document)) {
            abort(404, 'Document not found.');
        }
        return response()->download(public_path('upload/' . $disclosure->document), $disclosure->name);
    }

    public function generalInfo()
    {
        $data = MockData::disclosureGeneralInfo();

        return view('pages.disclosure.table', [
            'pageTitle'   => 'General Information',
            'breadcrumb'  => 'Mandatory Disclosure / General Information',
            'columns'     => ['Particulars', 'Details'],
            'rows'        => array_map(fn($r) => [$r['label'], $r['value']], $data),
        ]);
    }

    public function schoolManagement()
    {
        $data = MockData::disclosureSchoolManagement();

        return view('pages.disclosure.table', [
            'pageTitle'  => 'School Management',
            'breadcrumb' => 'Mandatory Disclosure / School Management',
            'columns'    => ['Name', 'Designation', 'Qualification'],
            'rows'       => array_map(fn($r) => [$r['name'], $r['designation'], $r['qualification']], $data),
        ]);
    }

    public function documents()
    {
        // TODO: Replace with document links from DB/storage
        $data = [
            ['name' => 'CBSE Affiliation Certificate',        'file' => '#'],
            ['name' => 'Trust / Society Registration',        'file' => '#'],
            ['name' => 'NOC from State Government',           'file' => '#'],
            ['name' => 'Recognition Certificate',             'file' => '#'],
            ['name' => 'Building Safety Certificate',         'file' => '#'],
            ['name' => 'Fire Safety Certificate',             'file' => '#'],
            ['name' => 'DEO Certificate (Self-Certification)', 'file' => '#'],
            ['name' => 'Water & Sanitation Certificate',      'file' => '#'],
        ];

        return view('pages.disclosure.documents', compact('data'));
    }

    public function infrastructure()
    {
        $data = MockData::disclosureInfrastructure();

        return view('pages.disclosure.table', [
            'pageTitle'  => 'Infrastructure Details',
            'breadcrumb' => 'Mandatory Disclosure / Infrastructure Details',
            'columns'    => ['Particulars', 'Details'],
            'rows'       => array_map(fn($r) => [$r['item'], $r['detail']], $data),
        ]);
    }

    public function feeStructure()
    {
        $data = MockData::feeStructure();

        return view('pages.disclosure.table', [
            'pageTitle'  => 'Fee Structure',
            'breadcrumb' => 'Mandatory Disclosure / Fee Structure',
            'columns'    => ['Class', 'Admission Fee (₹)', 'Monthly Tuition (₹)', 'Annual Charges (₹)'],
            'rows'       => array_map(fn($r) => [$r['class'], $r['admission'], $r['tuition'], $r['annual']], $data),
        ]);
    }

    public function staffDetails()
    {
        $data = MockData::disclosureStaff();

        return view('pages.disclosure.table', [
            'pageTitle'  => 'Staff Details',
            'breadcrumb' => 'Mandatory Disclosure / Staff Details',
            'columns'    => ['Category', 'Required', 'Available', 'Trained (B.Ed/Equivalent)'],
            'rows'       => array_map(fn($r) => [$r['category'], $r['required'], $r['available'], $r['trained']], $data),
        ]);
    }

    public function safetyDetails()
    {
        $data = MockData::disclosureSafety();

        return view('pages.disclosure.list', [
            'pageTitle'  => 'Safety Details',
            'breadcrumb' => 'Mandatory Disclosure / Safety Details',
            'items'      => $data,
        ]);
    }

    public function transport()
    {
        $data = MockData::disclosureTransport();

        return view('pages.disclosure.table', [
            'pageTitle'  => 'Transport Details',
            'breadcrumb' => 'Mandatory Disclosure / Transport Details',
            'columns'    => ['Route', 'Areas Covered', 'No. of Buses'],
            'rows'       => array_map(fn($r) => [$r['route'], $r['areas'], $r['buses']], $data),
        ]);
    }

    public function financialStatus()
    {
        $data = MockData::disclosureFinancial();

        return view('pages.disclosure.table', [
            'pageTitle'  => 'Financial Status',
            'breadcrumb' => 'Mandatory Disclosure / Financial Status',
            'columns'    => ['Head', 'Amount (INR)'],
            'rows'       => array_map(fn($r) => [$r['head'], $r['amount']], $data),
        ]);
    }
}
