<x-app-layout pageTitle="Principal" :breadcrumbs="[['label' => 'Authorities', 'url' => null], ['label' => 'Principal', 'url' => null]]">

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title mb-0">Principal</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.authority.principal.update') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-12">
                                <h4 class="mb-3">Basic Info</h4>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <x-input-label name="name" text="Full Name" />
                                    <x-input-field name="name" type="text"
                                        value="{{ old('name', $authority->name ?? '') }}" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Photo</label>
                                    @if ($authority && $authority->photo)
                                        <div class="mb-2 form-control text-center ">
                                            <img src="{{ asset($authority->photo) }}" alt="{{ $authority->name }}"
                                                style="height:80px; object-fit:cover;">
                                        </div>
                                    @endif
                                    <input type="file" class="form-control @error('photo') is-invalid @enderror"
                                        id="photo" name="photo" accept="image/*">
                                    <small class="text-muted">Leave empty to keep current photo.</small>
                                    @error('photo')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12">
                                <h4 class="mb-3">Message</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="short_description" class="form-label">Short Description (Home
                                        Page)</label>
                                    <textarea class="form-control @error('short_description') is-invalid @enderror" id="short_description"
                                        name="short_description" rows="2" maxlength="300"
                                        placeholder="Brief intro shown on home page cards (max 300 chars)">{{ old('short_description', $authority->short_description ?? '') }}</textarea>
                                    @error('short_description')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="message" class="form-label">Full Message</label>
                                    <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5">{{ old('message', $authority->message ?? '') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12">
                                <h4 class="mb-3">Display Settings</h4>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <div class="form-check form-switch mt-4">
                                        <input class="form-check-input @error('is_published') is-invalid @enderror"
                                            type="checkbox" role="switch" id="is_published" name="is_published"
                                            value="1"
                                            {{ old('is_published', $authority->is_published ?? true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_published">Published</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i data-lucide="save" class="me-1"></i> Update Principal
                            </button>
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
                            Photo is resized to <strong>400×400</strong> px.
                        </li>
                        <li>
                            <i data-lucide="check-circle" class="text-success me-1"></i>
                            Toggle <strong>Published</strong> to show/hide on the website.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
