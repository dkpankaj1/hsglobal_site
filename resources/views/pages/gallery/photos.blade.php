<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'Photo Gallery',
        'breadcrumb' => [
            ['label' => 'Gallery', 'url' => route('gallery.photos')],
            ['label' => 'Photo Gallery'],
        ],
    ])

    <section class="section-padding">
        <div class="container">
            <div class="section-title-s1">
                <span>Gallery</span>
                <h2>Photo <span>Gallery</span></h2>
            </div>

            <div class="row" style="margin-top:30px;">
                @foreach($photos as $photo)
                    <div class="col col-sm-4 col-md-3" style="margin-bottom:20px;">
                        <a href="{{ $photo['src'] }}" class="fancybox" data-fancybox-group="photos">
                            <div style="overflow:hidden; border-radius:4px; height:180px; background:#eee;">
                                <img src="{{ $photo['thumb'] }}"
                                     alt="{{ $photo['caption'] }}"
                                     style="width:100%; height:100%; object-fit:cover;"
                                     onerror="this.onerror=null;this.style.opacity='0'">
                            </div>
                            <p style="font-size:13px; text-align:center; margin-top:6px; color:#555;">{{ $photo['caption'] }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</x-web-layout>
