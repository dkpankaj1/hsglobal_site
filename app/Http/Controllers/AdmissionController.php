<?php

namespace App\Http\Controllers;

use App\Data\MockData;
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
        $info = MockData::contactInfo();

        return view('pages.admission.enquiry', compact('info'));
    }

    public function submitEnquiry(Request $request)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:100',
            'admission_class' => 'required|string|max:50',
            'parent_name'  => 'required|string|max:100',
            'phone'        => 'required|string|max:20',
            'email'        => 'nullable|email|max:150',
            'message'      => 'required|string|max:2000',
        ]);

        // TODO: Save enquiry or send notification when backend storage is ready.

        return redirect()->route('admission.enquiry')
            ->with('success', 'Your admission enquiry has been submitted successfully.');
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
