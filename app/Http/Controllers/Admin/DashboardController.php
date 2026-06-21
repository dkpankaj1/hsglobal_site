<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdmissionEnquiry;
use App\Models\ContactEnquiry;
use App\Models\Gallery;
use App\Models\ImageSlider;
use App\Models\MandatoryDisclosure;
use App\Models\NoticeBoard;
use App\Models\VideoGallery;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'galleries'          => Gallery::count(),
            'videos'             => VideoGallery::count(),
            'notices'            => NoticeBoard::count(),
            'sliders'            => ImageSlider::count(),
            'disclosures'        => MandatoryDisclosure::count(),
            'enquiries'          => AdmissionEnquiry::count(),
            'new_enquiries'      => AdmissionEnquiry::where('is_read', false)->count(),
            'contact_enquiries'  => ContactEnquiry::count(),
            'new_contact_enquiries' => ContactEnquiry::where('is_read', false)->count(),
        ];

        $recentEnquiries = AdmissionEnquiry::latest()->limit(5)->get();
        $recentContactEnquiries = ContactEnquiry::latest()->limit(5)->get();

        return view('admin.pages.dashboard', compact('stats', 'recentEnquiries', 'recentContactEnquiries'));
    }
}
