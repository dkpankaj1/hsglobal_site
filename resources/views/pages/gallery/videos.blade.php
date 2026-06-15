<x-web-layout>

    @include('layouts._web.page-header', [
        'title' => 'Video Gallery',
        'breadcrumb' => [['label' => 'Gallery', 'url' => route('gallery.photos')], ['label' => 'Video Gallery']],
    ])

    <section style="padding:42px 0 54px;">
        <div class="container">
            <div class="section-title-s1">
                <span>Gallery</span>
                <h2>Video Gallery</h2>
            </div>

            <div class="row" style="margin-top:30px;">
                @forelse ($videos as $video)
                    <div class="col-md-4" style="margin-bottom:30px;">
                        <div style="border-radius:4px; overflow:hidden; box-shadow:0 2px 8px rgba(0,0,0,.1);">
                            <div class="embed-responsive embed-responsive-16by9">
                                @php
                                    $embedUrl = $video->yt_url;
                                    if (str_contains($embedUrl, 'watch?v=')) {
                                        $embedUrl = str_replace('watch?v=', 'embed/', $embedUrl);
                                        $embedUrl = explode('&', $embedUrl)[0];
                                    } elseif (str_contains($embedUrl, 'youtu.be/')) {
                                        $embedUrl = str_replace('youtu.be/', 'youtube.com/embed/', $embedUrl);
                                    }
                                @endphp
                                <iframe class="embed-responsive-item" src="{{ $embedUrl }}" allowfullscreen
                                    title="{{ $video->name }}">
                                </iframe>
                            </div>
                            <div style="padding:12px;">
                                <h5 style="margin:0;">{{ $video->name }}</h5>
                                @if ($video->description)
                                    <p class="text-muted small mb-0 mt-1">{{ $video->description }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i data-lucide="video" style="font-size:3rem; color:#ccc;"></i>
                        <h5 class="mt-3">No videos yet</h5>
                        <p class="text-muted">Check back soon for video galleries.</p>
                    </div>
                @endforelse
            </div>

            @if ($videos->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $videos->links() }}
                </div>
            @endif
        </div>
    </section>

</x-web-layout>
