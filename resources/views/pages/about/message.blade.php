{{-- Shared template for Chairman / Director / Principal messages --}}
<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => $data['role'],
        'breadcrumb' => [
            ['label' => 'About Us', 'url' => route('about.school')],
            ['label' => $data['role']],
        ],
    ])

    <section class="section-padding">
        <div class="container">
            <div class="row">

                <div class="col col-md-3" style="text-align:center; margin-bottom:30px;">
                    <img src="{{ $data['photo'] }}"
                         alt="{{ $data['name'] }}"
                         class="img img-responsive img-circle"
                         style="width:180px; height:180px; object-fit:cover; margin:0 auto 15px; border:4px solid var(--main-color);"
                         onerror="this.onerror=null;this.src='https://ui-avatars.com/api/?name={{ urlencode($data['name']) }}&size=180&background=751419&color=fff&rounded=true'">
                    <h4 style="margin-bottom:4px;">{{ $data['name'] }}</h4>
                    <span style="color:var(--main-color); font-weight:600;">{{ $data['role'] }}</span>
                </div>

                <div class="col col-md-9">
                    <div class="section-title-s1">
                        <span>A Message From Us</span>
                        <h2>{{ $data['role'] }}</h2>
                    </div>
                    <p style="font-size:16px; line-height:1.9;">{!! nl2br(e($data['message'])) !!}</p>
                </div>

            </div>
        </div>
    </section>

</x-web-layout>
