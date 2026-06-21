<x-app-layout pageTitle="Contact Enquiries" :breadcrumbs="[['label' => 'Contact Enquiries', 'url' => null]]">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title">Contact Enquiries</h4>
                        <span class="badge bg-light text-dark border">
                            {{ $enquiries->total() }} total
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($enquiries as $enquiry)
                                    <tr class="{{ $enquiry->is_read ? '' : 'fw-bold' }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $enquiry->name }}</td>
                                        <td>
                                            <a href="mailto:{{ $enquiry->email }}">{{ $enquiry->email }}</a>
                                        </td>
                                        <td>{{ $enquiry->subject }}</td>
                                        <td>
                                            @if ($enquiry->phone)
                                                <a href="tel:{{ $enquiry->phone }}">{{ $enquiry->phone }}</a>
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($enquiry->is_read)
                                                <span class="badge bg-secondary">Read</span>
                                            @else
                                                <span class="badge bg-warning text-dark">New</span>
                                            @endif
                                        </td>
                                        <td>{{ $enquiry->created_at->format('d M, Y') }}</td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a href="{{ route('admin.contact-enquiries.show', $enquiry) }}"
                                                    class="btn btn-sm btn-info" title="View">
                                                    View
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger" title="Delete"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                    data-name="{{ $enquiry->name }}"
                                                    data-action="{{ route('admin.contact-enquiries.destroy', $enquiry) }}">
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-4">
                                            <div class="text-muted">
                                                <i data-lucide="inbox" class="d-block mb-2" style="font-size:2rem;"></i>
                                                No enquiries received yet.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if ($enquiries->hasPages())
                        <div class="mt-3">
                            {{ $enquiries->links() }}
                        </div>
                    @endif
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
