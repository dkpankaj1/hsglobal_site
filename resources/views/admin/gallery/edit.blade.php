<x-app-layout pageTitle="Edit Gallery" :breadcrumbs="[['label' => 'Galleries', 'url' => route('admin.gallery.index')], ['label' => 'Edit', 'url' => null]]">

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title mb-0">Edit Gallery</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.gallery.update', $gallery) }}" method="post"
                        enctype="multipart/form-data" id="editGalleryForm">
                        @csrf
                        @method('PUT')

                        {{-- Gallery Info --}}
                        <div class="row">
                            <div class="col-12">
                                <h4 class="mb-3">Gallery Info</h4>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <x-input-label name="name" text="Gallery Name" />
                                    <x-input-field name="name" type="text"
                                        value="{{ old('name', $gallery->name) }}" placeholder="Enter gallery name" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                        rows="3" placeholder="Brief description (optional)">{{ old('description', $gallery->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Add More Images --}}
                        <div class="row mt-4">
                            <div class="col-12">
                                <h4 class="mb-3">Add More Images (Optional)</h4>
                            </div>
                            <div class="col-12">
                                <div id="editDropzone" class="border border-2 border-dashed rounded-3 p-3 text-center"
                                    style="background: #fafbfc; cursor: pointer; transition: 0.2s;">
                                    <div id="editDropzoneContent">
                                        <i data-lucide="cloud-upload" class="d-block mb-2"
                                            style="font-size: 1.5rem;"></i>
                                        <p class="text-muted small mb-0">Drop images here or click to browse</p>
                                        <span class="badge bg-light text-dark border small">JPEG, PNG, WEBP &bull; 5MB
                                            max</span>
                                    </div>
                                    <input type="file" id="editImageInput" name="images[]" multiple
                                        accept=".jpeg,.png,.jpg,.gif,.webp" class="d-none">
                                </div>
                                @error('images.*')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mt-2">
                                <div id="editPreviewContainer" class="row g-2"></div>
                            </div>
                        </div>

                        {{-- Current Images --}}
                        @if ($gallery->images->isNotEmpty())
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h4 class="mb-3">
                                        Current Images
                                        <span
                                            class="badge bg-light text-dark border ms-2">{{ $gallery->images->count() }}</span>
                                    </h4>
                                    <div class="row g-2">
                                        @foreach ($gallery->images as $image)
                                            <div class="col-4 col-md-2">
                                                <img src="{{ asset($image->image_path) }}" alt="Image"
                                                    class="img-thumbnail w-100"
                                                    style="height: 80px; object-fit: cover;">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- Publishing --}}
                        <div class="row mt-4">
                            <div class="col-12">
                                <h4 class="mb-3">Publishing</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input @error('is_published') is-invalid @enderror"
                                            type="checkbox" role="switch" id="is_published" name="is_published"
                                            value="1"
                                            {{ old('is_published', $gallery->is_published) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_published">
                                            Publish this gallery
                                        </label>
                                        @error('is_published')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i data-lucide="save" class="me-1"></i> Update Gallery
                            </button>
                            <a href="{{ route('admin.gallery.show', $gallery) }}" class="btn btn-secondary">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted mb-3">
                        <i data-lucide="info" class="me-1"></i> Information
                    </h5>
                    <ul class="list-unstyled mb-0 text-muted small">
                        <li class="mb-2">
                            <i data-lucide="check-circle" class="text-success me-1"></i>
                            Upload additional images from here.
                        </li>
                        <li class="mb-2">
                            <i data-lucide="check-circle" class="text-success me-1"></i>
                            Manage individual images (delete) from the gallery detail page.
                        </li>
                        <li>
                            <i data-lucide="check-circle" class="text-success me-1"></i>
                            Toggle <strong>Publish</strong> to control visibility.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        const editDropzone = document.getElementById('editDropzone');
        const editInput = document.getElementById('editImageInput');
        const editPreview = document.getElementById('editPreviewContainer');
        let editFiles = new DataTransfer();

        editDropzone.addEventListener('click', () => editInput.click());
        editDropzone.addEventListener('dragover', (e) => {
            e.preventDefault();
            editDropzone.style.borderColor = '#0d6efd';
        });
        editDropzone.addEventListener('dragleave', () => {
            editDropzone.style.borderColor = '';
        });
        editDropzone.addEventListener('drop', (e) => {
            e.preventDefault();
            editDropzone.style.borderColor = '';
            addEditFiles(e.dataTransfer.files);
        });
        editInput.addEventListener('change', () => addEditFiles(editInput.files));

        function addEditFiles(files) {
            Array.from(files).forEach(f => {
                if (f.type.match(/^image\/(jpeg|png|gif|webp)$/)) editFiles.items.add(f);
            });
            editInput.files = editFiles.files;
            renderEditPreviews();
        }

        function renderEditPreviews() {
            editPreview.innerHTML = '';
            Array.from(editFiles.files).forEach((file, idx) => {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const div = document.createElement('div');
                    div.className = 'col-6 col-md-3';
                    div.innerHTML = `<div class="position-relative border rounded" style="height:80px;overflow:hidden;">
                        <img src="${e.target.result}" class="w-100 h-100" style="object-fit:cover;">
                        <button class="btn-close position-absolute top-0 end-0 m-1 bg-white rounded-circle p-1" style="font-size:.4rem;"></button>
                    </div>`;
                    div.querySelector('.btn-close').addEventListener('click', () => {
                        removeEditFile(idx);
                    });
                    editPreview.appendChild(div);
                };
                reader.readAsDataURL(file);
            });
        }

        function removeEditFile(idx) {
            const newDT = new DataTransfer();
            Array.from(editFiles.files).forEach((f, i) => {
                if (i !== idx) newDT.items.add(f);
            });
            editFiles = newDT;
            editInput.files = editFiles.files;
            renderEditPreviews();
        }
    </script>

</x-app-layout>
