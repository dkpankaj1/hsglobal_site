<x-app-layout pageTitle="Add Disclosure" :breadcrumbs="[
    ['label' => 'Mandatory Disclosures', 'url' => route('admin.mandatory-disclosure.index')],
    ['label' => 'Create', 'url' => null],
]">

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.mandatory-disclosure.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <h4 class="mb-3">Add Mandatory Disclosure</h4>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <x-input-label name="name" text="Name" />
                                    <x-input-field name="name" type="text" value="{{ old('name') }}"
                                        placeholder="Enter disclosure name" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                        rows="4" placeholder="Enter description (optional)">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="document" class="form-label">Upload Document</label>
                                    <input type="file" class="form-control @error('document') is-invalid @enderror"
                                        id="document" name="document" accept=".pdf">
                                    <small class="text-muted">Accepted: PDF. Max: 5MB.</small>
                                    @error('document')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <h4 class="mb-3">Visibility</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input @error('is_public') is-invalid @enderror"
                                            type="checkbox" role="switch" id="is_public" name="is_public"
                                            value="1" {{ old('is_public') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_public">
                                            Make this disclosure publicly visible
                                        </label>
                                        @error('is_public')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="ri-save-line me-1"></i> Save Disclosure
                            </button>
                            <a href="{{ route('admin.mandatory-disclosure.index') }}" class="btn btn-secondary ms-2">
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
                        <i class="ri-information-line me-1"></i> Information
                    </h5>
                    <ul class="list-unstyled mb-0 text-muted small">
                        <li class="mb-2">
                            <i class="ri-checkbox-circle-line text-success me-1"></i>
                            The <strong>slug</strong> is auto-generated from the name.
                        </li>
                        <li class="mb-2">
                            <i class="ri-checkbox-circle-line text-success me-1"></i>
                            Supported document formats: PDF, DOC, DOCX, JPG, PNG.
                        </li>
                        <li>
                            <i class="ri-checkbox-circle-line text-success me-1"></i>
                            Set visibility to <strong>Public</strong> to display on the website.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
