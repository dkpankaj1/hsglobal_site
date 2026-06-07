<x-app-layout>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h4 class="header-title mb-0">{{ $notice->title }}</h4>
                        <div>
                            <a href="{{ route('admin.notice-board.edit', $notice) }}" class="btn btn-sm btn-primary">
                                <i class="ri-edit-line me-1"></i> Edit
                            </a>
                            <a href="{{ route('admin.notice-board.index') }}" class="btn btn-sm btn-secondary ms-1">
                                <i class="ri-arrow-left-line me-1"></i> Back
                            </a>
                        </div>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <label class="form-label text-muted small">Status</label>
                        <p>
                            @if ($notice->is_publish)
                                <span class="badge bg-success">Published</span>
                            @else
                                <span class="badge bg-secondary">Draft</span>
                            @endif
                        </p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted small">Description</label>
                        <p>{{ $notice->description ?: '&mdash;' }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted small">Document</label>
                        <p>
                            @if ($notice->document)
                                <a href="{{ $notice->getDocumentUrl() }}" target="_blank"
                                    class="btn btn-outline-primary">
                                    <i class="ri-file-download-line me-1"></i> View / Download Document
                                </a>
                            @else
                                <span class="text-muted">No document uploaded.</span>
                            @endif
                        </p>
                    </div>
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
                            <strong>Created:</strong>
                            <br>
                            {{ $notice->created_at->format('d M, Y h:i A') }}
                        </li>
                        <li>
                            <strong>Last Updated:</strong>
                            <br>
                            {{ $notice->updated_at->format('d M, Y h:i A') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
