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
                @foreach ($videos as $video)
                    <div class="col col-md-4" style="margin-bottom:30px;">
                        <div style="border-radius:4px; overflow:hidden; box-shadow:0 2px 8px rgba(0,0,0,.1);">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{ $video['url'] }}" allowfullscreen
                                    title="{{ $video['title'] }}">
                                </iframe>
                            </div>
                            <div style="padding:12px;">
                                <h5 style="margin:0;">{{ $video['title'] }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</x-web-layout>
