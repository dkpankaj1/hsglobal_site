<?php

namespace App\Http\Controllers;

use App\Data\MockData;

class AdmissionController extends Controller
{
    public function procedure()
    {
        $data = MockData::admissionProcedure();

        return view('pages.admission.procedure', compact('data'));
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
