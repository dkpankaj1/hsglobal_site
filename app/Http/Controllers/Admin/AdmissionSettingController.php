<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdmissionSetting;
use App\Support\Toastr;
use Exception;
use Illuminate\Http\Request;

class AdmissionSettingController extends Controller
{
    public function edit()
    {
        $admissionSetting = AdmissionSetting::firstOrCreate([]);

        return view('admin.admission.settings', compact('admissionSetting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'is_open'        => 'boolean',
            'academic_year'  => 'nullable|string|max:20',
            'start_date'     => 'nullable|date',
            'end_date'       => 'nullable|date|after_or_equal:start_date',
            'contact_person' => 'nullable|string|max:100',
            'contact_phone'  => 'nullable|string|max:20',
            'contact_email'  => 'nullable|email|max:150',
            'instructions'   => 'nullable|string|max:5000',
        ]);

        try {
            $admissionSetting = AdmissionSetting::firstOrCreate([]);

            $data = $request->only([
                'academic_year',
                'start_date',
                'end_date',
                'contact_person',
                'contact_phone',
                'contact_email',
                'instructions',
            ]);
            $data['is_open'] = $request->boolean('is_open');

            $admissionSetting->update($data);

            Toastr::success(__('messages.success.updated', ['item' => 'Admission Settings']));
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
        }

        return redirect()->back();
    }
}
