<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'Admission Procedure',
        'breadcrumb' => [
            ['label' => 'Admission',          'url' => route('admission.procedure')],
            ['label' => 'Admission Procedure'],
        ],
    ])

    <section style="padding:50px 0;">
        <div class="container">
            <div class="section-title-s1">
                <span>Admission</span>
                <h2>Admission Procedure</h2>
            </div>
            <p style="font-size:15px; color:#555; max-width:820px; line-height:1.85; margin-bottom:36px;">
                Our admission process is simple, transparent, and parent-friendly. Follow the step-by-step
                process below to complete admission smoothly for your child.
            </p>

            <div class="row" style="margin-top:8px;">
                <div class="col col-md-8" style="margin-bottom:28px;">
                    <div style="position:relative; padding-left:44px;">
                        <div style="position:absolute; left:18px; top:14px; bottom:14px; width:2px; background:#dfe6f3;"></div>

                        @foreach($data as $step)
                        <div style="position:relative; margin-bottom:18px;">
                            <div style="position:absolute; left:-33px; top:20px; width:18px; height:18px; border-radius:50%; background:var(--theme-main); box-shadow:0 0 0 3px #eef3ff;"></div>
                            <div style="background:#fff; border:1px solid #e7edf7; border-left:4px solid var(--theme-main); border-radius:8px; padding:18px 18px 16px; box-shadow:0 2px 10px rgba(0,0,0,0.05);">
                                <div style="display:flex; align-items:center; justify-content:space-between; gap:10px; margin-bottom:6px;">
                                    <h4 style="margin:0; font-size:17px; color:var(--theme-main); font-weight:700;">
                                        {{ $step['title'] }}
                                    </h4>
                                    <span style="display:inline-block; min-width:70px; text-align:center; background:#eef3ff; color:var(--theme-main); border:1px solid #c9d8f6; border-radius:20px; padding:3px 10px; font-size:12px; font-weight:700;">
                                        STEP {{ str_pad($step['step'], 2, '0', STR_PAD_LEFT) }}
                                    </span>
                                </div>
                                <p style="margin:0; color:#555; line-height:1.8; font-size:14px;">
                                    {{ $step['desc'] }}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col col-md-4" style="margin-bottom:28px;">
                    <div style="background:#f7faff; border:1px solid #dfe9fb; border-radius:8px; padding:18px 18px 16px; margin-bottom:16px;">
                        <h5 style="margin:0 0 10px; font-weight:700; color:#243b6b;">
                            <i class="fa fa-clock-o" style="color:var(--theme-main); margin-right:6px;"></i>
                            Process Timeline
                        </h5>
                        <ul style="margin:0; padding-left:18px; color:#555; font-size:13px; line-height:1.8;">
                            <li>Registration forms available from school office and website.</li>
                            <li>Application review usually takes 3 to 5 working days.</li>
                            <li>Interaction or test schedule is shared through call or email.</li>
                            <li>Admission confirmation is completed after fee submission.</li>
                        </ul>
                    </div>

                    <div style="background:#fff; border:1px solid #ececec; border-radius:8px; padding:18px 18px 16px; margin-bottom:16px;">
                        <h5 style="margin:0 0 10px; font-weight:700; color:#333;">
                            <i class="fa fa-check-square-o" style="color:var(--theme-main); margin-right:6px;"></i>
                            Before You Apply
                        </h5>
                        <ul style="margin:0; padding-left:18px; color:#555; font-size:13px; line-height:1.8;">
                            <li>Keep required documents ready in original and photocopy format.</li>
                            <li>Check class-specific eligibility criteria before registration.</li>
                            <li>Use active mobile number and email for all communication.</li>
                        </ul>
                    </div>

                    <div style="background:var(--theme-main); color:#fff; border-radius:8px; padding:16px 18px;">
                        <h5 style="margin:0 0 8px; font-weight:700; color:#fff;">
                            <i class="fa fa-phone" style="margin-right:6px;"></i>
                            Need Help?
                        </h5>
                        <p style="margin:0; font-size:13px; line-height:1.75; color:rgba(255,255,255,0.92);">
                            For admission support, contact the school office during working hours.
                            Our team will guide you through every step.
                        </p>
                    </div>
                </div>
            </div>

            <div style="margin-top:10px; background:#fff; border:1px solid #e7edf7; border-radius:8px; box-shadow:0 2px 10px rgba(0,0,0,0.04); overflow:hidden;">
                <div style="background:#f7faff; border-bottom:1px solid #e3ebfb; padding:14px 18px;">
                    <h4 style="margin:0; font-size:17px; font-weight:700; color:#243b6b;">
                        <i class="fa fa-folder-open-o" style="color:var(--theme-main); margin-right:7px;"></i>
                        Documents Needed
                    </h4>
                </div>
                <div class="row" style="padding:16px 12px 4px;">
                    @foreach($documents as $doc)
                    <div class="col col-md-6" style="margin-bottom:12px;">
                        <div style="display:flex; align-items:flex-start; gap:10px; padding:8px 10px;">
                            <span style="width:22px; height:22px; border-radius:50%; background:#eef3ff; border:1px solid #c9d8f6; color:var(--theme-main); display:flex; align-items:center; justify-content:center; font-size:12px; flex-shrink:0; margin-top:1px;">
                                <i class="fa fa-check"></i>
                            </span>
                            <p style="margin:0; font-size:13px; color:#555; line-height:1.75;">{{ $doc }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

</x-web-layout>
