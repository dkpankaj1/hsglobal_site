<x-app-layout pageTitle="{{ $pageTitle }}" :breadcrumbs="$breadcrumbs">

    <form action="{{ route('admin.admission.pages.update', $page) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            {{-- Left column: Main content --}}
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Page Content</h5>

                        {{-- Page Name --}}
                        <div class="mb-3">
                            <x-input-label name="name" text="Page Name" />
                            <x-input-field name="name" type="text" value="{{ old('name', $page->name) }}"
                                placeholder="Enter page name" />
                        </div>

                        {{-- HTML Content --}}
                        <div class="mb-3">
                            <label for="content" class="form-label">Content <small class="text-muted">(HTML
                                    supported)</small></label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="18"
                                placeholder="Write page content here... HTML tags are supported.">{{ old('content', $page->content) }}</textarea>
                            @error('content')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- SEO Section --}}
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title mb-3">SEO Settings</h5>
                        <div class="mb-3">
                            <x-input-label name="meta_title" text="Meta Title" />
                            <x-input-field name="meta_title" type="text"
                                value="{{ old('meta_title', $page->meta_title) }}"
                                placeholder="SEO title (recommended: 50-60 chars)" />
                        </div>
                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="form-control @error('meta_description') is-invalid @enderror" id="meta_description"
                                name="meta_description" rows="3"
                                placeholder="Brief description for search engines (recommended: 150-160 chars)">{{ old('meta_description', $page->meta_description) }}</textarea>
                            @error('meta_description')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <x-input-label name="meta_keywords" text="Meta Keywords" />
                            <x-input-field name="meta_keywords" type="text"
                                value="{{ old('meta_keywords', $page->meta_keywords) }}"
                                placeholder="keyword1, keyword2, keyword3" />
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right column: Sidebar settings --}}
            <div class="col-lg-4">
                {{-- Publish Toggle --}}
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Visibility</h5>
                        <div class="form-check form-switch">
                            <input class="form-check-input @error('is_published') is-invalid @enderror" type="checkbox"
                                role="switch" id="is_published" name="is_published" value="1"
                                {{ old('is_published', $page->is_published) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_published">
                                Published
                            </label>
                            @error('is_published')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <small class="text-muted">Only published pages are visible on the website.</small>
                    </div>
                </div>

                {{-- Image --}}
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Page Image</h5>

                        @if ($page->image)
                            <div class="mb-3">
                                <label class="form-label">Current Image</label>
                                <div class="border rounded p-1 mb-2">
                                    <img src="{{ $page->image_url }}" alt="{{ $page->name }}"
                                        class="img-fluid rounded"
                                        style="max-height:160px; width:100%; object-fit:cover;">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="delete_image" value="1"
                                        id="delete_image">
                                    <label class="form-check-label small text-danger" for="delete_image">
                                        Remove this image
                                    </label>
                                </div>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="image"
                                class="form-label">{{ $page->image ? 'Replace Image' : 'Upload Image' }}</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                id="image" name="image" accept="image/*">
                            <small class="text-muted">JPEG, PNG, GIF, WebP. Max: 5MB.</small>
                            @error('image')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- File / Document --}}
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Attachment</h5>

                        @if ($page->file)
                            <div class="mb-3">
                                <label class="form-label">Current File</label>
                                <div class="d-flex justify-content-between align-items-center border rounded p-2 mb-2">
                                    <div>
                                        <i data-lucide="file-text" class="me-1"
                                            style="width:16px; height:16px;"></i>
                                        <a href="{{ $page->file_url }}" target="_blank" class="small">
                                            {{ $page->file_name }}
                                        </a>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="delete_file"
                                            value="1" id="delete_file">
                                        <label class="form-check-label small text-danger" for="delete_file">
                                            Remove
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="file"
                                class="form-label">{{ $page->file ? 'Replace File' : 'Upload File' }}</label>
                            <input type="file" class="form-control @error('file') is-invalid @enderror"
                                id="file" name="file" accept=".pdf">
                            <small class="text-muted">PDF only. Max: 10MB.</small>
                            @error('file')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Submit --}}
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('admin.admission.pages.index') }}"
                                class="btn btn-light me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i data-lucide="save" class="me-1" style="width:16px; height:16px;"></i> Update
                                Page
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</x-app-layout>
