<x-web-layout>

    @include('layouts._web.page-header', [
        'title' => $gallery->name,
        'breadcrumb' => [['label' => 'Gallery', 'url' => route('gallery.photos')], ['label' => $gallery->name]],
    ])

    <section style="padding:42px 0 54px; background:#fafafa;">
        <div class="container">
            <div class="section-title-s1">
                <span>Gallery</span>
                <h2>{{ $gallery->name }}</h2>
            </div>

            @if ($gallery->description)
                <p class="text-center text-muted mb-4">{{ $gallery->description }}</p>
            @endif

            {{-- <p class="text-muted small mb-3">Click any image to open the viewer.</p> --}}

            <div class="gallery-grid">
                @forelse ($gallery->images as $image)
                    <a href="{{ asset($image->image_path) }}" class="fancybox gallery-grid-item" data-fancybox="gallery"
                        data-caption="{{ $gallery->name }}">
                        <div class="pin-shell">
                            <div class="pin-media">
                                <img src="{{ asset($image->image_path) }}" alt="{{ $gallery->name }}" loading="lazy">
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="gallery-grid-empty">
                        <p class="text-muted">No images in this gallery.</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('gallery.photos') }}" class="btn btn-outline-primary">
                    <i class="fa fa-arrow-left me-1"></i> Back to Galleries
                </a>
            </div>
        </div>
    </section>

</x-web-layout>
