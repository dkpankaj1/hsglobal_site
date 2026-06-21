<x-app-layout pageTitle="Facilities" :breadcrumbs="[['label' => 'Facilities', 'url' => null]]">

    @push('pageStyles')
        <style>
            .facility-card {
                transition: transform 0.2s, box-shadow 0.2s;
                border-radius: 10px;
                overflow: hidden;
            }

            .facility-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1) !important;
            }

            .facility-card .card-img-top img {
                transition: transform 0.3s ease;
            }

            .facility-card:hover .card-img-top img {
                transform: scale(1.05);
            }

            .clamp-2 {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
        </style>
    @endpush

    <div class="row mb-3">
        <div class="col-md-6">
            <span class="badge bg-light text-dark border fs-6">
                {{ $facilities->total() }} {{ Str::plural('facility', $facilities->total()) }}
            </span>
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.facility.create') }}" class="btn btn-primary">
                    <i data-lucide="plus" class="me-1"></i> Add Facility
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        @forelse ($facilities as $facility)
            <div class="col-md-6 col-lg-4 col-xl-3 mb-3">
                <div class="card facility-card shadow-sm h-100">
                    <div class="card-img-top position-relative"
                        style="height: 160px; overflow: hidden; background: #f5f6f8;">
                        <img src="{{ $facility->thumbnail_url }}" alt="{{ $facility->name }}" class="w-100 h-100"
                            style="object-fit: cover;">
                        <span
                            class="position-absolute top-0 end-0 m-2 badge {{ $facility->is_publish ? 'bg-success' : 'bg-secondary' }}">
                            {{ $facility->is_publish ? 'Published' : 'Draft' }}
                        </span>
                    </div>
                    <div class="card-body d-flex flex-column p-3">
                        <h6 class="mb-1 text-truncate fw-bold">{{ $facility->name }}</h6>
                        <p class="text-muted small mb-2 flex-grow-1 clamp-2">
                            {{ $facility->sort_description }}
                        </p>
                        @if ($facility->highlights)
                            <div class="mb-2">
                                @foreach (array_slice($facility->highlights, 0, 3) as $highlight)
                                    <span
                                        class="badge bg-light text-dark border me-1 mb-1 small">{{ $highlight }}</span>
                                @endforeach
                                @if (count($facility->highlights) > 3)
                                    <span
                                        class="badge bg-primary bg-opacity-10 text-primary">+{{ count($facility->highlights) - 3 }}</span>
                                @endif
                            </div>
                        @endif
                        <small class="text-muted d-block mt-auto">
                            <i data-lucide="clock" style="width:12px;height:12px;" class="me-1"></i>
                            {{ $facility->created_at->format('M d, Y') }}
                        </small>
                    </div>
                    <div class="card-footer bg-transparent border-top p-2">
                        <div class="btn-group w-100" role="group">
                            <a href="{{ $facility->route }}" class="btn btn-sm btn-outline-info" title="View on site"
                                target="_blank">
                                <i data-lucide="eye" style="width:14px;height:14px;"></i>
                            </a>
                            <a href="{{ route('admin.facility.edit', $facility) }}"
                                class="btn btn-sm btn-outline-primary" title="Edit">
                                <i data-lucide="pencil" style="width:14px;height:14px;"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-outline-danger" title="Delete"
                                data-bs-toggle="modal" data-bs-target="#deleteModal" data-name="{{ $facility->name }}"
                                data-action="{{ route('admin.facility.destroy', $facility) }}">
                                <i data-lucide="trash-2" style="width:14px;height:14px;"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center py-5">
                        <i data-lucide="building-2" class="d-block mx-auto mb-3 text-muted"
                            style="font-size:3rem;opacity:0.4;"></i>
                        <h5 class="fw-bold">No facilities yet</h5>
                        <p class="text-muted mb-4">Start by adding your first campus facility — labs, library, sports,
                            and more.</p>
                        <a href="{{ route('admin.facility.create') }}" class="btn btn-primary px-4">
                            <i data-lucide="plus" class="me-1"></i> Add First Facility
                        </a>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

    @if ($facilities->hasPages())
        <div class="row mt-2">
            <div class="col-12 d-flex justify-content-center">
                {{ $facilities->links() }}
            </div>
        </div>
    @endif

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger bg-opacity-10">
                    <h5 class="modal-title text-danger" id="deleteModalLabel">
                        <i data-lucide="alert-triangle" class="me-1" style="width:18px;height:18px;"></i> Confirm
                        Delete
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-1">Permanently delete <strong id="deleteItemName"></strong>?</p>
                    <p class="text-muted small mb-0">This also removes the thumbnail. Cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i data-lucide="trash-2" class="me-1" style="width:16px;height:16px;"></i> Delete
                            Permanently
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('pageScripts')
        <script>
            document.getElementById('deleteModal').addEventListener('show.bs.modal', function(event) {
                var btn = event.relatedTarget;
                document.getElementById('deleteItemName').textContent = btn.getAttribute('data-name');
                document.getElementById('deleteForm').setAttribute('action', btn.getAttribute('data-action'));
            });
        </script>
    @endpush

</x-app-layout>
