<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'About School',
        'breadcrumb' => [
            ['label' => 'About Us', 'url' => route('about.school')],
            ['label' => 'About School'],
        ],
    ])

    {{-- ───────────── ABOUT INTRO ───────────── --}}
    <section class="about-us section-padding">
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
                                <li><strong>School No.:</strong> {{ $data['school_no'] }}</li>
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

                    <div style="margin-top:25px;">
                        <h4>Our Highlights</h4>
                        <ul class="about-details">
                            @foreach($data['highlights'] as $highlight)
                                <li><i class="fa fa-check-circle" style="color:var(--main-color); margin-right:6px;"></i> {{ $highlight }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col col-md-5">
                    <img src="{{ asset('assets/web/images/about-us/img-1.jpg') }}"
                         alt="About {{ $data['name'] }}"
                         class="img img-responsive"
                         style="border-radius:4px; width:100%;">
                </div>
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

    {{-- ───────────── PHOTO GALLERY (5 images) ───────────── --}}
    <section class="section-padding">
        <div class="container">
            <div class="section-title-s1 text-center">
                <span>Gallery</span>
                <h2>Life at {{ $data['name'] }}</h2>
            </div>

            <div class="row" style="margin-top:30px;">
                {{-- Large feature image --}}
                <div class="col col-md-6" style="margin-bottom:20px;">
                    <div style="position:relative; overflow:hidden; border-radius:4px; background:#e0e0e0; height:300px;">
                        <img src="{{ $data['gallery'][0]['src'] }}"
                             alt="{{ $data['gallery'][0]['alt'] }}"
                             style="width:100%; height:100%; object-fit:cover;"
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display:none; align-items:center; justify-content:center; height:100%; background:#dde3ea; flex-direction:column;">
                            <i class="fa fa-image" style="font-size:40px; color:#aaa;"></i>
                            <span style="color:#aaa; margin-top:8px;">{{ $data['gallery'][0]['caption'] }}</span>
                        </div>
                        <div style="position:absolute; bottom:0; left:0; right:0; background:rgba(0,0,0,0.45); padding:10px 15px;">
                            <span style="color:#fff; font-size:14px;">{{ $data['gallery'][0]['caption'] }}</span>
                        </div>
                    </div>
                </div>

                {{-- 2 stacked images --}}
                <div class="col col-md-6" style="margin-bottom:20px;">
                    <div style="display:flex; flex-direction:column; gap:16px; height:300px;">
                        @foreach(array_slice($data['gallery'], 1, 2) as $img)
                        <div style="position:relative; overflow:hidden; border-radius:4px; background:#e0e0e0; flex:1;">
                            <img src="{{ $img['src'] }}"
                                 alt="{{ $img['alt'] }}"
                                 style="width:100%; height:100%; object-fit:cover;"
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div style="display:none; align-items:center; justify-content:center; height:100%; background:#dde3ea; flex-direction:column;">
                                <i class="fa fa-image" style="font-size:28px; color:#aaa;"></i>
                                <span style="color:#aaa; margin-top:6px; font-size:12px;">{{ $img['caption'] }}</span>
                            </div>
                            <div style="position:absolute; bottom:0; left:0; right:0; background:rgba(0,0,0,0.45); padding:6px 12px;">
                                <span style="color:#fff; font-size:13px;">{{ $img['caption'] }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Bottom row: 3 equal images --}}
            <div class="row">
                @foreach(array_slice($data['gallery'], 2) as $img)
                <div class="col col-md-4" style="margin-bottom:20px;">
                    <div style="position:relative; overflow:hidden; border-radius:4px; background:#e0e0e0; height:200px;">
                        <img src="{{ $img['src'] }}"
                             alt="{{ $img['alt'] }}"
                             style="width:100%; height:100%; object-fit:cover;"
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display:none; align-items:center; justify-content:center; height:100%; background:#dde3ea; flex-direction:column;">
                            <i class="fa fa-image" style="font-size:28px; color:#aaa;"></i>
                            <span style="color:#aaa; margin-top:6px; font-size:12px;">{{ $img['caption'] }}</span>
                        </div>
                        <div style="position:absolute; bottom:0; left:0; right:0; background:rgba(0,0,0,0.45); padding:6px 12px;">
                            <span style="color:#fff; font-size:13px;">{{ $img['caption'] }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ───────────── ACHIEVEMENTS ───────────── --}}
    <section class="section-padding" style="background:#f4f7fb;">
        <div class="container">
            <div class="section-title-s1 text-center">
                <span>Our Pride</span>
                <h2>Achievements & Recognition</h2>
            </div>

            <div class="row" style="margin-top:35px;">
                @foreach($data['achievements'] as $achievement)
                <div class="col col-md-4 col-sm-6" style="margin-bottom:30px;">
                    <div style="background:#fff; border-radius:6px; padding:28px 24px; height:100%; box-shadow:0 2px 12px rgba(0,0,0,0.07); border-top:4px solid var(--main-color);">
                        <div style="display:flex; align-items:center; margin-bottom:14px;">
                            <div style="width:48px; height:48px; background:var(--main-color); border-radius:50%; display:flex; align-items:center; justify-content:center; margin-right:14px; flex-shrink:0;">
                                <i class="fa {{ $achievement['icon'] }}" style="color:#fff; font-size:20px;"></i>
                            </div>
                            <div>
                                <h5 style="margin:0 0 2px; font-size:15px; font-weight:700;">{{ $achievement['title'] }}</h5>
                                <span style="font-size:12px; color:#999;">{{ $achievement['year'] }}</span>
                            </div>
                        </div>
                        <p style="color:#666; font-size:14px; line-height:1.7; margin:0;">{{ $achievement['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ───────────── CHAIRMAN'S STORY ───────────── --}}
    <section class="section-padding">
        <div class="container">
            <div class="section-title-s1 text-center">
                <span>Leadership</span>
                <h2>The Visionary Behind the Institution</h2>
            </div>

            <div class="row" style="margin-top:40px; align-items:center;">
                {{-- Photo column --}}
                <div class="col col-md-4 text-center" style="margin-bottom:30px;">
                    <div style="position:relative; display:inline-block;">
                        <div style="width:220px; height:220px; border-radius:50%; overflow:hidden; margin:0 auto; border:6px solid var(--main-color); background:#e0e0e0; display:flex; align-items:center; justify-content:center;">
                            <img src="{{ $data['chairman']['photo'] }}"
                                 alt="{{ $data['chairman']['name'] }}"
                                 style="width:100%; height:100%; object-fit:cover;"
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div style="display:none; align-items:center; justify-content:center; width:100%; height:100%; flex-direction:column;">
                                <i class="fa fa-user" style="font-size:60px; color:#bbb;"></i>
                            </div>
                        </div>
                        <div style="margin-top:18px;">
                            <h4 style="margin:0 0 4px; font-weight:700;">{{ $data['chairman']['name'] }}</h4>
                            <span style="color:var(--main-color); font-size:14px; font-weight:600;">{{ $data['chairman']['title'] }}</span>
                        </div>
                        <div style="margin-top:16px; background:#f9f9f9; border-left:4px solid var(--main-color); padding:14px 18px; border-radius:0 4px 4px 0; text-align:left;">
                            <i class="fa fa-quote-left" style="color:var(--main-color); margin-right:6px;"></i>
                            <em style="color:#555; font-size:14px;">{{ $data['chairman']['quote'] }}</em>
                        </div>
                    </div>
                </div>

                {{-- Story column --}}
                <div class="col col-md-8" style="margin-bottom:30px;">
                    <div class="section-title-s1">
                        <span>His Journey</span>
                        <h3>From a Classroom Dream to a Legacy of Excellence</h3>
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
