<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'Withdrawal / Transfer',
        'breadcrumb' => [
            ['label' => 'Admission',             'url' => route('admission.procedure')],
            ['label' => 'Withdrawal / Transfer'],
        ],
    ])

    <section style="padding:50px 0;">
        <div class="container">
            <div class="section-title-s1">
                <span>Admission</span>
                <h2>Withdrawal / Transfer</h2>
            </div>
            <p style="font-size:15px; color:#555; max-width:820px; line-height:1.85; margin-bottom:34px;">
                For student withdrawal or transfer, please follow the process below and ensure all academic and fee formalities are completed.
                This helps us issue the Transfer Certificate without delays.
            </p>

            <div class="row" style="margin-bottom:24px;">
                <div class="col col-md-4 col-sm-6" style="margin-bottom:12px;">
                    <div style="background:#f4f8ff; border-left:4px solid var(--theme-main); border-radius:6px; padding:14px 16px;">
                        <div style="font-size:12px; color:#8898b0;">Prior Notice</div>
                        <strong style="font-size:16px; color:#1f2d3d;">1 Month</strong>
                    </div>
                </div>
                <div class="col col-md-4 col-sm-6" style="margin-bottom:12px;">
                    <div style="background:#f4f8ff; border-left:4px solid var(--theme-main); border-radius:6px; padding:14px 16px;">
                        <div style="font-size:12px; color:#8898b0;">TC Issue Timeline</div>
                        <strong style="font-size:16px; color:#1f2d3d;">Within 7 Working Days</strong>
                    </div>
                </div>
                <div class="col col-md-4 col-sm-6" style="margin-bottom:12px;">
                    <div style="background:#f4f8ff; border-left:4px solid var(--theme-main); border-radius:6px; padding:14px 16px;">
                        <div style="font-size:12px; color:#8898b0;">Dues Clearance</div>
                        <strong style="font-size:16px; color:#1f2d3d;">Mandatory</strong>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top:6px; display:flex; flex-wrap:wrap;">
                <div class="col col-md-8" style="margin-bottom:18px;">
                    <div style="background:#fff; border:1px solid #e7edf7; border-radius:8px; box-shadow:0 2px 10px rgba(0,0,0,0.05); overflow:hidden;">
                        <div style="background:#f7faff; border-bottom:1px solid #e2eaf8; padding:13px 18px;">
                            <h4 style="margin:0; font-size:17px; font-weight:700; color:#243b6b;">
                                <i class="fa fa-list-ol" style="color:var(--theme-main); margin-right:7px;"></i>
                                Withdrawal Process Steps
                            </h4>
                        </div>
                        <div style="position:relative; padding:14px 14px 10px 46px;">
                            <div style="position:absolute; left:26px; top:24px; bottom:24px; width:2px; background:#dfe6f3;"></div>
                            @foreach($data as $index => $rule)
                            <div style="position:relative; padding:0 2px 12px 0;">
                                <span style="position:absolute; left:-30px; top:4px; width:18px; height:18px; border-radius:50%; background:var(--theme-main); box-shadow:0 0 0 3px #eef3ff;"></span>
                                <div style="background:#fff; border:1px solid #edf2fa; border-left:3px solid var(--theme-main); border-radius:6px; padding:10px 12px;">
                                    <strong style="display:block; font-size:12px; color:#7f8aa1; margin-bottom:3px;">STEP {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</strong>
                                    <p style="margin:0; color:#555; font-size:14px; line-height:1.75;">{{ $rule }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col col-md-4" style="margin-bottom:18px;">
                    <div style="background:#fff; border:1px solid #e7edf7; border-radius:8px; padding:16px 16px 12px; margin-bottom:14px;">
                        <h5 style="margin:0 0 10px; font-weight:700; color:#333;">
                            <i class="fa fa-folder-open-o" style="color:var(--theme-main); margin-right:6px;"></i>
                            Documents to Carry
                        </h5>
                        <ul style="margin:0; padding-left:18px; color:#555; font-size:13px; line-height:1.8;">
                            <li>Withdrawal application letter</li>
                            <li>Fee clearance proof</li>
                            <li>Parent identity proof copy</li>
                            <li>Student ID card (if issued)</li>
                        </ul>
                    </div>

                    <div style="background:var(--theme-main); color:#fff; border-radius:8px; padding:16px; margin-bottom:14px;">
                        <h5 style="margin:0 0 7px; font-weight:700; color:#fff;">
                            <i class="fa fa-phone" style="margin-right:6px;"></i>
                            Need Assistance?
                        </h5>
                        <p style="margin:0; font-size:13px; line-height:1.75; color:rgba(255,255,255,0.92);">
                            Contact the admission office for withdrawal request status and TC collection details.
                        </p>
                    </div>

                    <div style="background:#fffbea; border:1px solid #ffe082; border-radius:8px; padding:14px 16px;">
                        <p style="margin:0; font-size:13px; color:#666; line-height:1.75;">
                            <i class="fa fa-exclamation-circle" style="margin-right:6px; color:#f9a825;"></i>
                            Mid-session withdrawal may attract full term fee as per school policy.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-web-layout>
