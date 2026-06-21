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
                        <h2>{{ $data->school_name }}</h2>
                    </div>
                    <p>{{ $data->description }}</p>

                    <div class="row" style="margin-top:20px;">
                        <div class="col col-sm-6">
                            <ul class="about-details" style="list-style:none; padding:0;">
                                <li><strong>Established:</strong> {{ $data->established_year }}</li>
                                <li><strong>Affiliation:</strong> {{ $data->affiliation }}</li>
                                <li><strong>Aff. No.:</strong> {{ $data->affiliation_no }}</li>
                            </ul>
                        </div>
                        <div class="col col-sm-6">
                            <ul class="about-details" style="list-style:none; padding:0;">
                                <li><strong>Phone:</strong> {{ $setting->contact_phone }}</li>
                                <li><strong>Email:</strong> {{ $setting->contact_email }}</li>
                                <li><strong>Address:</strong> {{ $setting->contact_address }}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col col-md-5">
                    <img src="{{ $data->about_image_url }}" alt="About {{ $data->school_name }}"
                        class="img img-responsive" style="border-radius:4px; width:100%;">
                </div>
            </div>

            <div style="margin-top:28px;">
                <h4 style="font-weight:700; margin-bottom:14px;">Our Highlights</h4>
                <ul style="list-style:none; padding:0; margin:0; display:flex; flex-wrap:wrap; gap:10px;">
                    @foreach ($data->highlights as $highlight)
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
                        {{ $data->long_description }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ───────────── ACHIEVEMENTS ───────────── --}}
    @if ($data->achievements)
        <section class="section-padding">
            <div class="container">
                <div class="section-title-s1 text-center">
                    <span>Milestones</span>
                    <h2>Our Achievements</h2>
                </div>

                <div class="row" style="margin-top:30px; display:flex; flex-wrap:wrap;">
                    @foreach ($data->achievements as $achievement)
                        <div class="col col-sm-6 col-md-4" style="margin-bottom:25px; display:flex;">
                            <div
                                style="background:#fff; border-radius:10px; padding:28px 22px; box-shadow:0 2px 12px rgba(0,0,0,.08); width:100%; text-align:center; display:flex; flex-direction:column; align-items:center;">
                                <i class="fa {{ $achievement['icon'] }} fa-2x"
                                    style="color:var(--main-color); margin-bottom:14px;"></i>
                                <h4 style="font-weight:700; margin-bottom:8px;">{{ $achievement['title'] }}</h4>
                                <p style="color:#666; font-size:14px; line-height:1.6; flex:1;">
                                    {{ $achievement['desc'] }}</p>
                                <span
                                    style="display:inline-block; margin-top:12px; background:var(--main-color); color:#fff; padding:3px 14px; border-radius:12px; font-size:12px; font-weight:600;">
                                    {{ $achievement['year'] }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ───────────── CHAIRMAN'S STORY ───────────── --}}
    @if ($chairman)
        <section class="section-padding" style="background:#f9f9f9;">
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
                                <img src="{{ $chairman->photo_url }}" alt="{{ $chairman->name }}"
                                    style="width:100%; height:100%; object-fit:cover;"
                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div
                                    style="display:none; align-items:center; justify-content:center; width:100%; height:100%; flex-direction:column;">
                                    <i class="fa fa-user" style="font-size:60px; color:#bbb;"></i>
                                </div>
                            </div>
                            <div style="margin-top:18px;">
                                <h4 style="margin:0 0 4px; font-weight:700;">{{ $chairman->name }}</h4>
                                <span style="color:var(--main-color); font-size:14px; font-weight:600;">Director</span>
                            </div>
                        </div>
                    </div>

                    {{-- Message column --}}
                    <div class="col col-md-8" style="margin-bottom:30px;">
                        <div class="section-title-s1">
                            <span>His Journey</span>
                            <h3>A Vision to Transform Education in Kushinagar</h3>
                        </div>
                        @if ($chairman->short_description)
                            <p style="color:#555; font-size:15px; line-height:1.9; margin-top:16px;">
                                {{ $chairman->short_description }}
                            </p>
                        @endif

                        <div style="margin-top:28px; background:#f4f7fb; border-radius:6px; padding:22px 26px;">
                            <h5 style="margin:0 0 10px; font-weight:700; color:#333;">
                                <i class="fa fa-comment-o" style="color:var(--main-color); margin-right:8px;"></i>
                                Message from the Chairman
                            </h5>
                            <p style="color:#555; font-size:14px; line-height:1.8; margin:0; font-style:italic;">
                                "{{ $chairman->message }}"
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

</x-web-layout>
