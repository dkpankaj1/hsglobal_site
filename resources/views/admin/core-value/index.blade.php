<x-app-layout pageTitle="Core Values" :breadcrumbs="[['label' => 'Core Values', 'url' => null]]">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="header-title mb-0">Core Values</h4>
                    <a href="{{ route('admin.core-value.create') }}" class="btn btn-sm btn-primary">
                        <i data-lucide="plus" class="me-1"></i> Add Core Value
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Icon</th>
                                    <th>Title</th>
                                    <th>Text</th>
                                    <th>Order</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($coreValues as $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><i class="fa {{ $value->icon }} fa-lg"></i>
                                            <code>{{ $value->icon }}</code></td>
                                        <td>{{ $value->title }}</td>
                                        <td>{{ Str::limit($value->text, 60) }}</td>
                                        <td>{{ $value->sort_order }}</td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a href="{{ route('admin.core-value.edit', $value) }}"
                                                    class="btn btn-sm btn-info">Edit</a>
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                    data-name="{{ $value->title }}"
                                                    data-action="{{ route('admin.core-value.destroy', $value) }}">
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-muted">
                                            <i data-lucide="inbox" class="d-block mb-2" style="font-size:2rem;"></i>
                                            No core values added yet.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
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
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('pageScripts')
        <script>
            const deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                document.getElementById('deleteItemName').textContent = button.getAttribute('data-name');
                document.getElementById('deleteForm').setAttribute('action', button.getAttribute('data-action'));
            });
        </script>
    @endpush

</x-app-layout>
