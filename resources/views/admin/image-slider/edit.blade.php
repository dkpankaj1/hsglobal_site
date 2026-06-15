<x-app-layout pageTitle="Edit Slider" :breadcrumbs="[
    ['label' => 'Image Sliders', 'url' => route('admin.image-slider.index')],
    ['label' => 'Edit', 'url' => null],
]">

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.image-slider.update', $slider) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-12">
                                <h4 class="mb-3">Edit Image Slider</h4>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <x-input-label name="alt_text" text="Alt Text" />
                                    <x-input-field name="alt_text" type="text"
                                        value="{{ old('alt_text', $slider->alt_text) }}"
                                        placeholder="Enter alt text for the image" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="slider_image" class="form-label">Slider Image</label>

                                    <input type="file"
                                        class="form-control @error('slider_image') is-invalid @enderror"
                                        id="slider_image" name="slider_image"
                                        accept="image/jpeg,image/png,image/jpg,image/gif,image/webp">
                                    <small class="text-muted">Accepted: JPEG, PNG, JPG, GIF, WebP. Max: 5MB.
                                        Leave empty to keep current.</small>

                                    <div class="mt-2">
                                        <span class="text-muted me-2">Current image:</span>
                                        <br>
                                        <img src="{{ $slider->slider_image_url }}" alt="{{ $slider->alt_text }}"
                                            style="max-width: 300px; border-radius: 4px; margin-top: 6px;">
                                    </div>

                                    @error('slider_image')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="ri-save-line me-1"></i> Update Slider
                            </button>
                            <a href="{{ route('admin.image-slider.index') }}" class="btn btn-secondary ms-2">
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
                            <strong>ID:</strong>
                            <code class="ms-1">{{ $slider->id }}</code>
                        </li>
                        <li class="mb-2">
                            <strong>Created:</strong>
                            {{ $slider->created_at->format('d M, Y h:i A') }}
                        </li>
                        <li>
                            <strong>Updated:</strong>
                            {{ $slider->updated_at->format('d M, Y h:i A') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
