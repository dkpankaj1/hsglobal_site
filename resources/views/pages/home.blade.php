<x-web-layout>

    <!-- start of notices marquee -->
    <section class="home-notice-bar" aria-label="Latest notifications">
        <div class="container">
            <div class="home-notice-inner">
                <span class="notice-label"><i class="fa fa-bullhorn" aria-hidden="true"></i> Notices</span>
                <div class="marquee-wrapper">
                    <marquee behavior="scroll" direction="left" scrollamount="5" onmouseout="this.start();">
                        @foreach($home['notices'] as $notice)
                            <a href="{{ route('notifications.show', $notice['id']) }}"
                                class="notice-item">{{ $notice['title'] }}</a>
                            @if(!$loop->last)
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

    <!-- start of hero -->
    <section class="hero hero-slider-wrapper hero-slider-s1">
        <div class="hero-slider">
            <div class="slide">
                <img src="images/slider/slide-1.jpg" alt class="slider-bg">
                <div class="container">
                    <div class="row">
                        <div class="col col-md-10 col-md-offset-1 slide-caption">
                            <span class="trending"><i class="fa fa-bolt" aria-hidden="true"></i> Trending</span>
                            <h1 class="slide-title">Construction Begins on New Huntington Beach Power Station</h1>
                            <h5 class="slide-subtitle">Industry Segment: Power | 2 min read</h5>
                            <a href="#" class="theme-btn-s1">Read Article</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slide">
                <img src="images/slider/slide-2.jpg" alt class="slider-bg">
                <div class="container">
                    <div class="row">
                        <div class="col col-md-10 col-md-offset-1 slide-caption">
                            <span class="trending"><i class="fa fa-bolt" aria-hidden="true"></i> Trending</span>
                            <h1 class="slide-title">Construction Begins on New Huntington Beach Power Station</h1>
                            <h5 class="slide-subtitle">Industry Segment: Power | 2 min read</h5>
                            <a href="#" class="theme-btn-s1">Read Article</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slide">
                <img src="images/slider/slide-3.jpg" alt class="slider-bg">
                <div class="container">
                    <div class="row">
                        <div class="col col-md-10 col-md-offset-1 slide-caption">
                            <span class="trending"><i class="fa fa-bolt" aria-hidden="true"></i> Trending</span>
                            <h1 class="slide-title">Construction Begins on New Huntington Beach Power Station</h1>
                            <h5 class="slide-subtitle">Industry Segment: Power | 2 min read</h5>
                            <a href="#" class="theme-btn-s1">Read Article</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of hero slider -->

    <!-- start of about school -->
    <section class="section-padding home-about-school">
        <div class="container">
            <div class="row">
                <div class="col col-md-7">
                    <div class="section-title-s1">
                        <span>Welcome To {{ $school['name'] }}</span>
                        <h2>A Future-Ready <span>CBSE School</span> For Holistic Growth</h2>
                    </div>
                    <p>{{ $school['description'] }}</p>
                    <ul class="home-check-list">
                        @foreach($school['highlights'] as $item)
                            <li><i class="fa fa-check-circle" aria-hidden="true"></i> {{ $item }}</li>
                        @endforeach
                    </ul>
                    <a href="{{ route('about.school') }}" class="theme-btn-s1">Know More</a>
                </div>
                <div class="col col-md-5">
                    <div class="home-info-card">
                        <h3>School Info</h3>
                        <ul>
                            <li><strong>Established:</strong> {{ $school['established'] }}</li>
                            <li><strong>Affiliation:</strong> {{ $school['affiliation'] }}</li>
                            <li><strong>Affiliation No:</strong> {{ $school['aff_no'] }}</li>
                            <li><strong>School No:</strong> {{ $school['school_no'] }}</li>
                            <li><strong>Contact:</strong> {{ $school['phone'] }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of about school -->

    <!-- start of key stats -->
    <section class="home-stats section-padding">
        <div class="container">
            <div class="row section-title-s3">
                <div class="col col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <h2>Our School In <span>Numbers</span></h2>
                    <p>Strong academics, dedicated faculty, and consistent outcomes for every learner.</p>
                </div>
            </div>
            <div class="row start-count">
                @foreach($home['stats'] as $stat)
                    <div class="col col-sm-6 col-md-3">
                        <div class="home-stat-card">

                            <h3>
                                @php
                                    $number = preg_replace('/[^0-9]/', '', $stat['number']);
                                    $suffix = preg_replace('/[0-9]/', '', $stat['number']);
                                @endphp
                                <span class="counter" data-count="{{ $number }}" data-duration="2000">00</span>
                                @if($suffix)<span>{{ $suffix }}</span>@endif
                            </h3>
                            <p>{{ $stat['label'] }}</p>

                            <h4>


                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end of key stats -->

    <!-- start of academic programs -->
    <section class="section-padding">
        <div class="container">
            <div class="row section-title-s2">
                <div class="col col-lg-3">
                    <h2><span>Academic</span> Programs</h2>
                </div>
                <div class="col col-lg-7">
                    <p>Age-appropriate and outcome-focused learning paths designed as per CBSE framework.</p>
                </div>
            </div>
            <div class="row">
                @foreach($home['programs'] as $program)
                    <div class="col col-sm-6">
                        <div class="home-program-card">
                            <h3>{{ $program['title'] }}</h3>
                            <p>{{ $program['description'] }}</p>
                            <a href="{{ route($program['route']) }}" class="read-more">Explore Program</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end of academic programs -->

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
                @foreach($home['facilities'] as $facility)
                    <div class="col col-xs-6 col-md-4">
                        <a href="{{ route($facility['route']) }}" class="home-facility-card">
                            <i class="fa {{ $facility['icon'] }}" aria-hidden="true"></i>
                            <span>{{ $facility['title'] }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end of facilities -->

    <!-- start of achievements + cta -->
    <section class="section-padding home-achievement-section">
        <div class="container">
            <div class="row">
                <div class="col col-md-7">
                    <div class="section-title-s1">
                        <span>Recent Achievements</span>
                        <h2>Excellence In <span>Academics & Activities</span></h2>
                    </div>
                    <ul class="home-check-list">
                        @foreach($home['achievements'] as $achievement)
                            <li><i class="fa fa-trophy" aria-hidden="true"></i> {{ $achievement }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="col col-md-5">
                    <div class="home-admission-cta">
                        <h3>Admissions Open</h3>
                        <p>Join {{ $school['name'] }} for session 2026-27. Enquire today for eligibility, documents, and
                            fee details.</p>
                        <a href="{{ route('admission.procedure') }}" class="theme-btn-s1">Admission Procedure</a>
                        <a href="{{ route('contact') }}" class="theme-btn-s2">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of achievements + cta -->

</x-web-layout>