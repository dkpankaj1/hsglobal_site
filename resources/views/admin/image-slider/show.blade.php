<x-app-layout pageTitle="{{ $slider->alt_text }}" :breadcrumbs="[
    ['label' => 'Image Sliders', 'url' => route('admin.image-slider.index')],
    ['label' => $slider->alt_text, 'url' => null],
]">

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h4 class="header-title mb-0">{{ $slider->alt_text }}</h4>
                        <div>
                            <a href="{{ route('admin.image-slider.edit', $slider) }}" class="btn btn-sm btn-primary">
                                <i class="ri-edit-line me-1"></i> Edit
                            </a>
                            <a href="{{ route('admin.image-slider.index') }}" class="btn btn-sm btn-secondary ms-1">
                                <i class="ri-arrow-left-line me-1"></i> Back
                            </a>
                        </div>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <label class="form-label text-muted small">Slider Image</label>
                        <div>
                            <img src="{{ $slider->slider_image_url }}" alt="{{ $slider->alt_text }}"
                                style="max-width: 100%; border-radius: 4px;">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted small">Image Path</label>
                        <p><code>{{ $slider->slider_image }}</code></p>
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
                            <strong>ID:</strong>
                            <br>
                            <code>{{ $slider->id }}</code>
                        </li>
                        <li class="mb-2">
                            <strong>Created:</strong>
                            <br>
                            {{ $slider->created_at->format('d M, Y h:i A') }}
                        </li>
                        <li>
                            <strong>Last Updated:</strong>
                            <br>
                            {{ $slider->updated_at->format('d M, Y h:i A') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
