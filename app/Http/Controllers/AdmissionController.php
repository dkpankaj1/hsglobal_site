<?php

namespace App\Http\Controllers;

use App\Models\AdmissionEnquiry;
use App\Models\AdmissionSetting;
use App\Models\Page;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    // ── Dynamic Pages (from database) ──────────────────────────────

    /**
     * Render a dynamic Admission page by slug.
     */
    protected function page(string $slug)
    {
        $page = Page::where('slug', $slug)->published()->firstOrFail();

        return view('pages.dynamic', [
            'page'       => $page,
            'section'    => 'Admission',
            'sectionUrl' => route('admission.procedure'),
        ]);
    }

    public function procedure()
    {
        return $this->page('admission-procedure');
    }
    public function eligibility()
    {
        return $this->page('eligibility-criteria');
    }
    public function documents()
    {
        return $this->page('documents-required');
    }
    public function feePayment()
    {
        return $this->page('fee-payment-rules');
    }
    public function withdrawal()
    {
        return $this->page('withdrawal-transfer');
    }
    public function tcSample()
    {
        return $this->page('tc-sample');
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
}
