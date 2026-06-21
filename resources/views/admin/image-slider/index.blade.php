<x-app-layout pageTitle="Image Sliders" :breadcrumbs="[['label' => 'Image Sliders', 'url' => null]]">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title">Image Sliders</h4>
                        <a href="{{ route('admin.image-slider.create') }}" class="btn btn-primary">
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
                                    <th>Image</th>
                                    <th>Alt Text</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sliders as $slider)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ $slider->slider_image_url }}" alt="{{ $slider->alt_text }}"
                                                style="width: 120px; height: 50px; object-fit: cover; border-radius: 4px;">
                                        </td>
                                        <td>{{ $slider->alt_text }}</td>
                                        <td>{{ $slider->created_at->format('d M, Y') }}</td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a href="{{ route('admin.image-slider.show', $slider) }}"
                                                    class="btn btn-sm btn-info" title="View">
                                                    View
                                                </a>
                                                <a href="{{ route('admin.image-slider.edit', $slider) }}"
                                                    class="btn btn-sm btn-primary" title="Edit">
                                                    Edit
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger" title="Delete"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                    data-id="{{ $slider->id }}" data-name="{{ $slider->alt_text }}"
                                                    data-action="{{ route('admin.image-slider.destroy', $slider) }}">
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4">
                                            <div class="text-muted">
                                                <i class="ri-inbox-line d-block mb-2" style="font-size: 2rem;"></i>
                                                No image sliders found.
                                                <br>
                                                <a href="{{ route('admin.image-slider.create') }}"
                                                    class="btn btn-sm btn-primary mt-2">
                                                    <i class="ri-add-line me-1"></i> Add First Slider
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if ($sliders->hasPages())
                        <div class="mt-3">
                            {{ $sliders->links() }}
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
