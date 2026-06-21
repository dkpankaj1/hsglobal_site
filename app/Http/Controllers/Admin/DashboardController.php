<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdmissionEnquiry;
use App\Models\ContactEnquiry;
use App\Models\CoreValue;
use App\Models\Facility;
use App\Models\Gallery;
use App\Models\HomeStat;
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
            'notices'            => NoticeBoard::where('is_publish', true)->count(),
            'notices_total'      => NoticeBoard::count(),
            'sliders'            => ImageSlider::count(),
            'disclosures'        => MandatoryDisclosure::count(),
            'disclosures_public' => MandatoryDisclosure::where('is_public', true)->count(),
            'enquiries'          => AdmissionEnquiry::count(),
            'new_enquiries'      => AdmissionEnquiry::where('is_read', false)->count(),
            'contact_enquiries'  => ContactEnquiry::count(),
            'new_contact_enquiries' => ContactEnquiry::where('is_read', false)->count(),
            'facilities'         => Facility::where('is_publish', true)->count(),
            'facilities_total'   => Facility::count(),
            'core_values'        => CoreValue::count(),
            'home_stats'         => HomeStat::count(),
        ];

        $recentEnquiries = AdmissionEnquiry::latest()->limit(5)->get();
        $recentContactEnquiries = ContactEnquiry::latest()->limit(5)->get();

        return view('admin.pages.dashboard', compact('stats', 'recentEnquiries', 'recentContactEnquiries'));
    }
}
