<x-app-layout pageTitle="{{ $gallery->name }}" :breadcrumbs="[
    ['label' => 'Galleries', 'url' => route('admin.gallery.index')],
    ['label' => $gallery->name, 'url' => null],
]">
    <div class="card">
        <div class="card-body d-flex gap-1 justify-content-end align-items-center">
            @if ($gallery->images->isNotEmpty())
                <button id="bulkDeleteBtn" class="btn btn-danger d-none" data-bs-toggle="modal"
                    data-bs-target="#bulkDeleteModal">
                    <i data-lucide="trash-2"></i> Delete Selected (<span id="selectedCount">0</span>)
                </button>
            @endif
            <a href="{{ route('admin.gallery.edit', $gallery) }}" class="btn btn-primary">
                <i data-lucide="pencil" class="me-1"></i> Edit Gallery
            </a>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
                <i data-lucide="image-plus" class="me-1"></i> Add Images
            </button>
        </div>
    </div>


    <div class="row">
        {{-- Image Grid --}}
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if ($gallery->images->isNotEmpty())
                        <div class="row g-3" id="imageGrid">
                            @foreach ($gallery->images as $image)
                                <div class="col-6 col-md-3 col-lg-2 image-card" data-id="{{ $image->id }}">
                                    <div class="card h-100 shadow-sm">
                                        <div class="position-relative" style="height: 140px; overflow: hidden;">
                                            <img src="{{ asset($image->image_path) }}" alt="Image"
                                                class="w-100 h-100" style="object-fit: cover;">

                                            {{-- Select checkbox --}}
                                            <div class="position-absolute top-0 start-0 m-1">
                                                <input type="checkbox" class="form-check-input image-select"
                                                    value="{{ $image->id }}" style="cursor: pointer;">
                                            </div>

                                            {{-- Publish badge --}}
                                            <span
                                                class="position-absolute top-0 end-0 m-1 badge {{ $image->is_published ? 'bg-success' : 'bg-secondary' }}"
                                                style="font-size: 0.65rem;">
                                                {{ $image->is_published ? 'Live' : 'Draft' }}
                                            </span>
                                        </div>

                                        <div class="card-footer bg-transparent p-1 d-flex gap-1">
                                            <button type="button"
                                                class="btn btn-sm btn-outline-secondary flex-fill toggle-publish"
                                                data-url="{{ route('admin.gallery.image.toggle', [$gallery, $image]) }}"
                                                title="{{ $image->is_published ? 'Unpublish' : 'Publish' }}">
                                                <i data-lucide="{{ $image->is_published ? 'eye-off' : 'eye' }}"
                                                    class="me-1"></i>
                                                {{ $image->is_published ? 'Hide' : 'Show' }}
                                            </button>
                                            <button type="button"
                                                class="btn btn-sm btn-outline-danger flex-fill delete-image"
                                                data-url="{{ route('admin.gallery.image.destroy', [$gallery, $image]) }}"
                                                data-name="Image #{{ $image->id }}" title="Delete">
                                                <i data-lucide="trash-2" class="me-1"></i> Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i data-lucide="image-plus" class="d-block mb-2" style="font-size: 2rem;"></i>
                            <h6>No images in this gallery</h6>
                            <p class="text-muted small">Click "Add Images" to upload photos.</p>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
                                <i data-lucide="image-plus" class="me-1"></i> Add Images
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Gallery Info Bar --}}
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body py-2">
                    <div class="d-flex flex-wrap gap-3 text-muted small">
                        <span><i data-lucide="image" class="me-1"></i>
                            <strong>{{ $gallery->images->count() }}</strong> images</span>
                        <span>
                            <i data-lucide="globe" class="me-1"></i>
                            Status: <strong class="{{ $gallery->is_published ? 'text-success' : 'text-secondary' }}">
                                {{ $gallery->is_published ? 'Published' : 'Draft' }}
                            </strong>
                        </span>
                        @if ($gallery->description)
                            <span><i data-lucide="file-text" class="me-1"></i>
                                {{ Str::limit($gallery->description, 100) }}</span>
                        @endif
                        <span><i data-lucide="clock" class="me-1"></i> Created
                            {{ $gallery->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Upload Modal --}}
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Add Images to "{{ $gallery->name }}"</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="uploadForm" enctype="multipart/form-data">
                        <div id="modalDropzone" class="border border-2 border-dashed rounded-3 p-4 text-center mb-3"
                            style="background: #fafbfc; cursor: pointer; transition: 0.2s;">
                            <i data-lucide="cloud-upload" class="d-block mb-2" style="font-size: 1.5rem;"></i>
                            <h6>Drag & drop images here or click to browse</h6>
                            <p class="text-muted small mb-0">JPEG, PNG, JPG, GIF, WEBP &bull; Max 5MB each</p>
                            <input type="file" id="modalImageInput" name="images[]" multiple
                                accept=".jpeg,.png,.jpg,.gif,.webp" class="d-none">
                        </div>
                        <div id="modalPreview" class="row g-2 mb-3"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="uploadSubmitBtn" disabled>
                        <i data-lucide="upload" class="me-1"></i> Upload <span id="uploadCount">0</span> Image(s)
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Bulk Delete Modal --}}
    <div class="modal fade" id="bulkDeleteModal" tabindex="-1" aria-labelledby="bulkDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bulkDeleteModalLabel">Delete Selected Images</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete <strong id="bulkDeleteCount">0</strong> selected image(s)?</p>
                    <p class="text-muted small mb-0">This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmBulkDelete">
                        <i data-lucide="trash-2" class="me-1"></i> Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Single Delete Modal --}}
    <div class="modal fade" id="deleteImageModal" tabindex="-1" aria-labelledby="deleteImageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="deleteImageModalLabel">Delete Image</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Are you sure you want to delete <strong id="deleteImageName"></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-sm btn-danger" id="confirmDeleteImage">
                        <i data-lucide="trash-2" class="me-1"></i> Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const galleryId = {{ $gallery->id }};
        const uploadUrl = '{{ route('admin.gallery.images.upload', $gallery) }}';
        const bulkDeleteUrl = '{{ route('admin.gallery.images.bulk-delete', $gallery) }}';

        // ==================== Upload Modal ====================
        const modalDropzone = document.getElementById('modalDropzone');
        const modalImageInput = document.getElementById('modalImageInput');
        const modalPreview = document.getElementById('modalPreview');
        const uploadSubmitBtn = document.getElementById('uploadSubmitBtn');
        const uploadCount = document.getElementById('uploadCount');
        let modalFiles = new DataTransfer();

        modalDropzone.addEventListener('click', () => modalImageInput.click());
        modalDropzone.addEventListener('dragover', (e) => {
            e.preventDefault();
            modalDropzone.style.borderColor = '#0d6efd';
        });
        modalDropzone.addEventListener('dragleave', () => {
            modalDropzone.style.borderColor = '';
        });
        modalDropzone.addEventListener('drop', (e) => {
            e.preventDefault();
            modalDropzone.style.borderColor = '';
            addModalFiles(e.dataTransfer.files);
        });
        modalImageInput.addEventListener('change', () => addModalFiles(modalImageInput.files));

        function addModalFiles(files) {
            Array.from(files).forEach(f => {
                if (f.type.match(/^image\/(jpeg|png|gif|webp)$/)) modalFiles.items.add(f);
            });
            modalImageInput.files = modalFiles.files;
            renderModalPreviews();
        }

        function renderModalPreviews() {
            modalPreview.innerHTML = '';
            Array.from(modalFiles.files).forEach((file, idx) => {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const div = document.createElement('div');
                    div.className = 'col-4 col-md-3';
                    div.innerHTML = `<div class="position-relative border rounded" style="height:80px;overflow:hidden;">
                        <img src="${e.target.result}" class="w-100 h-100" style="object-fit:cover;">
                        <button class="btn-close position-absolute top-0 end-0 m-1 bg-white rounded-circle p-1" style="font-size:.4rem;"></button>
                    </div>`;
                    div.querySelector('.btn-close').addEventListener('click', () => {
                        removeModalFile(idx);
                    });
                    modalPreview.appendChild(div);
                };
                reader.readAsDataURL(file);
            });
            uploadSubmitBtn.disabled = modalFiles.files.length === 0;
            uploadCount.textContent = modalFiles.files.length;
        }

        function removeModalFile(idx) {
            const newDT = new DataTransfer();
            Array.from(modalFiles.files).forEach((f, i) => {
                if (i !== idx) newDT.items.add(f);
            });
            modalFiles = newDT;
            modalImageInput.files = modalFiles.files;
            renderModalPreviews();
        }

        uploadSubmitBtn.addEventListener('click', () => {
            if (modalFiles.files.length === 0) return;
            uploadSubmitBtn.disabled = true;
            uploadSubmitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Uploading...';

            const formData = new FormData();
            Array.from(modalFiles.files).forEach(f => formData.append('images[]', f));
            formData.append('_token', '{{ csrf_token() }}');

            fetch(uploadUrl, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(r => r.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert(data.message || 'Upload failed.');
                        uploadSubmitBtn.disabled = false;
                        uploadSubmitBtn.innerHTML = '<i data-lucide="upload" class="me-1"></i> Upload ' +
                            modalFiles.files.length + ' Image(s)';
                    }
                })
                .catch(() => {
                    alert('An error occurred.');
                    uploadSubmitBtn.disabled = false;
                });
        });

        // Reset modal state on close
        document.getElementById('uploadModal').addEventListener('hidden.bs.modal', () => {
            modalFiles = new DataTransfer();
            modalImageInput.files = modalFiles.files;
            modalPreview.innerHTML = '';
            uploadSubmitBtn.disabled = true;
            uploadCount.textContent = '0';
            uploadSubmitBtn.innerHTML = '<i data-lucide="upload" class="me-1"></i> Upload 0 Image(s)';
        });

        // ==================== Image Selection ====================
        const selectAll = document.querySelectorAll('.image-select');
        const bulkDeleteBtn = document.getElementById('bulkDeleteBtn');
        const selectedCountEl = document.getElementById('selectedCount');

        function updateBulkBtn() {
            const checked = document.querySelectorAll('.image-select:checked');
            const count = checked.length;
            if (count > 0) {
                bulkDeleteBtn.classList.remove('d-none');
                selectedCountEl.textContent = count;
                document.getElementById('bulkDeleteCount').textContent = count;
            } else {
                bulkDeleteBtn.classList.add('d-none');
            }
        }

        selectAll.forEach(cb => cb.addEventListener('change', updateBulkBtn));

        // ==================== Bulk Delete ====================
        document.getElementById('confirmBulkDelete').addEventListener('click', () => {
            const ids = Array.from(document.querySelectorAll('.image-select:checked')).map(cb => cb.value);
            fetch(bulkDeleteUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        ids
                    })
                })
                .then(r => r.json())
                .then(data => {
                    if (data.success) location.reload();
                    else alert(data.message);
                });
        });

        // ==================== Single Delete ====================
        let deleteUrl = '';
        document.querySelectorAll('.delete-image').forEach(btn => {
            btn.addEventListener('click', () => {
                deleteUrl = btn.getAttribute('data-url');
                document.getElementById('deleteImageName').textContent = btn.getAttribute('data-name');
                new bootstrap.Modal('#deleteImageModal').show();
            });
        });
        document.getElementById('confirmDeleteImage').addEventListener('click', () => {
            fetch(deleteUrl, {
                    method: 'DELETE',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(r => r.json())
                .then(data => {
                    if (data.success) location.reload();
                    else alert(data.message);
                });
        });

        // ==================== Toggle Publish ====================
        document.querySelectorAll('.toggle-publish').forEach(btn => {
            btn.addEventListener('click', () => {
                fetch(btn.getAttribute('data-url'), {
                        method: 'PATCH',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(r => r.json())
                    .then(data => {
                        if (data.success) location.reload();
                    });
            });
        });
    </script>

</x-app-layout>
