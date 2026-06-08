<x-web-layout>

    @include('layouts._web.page-header', [
        'title' => 'About School',
        'breadcrumb' => [['label' => 'About Us', 'url' => route('about.school')], ['label' => 'About School']],
    ])

    {{-- ───────────── ABOUT INTRO ───────────── --}}
    <section class="about-us" style="padding: 50px 0;">
        <div class="container">
            <div class="row">
                <div class="col col-md-7">
                    <div class="section-title-s1">
                        <span>About Us</span>
                        <h2>{{ $data['name'] }}</h2>
                    </div>
                    <p>{{ $data['description'] }}</p>

                    <div class="row" style="margin-top:20px;">
                        <div class="col col-sm-6">
                            <ul class="about-details" style="list-style:none; padding:0;">
                                <li><strong>Established:</strong> {{ $data['established'] }}</li>
                                <li><strong>Affiliation:</strong> {{ $data['affiliation'] }}</li>
                                <li><strong>Aff. No.:</strong> {{ $data['aff_no'] }}</li>
                            </ul>
                        </div>
                        <div class="col col-sm-6">
                            <ul class="about-details" style="list-style:none; padding:0;">
                                <li><strong>Phone:</strong> {{ $data['phone'] }}</li>
                                <li><strong>Email:</strong> {{ $data['email'] }}</li>
                                <li><strong>Address:</strong> {{ $data['address'] }}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col col-md-5">
                    <img src="{{ asset('static/images/img_7.jpeg') }}" alt="About {{ $data['name'] }}"
                        class="img img-responsive" style="border-radius:4px; width:100%;">
                </div>
            </div>

            <div style="margin-top:28px;">
                <h4 style="font-weight:700; margin-bottom:14px;">Our Highlights</h4>
                <ul style="list-style:none; padding:0; margin:0; display:flex; flex-wrap:wrap; gap:10px;">
                    @foreach ($data['highlights'] as $highlight)
                        <li
                            style="display:flex; align-items:center; background:#f4f7fb; border-radius:4px; padding:8px 14px; font-size:14px; color:#444; flex:0 1 auto;">
                            <i class="fa fa-check-circle"
                                style="color:var(--main-color); margin-right:8px; font-size:15px;"></i>
                            {{ $highlight }}
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </section>

    {{-- ───────────── EXTENDED DESCRIPTION ───────────── --}}
    <section class="section-padding" style="background:#f9f9f9;">
        <div class="container">
            <div class="row">
                <div class="col col-md-10 col-md-offset-1">
                    <div class="section-title-s1 text-center">
                        <span>Our Story</span>
                        <h2>Two Decades of Excellence in Education</h2>
                    </div>
                    <p class="lead text-center" style="font-size:16px; line-height:1.9; color:#555; margin-top:20px;">
                        {{ $data['long_description'] }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ───────────── CHAIRMAN'S STORY ───────────── --}}
    <section class="section-padding">
        <div class="container">
            <div class="section-title-s1 text-center">
                <span>Leadership</span>
                <h2>Message from the Director</h2>
            </div>

            <div class="row" style="margin-top:40px; align-items:center;">
                {{-- Photo column --}}
                <div class="col col-md-4 text-center" style="margin-bottom:30px;">
                    <div style="position:relative; display:inline-block;">
                        <div
                            style="width:220px; height:220px; border-radius:50%; overflow:hidden; margin:0 auto; border:6px solid var(--main-color); background:#e0e0e0; display:flex; align-items:center; justify-content:center;">
                            <img src="{{ $data['chairman']['photo'] }}" alt="{{ $data['chairman']['name'] }}"
                                style="width:100%; height:100%; object-fit:cover;"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div
                                style="display:none; align-items:center; justify-content:center; width:100%; height:100%; flex-direction:column;">
                                <i class="fa fa-user" style="font-size:60px; color:#bbb;"></i>
                            </div>
                        </div>
                        <div style="margin-top:18px;">
                            <h4 style="margin:0 0 4px; font-weight:700;">{{ $data['chairman']['name'] }}</h4>
                            <span
                                style="color:var(--main-color); font-size:14px; font-weight:600;">{{ $data['chairman']['title'] }}</span>
                        </div>
                        <div
                            style="margin-top:16px; background:#f9f9f9; border-left:4px solid var(--main-color); padding:14px 18px; border-radius:0 4px 4px 0; text-align:left;">
                            <i class="fa fa-quote-left" style="color:var(--main-color); margin-right:6px;"></i>
                            <em style="color:#555; font-size:14px;">{{ $data['chairman']['quote'] }}</em>
                        </div>
                    </div>
                </div>

                {{-- Story column --}}
                <div class="col col-md-8" style="margin-bottom:30px;">
                    <div class="section-title-s1">
                        <span>His Journey</span>
                        <h3>A Vision to Transform Education in Kushinagar</h3>
                    </div>
                    <p style="color:#555; font-size:15px; line-height:1.9; margin-top:16px;">
                        {{ $data['chairman']['story'] }}
                    </p>

                    <div style="margin-top:28px; background:#f4f7fb; border-radius:6px; padding:22px 26px;">
                        <h5 style="margin:0 0 10px; font-weight:700; color:#333;">
                            <i class="fa fa-comment-o" style="color:var(--main-color); margin-right:8px;"></i>
                            Message from the Chairman
                        </h5>
                        <p style="color:#555; font-size:14px; line-height:1.8; margin:0; font-style:italic;">
                            "{{ $data['chairman']['message'] }}"
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-web-layout>
