{{-- Shared view for all Facilities pages --}}
<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => $data['title'],
        'breadcrumb' => [
            ['label' => 'Facilities', 'url' => route('facilities.infrastructure')],
            ['label' => $data['title']],
        ],
    ])

    <section style="padding: 50px 0;">
        <div class="container">
            <div class="section-title-s1">
                <span>Facilities</span>
                <h2><span>{{ $data['title'] }}</span></h2>
            </div>
            <p style="font-size:15px; color:#555; max-width:860px; line-height:1.85; margin-bottom:34px;">
                {{ $data['description'] }}
            </p>

            <div class="row" style="margin-top:8px; display:flex; flex-wrap:wrap;">
                <div class="col col-md-8" style="margin-bottom:26px;">
                    <div style="background:#fff; border:1px solid #e7edf7; border-radius:8px; box-shadow:0 2px 10px rgba(0,0,0,0.05); overflow:hidden;">
                        <div style="background:#f7faff; border-bottom:1px solid #e2eaf8; padding:13px 18px;">
                            <h4 style="margin:0; font-size:17px; font-weight:700; color:#243b6b;">
                                <i class="fa fa-check-square-o" style="color:var(--theme-main); margin-right:7px;"></i>
                                Key Features
                            </h4>
                        </div>

                        <div class="row" style="padding:10px 8px 4px;">
                            @foreach($data['highlights'] as $index => $item)
                            <div class="col col-md-6" style="margin-bottom:10px;">
                                <div style="display:flex; gap:10px; align-items:flex-start; padding:8px 10px;">
                                    <span style="width:24px; height:24px; border-radius:50%; background:#eef3ff; border:1px solid #c9d8f6; color:var(--theme-main); font-size:12px; font-weight:700; display:flex; align-items:center; justify-content:center; flex-shrink:0; margin-top:1px;">
                                        {{ $index + 1 }}
                                    </span>
                                    <p style="margin:0; font-size:14px; color:#555; line-height:1.7;">{{ $item }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col col-md-4" style="margin-bottom:26px;">
                    <div style="background:#f4f8ff; border:1px solid #dfe9fb; border-radius:8px; padding:22px 20px; text-align:center; margin-bottom:12px;">
                        <i class="fa {{ $data['icon'] }}" style="font-size:70px; color:var(--theme-main); opacity:0.22; margin-bottom:10px;"></i>
                        <h5 style="margin:0 0 5px; font-weight:700; color:#243b6b;">{{ $data['title'] }}</h5>
                        <p style="margin:0; font-size:13px; color:#666; line-height:1.7;">
                            Enhanced infrastructure and student-focused environment designed for better learning outcomes.
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

            <div style="margin-top:8px;">
                <h4 style="margin:0 0 18px; color:#243b6b; font-weight:700;">
                    <i class="fa fa-picture-o" style="color:var(--theme-main); margin-right:7px;"></i>
                    Facility Gallery (Placeholders)
                </h4>

                <div class="row" style="display:flex; flex-wrap:wrap;">
                    <div class="col col-md-6" style="margin-bottom:16px;">
                        <div style="height:260px; border:2px dashed #c9d8f6; border-radius:8px; background:#f7faff; display:flex; align-items:center; justify-content:center; text-align:center; padding:16px;">
                            <div>
                                <i class="fa fa-image" style="font-size:34px; color:var(--theme-main); opacity:0.55;"></i>
                                <p style="margin:10px 0 3px; font-size:14px; color:#4d5f87; font-weight:600;">Image Placeholder 01</p>
                                <span style="font-size:12px; color:#8fa0be;">Recommended: 1200 x 800</span>
                            </div>
                        </div>
                    </div>

                    <div class="col col-md-6" style="margin-bottom:16px;">
                        <div class="row" style="display:flex; flex-wrap:wrap;">
                            @for($i = 2; $i <= 5; $i++)
                            <div class="col col-md-6 col-sm-6" style="margin-bottom:16px;">
                                <div style="height:122px; border:2px dashed #c9d8f6; border-radius:8px; background:#f7faff; display:flex; align-items:center; justify-content:center; text-align:center; padding:10px;">
                                    <div>
                                        <i class="fa fa-image" style="font-size:24px; color:var(--theme-main); opacity:0.55;"></i>
                                        <p style="margin:6px 0 1px; font-size:13px; color:#4d5f87; font-weight:600;">Placeholder {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</p>
                                        <span style="font-size:11px; color:#8fa0be;">800 x 600</span>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-web-layout>
