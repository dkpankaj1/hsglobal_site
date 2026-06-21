<x-app-layout pageTitle="Dashboard" :breadcrumbs="[['label' => 'Dashboard', 'url' => null]]">

    {{-- Welcome Summary --}}
    <div class="row">
        <div class="col-12">
            <div class="alert alert-info border-0 rounded-3 d-flex align-items-center gap-3 mb-3" role="alert">
                <i data-lucide="school" style="width:2rem;height:2rem;flex-shrink:0;"></i>
                <div>
                    <strong>Welcome back, {{ auth()->user()->name }}!</strong><br>
                    <small>Manage your school website content, enquiries, and settings from this dashboard.</small>
                </div>
            </div>
        </div>
    </div>

    {{-- Content Stats Row --}}
    <div class="row">
        <div class="col-md-4 col-lg-2">
            <div class="card border-start border-primary border-3">
                <div class="card-body text-center p-3">
                    <i data-lucide="images" class="d-block mx-auto mb-2" style="font-size:1.6rem; color:#6366f1;"></i>
                    <h4 class="mb-0 fw-bold">{{ $stats['galleries'] }}</h4>
                    <small class="text-muted">Photo Galleries</small>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2">
            <div class="card border-start border-warning border-3">
                <div class="card-body text-center p-3">
                    <i data-lucide="video" class="d-block mx-auto mb-2" style="font-size:1.6rem; color:#f59e0b;"></i>
                    <h4 class="mb-0 fw-bold">{{ $stats['videos'] }}</h4>
                    <small class="text-muted">Videos</small>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2">
            <div class="card border-start border-success border-3">
                <div class="card-body text-center p-3">
                    <i data-lucide="image" class="d-block mx-auto mb-2" style="font-size:1.6rem; color:#10b981;"></i>
                    <h4 class="mb-0 fw-bold">{{ $stats['sliders'] }}</h4>
                    <small class="text-muted">Sliders</small>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2">
            <div class="card border-start border-danger border-3">
                <div class="card-body text-center p-3">
                    <i data-lucide="clipboard-list" class="d-block mx-auto mb-2"
                        style="font-size:1.6rem; color:#ef4444;"></i>
                    <h4 class="mb-0 fw-bold">{{ $stats['notices'] }}</h4>
                    <small class="text-muted">
                        Published Notices
                        @if ($stats['notices_total'] != $stats['notices'])
                            <span class="text-muted">/ {{ $stats['notices_total'] }}</span>
                        @endif
                    </small>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2">
            <div class="card border-start border-violet border-3" style="border-color:#8b5cf6 !important;">
                <div class="card-body text-center p-3">
                    <i data-lucide="file-text" class="d-block mx-auto mb-2"
                        style="font-size:1.6rem; color:#8b5cf6;"></i>
                    <h4 class="mb-0 fw-bold">{{ $stats['disclosures'] }}</h4>
                    <small class="text-muted">
                        Disclosures
                        @if ($stats['disclosures_public'] > 0)
                            <span class="text-success">({{ $stats['disclosures_public'] }} public)</span>
                        @endif
                    </small>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2">
            <div class="card border-start border-teal border-3" style="border-color:#14b8a6 !important;">
                <div class="card-body text-center p-3">
                    <i data-lucide="building-2" class="d-block mx-auto mb-2"
                        style="font-size:1.6rem; color:#14b8a6;"></i>
                    <h4 class="mb-0 fw-bold">{{ $stats['facilities'] }}</h4>
                    <small class="text-muted">
                        Facilities
                        @if ($stats['facilities_total'] != $stats['facilities'])
                            <span class="text-muted">/ {{ $stats['facilities_total'] }}</span>
                        @endif
                    </small>
                </div>
            </div>
        </div>
    </div>

    {{-- Enquiry Stats Row --}}
    <div class="row mt-2">
        <div class="col-md-4 col-lg-3">
            <div class="card border-start border-pink border-3" style="border-color:#ec4899 !important;">
                <div class="card-body d-flex align-items-center gap-3 p-3">
                    <div class="flex-shrink-0">
                        <i data-lucide="mail-question" style="font-size:1.8rem; color:#ec4899;"></i>
                    </div>
                    <div>
                        <h4 class="mb-0 fw-bold">
                            {{ $stats['enquiries'] }}
                            @if ($stats['new_enquiries'] > 0)
                                <span
                                    class="badge bg-warning text-dark ms-1 align-middle">{{ $stats['new_enquiries'] }}
                                    new</span>
                            @endif
                        </h4>
                        <small class="text-muted">Admission Enquiries</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3">
            <div class="card border-start border-sky border-3" style="border-color:#0ea5e9 !important;">
                <div class="card-body d-flex align-items-center gap-3 p-3">
                    <div class="flex-shrink-0">
                        <i data-lucide="message-square" style="font-size:1.8rem; color:#0ea5e9;"></i>
                    </div>
                    <div>
                        <h4 class="mb-0 fw-bold">
                            {{ $stats['contact_enquiries'] }}
                            @if ($stats['new_contact_enquiries'] > 0)
                                <span
                                    class="badge bg-warning text-dark ms-1 align-middle">{{ $stats['new_contact_enquiries'] }}
                                    new</span>
                            @endif
                        </h4>
                        <small class="text-muted">Contact Enquiries</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3">
            <div class="card border-start border-indigo border-3" style="border-color:#6366f1 !important;">
                <div class="card-body d-flex align-items-center gap-3 p-3">
                    <div class="flex-shrink-0">
                        <i data-lucide="star" style="font-size:1.8rem; color:#6366f1;"></i>
                    </div>
                    <div>
                        <h4 class="mb-0 fw-bold">{{ $stats['core_values'] }}</h4>
                        <small class="text-muted">Core Values</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3">
            <div class="card border-start border-emerald border-3" style="border-color:#10b981 !important;">
                <div class="card-body d-flex align-items-center gap-3 p-3">
                    <div class="flex-shrink-0">
                        <i data-lucide="bar-chart-3" style="font-size:1.8rem; color:#10b981;"></i>
                    </div>
                    <div>
                        <h4 class="mb-0 fw-bold">{{ $stats['home_stats'] }}</h4>
                        <small class="text-muted">Home Stats</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        {{-- Recent Admission Enquiries --}}
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="header-title mb-0">
                        <i data-lucide="mail-question" class="me-1" style="width:1.1rem;height:1.1rem;"></i>
                        Recent Admission Enquiries
                    </h5>
                    <a href="{{ route('admin.admission.enquiries.index') }}" class="btn btn-sm btn-outline-primary">
                        View All <i data-lucide="arrow-right" style="width:0.9rem;height:0.9rem;"></i>
                    </a>
                </div>
                <div class="card-body p-0">
                    @if ($recentEnquiries->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table table-sm table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Student</th>
                                        <th>Class</th>
                                        <th>Parent</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentEnquiries as $enquiry)
                                        <tr class="{{ $enquiry->is_read ? '' : 'fw-bold table-warning' }}">
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
                                            <td class="text-end">
                                                <a href="{{ route('admin.admission.enquiries.show', $enquiry) }}"
                                                    class="btn btn-sm btn-outline-info">
                                                    <i data-lucide="eye" style="width:0.9rem;height:0.9rem;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5 text-muted">
                            <i data-lucide="inbox" class="d-block mb-2" style="font-size:2.5rem;"></i>
                            <p class="mb-0">No admission enquiries yet.</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Recent Contact Enquiries --}}
            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="header-title mb-0">
                        <i data-lucide="message-square" class="me-1" style="width:1.1rem;height:1.1rem;"></i>
                        Recent Contact Enquiries
                    </h5>
                    <a href="{{ route('admin.contact-enquiries.index') }}" class="btn btn-sm btn-outline-primary">
                        View All <i data-lucide="arrow-right" style="width:0.9rem;height:0.9rem;"></i>
                    </a>
                </div>
                <div class="card-body p-0">
                    @if ($recentContactEnquiries->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table table-sm table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentContactEnquiries as $enquiry)
                                        <tr class="{{ $enquiry->is_read ? '' : 'fw-bold table-warning' }}">
                                            <td>{{ $enquiry->name }}</td>
                                            <td>{{ Str::limit($enquiry->subject, 30) }}</td>
                                            <td>{{ $enquiry->email }}</td>
                                            <td>{{ $enquiry->phone ?? '—' }}</td>
                                            <td>
                                                @if ($enquiry->is_read)
                                                    <span class="badge bg-secondary">Read</span>
                                                @else
                                                    <span class="badge bg-warning text-dark">New</span>
                                                @endif
                                            </td>
                                            <td class="text-end">
                                                <a href="{{ route('admin.contact-enquiries.show', $enquiry) }}"
                                                    class="btn btn-sm btn-outline-info">
                                                    <i data-lucide="eye" style="width:0.9rem;height:0.9rem;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5 text-muted">
                            <i data-lucide="inbox" class="d-block mb-2" style="font-size:2.5rem;"></i>
                            <p class="mb-0">No contact enquiries yet.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="header-title mb-0">
                        <i data-lucide="zap" class="me-1" style="width:1.1rem;height:1.1rem;"></i>
                        Quick Actions
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.notice-board.create') }}"
                            class="btn btn-outline-primary text-start btn-sm">
                            <i data-lucide="clipboard-plus" class="me-2" style="width:1rem;height:1rem;"></i> Add
                            Notice
                        </a>
                        <a href="{{ route('admin.gallery.create') }}"
                            class="btn btn-outline-primary text-start btn-sm">
                            <i data-lucide="image-plus" class="me-2" style="width:1rem;height:1rem;"></i> Create
                            Photo Gallery
                        </a>
                        <a href="{{ route('admin.video-gallery.create') }}"
                            class="btn btn-outline-primary text-start btn-sm">
                            <i data-lucide="video-plus" class="me-2" style="width:1rem;height:1rem;"></i> Add Video
                        </a>
                        <a href="{{ route('admin.image-slider.create') }}"
                            class="btn btn-outline-primary text-start btn-sm">
                            <i data-lucide="image-plus" class="me-2" style="width:1rem;height:1rem;"></i> Add
                            Slider Image
                        </a>
                        <a href="{{ route('admin.facility.create') }}"
                            class="btn btn-outline-primary text-start btn-sm">
                            <i data-lucide="building-2" class="me-2" style="width:1rem;height:1rem;"></i> Add
                            Facility
                        </a>
                        <a href="{{ route('admin.mandatory-disclosure.create') }}"
                            class="btn btn-outline-primary text-start btn-sm">
                            <i data-lucide="file-plus" class="me-2" style="width:1rem;height:1rem;"></i> Add
                            Disclosure
                        </a>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="header-title mb-0">
                        <i data-lucide="link" class="me-1" style="width:1.1rem;height:1.1rem;"></i>
                        Shortcuts
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('home') }}" target="_blank"
                            class="btn btn-outline-secondary text-start btn-sm">
                            <i data-lucide="external-link" class="me-2" style="width:1rem;height:1rem;"></i> Visit
                            Website
                        </a>
                        <a href="{{ route('admin.admission.edit') }}"
                            class="btn btn-outline-secondary text-start btn-sm">
                            <i data-lucide="sliders-horizontal" class="me-2" style="width:1rem;height:1rem;"></i>
                            Admission Settings
                        </a>
                        <a href="{{ route('admin.settings.edit') }}"
                            class="btn btn-outline-secondary text-start btn-sm">
                            <i data-lucide="settings" class="me-2" style="width:1rem;height:1rem;"></i> Site
                            Settings
                        </a>
                        <a href="{{ route('admin.about-setting.edit') }}"
                            class="btn btn-outline-secondary text-start btn-sm">
                            <i data-lucide="info" class="me-2" style="width:1rem;height:1rem;"></i> About School
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
