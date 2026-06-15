<x-app-layout pageTitle="Important Notice" :breadcrumbs="[['label' => 'Important Notice', 'url' => null]]">

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.important-notice.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-8">
                        <!-- Notice Content -->
                        <div class="row">
                            <div class="col-12">
                                <h4 class="mb-3">Important Notice Content</h4>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <x-input-label name="heading" text="Heading" />
                                    <x-input-field name="heading" type="text"
                                        value="{{ old('heading', $importantNotice->heading ?? '') }}"
                                        placeholder="Enter notice heading" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <x-input-label name="title" text="Title" />
                                    <x-input-field name="title" type="text"
                                        value="{{ old('title', $importantNotice->title ?? '') }}"
                                        placeholder="Enter notice title" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                        rows="4" required placeholder="Enter notice description">{{ old('description', $importantNotice->description ?? '') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <x-input-label name="action" text="Action" />
                                    <x-input-field name="action" type="text"
                                        value="{{ old('action', $importantNotice->action ?? '') }}"
                                        placeholder="https://example.com" />
                                </div>
                            </div>
                        </div>
                        <!-- Enabled Toggle -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <h4 class="mb-3">Visibility</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input @error('enabled') is-invalid @enderror"
                                            type="checkbox" role="switch" id="enabled" name="enabled" value="1"
                                            {{ old('enabled', $importantNotice->enabled ?? false) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="enabled">
                                            Enable this notice on the website
                                        </label>
                                        @error('enabled')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- Banner Image -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <h4 class="mb-3">Banner Image</h4>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="banner" class="form-label">Upload Banner</label>
                                    <div class="form-control d-flex justify-content-center align-items-center mb-1"
                                        style="height: 120px; overflow: hidden;">
                                        <img src="{{ $importantNotice->banner_url }}" alt="Banner Preview"
                                            style="max-height: 100%; max-width: 100%; object-fit: contain;">
                                    </div>

                                    <input type="file" class="form-control @error('banner') is-invalid @enderror"
                                        id="banner" name="banner" accept="image/*">
                                    <small class="text-muted">Recommended size: 1920x600px. Max: 2MB.</small>
                                    @error('banner')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <hr>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="ri-save-line me-1"></i> Update Notice
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
