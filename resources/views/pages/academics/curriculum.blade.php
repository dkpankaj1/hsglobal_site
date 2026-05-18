<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'Curriculum',
        'breadcrumb' => [
            ['label' => 'Academics', 'url' => route('academics.curriculum')],
            ['label' => 'Curriculum'],
        ],
    ])

    {{-- ------------- CBSE CURRICULUM � TAB DESIGN ------------- --}}
    <section style="padding:50px 0;">
        <div class="container">
            <div class="section-title-s1">
                <span>Academics</span>
                <h2>Our Curriculum</h2>
            </div>
            <p style="font-size:15px; color:#555; max-width:820px; line-height:1.85; margin-bottom:34px;">
                We follow the <strong>CBSE curriculum</strong> designed to provide a balanced education across all levels � from early childhood to senior secondary. Each stage is thoughtfully structured to build conceptual clarity, critical thinking, and lifelong learning habits.
            </p>

            {{-- Curriculum table --}}
            <div class="table-responsive" style="border-radius:6px; overflow:hidden; box-shadow:0 2px 14px rgba(0,0,0,0.08);">
                <table class="table" style="margin:0; background:#fff; font-size:14px;">
                    <thead>
                        <tr style="background:var(--theme-main); color:#fff;">
                            <th style="padding:14px 20px; font-size:14px; font-weight:700; width:200px; border:none;">
                                <i class="fa fa-graduation-cap" style="margin-right:8px;"></i>Stage / Class
                            </th>
                            <th style="padding:14px 20px; font-size:14px; font-weight:700; border:none;">Subjects Offered</th>
                            <th style="padding:14px 20px; font-size:14px; font-weight:700; text-align:center; width:120px; border:none;">Total Subjects</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $i => $item)
                        <tr style="background:{{ $i % 2 === 0 ? '#fff' : '#f8fafd' }}; border-bottom:1px solid #eef0f4;">
                            <td style="padding:16px 20px; font-weight:700; color:var(--theme-main); vertical-align:middle; white-space:nowrap; border:none;">
                                <i class="fa fa-book" style="margin-right:7px; opacity:0.7;"></i>
                                {{ $item['class'] }}
                            </td>
                            <td style="padding:16px 20px; vertical-align:middle; border:none;">
                                <div style="display:flex; flex-wrap:wrap; gap:7px;">
                                    @foreach($item['subjects'] as $subject)
                                    <span style="display:inline-block; background:#f0f4ff;
                                                 border:1px solid #c5d3f5; color:#3a5bbf;
                                                 border-radius:20px; padding:3px 12px;
                                                 font-size:12px; font-weight:500; white-space:nowrap;">
                                        {{ $subject }}
                                    </span>
                                    @endforeach
                                </div>
                            </td>
                            <td style="padding:16px 20px; text-align:center; vertical-align:middle; border:none;">
                                <span style="display:inline-block; width:36px; height:36px; border-radius:50%;
                                             background:var(--theme-main); color:#fff;
                                             font-weight:700; font-size:14px; line-height:36px;">
                                    {{ count($item['subjects']) }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr style="background:#f4f7fb; border-top:2px solid #e0e6ef;">
                            <td colspan="3" style="padding:12px 20px; font-size:13px; color:#777; border:none;">
                                <i class="fa fa-info-circle" style="margin-right:6px; color:var(--theme-main);"></i>
                                Board: <strong>CBSE</strong> &nbsp;|&nbsp; Assessment: <strong>CCE Framework</strong> &nbsp;|&nbsp; Language of Instruction: <strong>English / Hindi</strong>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </section>

    {{-- ------------- CO-CURRICULAR ACTIVITIES � ALTERNATING ROWS ------------- --}}
    <section class="section-padding" style="background:#f4f7fb;">
        <div class="container">

            <div class="section-title-s1 text-center">
                <span>Beyond the Classroom</span>
                <h2>Co-Curricular Activities</h2>
            </div>

            <div class="row" style="margin-top:16px; margin-bottom:36px;">
                <div class="col col-md-10 col-md-offset-1">
                    <p style="font-size:15px; color:#555; line-height:1.9; text-align:center;">
                        {!! $coCurricular['intro'] !!}
                    </p>
                </div>
            </div>

            {{-- Alternating feature rows --}}
            @foreach($coCurricular['activities'] as $index => $activity)
            @php $even = ($index % 2 === 0); @endphp
            <div class="row" style="margin-bottom:0; align-items:stretch;">

                {{-- Number column � always visible but side swaps --}}
                @if($even)
                <div class="col col-md-1 hidden-sm hidden-xs text-center"
                     style="padding-top:38px;">
                    <span style="font-size:52px; font-weight:800; color:#e0e8f5; line-height:1;">
                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                    </span>
                </div>
                @endif

                {{-- Icon block --}}
                <div class="col col-md-2 col-sm-3 text-center"
                     style="display:flex; align-items:center; justify-content:center; padding:30px 0;">
                    <div style="width:72px; height:72px; border-radius:50%;
                                background:var(--theme-main);
                                display:flex; align-items:center; justify-content:center;
                                box-shadow:0 6px 20px rgba(0,0,0,0.12);">
                        <i class="fa {{ $activity['icon'] }}" style="font-size:28px; color:#fff;"></i>
                    </div>
                </div>

                {{-- Text block --}}
                <div class="col col-md-{{ $even ? 8 : 9 }} col-sm-9"
                     style="padding:30px 20px; border-bottom:1px solid #e2e8f0;">
                    <h4 style="margin:0 0 10px; font-weight:700; color:#222; font-size:17px;">
                        {{ $activity['title'] }}
                    </h4>
                    <p style="margin:0; color:#666; font-size:14px; line-height:1.9;">
                        {!! $activity['body'] !!}
                    </p>
                </div>

                @if(!$even)
                <div class="col col-md-1 hidden-sm hidden-xs text-center"
                     style="padding-top:38px;">
                    <span style="font-size:52px; font-weight:800; color:#e0e8f5; line-height:1;">
                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                    </span>
                </div>
                @endif

            </div>
            @endforeach

            {{-- Why Co-Curricular � highlight strip --}}
            <div style="margin-top:50px; background:var(--theme-main); border-radius:8px; padding:36px 40px; color:#fff;">
                <div class="row" style="align-items:center;">
                    <div class="col col-md-7">
                        <h4 style="margin:0 0 18px; font-weight:700; font-size:18px; color:#fff;">
                            Why Co-Curricular at HS Global Academy?
                        </h4>
                        <ul style="margin:0; padding-left:20px; color:rgba(255,255,255,0.9);">
                            @foreach($coCurricular['why_points'] as $point)
                            <li style="margin-bottom:10px; font-size:14px; line-height:1.7;">{{ $point }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col col-md-5"
                         style="border-left:2px solid rgba(255,255,255,0.3); padding-left:30px; margin-top:10px;">
                        <i class="fa fa-quote-left" style="font-size:28px; color:rgba(255,255,255,0.4); display:block; margin-bottom:10px;"></i>
                        <p style="font-size:15px; color:rgba(255,255,255,0.95); line-height:1.8; margin:0; font-style:italic;">
                            {!! $coCurricular['closing'] !!}
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>


</x-web-layout>
