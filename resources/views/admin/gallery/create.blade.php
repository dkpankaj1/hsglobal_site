<x-app-layout pageTitle="Create Gallery" :breadcrumbs="[['label' => 'Galleries', 'url' => route('admin.gallery.index')], ['label' => 'Create', 'url' => null]]">

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title mb-0">Create New Gallery</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.gallery.store') }}" method="post" enctype="multipart/form-data"
                        id="galleryForm">
                        @csrf

                        {{-- Gallery Info --}}
                        <div class="row">
                            <div class="col-12">
                                <h4 class="mb-3">Gallery Info</h4>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <x-input-label name="name" text="Gallery Name" />
                                    <x-input-field name="name" type="text" value="{{ old('name') }}"
                                        placeholder="e.g. Annual Sports Day 2026" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                        rows="3" placeholder="Brief description of this gallery (optional)">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Image Upload --}}
                        <div class="row mt-4">
                            <div class="col-12">
                                <h4 class="mb-3">Upload Images</h4>
                            </div>

                            <div class="col-12">
                                {{-- Dropzone area --}}
                                <div id="dropzone" class="border border-2 border-dashed rounded-3 p-4 text-center"
                                    style="background: #fafbfc; cursor: pointer; transition: 0.2s;">
                                    <div id="dropzoneContent">
                                        <i data-lucide="cloud-upload" class="d-block mb-2"
                                            style="font-size: 1.5rem;"></i>
                                        <h6 class="mb-1">Drag & drop images here</h6>
                                        <p class="text-muted small mb-2">or click to browse</p>
                                        <span class="badge bg-light text-dark border">JPEG, PNG, JPG, GIF, WEBP &bull;
                                            Max 5MB each</span>
                                    </div>
                                    <input type="file" id="imageInput" name="images[]" multiple
                                        accept=".jpeg,.png,.jpg,.gif,.webp" class="d-none">
                                </div>
                                @error('images')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                                @error('images.*')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Preview area --}}
                            <div class="col-12 mt-3">
                                <div id="previewContainer" class="row g-2"></div>
                            </div>
                        </div>

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
                                            value="1" {{ old('is_published', true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_published">
                                            Publish gallery immediately
                                        </label>
                                        @error('is_published')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="d-flex gap-2 align-items-center">
                            <button type="submit" class="btn btn-primary" id="submitBtn">
                                <i data-lucide="save" class="me-1"></i> Create Gallery
                            </button>
                            <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">
                                Cancel
                            </a>
                            <span id="imageCount" class="text-muted small d-none">
                                <span id="countNumber">0</span> image(s) selected
                            </span>
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
                            You can upload multiple images at once.
                        </li>
                        <li class="mb-2">
                            <i data-lucide="check-circle" class="text-success me-1"></i>
                            Images are resized to <strong>1200×800</strong> px.
                        </li>
                        <li class="mb-2">
                            <i data-lucide="check-circle" class="text-success me-1"></i>
                            Supported: JPEG, PNG, JPG, GIF, WEBP.
                        </li>
                        <li class="mb-2">
                            <i data-lucide="check-circle" class="text-success me-1"></i>
                            Max file size: <strong>5 MB</strong> per image.
                        </li>
                        <li>
                            <i data-lucide="check-circle" class="text-success me-1"></i>
                            Add more images later from the gallery detail page.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        const dropzone = document.getElementById('dropzone');
        const imageInput = document.getElementById('imageInput');
        const previewContainer = document.getElementById('previewContainer');
        const imageCount = document.getElementById('imageCount');
        const countNumber = document.getElementById('countNumber');
        let selectedFiles = new DataTransfer();

        // Click to browse
        dropzone.addEventListener('click', () => imageInput.click());

        // Drag & drop visual feedback
        dropzone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropzone.style.borderColor = '#0d6efd';
            dropzone.style.background = '#f0f7ff';
        });
        dropzone.addEventListener('dragleave', () => {
            dropzone.style.borderColor = '';
            dropzone.style.background = '#fafbfc';
        });
        dropzone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropzone.style.borderColor = '';
            dropzone.style.background = '#fafbfc';
            addFiles(e.dataTransfer.files);
        });

        // File input change
        imageInput.addEventListener('change', () => addFiles(imageInput.files));

        function addFiles(files) {
            Array.from(files).forEach(file => {
                if (!file.type.match(/^image\/(jpeg|png|gif|webp)$/)) return;
                selectedFiles.items.add(file);
                renderPreview(file);
            });
            imageInput.files = selectedFiles.files;
            updateCount();
        }

        function renderPreview(file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                const col = document.createElement('div');
                col.className = 'col-6 col-md-4 col-lg-3';
                col.innerHTML = `
                    <div class="position-relative border rounded" style="height: 100px; overflow: hidden;">
                        <img src="${e.target.result}" class="w-100 h-100" style="object-fit: cover;">
                        <button type="button" class="btn-close position-absolute top-0 end-0 m-1 bg-white rounded-circle p-1"
                            style="font-size: 0.5rem;" title="Remove"></button>
                        <span class="position-absolute bottom-0 start-0 m-1 badge bg-dark bg-opacity-50 small">
                            ${(file.size / 1024).toFixed(0)} KB
                        </span>
                    </div>
                `;
                col.querySelector('.btn-close').addEventListener('click', () => {
                    removeFile(file, col);
                });
                previewContainer.appendChild(col);
            };
            reader.readAsDataURL(file);
        }

        function removeFile(file, colElement) {
            const newDT = new DataTransfer();
            Array.from(selectedFiles.files).forEach(f => {
                if (f !== file) newDT.items.add(f);
            });
            selectedFiles = newDT;
            imageInput.files = selectedFiles.files;
            colElement.remove();
            updateCount();
        }

        function updateCount() {
            const count = selectedFiles.files.length;
            if (count > 0) {
                imageCount.classList.remove('d-none');
                countNumber.textContent = count;
            } else {
                imageCount.classList.add('d-none');
            }
        }
    </script>

</x-app-layout>
