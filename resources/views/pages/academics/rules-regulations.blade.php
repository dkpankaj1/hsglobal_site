<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'Rules & Regulations',
        'breadcrumb' => [
            ['label' => 'Academics',           'url' => route('academics.curriculum')],
            ['label' => 'Rules & Regulations'],
        ],
    ])

    <section style="padding:50px 0;">
        <div class="container">

            <div class="section-title-s1">
                <span>Academics</span>
                <h2>Rules &amp; Regulations</h2>
            </div>
            <p style="font-size:15px; color:#555; max-width:780px; line-height:1.85; margin-bottom:44px;">
                H.S. Global Academy maintains a disciplined and respectful environment for all students and staff.
                The following rules are to be observed by every student on and off campus.
            </p>

            {{-- ── Section panels ── --}}
            @php
                $sections = [
                    'general' => [
                        'heading' => 'General Rules',
                        'icon'    => 'fa-list-alt',
                        'accent'  => 'var(--theme-main)',
                        'light'   => '#f0f4ff',
                        'border'  => '#c5d3f5',
                    ],
                    'discipline' => [
                        'heading' => 'Discipline',
                        'icon'    => 'fa-shield',
                        'accent'  => '#c0392b',
                        'light'   => '#fff5f5',
                        'border'  => '#f5c6cb',
                    ],
                    'attendance' => [
                        'heading' => 'Attendance',
                        'icon'    => 'fa-calendar-check-o',
                        'accent'  => '#27ae60',
                        'light'   => '#f0fff4',
                        'border'  => '#b2dfdb',
                    ],
                ];
            @endphp

            <div class="row" style="display:flex; flex-wrap:wrap;">
                @foreach($sections as $key => $meta)
                <div class="col col-md-4 col-sm-6" style="margin-bottom:30px; display:flex; flex-direction:column;">
                    <div style="border-radius:8px; overflow:hidden;
                                box-shadow:0 3px 16px rgba(0,0,0,0.08); flex:1; display:flex; flex-direction:column;">

                        {{-- Coloured header --}}
                        <div style="background:{{ $meta['accent'] }}; padding:20px 24px;
                                    display:flex; align-items:center; gap:14px;">
                            <div style="width:44px; height:44px; border-radius:50%;
                                        background:rgba(255,255,255,0.2);
                                        display:flex; align-items:center; justify-content:center;
                                        flex-shrink:0;">
                                <i class="fa {{ $meta['icon'] }}" style="font-size:20px; color:#fff;"></i>
                            </div>
                            <h4 style="margin:0; color:#fff; font-size:17px; font-weight:700;">
                                {{ $meta['heading'] }}
                            </h4>
                        </div>

                        {{-- Rule rows --}}
                        <div style="background:#fff; padding:10px 0; flex:1;">
                            @foreach($data[$key] as $n => $rule)
                            <div style="display:flex; align-items:flex-start; gap:14px;
                                        padding:13px 22px;
                                        border-bottom:{{ !$loop->last ? '1px solid #f0f0f0' : 'none' }};">
                                <span style="width:26px; height:26px; border-radius:50%;
                                             background:{{ $meta['light'] }};
                                             border:1px solid {{ $meta['border'] }};
                                             color:{{ $meta['accent'] }};
                                             font-size:12px; font-weight:700;
                                             display:flex; align-items:center; justify-content:center;
                                             flex-shrink:0; margin-top:1px;">
                                    {{ $n + 1 }}
                                </span>
                                <p style="margin:0; font-size:14px; color:#555; line-height:1.7;">
                                    {{ $rule }}
                                </p>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
                @endforeach
            </div>

            {{-- ── Bottom notice strip ── --}}
            <div style="margin-top:14px; background:#fffbea; border:1px solid #ffe082;
                        border-radius:8px; padding:18px 24px; display:flex;
                        align-items:flex-start; gap:14px;">
                <i class="fa fa-exclamation-triangle" style="color:#f9a825; font-size:22px; margin-top:2px; flex-shrink:0;"></i>
                <p style="margin:0; font-size:14px; color:#555; line-height:1.75;">
                    <strong>Note:</strong> Repeated violation of any of the above rules may result in disciplinary action,
                    including suspension or expulsion as per the school's conduct policy. Parents are requested to
                    review these rules with their ward at the beginning of each academic year.
                </p>
            </div>

        </div>
    </section>

</x-web-layout>

