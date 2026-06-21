<x-web-layout>

    @push('pageStyles')
        <link href="{{ asset('assets/web/css/home-hero-slider.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/web/css/home-facilities.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/web/css/home-authorities.css') }}" rel="stylesheet">
    @endpush

    @push('pageScripts')
        <script src="{{ asset('assets/web/js/home-hero-slider.js') }}"></script>
        @if ($importantNotice->enabled)
            <script>
                $(window).on('load', function() {
                    $('#homePopupModal').modal('show');
                });
            </script>
        @endif
    @endpush

    <!-- start of notices marquee -->
    <section class="home-notice-bar" aria-label="Latest notifications">
        <div class="container">
            <div class="home-notice-inner">
                <span class="notice-label"><i class="fa fa-bullhorn" aria-hidden="true"></i> Notices</span>
                <div class="marquee-wrapper">
                    <marquee behavior="scroll" direction="left" scrollamount="5" onmouseout="this.start();">
                        @foreach ($home['notices'] as $notice)
                            <a href="{{ route('notifications.show', $notice['id']) }}"
                                class="notice-item">{{ $notice['title'] }}</a>
                            @if (!$loop->last)
                                <span class="notice-separator"><i class="fa fa-circle" aria-hidden="true"></i></span>
                            @endif
                        @endforeach
                    </marquee>
                </div>
                <a href="{{ route('notifications.list') }}" class="view-all-notifications">
                    View All <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </section>
    <!-- end of notices marquee -->

    <x-web.hero-slider :slides="$heroSlides" :autoplay-ms="5000" />

    <section class="about-us " style="padding: 3rem;">
        <div class="container">
            <div class="row">
                <div class="col col-md-6">
                    <div class="section-title-s1">
                        <span>Welcome To {{ $school->school_name }}</span>
                        <h2>A Future-Ready CBSE School For Holistic Growth</h2>
                    </div>
                    <div class="about-details">
                        <p>{{ $school->description }}</p>
                        <ul class="home-check-list">
                            @foreach ($school->highlights as $item)
                                <li><i class="fa fa-check-circle" aria-hidden="true"></i> {{ $item }}</li>
                            @endforeach
                        </ul>
                        <a href="{{ route('about.school') }}" class="btn theme-btn-s2">Know More</a>
                    </div>
                </div>
                <div class="col col-md-6 ">
                    <div class="img-holder">
                        <img src="{{ $school->about_image_url }}" alt="{{ $school->school_name }}"
                            class="img img-responsive">
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end of about school -->

    <!-- start of key stats -->
    <section class="home-stats" style="padding:3rem;">
        <div class="container">
            <div class="row section-title-s3">
                <div class="col col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <h2>Our School In <span>Numbers</span></h2>
                    <p>Strong academics, dedicated faculty, and consistent outcomes for every learner.</p>
                </div>
            </div>
            <div class="row start-count">
                @foreach ($stats as $stat)
                    <div class="col col-sm-6 col-md-3">
                        <div class="home-stat-card">
                            <h3>
                                <span class="counter" data-count="{{ $stat->value }}" data-duration="2000">00</span>
                                @if ($stat->suffix)
                                    <span>{{ $stat->suffix }}</span>
                                @endif
                            </h3>
                            <p>{{ $stat->label }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end of key stats -->

    <section class="home-authorities section-padding">
        <div class="container">
            <div class="row section-title-s3">
                <div class="col col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <h2>School <span>Authorities</span></h2>
                    <p>Meet the leadership team guiding academic excellence, discipline, and the long-term vision of the
                        school.</p>
                </div>
            </div>

            <div class="row home-authority-grid">
                @foreach ($authorities as $authority)
                    <div class="col col-sm-6 col-md-4">
                        <article class="home-authority-card">
                            <div class="home-authority-photo">
                                <img src="{{ $authority->photo_url }}" alt="{{ $authority->name }}"
                                    class="img-responsive">
                            </div>

                            <div class="home-authority-content">
                                <h3>{{ $authority->name }}</h3>
                                <span class="home-authority-divider"></span>
                                <h4>{{ ucfirst($authority->role) }}</h4>
                                <p>{{ $authority->short_description }}</p>
                                <a href="{{ route('about.' . $authority->role) }}" class="home-authority-link">
                                    Read More! <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- start of facilities -->
    <section class="section-padding home-facilities">
        <div class="container">
            <div class="row section-title-s3">
                <div class="col col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <h2>Campus <span>Facilities</span></h2>
                    <p>A secure and vibrant campus environment supporting academics, technology, and sports.</p>
                </div>
            </div>
            <div class="row home-facility-grid">
                @forelse ($facilities as $facility)
                    <div class="col col-sm-6 col-md-4">
                        <a href="{{ $facility->route }}" class="home-facility-card">
                            <div class="home-facility-media">
                                <img src="{{ $facility->thumbnail_url }}" alt="{{ $facility->name }}">
                            </div>
                            <div class="home-facility-body">
                                <h3>{{ $facility->name }}</h3>
                                <p>{{ $facility->sort_description }}</p>
                            </div>
                        </a>
                    </div>
                @empty
                    @foreach ($home['facilities'] as $facility)
                        <div class="col col-sm-6 col-md-4">
                            <a href="{{ route($facility['route']) }}" class="home-facility-card">
                                <div class="home-facility-media">
                                    <img src="{{ $facility['image'] }}" alt="{{ $facility['title'] }}">
                                </div>
                                <div class="home-facility-body">
                                    <h3>{{ $facility['title'] }}</h3>
                                    <p>{{ $facility['description'] }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endforelse
            </div>
        </div>
    </section>
    <!-- end of facilities -->

    <!-- start of achievements + cta -->
    @if ($admission_setting->is_open)
        <section>
            <div class="home-admission-cta">
                <div class="container">
                    <h3>Admissions Open</h3>
                    <p>{{ $admission_setting->cta_text ?: 'Join ' . $school->school_name . ' for session ' . ($admission_setting->academic_year ?: '2026-27') . '. Enquire today for eligibility, documents, and fee details.' }}
                    </p>
                    <a href="{{ route('admission.procedure') }}" class="theme-btn-s1">Admission Procedure</a>
                    <a href="{{ route('contact') }}" class="theme-btn-s2">Contact Us</a>
                </div>
            </div>
        </section>
    @endif

    <section class="section-padding home-achievement-section" style="background:#f9f9f9;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title-s1">
                        <span>Recent Achievements</span>
                        <h2>Excellence In Academics & Activities</h2>
                    </div>
                    <div class="row" style="margin-top:20px;">
                        @foreach ($school->achievements as $achievement)
                            <div class="col col-sm-6" style="margin-bottom:18px;">
                                <div
                                    style="background:#fff; border-radius:8px; padding:18px 16px; box-shadow:0 1px 8px rgba(0,0,0,.06); display:flex; align-items:flex-start; gap:14px; height:100%;">
                                    <div
                                        style="flex-shrink:0; width:42px; height:42px; border-radius:50%; background:var(--theme-main); display:flex; align-items:center; justify-content:center;">
                                        <i class="fa {{ $achievement['icon'] }}"
                                            style="color:#fff; font-size:16px;"></i>
                                    </div>
                                    <div>
                                        <h5 style="margin:0 0 4px; font-weight:700; font-size:15px;">
                                            {{ $achievement['title'] }}</h5>
                                        <p style="margin:0; color:#777; font-size:13px; line-height:1.5;">
                                            {{ $achievement['desc'] }}</p>
                                        <span
                                            style="display:inline-block; margin-top:6px; font-size:11px; color:var(--theme-main); font-weight:600;">
                                            {{ $achievement['year'] }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of achievements + cta -->

    @if ($importantNotice->enabled)
        <div class="modal fade home-popup-modal" id="homePopupModal" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5 home-popup-media">
                                <img src="{{ $importantNotice->banner_url }}" alt="{{ $importantNotice->title }}">
                            </div>
                            <div class="col-md-7">
                                <div class="home-popup-body">
                                    <div class="section-title-s1" style="margin-bottom:12px;">
                                        <span>Important Notice</span>
                                        <h2>{{ $importantNotice->heading }}</h2>
                                    </div>

                                    <h3>{{ $importantNotice->title }}</h3>
                                    <p>{{ $importantNotice->description }}</p>
                                    @isset($importantNotice->action)
                                        <hr>
                                        <a href="{{ $importantNotice->action }}" class="btn theme-btn-s2">
                                            Process
                                        </a>
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</x-web-layout>
