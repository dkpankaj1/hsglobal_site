<x-web-layout>

    @include('layouts._web.page-header', [
        'title' => 'Photo Gallery',
        'breadcrumb' => [
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Gallery', 'url' => route('gallery.photos')],
            ['label' => 'Photo Gallery'],
        ],
    ])

    <section style="padding:42px 0 54px; background:#fafafa;">
        <div class="container">
            <div class="section-title-s1">
                <span>Gallery</span>
                <h2>Photo Gallery</h2>
            </div>

            <div class="gallery-grid" style="margin-top:24px;">
                @forelse ($galleries as $gallery)
                    <a href="{{ route('gallery.show', $gallery->slug) }}" class="gallery-grid-item">
                        <div class="pin-shell">
                            <div class="pin-media">
                                @if ($gallery->images->isNotEmpty())
                                    <img src="{{ asset($gallery->images->first()->image_path) }}"
                                        alt="{{ $gallery->name }}" loading="lazy">
                                @else
                                    <div class="d-flex align-items-center justify-content-center h-100 bg-light">
                                        <i data-lucide="image" style="font-size:2rem; color:#cbd5e1;"></i>
                                    </div>
                                @endif
                                <div class="pin-overlay"></div>
                                <span class="pin-label">
                                    <i data-lucide="image" style="width:14px;height:14px;"></i>
                                    {{ $gallery->images_count }}
                                </span>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="gallery-grid-empty">
                        <p class="text-muted">No galleries yet. Check back soon.</p>
                    </div>
                @endforelse
            </div>

            @if ($galleries->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $galleries->links() }}
                </div>
            @endif
        </div>
    </section>

</x-web-layout>
