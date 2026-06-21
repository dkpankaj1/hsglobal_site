<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactEnquiry;
use App\Support\Toastr;
use Exception;

class ContactEnquiryController extends Controller
{
    public function index()
    {
        $enquiries = ContactEnquiry::latest()->paginate(20);

        return view('admin.contact-enquiries.index', compact('enquiries'));
    }

    public function show(ContactEnquiry $enquiry)
    {
        if (!$enquiry->is_read) {
            $enquiry->update(['is_read' => true]);
        }

        return view('admin.contact-enquiries.show', compact('enquiry'));
    }

    public function destroy(ContactEnquiry $enquiry)
    {
        try {
            $enquiry->delete();
            Toastr::success(__('messages.success.deleted', ['item' => 'Enquiry']));
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
        }

        return redirect()->route('admin.contact-enquiries.index');
    }
}
