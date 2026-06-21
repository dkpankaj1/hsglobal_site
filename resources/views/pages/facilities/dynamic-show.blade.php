{{-- Database-driven Facility detail page --}}
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
            <div class="row">
                {{-- Main content --}}
                <div class="col col-md-8">
                    <div class="section-title-s1">
                        <span>Facility</span>
                        <h2>{{ $facility->name }}</h2>
                    </div>

                    {{-- Thumbnail --}}
                    <div
                        style="margin-bottom:24px; border-radius:8px; overflow:hidden; box-shadow:0 2px 12px rgba(0,0,0,0.06);">
                        <img src="{{ $facility->thumbnail_url }}" alt="{{ $facility->name }}"
                            style="width:100%; max-height:380px; object-fit:cover;"
                            onerror="this.src='{{ asset('static/images/facilities_1.jpg') }}'">
                    </div>

                    {{-- Description --}}
                    <div style="font-size:15px; color:#555; line-height:1.85; margin-bottom:28px;">
                        {!! $facility->description ?: e($facility->sort_description) !!}
                    </div>

                    {{-- Highlights --}}
                    @if ($facility->highlights)
                        <div
                            style="background:#fff; border:1px solid #e7edf7; border-radius:8px; box-shadow:0 2px 10px rgba(0,0,0,0.04); overflow:hidden; margin-bottom:28px;">
                            <div style="background:#f7faff; border-bottom:1px solid #e2eaf8; padding:14px 20px;">
                                <h4 style="margin:0; font-size:17px; font-weight:700; color:#243b6b;">
                                    <i class="fa fa-check-square-o"
                                        style="color:var(--theme-main); margin-right:8px;"></i>
                                    Key Features
                                </h4>
                            </div>
                            <div class="row" style="padding:16px 12px 8px;">
                                @foreach ($facility->highlights as $index => $item)
                                    <div class="col col-md-6" style="margin-bottom:12px;">
                                        <div style="display:flex; gap:10px; align-items:flex-start; padding:6px 8px;">
                                            <span
                                                style="width:26px; height:26px; border-radius:50%; background:#eef3ff; border:1px solid #c9d8f6; color:var(--theme-main); font-size:12px; font-weight:700; display:flex; align-items:center; justify-content:center; flex-shrink:0; margin-top:1px;">
                                                {{ $index + 1 }}
                                            </span>
                                            <p style="margin:0; font-size:14px; color:#555; line-height:1.7;">
                                                {{ $item }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Back link --}}
                    <div style="margin-top:10px;">
                        <a href="{{ route('facilities.infrastructure') }}" class="btn theme-btn-s2">
                            <i class="fa fa-arrow-left" style="margin-right:6px;"></i> All Facilities
                        </a>
                    </div>
                </div>

                {{-- Sidebar --}}
                <div class="col col-md-4">
                    {{-- Info card --}}
                    <div
                        style="background:#f4f8ff; border:1px solid #dfe9fb; border-radius:8px; padding:22px 20px; text-align:center; margin-bottom:16px;">
                        <i class="fa fa-building"
                            style="font-size:50px; color:var(--theme-main); opacity:0.2; margin-bottom:10px;"></i>
                        <h5 style="margin:0 0 6px; font-weight:700; color:#243b6b;">{{ $facility->name }}</h5>
                        <p style="margin:0; font-size:13px; color:#666; line-height:1.7;">
                            {{ $facility->sort_description }}
                        </p>
                    </div>

                    {{-- Other facilities --}}
                    @if ($allFacilities->count() > 1)
                        <div
                            style="background:#fff; border:1px solid #e7edf7; border-radius:8px; padding:0; overflow:hidden;">
                            <div style="background:#f7faff; border-bottom:1px solid #e2eaf8; padding:12px 16px;">
                                <h5 style="margin:0; font-size:15px; font-weight:700; color:#243b6b;">
                                    <i class="fa fa-list-ul" style="color:var(--theme-main); margin-right:7px;"></i>
                                    Other Facilities
                                </h5>
                            </div>
                            <ul style="list-style:none; padding:0; margin:0;">
                                @foreach ($allFacilities as $item)
                                    <li style="border-bottom:1px solid #f0f3f8;">
                                        <a href="{{ $item->route }}"
                                            style="display:flex; align-items:center; gap:10px; padding:12px 16px; text-decoration:none; color:#444; font-size:14px; transition:background 0.15s; {{ $item->id === $facility->id ? 'background:#eef3ff; font-weight:600; color:#243b6b;' : '' }}">
                                            <img src="{{ $item->thumbnail_url }}" alt="{{ $item->name }}"
                                                style="width:40px; height:40px; border-radius:6px; object-fit:cover; flex-shrink:0;"
                                                onerror="this.src='{{ asset('static/images/facilities_1.jpg') }}'">
                                            <span>{{ $item->name }}</span>
                                            @if ($item->id === $facility->id)
                                                <i class="fa fa-chevron-right"
                                                    style="margin-left:auto; font-size:11px; color:var(--theme-main);"></i>
                                            @endif
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Info note --}}
                    <div
                        style="background:#fffbea; border:1px solid #ffe082; border-radius:8px; padding:14px 16px; margin-top:16px;">
                        <p style="margin:0; font-size:13px; color:#666; line-height:1.75;">
                            <i class="fa fa-info-circle" style="margin-right:6px; color:#f9a825;"></i>
                            Facilities are periodically upgraded as per school safety and quality standards.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-web-layout>
