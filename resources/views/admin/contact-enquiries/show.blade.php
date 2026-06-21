<x-app-layout pageTitle="Contact Enquiry Detail" :breadcrumbs="[
    ['label' => 'Contact Enquiries', 'url' => route('admin.contact-enquiries.index')],
    ['label' => $enquiry->name, 'url' => null],
]">

    <div class="row">
        {{-- Main Content --}}
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div>
                        <h4 class="header-title mb-0">Enquiry from {{ $enquiry->name }}</h4>
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
                                <small class="text-muted d-block">Name</small>
                                <strong>{{ $enquiry->name }}</strong>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted d-block">Subject</small>
                                <strong>{{ $enquiry->subject }}</strong>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted d-block">Email</small>
                                <strong><a href="mailto:{{ $enquiry->email }}">{{ $enquiry->email }}</a></strong>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted d-block">Phone</small>
                                @if ($enquiry->phone)
                                    <strong><a href="tel:{{ $enquiry->phone }}">{{ $enquiry->phone }}</a></strong>
                                @else
                                    <span class="text-muted">—</span>
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
                @if ($enquiry->phone)
                    <a href="tel:{{ $enquiry->phone }}" class="btn btn-outline-primary">
                        <i data-lucide="phone" class="me-1"></i> Call Now
                    </a>
                @endif
                <a href="{{ route('admin.contact-enquiries.index') }}" class="btn btn-outline-secondary ms-auto">
                    <i data-lucide="arrow-left" class="me-1"></i> Back to Enquiries
                </a>
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                    data-bs-target="#deleteModal" data-name="{{ $enquiry->name }}"
                    data-action="{{ route('admin.contact-enquiries.destroy', $enquiry) }}">
                    <i data-lucide="trash-2" class="me-1"></i> Delete
                </button>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i data-lucide="mail-question" style="font-size:2.5rem; color:var(--bs-primary);"></i>
                    </div>
                    <h5 class="mb-1">{{ $enquiry->name }}</h5>
                    <p class="text-muted small mb-3">
                        <strong>{{ $enquiry->subject }}</strong>
                    </p>
                    <hr>
                    <ul class="list-unstyled text-muted small text-start mb-0">
                        <li class="mb-2 d-flex gap-2">
                            <i data-lucide="mail" style="width:16px; flex-shrink:0; margin-top:2px;"></i>
                            <span><strong>{{ $enquiry->email }}</strong></span>
                        </li>
                        @if ($enquiry->phone)
                            <li class="mb-2 d-flex gap-2">
                                <i data-lucide="phone" style="width:16px; flex-shrink:0; margin-top:2px;"></i>
                                <span><strong>{{ $enquiry->phone }}</strong></span>
                            </li>
                        @endif
                        <li class="mb-2 d-flex gap-2">
                            <i data-lucide="calendar" style="width:16px; flex-shrink:0; margin-top:2px;"></i>
                            <span>{{ $enquiry->created_at->format('d M, Y') }}</span>
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
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            const deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const name = button.getAttribute('data-name');
                const action = button.getAttribute('data-action');
                document.getElementById('deleteItemName').textContent = name;
                document.getElementById('deleteForm').setAttribute('action', action);
            });
        </script>
    @endpush

</x-app-layout>
