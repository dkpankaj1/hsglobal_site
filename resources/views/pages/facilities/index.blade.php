{{-- Facilities listing page --}}
<x-web-layout>

    @include('layouts._web.page-header', [
        'title' => 'Our Facilities',
        'breadcrumb' => [['label' => 'Facilities']],
    ])

    <section style="padding: 50px 0;">
        <div class="container">
            <div class="section-title-s1 text-center">
                <span>Campus Infrastructure</span>
                <h2>Explore Our <span>World-Class Facilities</span></h2>
                <p style="max-width:700px;margin:0 auto;color:#666;font-size:15px;line-height:1.8;">
                    A secure and vibrant campus environment supporting academics, technology, sports, and holistic
                    development.
                </p>
            </div>

            <div class="row" style="margin-top:30px;">
                @forelse ($facilities as $facility)
                    <div class="col col-md-6 col-lg-4" style="margin-bottom:24px;">
                        <a href="{{ $facility->route }}" class="facility-card-link"
                            style="display:block; text-decoration:none; color:inherit;">
                            <div class="facility-listing-card"
                                style="background:#fff; border:1px solid #e7edf7; border-radius:10px; overflow:hidden; box-shadow:0 2px 12px rgba(0,0,0,0.04); transition: transform 0.2s, box-shadow 0.2s; height:100%;">
                                <div style="height:180px; overflow:hidden; background:#f0f2f5;">
                                    <img src="{{ $facility->thumbnail_url }}" alt="{{ $facility->name }}"
                                        style="width:100%; height:100%; object-fit:cover; transition:transform 0.3s;"
                                        onerror="this.src='{{ asset('static/images/facilities_1.jpg') }}'">
                                </div>
                                <div style="padding:18px 16px;">
                                    <h4 style="margin:0 0 8px; font-size:17px; font-weight:700; color:#243b6b;">
                                        {{ $facility->name }}
                                    </h4>
                                    <p
                                        style="margin:0 0 10px; font-size:13px; color:#666; line-height:1.7; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;">
                                        {{ $facility->sort_description }}
                                    </p>

                                    @if ($facility->highlights)
                                        <div style="display:flex; flex-wrap:wrap; gap:5px;">
                                            @foreach (array_slice($facility->highlights, 0, 3) as $hl)
                                                <span
                                                    style="display:inline-block; background:#eef3ff; color:#4a6fa5; font-size:11px; padding:3px 8px; border-radius:12px; white-space:nowrap;">
                                                    {{ $hl }}
                                                </span>
                                            @endforeach
                                            @if (count($facility->highlights) > 3)
                                                <span
                                                    style="display:inline-block; color:#999; font-size:11px; padding:3px 0;">
                                                    +{{ count($facility->highlights) - 3 }} more
                                                </span>
                                            @endif
                                        </div>
                                    @endif

                                    <div
                                        style="margin-top:10px; display:flex; align-items:center; gap:6px; color:var(--theme-main, #243b6b); font-weight:600; font-size:13px;">
                                        <span>Learn More</span>
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12">
                        <div
                            style="text-align:center; padding:60px 20px; background:#f9fafc; border-radius:10px; border:1px dashed #d0d7e2;">
                            <i class="fa fa-building-o"
                                style="font-size:3rem; color:#c5cdd8; display:block; margin-bottom:16px;"></i>
                            <h4 style="color:#888;">No facilities listed yet</h4>
                            <p style="color:#aaa; font-size:14px;">Please check back soon for updates on our campus
                                infrastructure.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            {{-- CTA --}}
            <div
                style="margin-top:40px; text-align:center; background:#f4f8ff; border:1px solid #dfe9fb; border-radius:10px; padding:30px 20px;">
                <h4 style="margin:0 0 8px; color:#243b6b; font-weight:700;">Want to see our campus in person?</h4>
                <p style="margin:0 0 16px; color:#666; font-size:14px;">Schedule a campus visit and explore our
                    facilities firsthand.</p>
                <a href="{{ route('contact') }}" class="btn theme-btn-s1">
                    <i class="fa fa-calendar" style="margin-right:6px;"></i> Contact Us
                </a>
            </div>
        </div>
    </section>

    @push('pageStyles')
        <style>
            .facility-listing-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1) !important;
            }

            .facility-listing-card:hover img {
                transform: scale(1.05);
            }
        </style>
    @endpush

</x-web-layout>
