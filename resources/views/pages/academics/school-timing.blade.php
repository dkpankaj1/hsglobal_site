<x-web-layout>

    @include('layouts._web.page-header', [
        'title' => 'School Timing',
        'breadcrumb' => [
            ['label' => 'Academics', 'url' => route('academics.curriculum')],
            ['label' => 'School Timing'],
        ],
    ])

    <section style="padding:50px 0;">
        <div class="container">

            <div class="section-title-s1">
                <span>Academics</span>
                <h2>School Timing</h2>
            </div>
            <p style="font-size:15px; color:#555; max-width:750px; line-height:1.85; margin-bottom:40px;">
                Our school follows a structured daily schedule designed to balance academic learning,
                recreation, and co-curricular activities. Please find the complete timing details below.
            </p>

            {{-- ── Day Schedule Cards ── --}}
            <div class="row" style="margin-bottom:50px;">
                @foreach ($data['schedule'] as $row)
                    @php
                        $isHoliday = $row['type'] === 'holiday';
                        $isHalf = $row['type'] === 'half';
                    @endphp
                    <div class="col col-md-4 col-sm-4" style="margin-bottom:20px;">
                        <div
                            style="border-radius:8px; overflow:hidden; box-shadow:0 3px 16px rgba(0,0,0,0.09);
                                background:#fff; text-align:center;">
                            {{-- Coloured header strip --}}
                            <div
                                style="padding:22px 16px;
                                    background:{{ $isHoliday ? '#e8f5e9' : ($isHalf ? '#fff8e1' : 'var(--theme-main)') }};
                                    color:{{ $isHoliday ? '#388e3c' : ($isHalf ? '#f57c00' : '#fff') }};">
                                <i class="fa {{ $row['icon'] }}"
                                    style="font-size:32px; display:block; margin-bottom:10px;"></i>
                                <strong style="font-size:16px;">{{ $row['day'] }}</strong>
                            </div>
                            {{-- Timing badge --}}
                            <div style="padding:18px 16px;">
                                <span
                                    style="display:inline-block; padding:8px 22px; border-radius:30px; font-size:15px; font-weight:700;
                                         background:{{ $isHoliday ? '#e8f5e9' : ($isHalf ? '#fff8e1' : '#f0f4ff') }};
                                         color:{{ $isHoliday ? '#388e3c' : ($isHalf ? '#f57c00' : 'var(--theme-main)') }};
                                         border:1px solid {{ $isHoliday ? '#a5d6a7' : ($isHalf ? '#ffcc80' : '#c5d3f5') }};">
                                    <i class="fa fa-clock-o" style="margin-right:6px;"></i>
                                    {{ $row['timing'] }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">

                {{-- ── Daily Breakdown Timeline ── --}}
                <div class="col col-md-7" style="margin-bottom:40px;">
                    <h4 style="font-weight:700; color:#222; margin-bottom:22px;">
                        <i class="fa fa-list-ul" style="color:var(--theme-color); margin-right:8px;"></i>
                        Daily Schedule Breakdown
                        <small style="font-size:13px; color:#888; margin-left:8px;">(Mon – Fri)</small>
                    </h4>

                    <div style="position:relative; padding-left:36px;">
                        {{-- Vertical line --}}
                        <div
                            style="position:absolute; left:14px; top:8px; bottom:8px;
                                    width:2px; background:#e0e6ef;">
                        </div>

                        @foreach ($data['daily_breakdown'] as $i => $slot)
                            @php $last = $loop->last; @endphp
                            <div style="position:relative; margin-bottom:{{ $last ? '0' : '20px' }};">
                                {{-- Dot --}}
                                <div
                                    style="position:absolute; left:-28px; top:3px;
                                        width:14px; height:14px; border-radius:50%;
                                        background:var(--theme-color);
                                        border:2px solid #fff;
                                        box-shadow:0 0 0 2px var(--theme-color);">
                                </div>
                                <div
                                    style="background:#f8fafd; border-radius:6px; padding:10px 16px;
                                        border-left:3px solid var(--theme-color);">
                                    <div
                                        style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:6px;">
                                        <span style="font-weight:600; color:#222; font-size:14px;">
                                            <i class="fa {{ $slot['icon'] }}"
                                                style="color:var(--theme-color); margin-right:7px;"></i>
                                            {{ $slot['period'] }}
                                        </span>
                                        <span
                                            style="font-size:13px; color:#666; white-space:nowrap;
                                                 background:#fff; border:1px solid #e0e6ef;
                                                 border-radius:20px; padding:3px 12px;">
                                            {{ $slot['time'] }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- ── Important Notes ── --}}
                <div class="col col-md-5" style="margin-bottom:40px;">
                    <h4 style="font-weight:700; color:#222; margin-bottom:22px;">
                        <i class="fa fa-exclamation-circle" style="color:var(--theme-color); margin-right:8px;"></i>
                        Important Notes
                    </h4>

                    <div
                        style="background:#fff8e1; border-radius:8px; padding:22px 24px;
                                border-left:4px solid #f9a825;">
                        <ul style="margin:0; padding:0; list-style:none;">
                            @foreach ($data['notes'] as $note)
                                <li
                                    style="display:flex; align-items:flex-start; margin-bottom:16px; font-size:14px; color:#555; line-height:1.7;">
                                    <i class="fa fa-dot-circle-o"
                                        style="color:#f9a825; margin-right:10px; margin-top:3px; flex-shrink:0;"></i>
                                    {{ $note }}
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Contact strip --}}
                    <div
                        style="margin-top:22px; background:var(--theme-color); color:#fff;
                                border-radius:8px; padding:18px 22px; display:flex;
                                align-items:center; gap:14px;">
                        <i class="fa fa-phone" style="font-size:24px; flex-shrink:0;"></i>
                        <div>
                            <strong style="display:block; font-size:14px; margin-bottom:3px;">Need Help?</strong>
                            <span style="font-size:13px; opacity:0.9;">
                                Contact the school office for queries regarding timing or attendance.
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</x-web-layout>
