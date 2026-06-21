<?php

namespace App\Http\Controllers;

use App\Data\MockData;
use App\Models\AdmissionEnquiry;
use App\Models\AdmissionSetting;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function procedure()
    {
        $data      = MockData::admissionProcedure();
        $documents = MockData::documentsRequired();

        return view('pages.admission.procedure', compact('data', 'documents'));
    }

    public function enquiry()
    {
        $setting   = AdmissionSetting::first();
        $classList = $this->classList();

        return view('pages.admission.enquiry', compact('setting', 'classList'));
    }

    private function classList(): array
    {
        return [
            'Play Way',
            'Nursery',
            'LKG',
            'UKG',
            '1st',
            '2nd',
            '3rd',
            '4th',
            '5th',
            '6th',
            '7th',
            '8th',
            '9th',
            '11th',
        ];
    }

    public function submitEnquiry(Request $request)
    {
        $setting = AdmissionSetting::first();

        if ($setting && !$setting->is_open) {
            return redirect()->route('admission.enquiry')
                ->with('error', 'Admissions are currently closed.');
        }

        $validated = $request->validate([
            'student_name'    => 'required|string|max:100',
            'admission_class' => 'required|string|max:50',
            'parent_name'     => 'required|string|max:100',
            'phone'           => 'required|string|max:20',
            'email'           => 'nullable|email|max:150',
            'message'         => 'required|string|max:2000',
        ]);

        AdmissionEnquiry::create($validated);

        return redirect()->route('admission.enquiry')
            ->with('success', 'Your admission enquiry has been submitted successfully. We will contact you soon.');
    }

    public function eligibility()
    {
        $data = MockData::eligibilityCriteria();

        return view('pages.admission.eligibility', compact('data'));
    }

    public function documents()
    {
        $data = MockData::documentsRequired();

        return view('pages.admission.documents', compact('data'));
    }

    public function feePayment()
    {
        $data = MockData::feePaymentRules();

        return view('pages.admission.fee-payment', compact('data'));
    }

    public function withdrawal()
    {
        $data = MockData::withdrawalRules();

        return view('pages.admission.withdrawal', compact('data'));
    }

    public function tcSample()
    {
        $data = MockData::tcSample();

        return view('pages.admission.tc-sample', compact('data'));
    }
}
