<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'Eligibility Criteria',
        'breadcrumb' => [
            ['label' => 'Admission',          'url' => route('admission.procedure')],
            ['label' => 'Eligibility Criteria'],
        ],
    ])

    <section style="padding:50px 0;">
         <div class="container">
             <div class="section-title-s1">
                 <span>Admission</span>
                 <h2>Eligibility Criteria</h2>
             </div>
             <p style="font-size:15px; color:#555; max-width:820px; line-height:1.85; margin-bottom:34px;">
                Please review the class-wise age and promotion requirements before submitting the admission form.
                Final eligibility verification is done by the school admission committee.
             </p>

             <div class="row" style="margin-bottom:26px;">
                <div class="col col-md-4 col-sm-6" style="margin-bottom:14px;">
                    <div style="background:#f4f8ff; border-left:4px solid var(--theme-main); border-radius:6px; padding:14px 16px;">
                        <div style="font-size:12px; color:#8898b0;">Classes Covered</div>
                        <strong style="font-size:16px; color:#1f2d3d;">{{ count($data) }} Levels</strong>
                    </div>
                </div>
                <div class="col col-md-4 col-sm-6" style="margin-bottom:14px;">
                    <div style="background:#f4f8ff; border-left:4px solid var(--theme-main); border-radius:6px; padding:14px 16px;">
                        <div style="font-size:12px; color:#8898b0;">Cut-off Reference Date</div>
                        <strong style="font-size:16px; color:#1f2d3d;">31st March</strong>
                    </div>
                </div>
                <div class="col col-md-4 col-sm-6" style="margin-bottom:14px;">
                    <div style="background:#f4f8ff; border-left:4px solid var(--theme-main); border-radius:6px; padding:14px 16px;">
                        <div style="font-size:12px; color:#8898b0;">Board Pattern</div>
                        <strong style="font-size:16px; color:#1f2d3d;">CBSE Guidelines</strong>
                    </div>
                </div>
             </div>

            <div class="table-responsive" style="border-radius:8px; overflow:hidden; box-shadow:0 3px 16px rgba(0,0,0,0.08);">
                <table class="table" style="margin:0; background:#fff;">
                    <thead>
                        <tr style="background-color:var(--theme-main); color:#fff;">
                            <th style="padding:14px 18px; border:none; width:80px;">#</th>
                            <th style="padding:14px 18px; border:none; width:220px;">Class</th>
                            <th style="padding:14px 18px; border:none;">Age / Eligibility Requirement</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $index => $row)
                            <tr style="background:{{ $index % 2 === 0 ? '#ffffff' : '#f8fafd' }}; border-bottom:1px solid #edf1f7;">
                                <td style="padding:12px 18px; border:none; color:#8c99ad; font-size:13px;">
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </td>
                                <td style="padding:12px 18px; border:none;">
                                    <strong style="color:var(--theme-main);">{{ $row['class'] }}</strong>
                                </td>
                                <td style="padding:12px 18px; border:none; color:#555; line-height:1.7;">
                                    {{ $row['age'] }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div style="margin-top:18px; background:#fffbea; border:1px solid #ffe082; border-radius:8px; padding:16px 18px;">
                <h5 style="margin:0 0 8px; font-weight:700; color:#7a5a00; font-size:15px;">
                    <i class="fa fa-info-circle" style="margin-right:6px; color:#f9a825;"></i>
                    Important Notes
                </h5>
                <ul style="margin:0; padding-left:18px; color:#666; font-size:13px; line-height:1.75;">
                    <li>Age criteria is considered as on 31st March of the admission year.</li>
                    <li>Eligibility for higher classes requires valid marksheet and transfer certificate.</li>
                    <li>For Classes VI onwards, interaction or assessment may be conducted.</li>
                </ul>
            </div>
        </div>
    </section>

</x-web-layout>
