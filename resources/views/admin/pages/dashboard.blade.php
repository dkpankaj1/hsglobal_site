<x-app-layout pageTitle="Dashboard" :breadcrumbs="[['label' => 'Dashboard', 'url' => null]]">

    @push('pageStyles')
        <style>
            .stat-card {
                border-radius: 12px;
                transition: transform 0.15s, box-shadow 0.15s;
            }

            .stat-card:hover {
                transform: translateY(-3px);
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08) !important;
            }

            .stat-icon-circle {
                width: 44px;
                height: 44px;
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
            }

            .enquiry-row {
                transition: background 0.1s;
            }

            .enquiry-row:hover {
                background: #f8f9fc !important;
            }

            .quick-action-btn {
                border-radius: 8px;
                transition: all 0.15s;
            }

            .quick-action-btn:hover {
                transform: translateX(3px);
            }
        </style>
    @endpush

    {{-- Welcome Bar --}}
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
        <div class="d-flex align-items-center gap-2">
            <div
                style="width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,#6366f1,#8b5cf6);display:flex;align-items:center;justify-content:center;">
                <i data-lucide="school" style="width:18px;height:18px;color:#fff;"></i>
            </div>
            <div>
                <h5 class="mb-0 fw-bold">Welcome back, {{ auth()->user()->name }}</h5>
                <small class="text-muted">{{ now()->format('l, F d, Y') }}</small>
            </div>
        </div>
        <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-outline-secondary">
            <i data-lucide="external-link" style="width:14px;height:14px;" class="me-1"></i> Visit Website
        </a>
    </div>

    {{-- Primary Stats Row --}}
    <div class="row g-3 mb-3">
        <div class="col-sm-6 col-xl-3">
            <div class="card stat-card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center gap-3 p-3">
                    <div class="stat-icon-circle" style="background:#eef2ff; color:#6366f1;">
                        <i data-lucide="images" style="width:20px;height:20px;"></i>
                    </div>
                    <div>
                        <div class="text-muted" style="font-size:12px;text-transform:uppercase;letter-spacing:0.5px;">
                            Galleries</div>
                        <div class="fw-bold" style="font-size:1.5rem;line-height:1.2;">{{ $stats['galleries'] }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card stat-card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center gap-3 p-3">
                    <div class="stat-icon-circle" style="background:#e0f2f1; color:#14b8a6;">
                        <i data-lucide="building-2" style="width:20px;height:20px;"></i>
                    </div>
                    <div>
                        <div class="text-muted" style="font-size:12px;text-transform:uppercase;letter-spacing:0.5px;">
                            Facilities</div>
                        <div class="fw-bold" style="font-size:1.5rem;line-height:1.2;">
                            {{ $stats['facilities'] }}<span
                                class="text-muted small fw-normal">/{{ $stats['facilities_total'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card stat-card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center gap-3 p-3">
                    <div class="stat-icon-circle" style="background:#fce4ec; color:#ef4444;">
                        <i data-lucide="clipboard-list" style="width:20px;height:20px;"></i>
                    </div>
                    <div>
                        <div class="text-muted" style="font-size:12px;text-transform:uppercase;letter-spacing:0.5px;">
                            Notices</div>
                        <div class="fw-bold" style="font-size:1.5rem;line-height:1.2;">
                            {{ $stats['notices'] }}<span
                                class="text-muted small fw-normal">/{{ $stats['notices_total'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card stat-card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center gap-3 p-3">
                    <div class="stat-icon-circle" style="background:#ede9fe; color:#8b5cf6;">
                        <i data-lucide="file-text" style="width:20px;height:20px;"></i>
                    </div>
                    <div>
                        <div class="text-muted" style="font-size:12px;text-transform:uppercase;letter-spacing:0.5px;">
                            Disclosures</div>
                        <div class="fw-bold" style="font-size:1.5rem;line-height:1.2;">
                            {{ $stats['disclosures'] }}
                            @if ($stats['disclosures_public'] > 0)
                                <span class="badge bg-success bg-opacity-10 text-success ms-1"
                                    style="font-size:10px;">{{ $stats['disclosures_public'] }} public</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Secondary Stats Row --}}
    <div class="row g-3 mb-3">
        <div class="col-6 col-md-3 col-xl-2">
            <div class="card stat-card shadow-sm border-0 text-center p-3">
                <i data-lucide="image" class="d-block mx-auto mb-1" style="font-size:1.3rem; color:#10b981;"></i>
                <div class="fw-bold" style="font-size:1.3rem;">{{ $stats['sliders'] }}</div>
                <small class="text-muted">Sliders</small>
            </div>
        </div>
        <div class="col-6 col-md-3 col-xl-2">
            <div class="card stat-card shadow-sm border-0 text-center p-3">
                <i data-lucide="video" class="d-block mx-auto mb-1" style="font-size:1.3rem; color:#f59e0b;"></i>
                <div class="fw-bold" style="font-size:1.3rem;">{{ $stats['videos'] }}</div>
                <small class="text-muted">Videos</small>
            </div>
        </div>
        <div class="col-6 col-md-3 col-xl-2">
            <div class="card stat-card shadow-sm border-0 text-center p-3">
                <i data-lucide="star" class="d-block mx-auto mb-1" style="font-size:1.3rem; color:#6366f1;"></i>
                <div class="fw-bold" style="font-size:1.3rem;">{{ $stats['core_values'] }}</div>
                <small class="text-muted">Core Values</small>
            </div>
        </div>
        <div class="col-6 col-md-3 col-xl-2">
            <div class="card stat-card shadow-sm border-0 text-center p-3">
                <i data-lucide="bar-chart-3" class="d-block mx-auto mb-1" style="font-size:1.3rem; color:#10b981;"></i>
                <div class="fw-bold" style="font-size:1.3rem;">{{ $stats['home_stats'] }}</div>
                <small class="text-muted">Home Stats</small>
            </div>
        </div>
        <div class="col-sm-6 col-xl-2">
            <div class="card stat-card shadow-sm border-0 p-3 h-100" style="border-left:3px solid #ec4899 !important;">
                <div class="d-flex align-items-center gap-2 mb-1">
                    <i data-lucide="mail-question" style="font-size:1.1rem; color:#ec4899;"></i>
                    <small class="text-muted text-uppercase" style="font-size:10px;letter-spacing:0.5px;">Admission
                        Enq.</small>
                </div>
                <div class="fw-bold" style="font-size:1.4rem;">{{ $stats['enquiries'] }}
                    @if ($stats['new_enquiries'] > 0)
                        <span class="badge bg-warning text-dark ms-1"
                            style="font-size:10px;">{{ $stats['new_enquiries'] }} new</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-2">
            <div class="card stat-card shadow-sm border-0 p-3 h-100"
                style="border-left:3px solid #0ea5e9 !important;">
                <div class="d-flex align-items-center gap-2 mb-1">
                    <i data-lucide="message-square" style="font-size:1.1rem; color:#0ea5e9;"></i>
                    <small class="text-muted text-uppercase" style="font-size:10px;letter-spacing:0.5px;">Contact
                        Enq.</small>
                </div>
                <div class="fw-bold" style="font-size:1.4rem;">{{ $stats['contact_enquiries'] }}
                    @if ($stats['new_contact_enquiries'] > 0)
                        <span class="badge bg-warning text-dark ms-1"
                            style="font-size:10px;">{{ $stats['new_contact_enquiries'] }} new</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Main Content: Tables + Sidebar --}}
    <div class="row g-3">
        <div class="col-lg-8">
            {{-- Admission Enquiries Table --}}
            <div class="card shadow-sm border-0">
                <div class="card-header bg-transparent d-flex justify-content-between align-items-center py-2 px-3">
                    <h6 class="mb-0 fw-bold">
                        <i data-lucide="mail-question" style="width:16px;height:16px;" class="me-1"></i>
                        Recent Admission Enquiries
                    </h6>
                    <a href="{{ route('admin.admission.enquiries.index') }}" class="btn btn-sm btn-light">
                        View All <i data-lucide="arrow-right" style="width:12px;height:12px;"></i>
                    </a>
                </div>
                <div class="card-body p-0">
                    @if ($recentEnquiries->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table table-sm table-hover mb-0 align-middle">
                                <thead class="table-light small text-muted">
                                    <tr>
                                        <th class="ps-3">Student</th>
                                        <th>Class</th>
                                        <th>Parent</th>
                                        <th>Phone</th>
                                        <th class="text-center" style="width:70px;">Status</th>
                                        <th class="text-end pe-3" style="width:50px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentEnquiries as $enquiry)
                                        <tr class="enquiry-row {{ $enquiry->is_read ? '' : 'table-warning' }}">
                                            <td class="ps-3 fw-semibold">{{ $enquiry->student_name }}</td>
                                            <td>{{ $enquiry->admission_class }}</td>
                                            <td>{{ $enquiry->parent_name }}</td>
                                            <td><small>{{ $enquiry->phone }}</small></td>
                                            <td class="text-center">
                                                <span
                                                    class="badge {{ $enquiry->is_read ? 'bg-light text-muted' : 'bg-warning text-dark' }}"
                                                    style="font-size:10px;">
                                                    {{ $enquiry->is_read ? 'Read' : 'New' }}
                                                </span>
                                            </td>
                                            <td class="text-end pe-3">
                                                <a href="{{ route('admin.admission.enquiries.show', $enquiry) }}"
                                                    class="btn btn-sm btn-light" title="View">
                                                    <i data-lucide="eye" style="width:14px;height:14px;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5 text-muted">
                            <i data-lucide="inbox" style="font-size:2.5rem;opacity:0.4;"></i>
                            <p class="mt-2 mb-0 small">No admission enquiries yet</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Contact Enquiries Table --}}
            <div class="card shadow-sm border-0 mt-3">
                <div class="card-header bg-transparent d-flex justify-content-between align-items-center py-2 px-3">
                    <h6 class="mb-0 fw-bold">
                        <i data-lucide="message-square" style="width:16px;height:16px;" class="me-1"></i>
                        Recent Contact Enquiries
                    </h6>
                    <a href="{{ route('admin.contact-enquiries.index') }}" class="btn btn-sm btn-light">
                        View All <i data-lucide="arrow-right" style="width:12px;height:12px;"></i>
                    </a>
                </div>
                <div class="card-body p-0">
                    @if ($recentContactEnquiries->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table table-sm table-hover mb-0 align-middle">
                                <thead class="table-light small text-muted">
                                    <tr>
                                        <th class="ps-3">Name</th>
                                        <th>Subject</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th class="text-center" style="width:70px;">Status</th>
                                        <th class="text-end pe-3" style="width:50px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentContactEnquiries as $enquiry)
                                        <tr class="enquiry-row {{ $enquiry->is_read ? '' : 'table-warning' }}">
                                            <td class="ps-3 fw-semibold">{{ $enquiry->name }}</td>
                                            <td>{{ Str::limit($enquiry->subject, 28) }}</td>
                                            <td><small>{{ $enquiry->email }}</small></td>
                                            <td><small>{{ $enquiry->phone ?? '—' }}</small></td>
                                            <td class="text-center">
                                                <span
                                                    class="badge {{ $enquiry->is_read ? 'bg-light text-muted' : 'bg-warning text-dark' }}"
                                                    style="font-size:10px;">
                                                    {{ $enquiry->is_read ? 'Read' : 'New' }}
                                                </span>
                                            </td>
                                            <td class="text-end pe-3">
                                                <a href="{{ route('admin.contact-enquiries.show', $enquiry) }}"
                                                    class="btn btn-sm btn-light" title="View">
                                                    <i data-lucide="eye" style="width:14px;height:14px;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5 text-muted">
                            <i data-lucide="inbox" style="font-size:2.5rem;opacity:0.4;"></i>
                            <p class="mt-2 mb-0 small">No contact enquiries yet</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-transparent py-2 px-3">
                    <h6 class="mb-0 fw-bold">
                        <i data-lucide="zap" style="width:16px;height:16px;" class="me-1 text-warning"></i>
                        Quick Actions
                    </h6>
                </div>
                <div class="card-body py-2">
                    <a href="{{ route('admin.notice-board.create') }}"
                        class="quick-action-btn btn btn-light w-100 text-start mb-1 btn-sm">
                        <i data-lucide="clipboard-plus" style="width:14px;height:14px;" class="me-2"></i> Add
                        Notice
                    </a>
                    <a href="{{ route('admin.gallery.create') }}"
                        class="quick-action-btn btn btn-light w-100 text-start mb-1 btn-sm">
                        <i data-lucide="image-plus" style="width:14px;height:14px;" class="me-2"></i> Create Photo
                        Gallery
                    </a>
                    <a href="{{ route('admin.video-gallery.create') }}"
                        class="quick-action-btn btn btn-light w-100 text-start mb-1 btn-sm">
                        <i data-lucide="video-plus" style="width:14px;height:14px;" class="me-2"></i> Add Video
                    </a>
                    <a href="{{ route('admin.image-slider.create') }}"
                        class="quick-action-btn btn btn-light w-100 text-start mb-1 btn-sm">
                        <i data-lucide="image-plus" style="width:14px;height:14px;" class="me-2"></i> Add Slider
                    </a>
                    <a href="{{ route('admin.facility.create') }}"
                        class="quick-action-btn btn btn-light w-100 text-start mb-1 btn-sm">
                        <i data-lucide="building-2" style="width:14px;height:14px;" class="me-2"></i> Add Facility
                    </a>
                    <a href="{{ route('admin.mandatory-disclosure.create') }}"
                        class="quick-action-btn btn btn-light w-100 text-start btn-sm">
                        <i data-lucide="file-plus" style="width:14px;height:14px;" class="me-2"></i> Add Disclosure
                    </a>
                </div>
            </div>

            <div class="card shadow-sm border-0 mt-3">
                <div class="card-header bg-transparent py-2 px-3">
                    <h6 class="mb-0 fw-bold">
                        <i data-lucide="link" style="width:16px;height:16px;" class="me-1"></i>
                        Shortcuts
                    </h6>
                </div>
                <div class="card-body py-2">
                    <a href="{{ route('admin.admission.edit') }}"
                        class="quick-action-btn btn btn-light w-100 text-start mb-1 btn-sm">
                        <i data-lucide="sliders-horizontal" style="width:14px;height:14px;" class="me-2"></i>
                        Admission Settings
                    </a>
                    <a href="{{ route('admin.settings.edit') }}"
                        class="quick-action-btn btn btn-light w-100 text-start mb-1 btn-sm">
                        <i data-lucide="settings" style="width:14px;height:14px;" class="me-2"></i> Site Settings
                    </a>
                    <a href="{{ route('admin.about-setting.edit') }}"
                        class="quick-action-btn btn btn-light w-100 text-start mb-1 btn-sm">
                        <i data-lucide="info" style="width:14px;height:14px;" class="me-2"></i> About School
                    </a>
                    <a href="{{ route('admin.account.index') }}"
                        class="quick-action-btn btn btn-light w-100 text-start btn-sm">
                        <i data-lucide="user-circle" style="width:14px;height:14px;" class="me-2"></i> My Account
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
