<x-web-layout>

    @include('layouts._web.page-header', [
        'title' => 'TC Sample',
        'breadcrumb' => [
            ['label' => 'Admission', 'url' => route('admission.procedure')],
            ['label' => 'TC Sample'],
        ],
    ])

    <section style="padding:50px 0;">
        <div class="container">
            <div class="section-title-s1">
                <span>Admission</span>
                <h2>Transfer Certificate Sample</h2>
            </div>
            <p style="font-size:15px; color:#555; max-width:820px; line-height:1.85; margin-bottom:34px;">
                This is a reference layout of the school Transfer Certificate (TC). Actual details are printed only
                after clearance and approval.
            </p>

            <div class="row" style="margin-bottom:24px;">
                <div class="col col-md-4 col-sm-6" style="margin-bottom:12px;">
                    <div
                        style="background:#f4f8ff; border-left:4px solid var(--theme-main); border-radius:6px; padding:14px 16px;">
                        <div style="font-size:12px; color:#8898b0;">Document Type</div>
                        <strong style="font-size:16px; color:#1f2d3d;">Official TC Format</strong>
                    </div>
                </div>
                <div class="col col-md-4 col-sm-6" style="margin-bottom:12px;">
                    <div
                        style="background:#f4f8ff; border-left:4px solid var(--theme-main); border-radius:6px; padding:14px 16px;">
                        <div style="font-size:12px; color:#8898b0;">Fields Included</div>
                        <strong style="font-size:16px; color:#1f2d3d;">{{ count($data['fields']) }} Entries</strong>
                    </div>
                </div>
                <div class="col col-md-4 col-sm-6" style="margin-bottom:12px;">
                    <div
                        style="background:#f4f8ff; border-left:4px solid var(--theme-main); border-radius:6px; padding:14px 16px;">
                        <div style="font-size:12px; color:#8898b0;">Issued By</div>
                        <strong style="font-size:16px; color:#1f2d3d;">Principal's Office</strong>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top:6px; display:flex; flex-wrap:wrap;">
                <div class="col col-md-8" style="margin-bottom:18px;">
                    <div
                        style="background:#fff; border:1px solid #e7edf7; border-radius:8px; box-shadow:0 2px 10px rgba(0,0,0,0.05); overflow:hidden;">
                        <div style="background:#f7faff; border-bottom:1px solid #e2eaf8; padding:12px 16px;">
                            <strong style="font-size:14px; color:#2d3e66;">
                                <i class="fa fa-file-text-o" style="color:var(--theme-main); margin-right:7px;"></i>
                                Transfer Certificate Preview
                            </strong>
                        </div>
                        <div style="padding:20px 20px 16px;">
                            <p style="margin:0 0 14px; color:#555; font-size:14px; line-height:1.75;">
                                {{ $data['note'] }}</p>

                            <div
                                style="border:2px solid var(--theme-main); border-radius:6px; padding:20px; margin-top:6px;">
                                <h4 style="text-align:center; margin-bottom:20px; color:var(--theme-main);">
                                    H.S. Global Academy<br>
                                    <small style="font-size:13px; color:#666;">CBSE Affiliated | Transfer
                                        Certificate</small>
                                </h4>
                                <table class="table table-bordered" style="margin-bottom:0;">
                                    @foreach ($data['fields'] as $i => $field)
                                        <tr>
                                            <td style="width:44%; background:#f8f8f8;"><strong>{{ $i + 1 }}.
                                                    {{ $field }}</strong></td>
                                            <td style="height:40px;"></td>
                                        </tr>
                                    @endforeach
                                </table>
                                <div style="margin-top:22px; text-align:right;">
                                    <p style="margin:0;">Principal's Signature &amp; School Stamp</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col col-md-4" style="margin-bottom:18px;">
                    <div
                        style="background:#fff; border:1px solid #e7edf7; border-radius:8px; padding:16px 16px 12px; margin-bottom:14px;">
                        <h5 style="margin:0 0 10px; font-weight:700; color:#333;">
                            <i class="fa fa-check-square-o" style="color:var(--theme-main); margin-right:6px;"></i>
                            Before TC Request
                        </h5>
                        <ul style="margin:0; padding-left:18px; color:#555; font-size:13px; line-height:1.8;">
                            <li>Submit withdrawal application in writing.</li>
                            <li>Clear all fee and library dues.</li>
                            <li>Return school belongings (if any).</li>
                            <li>Keep student details handy for verification.</li>
                        </ul>
                    </div>

                    <div
                        style="background:var(--theme-main); color:#fff; border-radius:8px; padding:16px; margin-bottom:14px;">
                        <h5 style="margin:0 0 7px; font-weight:700; color:#fff;">
                            <i class="fa fa-clock-o" style="margin-right:6px;"></i>
                            Processing Time
                        </h5>
                        <p style="margin:0; font-size:13px; line-height:1.75; color:rgba(255,255,255,0.92);">
                            Transfer Certificate is generally issued within 7 working days after completion of
                            formalities.
                        </p>
                    </div>

                    <div style="background:#fffbea; border:1px solid #ffe082; border-radius:8px; padding:14px 16px;">
                        <p style="margin:0; font-size:13px; color:#666; line-height:1.75;">
                            <i class="fa fa-info-circle" style="margin-right:6px; color:#f9a825;"></i>
                            This sample is for reference only and cannot be used as an official certificate.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-web-layout>
