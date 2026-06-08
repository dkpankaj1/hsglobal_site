{{-- Shared template for sports-events, cultural-programs, prize-distribution, achievements --}}
<x-web-layout>

    @include('layouts._web.page-header', [
        'title' => $data['title'],
        'breadcrumb' => [['label' => 'Gallery', 'url' => route('gallery.photos')], ['label' => $data['title']]],
    ])

    <section style="padding:42px 0 54px; background:#fafafa;">
        <div class="container">
            <div class="section-title-s1">
                <span>Gallery</span>
                <h2>Video Gallery</h2>
            </div>

            <div style="margin: 0 0 18px; color:#6b7280; font-size:13px;">
                Click any pin to open the image viewer.
            </div>

            <div class="pin-feed">
                @foreach ($data['photos'] as $index => $photo)
                    @php
                        $heights = [
                            'h-1',
                            'h-2',
                            'h-3',
                            'h-4',
                            'h-5',
                            'h-6',
                            'h-7',
                            'h-8',
                            'h-9',
                            'h-10',
                            'h-11',
                            'h-12',
                        ];
                        $height = $heights[$index % count($heights)];
                    @endphp
                    <a href="{{ $photo['src'] }}" class="fancybox pin-card" data-fancybox="events"
                        data-caption="{{ $photo['caption'] }}" aria-label="Open {{ $photo['caption'] }}">
                        <div class="pin-shell">
                            <div class="pin-media {{ $height }}">
                                <img src="{{ $photo['src'] }}" alt="{{ $photo['caption'] }}"
                                    onerror="this.onerror=null;this.style.opacity='0'">
                                <div class="pin-overlay"></div>
                                <span class="pin-label"><i class="fa fa-search-plus"></i> Open</span>
                            </div>
                            <div class="pin-meta">
                                <p class="pin-caption">{{ $photo['caption'] }}</p>
                                <div class="pin-sub">Event memory pin</div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

</x-web-layout>
