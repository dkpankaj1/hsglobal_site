<x-app-layout pageTitle="Add Slider" :breadcrumbs="[
    ['label' => 'Image Sliders', 'url' => route('admin.image-slider.index')],
    ['label' => 'Create', 'url' => null],
]">

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <form action="{{ route('admin.image-slider.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <h4 class="mb-3">Add Image Slider</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <x-input-label name="alt_text" text="Alt Text" />
                                    <x-input-field name="alt_text" type="text" value="{{ old('alt_text') }}"
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
                                    <small class="text-muted">Accepted: JPEG, PNG, JPG, GIF, WebP. Max: 5MB.</small>
                                    @error('slider_image')
                                        <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="ri-save-line me-1"></i> Save Slider
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
                        <i class="ri-information-line me-1"></i> Information
                    </h5>
                    <ul class="list-unstyled mb-0 text-muted small">
                        <li class="mb-2">
                            <i class="ri-checkbox-circle-line text-success me-1"></i>
                            The image will be resized to <strong>2780*880</strong>.
                        </li>
                        <li class="mb-2">
                            <i class="ri-checkbox-circle-line text-success me-1"></i>
                            Supported formats: JPEG, PNG, JPG, GIF, WebP.
                        </li>
                        <li>
                            <i class="ri-checkbox-circle-line text-success me-1"></i>
                            <strong>Alt text</strong> is important for accessibility and SEO.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
