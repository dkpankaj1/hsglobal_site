<x-app-layout pageTitle="{{ $video->name }}" :breadcrumbs="[
    ['label' => 'Video Gallery', 'url' => route('admin.video-gallery.index')],
    ['label' => $video->name, 'url' => null],
]">

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h4 class="header-title mb-0">{{ $video->name }}</h4>
                        <div>
                            <a href="{{ route('admin.video-gallery.edit', $video) }}" class="btn btn-sm btn-primary">
                                <i class="ri-edit-line me-1"></i> Edit
                            </a>
                            <a href="{{ route('admin.video-gallery.index') }}" class="btn btn-sm btn-secondary ms-1">
                                <i class="ri-arrow-left-line me-1"></i> Back
                            </a>
                        </div>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <label class="form-label text-muted small">Status</label>
                        <p>
                            @if ($video->is_published)
                                <span class="badge bg-success">Published</span>
                            @else
                                <span class="badge bg-secondary">Draft</span>
                            @endif
                        </p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted small">Description</label>
                        <p>{{ $video->description ?: '&mdash;' }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted small">YouTube URL</label>
                        <p>
                            <a href="{{ $video->yt_url }}" target="_blank">
                                <i class="ri-external-link-line me-1"></i> {{ $video->yt_url }}
                            </a>
                        </p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted small">Preview</label>
                        <div class="ratio ratio-16x9">
                            @php
                                $embedUrl = $video->yt_url;
                                // Extract video ID from common YouTube URL formats
                                if (
                                    preg_match(
                                        '/(?:youtube\.com\/(?:watch\?v=|embed\/|v\/|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/',
                                        $video->yt_url,
                                        $matches,
                                    )
                                ) {
                                    $embedUrl = 'https://www.youtube.com/embed/' . $matches[1];
                                }
                            @endphp
                            <iframe src="{{ $embedUrl }}" allowfullscreen
                                style="border: 0; border-radius: 6px;"></iframe>
                        </div>
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
                            {{ $video->created_at->format('d M, Y h:i A') }}
                        </li>
                        <li>
                            <strong>Last Updated:</strong>
                            <br>
                            {{ $video->updated_at->format('d M, Y h:i A') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
