{{-- Dynamic view for database-driven Facility pages --}}
<x-web-layout>

    @include('layouts._web.page-header', [
        'title' => $facility->name,
        'breadcrumb' => [
            ['label' => 'Facilities', 'url' => route('facilities.infrastructure')],
            ['label' => $facility->name],
        ],
    ])

    <section style="padding: 50px 0;">
        <div class="container">
            <div class="section-title-s1">
                <span>Facilities</span>
                <h2><span>{{ $facility->name }}</span></h2>
            </div>
            <div style="font-size:15px; color:#555; max-width:860px; line-height:1.85; margin-bottom:34px;">
                {!! $facility->description ?: e($facility->sort_description) !!}
            </div>

            <div class="row" style="margin-top:8px; display:flex; flex-wrap:wrap;">
                <div class="col col-md-8" style="margin-bottom:26px;">
                    @if ($facility->highlights)
                        <div
                            style="background:#fff; border:1px solid #e7edf7; border-radius:8px; box-shadow:0 2px 10px rgba(0,0,0,0.05); overflow:hidden;">
                            <div style="background:#f7faff; border-bottom:1px solid #e2eaf8; padding:13px 18px;">
                                <h4 style="margin:0; font-size:17px; font-weight:700; color:#243b6b;">
                                    <i class="fa fa-check-square-o"
                                        style="color:var(--theme-main); margin-right:7px;"></i>
                                    Key Features
                                </h4>
                            </div>

                            <div class="row" style="padding:10px 8px 4px;">
                                @foreach ($facility->highlights as $index => $item)
                                    <div class="col col-md-6" style="margin-bottom:10px;">
                                        <div style="display:flex; gap:10px; align-items:flex-start; padding:8px 10px;">
                                            <span
                                                style="width:24px; height:24px; border-radius:50%; background:#eef3ff; border:1px solid #c9d8f6; color:var(--theme-main); font-size:12px; font-weight:700; display:flex; align-items:center; justify-content:center; flex-shrink:0; margin-top:1px;">
                                                {{ $index + 1 }}
                                            </span>
                                            <p style="margin:0; font-size:14px; color:#555; line-height:1.7;">
                                                {{ $item }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div
                            style="background:#fff; border:1px solid #e7edf7; border-radius:8px; padding:40px 20px; text-align:center;">
                            <p style="margin:0; font-size:14px; color:#999;">
                                {{ $facility->description ?? 'Detailed information coming soon.' }}
                            </p>
                        </div>
                    @endif
                </div>

                <div class="col col-md-4" style="margin-bottom:26px;">
                    <div
                        style="background:#f4f8ff; border:1px solid #dfe9fb; border-radius:8px; padding:22px 20px; text-align:center; margin-bottom:12px;">
                        <img src="{{ $facility->thumbnail_url }}" alt="{{ $facility->name }}"
                            style="max-width:100%; border-radius:6px; margin-bottom:12px;">
                        <h5 style="margin:0 0 5px; font-weight:700; color:#243b6b;">{{ $facility->name }}</h5>
                        <p style="margin:0; font-size:13px; color:#666; line-height:1.7;">
                            Enhanced infrastructure and student-focused environment designed for better learning
                            outcomes.
                        </p>
                    </div>

                    <div style="background:#fffbea; border:1px solid #ffe082; border-radius:8px; padding:14px 16px;">
                        <p style="margin:0; font-size:13px; color:#666; line-height:1.75;">
                            <i class="fa fa-info-circle" style="margin-right:6px; color:#f9a825;"></i>
                            Facilities are periodically upgraded as per school safety and quality standards.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Back to all facilities --}}
            <div style="margin-top:24px; text-align:center;">
                <a href="{{ route('facilities.infrastructure') }}" class="btn theme-btn-s2">
                    <i class="fa fa-arrow-left" style="margin-right:6px;"></i> All Facilities
                </a>
            </div>
        </div>
    </section>

</x-web-layout>
