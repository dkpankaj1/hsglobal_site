<x-app-layout pageTitle="Dashboard" :breadcrumbs="[['label' => 'Dashboard', 'url' => null]]">

    {{-- Stats Cards --}}
    <div class="row">
        <div class="col-md-4 col-lg-2">
            <div class="card">
                <div class="card-body text-center p-3">
                    <i data-lucide="images" class="d-block mx-auto mb-2" style="font-size:1.8rem; color:#6366f1;"></i>
                    <h3 class="mb-0">{{ $stats['galleries'] }}</h3>
                    <small class="text-muted">Photo Galleries</small>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2">
            <div class="card">
                <div class="card-body text-center p-3">
                    <i data-lucide="video" class="d-block mx-auto mb-2" style="font-size:1.8rem; color:#f59e0b;"></i>
                    <h3 class="mb-0">{{ $stats['videos'] }}</h3>
                    <small class="text-muted">Videos</small>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2">
            <div class="card">
                <div class="card-body text-center p-3">
                    <i data-lucide="image" class="d-block mx-auto mb-2" style="font-size:1.8rem; color:#10b981;"></i>
                    <h3 class="mb-0">{{ $stats['sliders'] }}</h3>
                    <small class="text-muted">Sliders</small>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2">
            <div class="card">
                <div class="card-body text-center p-3">
                    <i data-lucide="clipboard-list" class="d-block mx-auto mb-2"
                        style="font-size:1.8rem; color:#ef4444;"></i>
                    <h3 class="mb-0">{{ $stats['notices'] }}</h3>
                    <small class="text-muted">Notices</small>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2">
            <div class="card">
                <div class="card-body text-center p-3">
                    <i data-lucide="file-text" class="d-block mx-auto mb-2"
                        style="font-size:1.8rem; color:#8b5cf6;"></i>
                    <h3 class="mb-0">{{ $stats['disclosures'] }}</h3>
                    <small class="text-muted">Disclosures</small>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2">
            <div class="card">
                <div class="card-body text-center p-3">
                    <i data-lucide="mail-question" class="d-block mx-auto mb-2"
                        style="font-size:1.8rem; color:#ec4899;"></i>
                    <h3 class="mb-0">{{ $stats['enquiries'] }}</h3>
                    <small class="text-muted">
                        Adm. Enquiries
                        @if ($stats['new_enquiries'] > 0)
                            <span class="badge bg-warning text-dark ms-1">{{ $stats['new_enquiries'] }} new</span>
                        @endif
                    </small>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2">
            <div class="card">
                <div class="card-body text-center p-3">
                    <i data-lucide="message-square" class="d-block mx-auto mb-2"
                        style="font-size:1.8rem; color:#0ea5e9;"></i>
                    <h3 class="mb-0">{{ $stats['contact_enquiries'] }}</h3>
                    <small class="text-muted">
                        Contact Enq.
                        @if ($stats['new_contact_enquiries'] > 0)
                            <span class="badge bg-warning text-dark ms-1">{{ $stats['new_contact_enquiries'] }}
                                new</span>
                        @endif
                    </small>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        {{-- Recent Admission Enquiries --}}
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="header-title mb-0">Recent Admission Enquiries</h4>
                    <a href="{{ route('admin.admission.enquiries.index') }}" class="btn btn-sm btn-outline-primary">
                        View All
                    </a>
                </div>
                <div class="card-body p-0">
                    @if ($recentEnquiries->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table table-sm mb-0">
                                <thead>
                                    <tr>
                                        <th>Student</th>
                                        <th>Class</th>
                                        <th>Parent</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentEnquiries as $enquiry)
                                        <tr class="{{ $enquiry->is_read ? '' : 'fw-bold' }}">
                                            <td>{{ $enquiry->student_name }}</td>
                                            <td>{{ $enquiry->admission_class }}</td>
                                            <td>{{ $enquiry->parent_name }}</td>
                                            <td>{{ $enquiry->phone }}</td>
                                            <td>
                                                @if ($enquiry->is_read)
                                                    <span class="badge bg-secondary">Read</span>
                                                @else
                                                    <span class="badge bg-warning text-dark">New</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.admission.enquiries.show', $enquiry) }}"
                                                    class="btn btn-sm btn-info">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4 text-muted">
                            <i data-lucide="inbox" class="d-block mb-2" style="font-size:2rem;"></i>
                            No enquiries yet.
                        </div>
                    @endif
                </div>
            </div>

            {{-- Recent Contact Enquiries --}}
            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="header-title mb-0">Recent Contact Enquiries</h4>
                    <a href="{{ route('admin.contact-enquiries.index') }}" class="btn btn-sm btn-outline-primary">
                        View All
                    </a>
                </div>
                <div class="card-body p-0">
                    @if ($recentContactEnquiries->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table table-sm mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentContactEnquiries as $enquiry)
                                        <tr class="{{ $enquiry->is_read ? '' : 'fw-bold' }}">
                                            <td>{{ $enquiry->name }}</td>
                                            <td>{{ $enquiry->subject }}</td>
                                            <td>{{ $enquiry->email }}</td>
                                            <td>{{ $enquiry->phone ?? '—' }}</td>
                                            <td>
                                                @if ($enquiry->is_read)
                                                    <span class="badge bg-secondary">Read</span>
                                                @else
                                                    <span class="badge bg-warning text-dark">New</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.contact-enquiries.show', $enquiry) }}"
                                                    class="btn btn-sm btn-info">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4 text-muted">
                            <i data-lucide="inbox" class="d-block mb-2" style="font-size:2rem;"></i>
                            No contact enquiries yet.
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title mb-0">Quick Actions</h4>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.gallery.create') }}" class="btn btn-outline-primary text-start">
                            <i data-lucide="image-plus" class="me-2"></i> Create Photo Gallery
                        </a>
                        <a href="{{ route('admin.video-gallery.create') }}"
                            class="btn btn-outline-primary text-start">
                            <i data-lucide="video-plus" class="me-2"></i> Add Video
                        </a>
                        <a href="{{ route('admin.notice-board.create') }}"
                            class="btn btn-outline-primary text-start">
                            <i data-lucide="clipboard-plus" class="me-2"></i> Add Notice
                        </a>
                        <a href="{{ route('admin.image-slider.create') }}"
                            class="btn btn-outline-primary text-start">
                            <i data-lucide="image-plus" class="me-2"></i> Add Slider Image
                        </a>
                        <a href="{{ route('admin.mandatory-disclosure.create') }}"
                            class="btn btn-outline-primary text-start">
                            <i data-lucide="file-plus" class="me-2"></i> Add Disclosure
                        </a>
                        <a href="{{ route('admin.admission.edit') }}" class="btn btn-outline-primary text-start">
                            <i data-lucide="graduation-cap" class="me-2"></i> Admission Settings
                        </a>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="header-title mb-0">Website</h4>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-secondary text-start">
                            <i data-lucide="external-link" class="me-2"></i> Visit Website
                        </a>
                        <a href="{{ route('admin.settings.edit') }}" class="btn btn-outline-secondary text-start">
                            <i data-lucide="settings" class="me-2"></i> Site Settings
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
