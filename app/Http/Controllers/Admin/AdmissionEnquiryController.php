<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdmissionEnquiry;
use App\Support\Toastr;
use Exception;

class AdmissionEnquiryController extends Controller
{
    public function index()
    {
        $enquiries = AdmissionEnquiry::latest()->paginate(20);

        return view('admin.admission.enquiries.index', compact('enquiries'));
    }

    public function show(AdmissionEnquiry $enquiry)
    {
        if (!$enquiry->is_read) {
            $enquiry->update(['is_read' => true]);
        }

        return view('admin.admission.enquiries.show', compact('enquiry'));
    }

    public function markRead(AdmissionEnquiry $enquiry)
    {
        $enquiry->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }

    public function destroy(AdmissionEnquiry $enquiry)
    {
        try {
            $enquiry->delete();
            Toastr::success(__('messages.success.deleted', ['item' => 'Enquiry']));
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
        }

        return redirect()->route('admin.admission.enquiries.index');
    }
}
