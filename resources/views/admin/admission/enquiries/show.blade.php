<x-app-layout pageTitle="Enquiry Detail" :breadcrumbs="[
    ['label' => 'Admission Enquiries', 'url' => route('admin.admission.enquiries.index')],
    ['label' => $enquiry->student_name, 'url' => null],
]">

    <div class="row">
        {{-- Main Content --}}
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div>
                        <h4 class="header-title mb-0">Enquiry from {{ $enquiry->student_name }}</h4>
                        <small class="text-muted">
                            Received {{ $enquiry->created_at->format('d M, Y \a\t h:i A') }}
                        </small>
                    </div>
                    <span class="badge fs-6 {{ $enquiry->is_read ? 'bg-secondary' : 'bg-warning text-dark' }}">
                        {{ $enquiry->is_read ? 'Read' : 'New' }}
                    </span>
                </div>
                <div class="card-body">
                    {{-- Quick Info Row --}}
                    <div class="row g-2 mb-3">
                        <div class="col-sm-6">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted d-block">Student Name</small>
                                <strong>{{ $enquiry->student_name }}</strong>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted d-block">Applying For Class</small>
                                <strong>{{ $enquiry->admission_class }}</strong>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted d-block">Parent / Guardian</small>
                                <strong>{{ $enquiry->parent_name }}</strong>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted d-block">Phone</small>
                                <strong><a href="tel:{{ $enquiry->phone }}">{{ $enquiry->phone }}</a></strong>
                                @if ($enquiry->email)
                                    <br><small class="text-muted d-block mt-1">Email</small>
                                    <strong><a href="mailto:{{ $enquiry->email }}">{{ $enquiry->email }}</a></strong>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Message --}}
                    <div class="mb-0">
                        <label class="form-label text-muted small fw-bold text-uppercase">Message</label>
                        <div class="p-4 rounded-3"
                            style="background:#f8fafc; border:1px solid #e2e8f0; white-space:pre-wrap; line-height:1.7; font-size:15px;">
                            {{ $enquiry->message }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Actions --}}
            <div class="d-flex flex-wrap gap-2 mt-3">
                <a href="mailto:{{ $enquiry->email }}" class="btn btn-primary">
                    <i data-lucide="mail" class="me-1"></i> Reply via Email
                </a>
                <a href="tel:{{ $enquiry->phone }}" class="btn btn-outline-primary">
                    <i data-lucide="phone" class="me-1"></i> Call Now
                </a>
                <a href="{{ route('admin.admission.enquiries.index') }}" class="btn btn-outline-secondary ms-auto">
                    <i data-lucide="arrow-left" class="me-1"></i> Back to Enquiries
                </a>
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                    data-bs-target="#deleteModal" data-name="{{ $enquiry->student_name }}"
                    data-action="{{ route('admin.admission.enquiries.destroy', $enquiry) }}">
                    <i data-lucide="trash-2" class="me-1"></i> Delete
                </button>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i data-lucide="graduation-cap" style="font-size:2.5rem; color:var(--bs-primary);"></i>
                    </div>
                    <h5 class="mb-1">{{ $enquiry->student_name }}</h5>
                    <p class="text-muted small mb-3">
                        Applied for <strong>{{ $enquiry->admission_class }}</strong>
                    </p>
                    <hr>
                    <ul class="list-unstyled text-muted small text-start mb-0">
                        <li class="mb-2 d-flex gap-2">
                            <i data-lucide="user" style="width:16px; flex-shrink:0; margin-top:2px;"></i>
                            <span>Parent: <strong>{{ $enquiry->parent_name }}</strong></span>
                        </li>
                        <li class="mb-2 d-flex gap-2">
                            <i data-lucide="phone" style="width:16px; flex-shrink:0; margin-top:2px;"></i>
                            <a href="tel:{{ $enquiry->phone }}">{{ $enquiry->phone }}</a>
                        </li>
                        @if ($enquiry->email)
                            <li class="mb-2 d-flex gap-2">
                                <i data-lucide="mail" style="width:16px; flex-shrink:0; margin-top:2px;"></i>
                                <a href="mailto:{{ $enquiry->email }}" class="text-break">{{ $enquiry->email }}</a>
                            </li>
                        @endif
                        <li class="d-flex gap-2">
                            <i data-lucide="clock" style="width:16px; flex-shrink:0; margin-top:2px;"></i>
                            <span>{{ $enquiry->created_at->diffForHumans() }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete enquiry from <strong id="deleteItemName"></strong>?</p>
                    <p class="text-muted small mb-0">This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i data-lucide="trash-2" class="me-1"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('deleteModal');
            if (modal) {
                modal.addEventListener('show.bs.modal', function(event) {
                    const btn = event.relatedTarget;
                    document.getElementById('deleteItemName').textContent = btn.getAttribute('data-name');
                    document.getElementById('deleteForm').setAttribute('action', btn.getAttribute(
                        'data-action'));
                });
            }
        });
    </script>

</x-app-layout>
