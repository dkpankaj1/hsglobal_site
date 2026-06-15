<x-app-layout pageTitle="Edit Video" :breadcrumbs="[
    ['label' => 'Video Gallery', 'url' => route('admin.video-gallery.index')],
    ['label' => 'Edit', 'url' => null],
]">

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.video-gallery.update', $video) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-12">
                                <h4 class="mb-3">Edit Video</h4>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <x-input-label name="name" text="Name" />
                                    <x-input-field name="name" type="text" value="{{ old('name', $video->name) }}"
                                        placeholder="Enter video name" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                        rows="4" placeholder="Enter description (optional)">{{ old('description', $video->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <x-input-label name="yt_url" text="YouTube URL" />
                                    <x-input-field name="yt_url" type="url"
                                        value="{{ old('yt_url', $video->yt_url) }}"
                                        placeholder="https://www.youtube.com/watch?v=..." />
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
                                        <input class="form-check-input @error('is_published') is-invalid @enderror"
                                            type="checkbox" role="switch" id="is_published" name="is_published"
                                            value="1"
                                            {{ old('is_published', $video->is_published) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_published">
                                            Publish this video
                                        </label>
                                        @error('is_published')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="ri-save-line me-1"></i> Update Video
                            </button>
                            <a href="{{ route('admin.video-gallery.index') }}" class="btn btn-secondary ms-2">
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
                            Update the YouTube URL if you need to change the video.
                        </li>
                        <li>
                            <i class="ri-checkbox-circle-line text-success me-1"></i>
                            Toggle <strong>Publish</strong> to make the video visible on the website.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
