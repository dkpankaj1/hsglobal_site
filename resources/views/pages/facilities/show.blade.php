{{-- Shared view for all Facilities pages --}}
<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => $data['title'],
        'breadcrumb' => [
            ['label' => 'Facilities', 'url' => route('facilities.infrastructure')],
            ['label' => $data['title']],
        ],
    ])

    <section class="section-padding">
        <div class="container">
            <div class="section-title-s1">
                <span>Facilities</span>
                <h2><span>{{ $data['title'] }}</span></h2>
            </div>

            <div class="row" style="margin-top:30px;">
                <div class="col col-md-8">
                    <p style="font-size:16px;">{{ $data['description'] }}</p>

                    <h4 style="margin-top:25px; color:var(--main-color);">Key Features</h4>
                    <ul style="list-style:none; padding:0;">
                        @foreach($data['highlights'] as $item)
                            <li style="padding:10px 0; border-bottom:1px solid #eee; display:flex; align-items:center; gap:10px;">
                                <i class="fa fa-check-circle" style="color:var(--main-color);"></i>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col col-md-4" style="text-align:center;">
                    <i class="fa {{ $data['icon'] }}" style="font-size:100px; color:var(--main-color); opacity:0.15; margin-bottom:20px;"></i>
                </div>
            </div>
        </div>
    </section>

</x-web-layout>
