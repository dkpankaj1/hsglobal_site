<x-app-layout pageTitle="Edit Disclosure" :breadcrumbs="[
    ['label' => 'Mandatory Disclosures', 'url' => route('admin.mandatory-disclosure.index')],
    ['label' => 'Edit', 'url' => null],
]">

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.mandatory-disclosure.update', $disclosure) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-12">
                                <h4 class="mb-3">Edit Mandatory Disclosure</h4>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <x-input-label name="name" text="Name" />
                                    <x-input-field name="name" type="text"
                                        value="{{ old('name', $disclosure->name) }}"
                                        placeholder="Enter disclosure name" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" class="form-control" id="slug"
                                        value="{{ $disclosure->slug }}" disabled>
                                    <small class="text-muted">Auto-generated from name. Cannot be changed
                                        directly.</small>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                        rows="4" placeholder="Enter description (optional)">{{ old('description', $disclosure->description) }}</textarea>
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
                                    <small class="text-muted">Accepted: PDF. Max: 5MB. Leave empty
                                        to keep current.</small>

                                    @if ($disclosure->document)
                                        <div class="mb-2">
                                            <span class="text-muted me-2">Current document:</span>
                                            <a href="{{ $disclosure->document_url }}" target="_blank">
                                                <i class="ri-file-download-line me-1"></i> View Current
                                            </a>
                                        </div>
                                    @endif
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
                                            value="1"
                                            {{ old('is_public', $disclosure->is_public) ? 'checked' : '' }}>
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
                                <i class="ri-save-line me-1"></i> Update Disclosure
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
                        <i class="ri-information-line me-1"></i> Details
                    </h5>
                    <ul class="list-unstyled mb-0 text-muted small">
                        <li class="mb-2">
                            <strong>Token:</strong>
                            <code class="ms-1">{{ $disclosure->token ?? '—' }}</code>
                        </li>
                        <li class="mb-2">
                            <strong>Created:</strong>
                            {{ $disclosure->created_at->format('d M, Y h:i A') }}
                        </li>
                        <li>
                            <strong>Updated:</strong>
                            {{ $disclosure->updated_at->format('d M, Y h:i A') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
