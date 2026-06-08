<x-app-layout>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title">Mandatory Disclosures</h4>
                        <a href="{{ route('admin.mandatory-disclosure.create') }}" class="btn btn-primary">
                            <i class="ri-add-line me-1"></i> Add New
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm  mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Document</th>
                                    <th>Visibility</th>
                                    <th>Created</th>
                                    <th>Share</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($disclosures as $disclosure)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $disclosure->name }}</td>
                                        <td>
                                            @if ($disclosure->document)
                                                <a href="{{ $disclosure->document_url }}" target="_blank">
                                                    <i class="ri-file-download-line me-1"></i> View
                                                </a>
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($disclosure->is_public)
                                                <span class="badge bg-success">Public</span>
                                            @else
                                                <span class="badge bg-secondary">Private</span>
                                            @endif
                                        </td>
                                        <td>{{ $disclosure->created_at->format('d M, Y') }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-secondary copy-link-btn"
                                                data-url="{{ $disclosure->is_public ? route('disclosure.show', $disclosure->slug) : route('disclosure.download', $disclosure->token) }}">
                                                Copy Link
                                            </button>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a href="{{ route('admin.mandatory-disclosure.show', $disclosure) }}"
                                                    class="btn btn-sm btn-info" title="View">
                                                    View
                                                </a>
                                                <a href="{{ route('admin.mandatory-disclosure.edit', $disclosure) }}"
                                                    class="btn btn-sm btn-primary" title="Edit">
                                                    Edit
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger" title="Delete"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                    data-id="{{ $disclosure->id }}" data-name="{{ $disclosure->name }}"
                                                    data-action="{{ route('admin.mandatory-disclosure.destroy', $disclosure) }}">
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-4">
                                            <div class="text-muted">
                                                <i class="ri-inbox-line d-block mb-2" style="font-size: 2rem;"></i>
                                                No mandatory disclosures found.
                                                <br>
                                                <a href="{{ route('admin.mandatory-disclosure.create') }}"
                                                    class="btn btn-sm btn-primary mt-2">
                                                    <i class="ri-add-line me-1"></i> Add First Disclosure
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if ($disclosures->hasPages())
                        <div class="mt-3">
                            {{ $disclosures->links() }}
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

            const copyButtons = document.querySelectorAll('.copy-link-btn');
            copyButtons.forEach(function(button) {
                button.addEventListener('click', async function() {
                    const url = button.getAttribute('data-url');
                    if (!url) return;

                    const originalText = button.textContent.trim();

                    try {
                        await navigator.clipboard.writeText(url);
                        button.textContent = 'Copied!';
                        button.classList.remove('btn-info');
                        button.classList.add('btn-success');
                    } catch (error) {
                        const helper = document.createElement('textarea');
                        helper.value = url;
                        helper.setAttribute('readonly', '');
                        helper.style.position = 'absolute';
                        helper.style.left = '-9999px';
                        document.body.appendChild(helper);
                        helper.select();
                        document.execCommand('copy');
                        document.body.removeChild(helper);

                        button.textContent = 'Copied!';
                        button.classList.remove('btn-info');
                        button.classList.add('btn-success');
                    }

                    setTimeout(function() {
                        button.textContent = originalText;
                        button.classList.remove('btn-success');
                        button.classList.add('btn-info');
                    }, 1200);
                });
            });
        });
    </script>

</x-app-layout>
