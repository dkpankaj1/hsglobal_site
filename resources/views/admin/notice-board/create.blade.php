<x-app-layout pageTitle="Add Notice" :breadcrumbs="[
    ['label' => 'Notice Board', 'url' => route('admin.notice-board.index')],
    ['label' => 'Create', 'url' => null],
]">

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.notice-board.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <h4 class="mb-3">Add Notice Board</h4>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <x-input-label name="title" text="Title" />
                                    <x-input-field name="title" type="text" value="{{ old('title') }}"
                                        placeholder="Enter notice title" />
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
                                        id="document" name="document" accept=".pdf,.doc,.docx">
                                    <small class="text-muted">Accepted: PDF, DOC, DOCX. Max: 5MB.</small>
                                    @error('document')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <h4 class="mb-3">Publishing</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input @error('is_publish') is-invalid @enderror"
                                            type="checkbox" role="switch" id="is_publish" name="is_publish"
                                            value="1" {{ old('is_publish') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_publish">
                                            Publish this notice
                                        </label>
                                        @error('is_publish')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="ri-save-line me-1"></i> Save Notice
                            </button>
                            <a href="{{ route('admin.notice-board.index') }}" class="btn btn-secondary ms-2">
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
                            Supported document formats: PDF, DOC, DOCX.
                        </li>
                        <li>
                            <i class="ri-checkbox-circle-line text-success me-1"></i>
                            Toggle <strong>Publish</strong> to make the notice visible on the website.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
