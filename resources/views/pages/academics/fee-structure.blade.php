<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'Fee Structure',
        'breadcrumb' => [
            ['label' => 'Academics',     'url' => route('academics.curriculum')],
            ['label' => 'Fee Structure'],
        ],
    ])

    <section class="section-padding">
        <div class="container">

            <div class="section-title-s1">
                <span>Academics</span>
                <h2>Fee Structure <small style="font-size:14px; color:#888; font-weight:400;">AY 2026–27</small></h2>
            </div>
            <p style="font-size:15px; color:#555; max-width:780px; line-height:1.85; margin-bottom:40px;">
                The following fee schedule applies for the academic year 2026–27.
                All amounts are in Indian Rupees (&#8377;). Please read the terms &amp; conditions below the table carefully before making any payment.
            </p>

            {{-- ── Summary stat bar ── --}}
            <div class="row" style="margin-bottom:36px;">
                @php
                    $stats = [
                        ['icon' => 'fa-graduation-cap', 'label' => 'Classes Covered',  'value' => '5 Levels'],
                        ['icon' => 'fa-credit-card',    'label' => 'Payment Modes',     'value' => 'Cash / DD / Online'],
                        ['icon' => 'fa-calendar',       'label' => 'Fee Due Date',      'value' => '10th of Every Month'],
                        ['icon' => 'fa-tag',            'label' => 'Sibling Discount',  'value' => '10% on Tuition *'],
                    ];
                @endphp
                @foreach($stats as $stat)
                <div class="col col-md-3 col-sm-6" style="margin-bottom:16px;">
                    <div style="background:#f4f7fb; border-radius:8px; padding:16px 18px;
                                display:flex; align-items:center; gap:14px;
                                border-left:4px solid var(--theme-main);">
                        <i class="fa {{ $stat['icon'] }}" style="font-size:24px; color:var(--theme-main); flex-shrink:0;"></i>
                        <div>
                            <div style="font-size:12px; color:#888; margin-bottom:2px;">{{ $stat['label'] }}</div>
                            <strong style="font-size:14px; color:#222;">{{ $stat['value'] }}</strong>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- ── Fee table ── --}}
            <div class="table-responsive" style="border-radius:8px; overflow:hidden;
                         box-shadow:0 3px 16px rgba(0,0,0,0.09); margin-bottom:10px;">
                <table class="table" style="margin:0; font-size:14px;">
                    <thead>
                        <tr style="background:var(--theme-main); color:#fff;">
                            <th style="padding:14px 20px; border:none; font-size:14px;">#</th>
                            <th style="padding:14px 20px; border:none; font-size:14px;">
                                <i class="fa fa-graduation-cap" style="margin-right:7px;"></i>Class / Stage
                            </th>
                            <th style="padding:14px 20px; border:none; font-size:14px; text-align:right;">
                                <i class="fa fa-id-card-o" style="margin-right:7px;"></i>Admission Fee (&#8377;)
                            </th>
                            <th style="padding:14px 20px; border:none; font-size:14px; text-align:right;">
                                <i class="fa fa-repeat" style="margin-right:7px;"></i>Monthly Tuition (&#8377;)
                            </th>
                            <th style="padding:14px 20px; border:none; font-size:14px; text-align:right;">
                                <i class="fa fa-calendar-o" style="margin-right:7px;"></i>Annual Charges (&#8377;)
                            </th>
                            <th style="padding:14px 20px; border:none; font-size:14px; text-align:right;">
                                <i class="fa fa-calculator" style="margin-right:7px;"></i>Annual Total * (&#8377;)
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $i => $row)
                        @php
                            $tuitionNum  = (int) str_replace([',', '/mo'], '', $row['tuition']);
                            $annualNum   = (int) str_replace(',', '', $row['annual']);
                            $admitNum    = (int) str_replace(',', '', $row['admission']);
                            $total       = number_format($tuitionNum * 12 + $annualNum);
                        @endphp
                        <tr style="background:{{ $i % 2 === 0 ? '#fff' : '#f8fafd' }};
                                   border-bottom:1px solid #eef0f4;">
                            <td style="padding:14px 20px; border:none; color:#aaa; font-size:13px;">
                                {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                            </td>
                            <td style="padding:14px 20px; border:none; font-weight:700;
                                       color:var(--theme-main); white-space:nowrap;">
                                <i class="fa fa-book" style="margin-right:7px; opacity:0.7;"></i>
                                {{ $row['class'] }}
                            </td>
                            <td style="padding:14px 20px; border:none; text-align:right; color:#444;">
                                &#8377; {{ $row['admission'] }}
                            </td>
                            <td style="padding:14px 20px; border:none; text-align:right; color:#444;">
                                &#8377; {{ $row['tuition'] }}
                            </td>
                            <td style="padding:14px 20px; border:none; text-align:right; color:#444;">
                                &#8377; {{ $row['annual'] }}
                            </td>
                            <td style="padding:14px 20px; border:none; text-align:right;">
                                <span style="background:#f0f4ff; border:1px solid #c5d3f5;
                                             color:var(--theme-main); border-radius:20px;
                                             padding:3px 12px; font-size:13px; font-weight:700;
                                             white-space:nowrap;">
                                    &#8377; {{ $total }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr style="background:#f4f7fb; border-top:2px solid #dde3ef;">
                            <td colspan="6" style="padding:11px 20px; border:none;
                                                   font-size:12px; color:#888;">
                                <i class="fa fa-info-circle" style="color:var(--theme-main); margin-right:6px;"></i>
                                * Annual Total = (Monthly Tuition &times; 12) + Annual Charges. Admission fee is one-time and not included in this total.
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            {{-- ── Terms & Conditions ── --}}
            <div style="margin-top:36px; background:#fff; border-radius:8px;
                        box-shadow:0 3px 16px rgba(0,0,0,0.07); overflow:hidden;">

                {{-- T&C header --}}
                <div style="background:var(--theme-main); padding:14px 24px;
                            display:flex; align-items:center; gap:12px;">
                    <i class="fa fa-file-text-o" style="font-size:18px; color:#fff;"></i>
                    <strong style="color:#fff; font-size:15px;">Terms &amp; Conditions</strong>
                </div>

                <div class="row" style="padding:24px 10px 10px;">
                    @php
                        $terms = [
                            ['icon' => 'fa-calendar-check-o', 'color' => '#3a5bbf',
                             'text' => 'Monthly tuition fee is due by the <strong>10th of every month</strong>. A late fine of &#8377;50/day is applicable after the due date.'],
                            ['icon' => 'fa-refresh',          'color' => '#27ae60',
                             'text' => 'Fee once paid is <strong>non-refundable</strong> except in cases of school-initiated cancellation.'],
                            ['icon' => 'fa-tags',             'color' => '#8e44ad',
                             'text' => 'A <strong>10% sibling discount</strong> on monthly tuition is applicable for the second child onwards enrolled in this school.'],
                            ['icon' => 'fa-exclamation-circle','color' => '#c0392b',
                             'text' => 'Fees are subject to <strong>annual revision</strong>. Updated fee schedule will be notified at the start of each academic year.'],
                            ['icon' => 'fa-bank',             'color' => '#2980b9',
                             'text' => 'Payments can be made by <strong>Cash, Demand Draft, or Online Transfer</strong>. Cheque payments are not accepted.'],
                            ['icon' => 'fa-file-pdf-o',       'color' => '#e67e22',
                             'text' => 'A <strong>fee receipt must be collected</strong> for every payment. The school is not responsible for payments made without a receipt.'],
                            ['icon' => 'fa-user-times',       'color' => '#c0392b',
                             'text' => 'Students with fee arrears of <strong>more than 2 months</strong> may be denied access to examinations until dues are cleared.'],
                            ['icon' => 'fa-phone',            'color' => '#16a085',
                             'text' => 'For fee-related queries, contact the accounts office between <strong>9:00 AM – 1:00 PM</strong> on all working days.'],
                        ];
                    @endphp

                    @foreach($terms as $j => $term)
                    <div class="col col-md-6" style="margin-bottom:18px;">
                        <div style="display:flex; align-items:flex-start; gap:12px; padding:0 14px;">
                            <div style="width:34px; height:34px; border-radius:50%; flex-shrink:0;
                                        background:{{ $term['color'] }}1a;
                                        display:flex; align-items:center; justify-content:center;
                                        margin-top:1px;">
                                <i class="fa {{ $term['icon'] }}" style="color:{{ $term['color'] }}; font-size:15px;"></i>
                            </div>
                            <p style="margin:0; font-size:13px; color:#555; line-height:1.75;">
                                <strong style="color:#999; font-size:11px; letter-spacing:.5px; display:block; margin-bottom:2px;">
                                    T&amp;C {{ str_pad($j + 1, 2, '0', STR_PAD_LEFT) }}
                                </strong>
                                {!! $term['text'] !!}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Disclaimer footer --}}
                <div style="background:#fffbea; border-top:1px solid #ffe082;
                            padding:14px 24px; display:flex; align-items:flex-start; gap:12px;">
                    <i class="fa fa-exclamation-triangle" style="color:#f9a825; font-size:18px; margin-top:2px; flex-shrink:0;"></i>
                    <p style="margin:0; font-size:13px; color:#666; line-height:1.7;">
                        <strong>Disclaimer:</strong> The fee structure displayed above is indicative and subject to change without prior notice.
                        Kindly visit the school accounts office or call <strong>+91-11-XXXX-XXXX</strong> to confirm the latest applicable fees before making any payment.
                        The management reserves the right to revise fees as per applicable norms.
                    </p>
                </div>
            </div>

        </div>
    </section>

</x-web-layout>

