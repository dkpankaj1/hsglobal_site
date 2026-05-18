<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'Fee Payment Rules',
        'breadcrumb' => [
            ['label' => 'Admission',        'url' => route('admission.procedure')],
            ['label' => 'Fee Payment Rules'],
        ],
    ])

    <section style="padding:50px 0;">
        <div class="container">
            <div class="section-title-s1">
                <span>Admission</span>
                <h2>Fee Payment Rules</h2>
            </div>
            <p style="font-size:15px; color:#555; max-width:820px; line-height:1.85; margin-bottom:34px;">
                Please review the school fee payment policy carefully to ensure timely and smooth payment processing.
                Following these guidelines helps avoid late penalties and administrative delays.
            </p>

            <div class="row" style="margin-bottom:24px;">
                <div class="col col-md-3 col-sm-6" style="margin-bottom:12px;">
                    <div style="background:#f4f8ff; border-left:4px solid var(--theme-main); border-radius:6px; padding:14px 16px;">
                        <div style="font-size:12px; color:#8898b0;">Due Date</div>
                        <strong style="font-size:16px; color:#1f2d3d;">10th Every Month</strong>
                    </div>
                </div>
                <div class="col col-md-3 col-sm-6" style="margin-bottom:12px;">
                    <div style="background:#fff5f5; border-left:4px solid #d9534f; border-radius:6px; padding:14px 16px;">
                        <div style="font-size:12px; color:#a57c7a;">Late Fine</div>
                        <strong style="font-size:16px; color:#842029;">Rs 50 / Day</strong>
                    </div>
                </div>
                <div class="col col-md-3 col-sm-6" style="margin-bottom:12px;">
                    <div style="background:#f5fff7; border-left:4px solid #28a745; border-radius:6px; padding:14px 16px;">
                        <div style="font-size:12px; color:#7a9b86;">Annual Charges</div>
                        <strong style="font-size:16px; color:#1e7e34;">Payable in April</strong>
                    </div>
                </div>
                <div class="col col-md-3 col-sm-6" style="margin-bottom:12px;">
                    <div style="background:#fef9f2; border-left:4px solid #f0ad4e; border-radius:6px; padding:14px 16px;">
                        <div style="font-size:12px; color:#ab9a7a;">Default Limit</div>
                        <strong style="font-size:16px; color:#8a6d3b;">2 Months Max</strong>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top:6px; display:flex; flex-wrap:wrap;">
                <div class="col col-md-8" style="margin-bottom:18px;">
                    <div style="background:#fff; border:1px solid #e7edf7; border-radius:8px; box-shadow:0 2px 10px rgba(0,0,0,0.05); overflow:hidden;">
                        <div style="background:#f7faff; border-bottom:1px solid #e2eaf8; padding:13px 18px;">
                            <h4 style="margin:0; font-size:17px; font-weight:700; color:#243b6b;">
                                <i class="fa fa-list-ul" style="color:var(--theme-main); margin-right:7px;"></i>
                                Fee Payment Rules
                            </h4>
                        </div>
                        <div style="padding:10px 12px;">
                            @foreach($data as $index => $rule)
                            <div style="padding:12px 10px; border-bottom:{{ !$loop->last ? '1px solid #f0f3f8' : 'none' }}; display:flex; align-items:flex-start; gap:10px;">
                                <span style="width:26px; height:26px; border-radius:50%; background:#eef3ff; border:1px solid #c9d8f6; color:var(--theme-main); font-size:12px; font-weight:700; display:flex; align-items:center; justify-content:center; flex-shrink:0; margin-top:1px;">
                                    {{ $index + 1 }}
                                </span>
                                <p style="margin:0; color:#555; line-height:1.8; font-size:14px;">
                                    {{ $rule }}
                                </p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col col-md-4" style="margin-bottom:18px;">
                    <div style="background:#ffffff; border:1px solid #e7edf7; border-radius:8px; padding:16px 16px 12px; margin-bottom:14px;">
                        <h5 style="margin:0 0 10px; font-weight:700; color:#333;">
                            <i class="fa fa-credit-card" style="color:var(--theme-main); margin-right:6px;"></i>
                            Accepted Payment Modes
                        </h5>
                        <ul style="margin:0; padding-left:18px; color:#555; font-size:13px; line-height:1.8;">
                            <li>Cash Deposit</li>
                            <li>Demand Draft (DD)</li>
                            <li>Cheque</li>
                            <li>Online Bank Transfer</li>
                        </ul>
                    </div>

                    <div style="background:var(--theme-main); color:#fff; border-radius:8px; padding:16px; margin-bottom:14px;">
                        <h5 style="margin:0 0 7px; font-weight:700; color:#fff;">
                            <i class="fa fa-bell" style="margin-right:6px;"></i>
                            Reminder
                        </h5>
                        <p style="margin:0; font-size:13px; line-height:1.75; color:rgba(255,255,255,0.92);">
                            Keep fee receipts safely for future reference and verification.
                        </p>
                    </div>

                    <div style="background:#fffbea; border:1px solid #ffe082; border-radius:8px; padding:14px 16px;">
                        <p style="margin:0; font-size:13px; color:#666; line-height:1.75;">
                            <i class="fa fa-info-circle" style="margin-right:6px; color:#f9a825;"></i>
                            For any fee dispute or payment confirmation issue, contact the accounts office with your payment reference number.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-web-layout>
