<x-app-layout>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title">Notice Board</h4>
                        <a href="{{ route('admin.notice-board.create') }}" class="btn btn-primary">
                            <i class="ri-add-line me-1"></i> Add New
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Document</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($notices as $notice)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $notice->title }}</td>
                                        <td>
                                            @if ($notice->document)
                                                <a href="{{ $notice->getDocumentUrl() }}" target="_blank">
                                                    <i class="ri-file-download-line me-1"></i> View
                                                </a>
                                            @else
                                                <span class="text-muted">&mdash;</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($notice->is_publish)
                                                <span class="badge bg-success">Published</span>
                                            @else
                                                <span class="badge bg-secondary">Draft</span>
                                            @endif
                                        </td>
                                        <td>{{ $notice->created_at->format('d M, Y') }}</td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a href="{{ route('admin.notice-board.show', $notice) }}"
                                                    class="btn btn-sm btn-info" title="View">
                                                    View
                                                </a>
                                                <a href="{{ route('admin.notice-board.edit', $notice) }}"
                                                    class="btn btn-sm btn-primary" title="Edit">
                                                    Edit
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger" title="Delete"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                    data-id="{{ $notice->id }}" data-name="{{ $notice->title }}"
                                                    data-action="{{ route('admin.notice-board.destroy', $notice) }}">
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4">
                                            <div class="text-muted">
                                                <i class="ri-inbox-line d-block mb-2" style="font-size: 2rem;"></i>
                                                No notice board entries found.
                                                <br>
                                                <a href="{{ route('admin.notice-board.create') }}"
                                                    class="btn btn-sm btn-primary mt-2">
                                                    <i class="ri-add-line me-1"></i> Add First Notice
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if ($notices->hasPages())
                        <div class="mt-3">
                            {{ $notices->links() }}
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
                    <p>Are you sure you want to delete <strong id="deleteItemName"></strong>?</p>
                    <p class="text-muted small mb-0">This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="ri-delete-bin-line me-1"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteModal = document.getElementById('deleteModal');

            if (deleteModal) {
                deleteModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget;
                    const name = button.getAttribute('data-name');
                    const action = button.getAttribute('data-action');

                    document.getElementById('deleteItemName').textContent = name;
                    document.getElementById('deleteForm').setAttribute('action', action);
                });
            }
        });
    </script>

</x-app-layout>
