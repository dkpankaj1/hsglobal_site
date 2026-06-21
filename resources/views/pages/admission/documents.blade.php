<x-web-layout>

    @include('layouts._web.page-header', [
        'title' => 'Documents Required',
        'breadcrumb' => [
            ['label' => 'Admission', 'url' => route('admission.procedure')],
            ['label' => 'Documents Required'],
        ],
    ])

    <section style="padding:50px 0;">
        <div class="container">
            <div class="section-title-s1">
                <span>Admission</span>
                <h2>Documents Required</h2>
            </div>
            <p style="font-size:15px; color:#555; max-width:820px; line-height:1.85; margin-bottom:34px;">
                Keep all required documents ready in original and photocopy format to avoid delays in admission
                processing.
                Bring self-attested copies wherever applicable.
            </p>

            <div class="row" style="margin-bottom:24px;">
                <div class="col col-md-4 col-sm-6" style="margin-bottom:12px;">
                    <div
                        style="background:#f4f8ff; border-left:4px solid var(--theme-main); border-radius:6px; padding:14px 16px;">
                        <div style="font-size:12px; color:#8898b0;">Total Documents</div>
                        <strong style="font-size:18px; color:#1f2d3d;">{{ count($data) }}</strong>
                    </div>
                </div>
                <div class="col col-md-4 col-sm-6" style="margin-bottom:12px;">
                    <div
                        style="background:#f4f8ff; border-left:4px solid var(--theme-main); border-radius:6px; padding:14px 16px;">
                        <div style="font-size:12px; color:#8898b0;">Submission Type</div>
                        <strong style="font-size:14px; color:#1f2d3d;">Original + Photocopy</strong>
                    </div>
                </div>
                <div class="col col-md-4 col-sm-6" style="margin-bottom:12px;">
                    <div
                        style="background:#f4f8ff; border-left:4px solid var(--theme-main); border-radius:6px; padding:14px 16px;">
                        <div style="font-size:12px; color:#8898b0;">Verification Desk</div>
                        <strong style="font-size:14px; color:#1f2d3d;">Admission Office</strong>
                    </div>
                </div>
            </div>

            @php
                $columns = array_chunk($data, (int) ceil(count($data) / 2));
            @endphp

            <div class="row" style="display:flex; flex-wrap:wrap;">
                @foreach ($columns as $colIndex => $items)
                    <div class="col col-md-6" style="margin-bottom:18px; display:flex;">
                        <div
                            style="width:100%; background:#fff; border:1px solid #e7edf7; border-radius:8px; box-shadow:0 2px 10px rgba(0,0,0,0.05); overflow:hidden;">
                            <div style="background:#f7faff; border-bottom:1px solid #e2eaf8; padding:12px 16px;">
                                <strong style="font-size:14px; color:#2d3e66;">
                                    <i class="fa fa-folder-open-o"
                                        style="color:var(--theme-main); margin-right:6px;"></i>
                                    Document Checklist {{ $colIndex + 1 }}
                                </strong>
                            </div>
                            <div style="padding:8px 0;">
                                @foreach ($items as $doc)
                                    @php
                                        $serial =
                                            $colIndex === 0 ? $loop->iteration : $loop->iteration + count($columns[0]);
                                    @endphp
                                    <div
                                        style="padding:12px 14px; border-bottom:{{ !$loop->last ? '1px solid #f0f3f8' : 'none' }}; display:flex; align-items:flex-start; gap:10px;">
                                        <span
                                            style="width:26px; height:26px; border-radius:50%; background:#eef3ff; border:1px solid #c9d8f6; color:var(--theme-main); font-size:12px; font-weight:700; display:flex; align-items:center; justify-content:center; flex-shrink:0; margin-top:1px;">
                                            {{ $serial }}
                                        </span>
                                        <p style="margin:0; color:#555; font-size:13px; line-height:1.75;">
                                            <i class="fa fa-file-text-o"
                                                style="color:var(--theme-main); margin-right:6px;"></i>
                                            {{ $doc }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div
                style="margin-top:10px; background:#fffbea; border:1px solid #ffe082; border-radius:8px; padding:16px 18px;">
                <h5 style="margin:0 0 8px; font-weight:700; color:#7a5a00; font-size:15px;">
                    <i class="fa fa-info-circle" style="margin-right:6px; color:#f9a825;"></i>
                    Submission Notes
                </h5>
                <ul style="margin:0; padding-left:18px; color:#666; font-size:13px; line-height:1.75;">
                    <li>Carry all original documents for verification at the time of admission.</li>
                    <li>Photocopies must be clear and self-attested by parent/guardian.</li>
                    <li>Incomplete document sets may delay the admission approval process.</li>
                </ul>
            </div>
        </div>
    </section>

</x-web-layout>
