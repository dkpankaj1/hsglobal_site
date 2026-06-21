<x-app-layout pageTitle="Edit Facility" :breadcrumbs="[['label' => 'Facilities', 'url' => route('admin.facility.index')], ['label' => 'Edit', 'url' => null]]">

    @push('pageStyles')
        <style>
            .highlight-row {
                animation: fadeSlideIn 0.2s ease;
            }

            @keyframes fadeSlideIn {
                from {
                    opacity: 0;
                    transform: translateY(-6px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .dropzone-thumb {
                border: 2px dashed #dee2e6;
                border-radius: 8px;
                padding: 1.5rem;
                text-align: center;
                cursor: pointer;
                background: #fafbfc;
                transition: border-color 0.2s, background 0.2s;
            }

            .dropzone-thumb:hover {
                border-color: #0d6efd;
                background: #f0f5ff;
            }

            .thumb-preview-box {
                border: 1px solid #e7eaf0;
                border-radius: 8px;
                overflow: hidden;
                background: #fff;
            }

            .thumb-preview-box img {
                width: 100%;
                max-height: 200px;
                object-fit: cover;
            }
        </style>
    @endpush

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="header-title mb-0">Edit Facility</h4>
                    <a href="{{ route('admin.facility.index') }}" class="btn btn-sm btn-light">
                        <i data-lucide="arrow-left" class="me-1"></i> Back
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.facility.update', $facility) }}" method="post"
                        enctype="multipart/form-data" id="facilityForm">
                        @csrf
                        @method('PUT')

                        {{-- Facility Info --}}
                        <div class="mb-4">
                            <h5 class="mb-3 text-uppercase text-muted small fw-bold">Facility Information</h5>

                            <div class="mb-3">
                                <x-input-label name="name" text="Facility Name" />
                                <x-input-field name="name" type="text" value="{{ old('name', $facility->name) }}"
                                    placeholder="e.g. Smart Classrooms" />
                            </div>

                            <div class="mb-3">
                                <label for="sort_description" class="form-label fw-semibold">
                                    Short Description <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control @error('sort_description') is-invalid @enderror" id="sort_description"
                                    name="sort_description" rows="2" maxlength="500" placeholder="Brief one-liner shown on cards and listings">{{ old('sort_description', $facility->sort_description) }}</textarea>
                                @error('sort_description')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <div class="d-flex justify-content-between mt-1">
                                    <small class="text-muted">Appears on home page cards and menu previews.</small>
                                    <small class="text-muted"><span id="sortDescCount">0</span>/500</small>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label fw-semibold">
                                    Full Description
                                    <span class="badge bg-info bg-opacity-10 text-info ms-1 small">HTML supported</span>
                                </label>
                                <textarea class="form-control font-monospace @error('description') is-invalid @enderror" id="description"
                                    name="description" rows="12"
                                    placeholder="Detailed description. HTML allowed: &lt;b&gt;bold&lt;/b&gt;, &lt;br&gt;, &lt;ul&gt;&lt;li&gt;bullets&lt;/li&gt;&lt;/ul&gt;, &lt;p&gt;paragraphs&lt;/p&gt;">{{ old('description', $facility->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">
                                    <i data-lucide="info" style="width:14px;height:14px;"></i>
                                    Supports <code>&lt;b&gt;</code>, <code>&lt;i&gt;</code>, <code>&lt;br&gt;</code>,
                                    <code>&lt;p&gt;</code>, <code>&lt;ul&gt;</code>, <code>&lt;li&gt;</code> and other
                                    safe HTML tags.
                                </small>
                            </div>
                        </div>

                        {{-- Publishing --}}
                        <div class="mb-4">
                            <h5 class="mb-3 text-uppercase text-muted small fw-bold">Publishing</h5>
                            <div class="form-check form-switch">
                                <input class="form-check-input @error('is_publish') is-invalid @enderror"
                                    type="checkbox" role="switch" id="is_publish" name="is_publish" value="1"
                                    {{ old('is_publish', $facility->is_publish) ? 'checked' : '' }}>
                                <label class="form-check-label fw-semibold" for="is_publish">
                                    Published
                                </label>
                                <div class="form-text">When off, saved as draft — won't appear on the website.</div>
                                @error('is_publish')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <hr>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary px-4">
                                <i data-lucide="save" class="me-1"></i> Update Facility
                            </button>
                            <a href="{{ route('admin.facility.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Right sidebar: Thumbnail & Highlights --}}
        <div class="col-lg-4">

            {{-- Thumbnail --}}
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title mb-3">
                        <i data-lucide="image" class="me-1" style="width:16px;height:16px;"></i> Thumbnail
                    </h5>
                    <div class="dropzone-thumb mb-2" id="thumbDropzone">
                        <input type="file" class="d-none" form="facilityForm" id="thumbnail" name="thumbnail"
                            accept=".jpeg,.png,.jpg,.gif,.webp">
                        <div id="thumbDropzoneContent">
                            <i data-lucide="image-plus" class="d-block mb-2 text-muted" style="font-size:1.5rem;"></i>
                            <p class="mb-1 small fw-medium">Click or drag to change</p>
                            <span class="badge bg-light text-dark border small">Leave empty to keep current</span>
                        </div>
                    </div>
                    @error('thumbnail')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                    <div class="thumb-preview-box">
                        <img id="thumbnailPreviewImg" src="{{ $facility->thumbnail_url }}"
                            alt="{{ $facility->name }}">
                    </div>
                </div>
            </div>

            {{-- Highlights --}}
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title mb-0">
                            <i data-lucide="list-checks" class="me-1" style="width:16px;height:16px;"></i>
                            Highlights
                        </h5>
                        <button type="button" class="btn btn-sm btn-primary" id="addHighlight">
                            <i data-lucide="plus" style="width:14px;height:14px;"></i> Add
                        </button>
                    </div>
                    <div id="highlightsContainer">
                        @php
                            $oldHighlights = old('highlights', $facility->highlights ?: ['']);
                        @endphp
                        @foreach ($oldHighlights as $i => $highlight)
                            <div class="input-group mb-2 highlight-row">
                                <span class="input-group-text bg-light text-muted small">{{ $i + 1 }}</span>
                                <input type="text" name="highlights[]" form="facilityForm"
                                    class="form-control @error('highlights.' . $i) is-invalid @enderror"
                                    placeholder="e.g. Air-conditioned rooms" value="{{ $highlight }}">
                                <button type="button" class="btn btn-outline-danger remove-highlight" title="Remove"
                                    {{ count($oldHighlights) === 1 ? 'disabled' : '' }}>
                                    <i data-lucide="trash-2" style="width:14px;height:14px;"></i>
                                </button>
                                @error('highlights.' . $i)
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('pageScripts')
        <script>
            (function() {
                const sortDesc = document.getElementById('sort_description');
                const sortDescCount = document.getElementById('sortDescCount');
                if (sortDesc && sortDescCount) {
                    sortDescCount.textContent = sortDesc.value.length;
                    sortDesc.addEventListener('input', function() {
                        sortDescCount.textContent = this.value.length;
                    });
                }

                const dropzone = document.getElementById('thumbDropzone');
                const input = document.getElementById('thumbnail');
                const previewImg = document.getElementById('thumbnailPreviewImg');
                if (dropzone && input) {
                    dropzone.addEventListener('click', function() {
                        input.click();
                    });
                    dropzone.addEventListener('dragover', function(e) {
                        e.preventDefault();
                        dropzone.style.borderColor = '#0d6efd';
                    });
                    dropzone.addEventListener('dragleave', function() {
                        dropzone.style.borderColor = '#dee2e6';
                    });
                    dropzone.addEventListener('drop', function(e) {
                        e.preventDefault();
                        dropzone.style.borderColor = '#dee2e6';
                        if (e.dataTransfer.files.length) {
                            input.files = e.dataTransfer.files;
                            input.dispatchEvent(new Event('change'));
                        }
                    });
                    input.addEventListener('change', function() {
                        if (this.files && this.files[0]) {
                            previewImg.src = URL.createObjectURL(this.files[0]);
                        }
                    });
                }

                const container = document.getElementById('highlightsContainer');
                const addBtn = document.getElementById('addHighlight');

                function renumber() {
                    container.querySelectorAll('.highlight-row .input-group-text').forEach(function(el, i) {
                        el.textContent = i + 1;
                    });
                }
                addBtn.addEventListener('click', function() {
                    var rows = container.querySelectorAll('.highlight-row');
                    var row = document.createElement('div');
                    row.className = 'input-group mb-2 highlight-row';
                    row.innerHTML = '<span class="input-group-text bg-light text-muted small">' + (rows.length +
                        1) + '</span>' +
                        '<input type="text" name="highlights[]" class="form-control" placeholder="e.g. Air-conditioned rooms with smart boards">' +
                        '<button type="button" class="btn btn-outline-danger remove-highlight" title="Remove">' +
                        '<i data-lucide="trash-2" style="width:14px;height:14px;"></i></button>';
                    container.appendChild(row);
                    lucide.createIcons();
                    row.querySelector('input').focus();
                });
                container.addEventListener('click', function(e) {
                    var btn = e.target.closest('.remove-highlight');
                    if (!btn) return;
                    if (container.querySelectorAll('.highlight-row').length <= 1) return;
                    btn.closest('.highlight-row').remove();
                    renumber();
                });
                container.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' && e.target.matches('input[name="highlights[]"]')) {
                        e.preventDefault();
                        addBtn.click();
                    }
                });
            })();
        </script>
    @endpush

</x-app-layout>
