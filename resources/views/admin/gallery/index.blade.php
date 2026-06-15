<x-app-layout pageTitle="Photo Galleries" :breadcrumbs="[['label' => 'Galleries', 'url' => null]]">

    <div class="card">
        <div class="card-body d-flex justify-content-end align-items-center">
            <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
                <i data-lucide="plus" class="me-1"></i> Create Gallery
            </a>
        </div>
    </div>


    <div class="row">
        @forelse ($galleries as $gallery)
            <div class="col-md-4 col-lg-3">
                <div class="card gallery-card shadow-sm">
                    <div class="card-img-top position-relative"
                        style="height: 160px; overflow: hidden; background: #f5f6f8;">
                        @if ($gallery->images->isNotEmpty())
                            <img src="{{ asset($gallery->images->first()->image_path) }}" alt="{{ $gallery->name }}"
                                class="w-100 h-100" style="object-fit: cover;">
                        @else
                            <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                                <div class="text-center">
                                    <i data-lucide="image" class="d-block mb-1" style="font-size: 1.5rem;"></i>
                                    <small>No images</small>
                                </div>
                            </div>
                        @endif
                        <span
                            class="position-absolute top-0 end-0 m-2 badge {{ $gallery->is_published ? 'bg-success' : 'bg-secondary' }}">
                            {{ $gallery->is_published ? 'Published' : 'Draft' }}
                        </span>
                        <span class="position-absolute bottom-0 start-0 m-2 badge bg-dark bg-opacity-75">
                            <i data-lucide="image" class="me-1"></i> {{ $gallery->images_count }}
                        </span>
                    </div>
                    <div class="card-body p-3">
                        <h6 class="mb-1 text-truncate">{{ $gallery->name }}</h6>
                        <p class="text-muted small mb-2 text-truncate">
                            {{ $gallery->description ?: 'No description' }}
                        </p>
                        <small class="text-muted">{{ $gallery->created_at->diffForHumans() }}</small>
                    </div>
                    <div class="card-footer bg-transparent border-top p-2">
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.gallery.show', $gallery) }}" class="btn btn-sm btn-info"
                                title="Manage Images">
                                <i data-lucide="image-plus" class="me-1"></i> Manage
                            </a>
                            <a href="{{ route('admin.gallery.edit', $gallery) }}" class="btn btn-sm btn-primary"
                                title="Edit">
                                <i data-lucide="pencil" class="me-1"></i> Edit
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" title="Delete" data-bs-toggle="modal"
                                data-bs-target="#deleteModal" data-name="{{ $gallery->name }}"
                                data-action="{{ route('admin.gallery.destroy', $gallery) }}">
                                <i data-lucide="trash-2" class="me-1"></i> Del
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center py-5">
                        <div class="text-muted">
                            <i data-lucide="inbox" class="d-block mb-2" style="font-size: 2rem;"></i>
                            <h5>No galleries yet</h5>
                            <p class="mb-3">Create your first photo gallery to get started.</p>
                            <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
                                <i data-lucide="plus" class="me-1"></i> Create First Gallery
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

    @if ($galleries->hasPages())
        <div class="row">
            <div class="col-12">
                {{ $galleries->links() }}
            </div>
        </div>
    @endif

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
                    <p class="text-muted small mb-0">All images in this gallery will also be permanently deleted.</p>
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
