<x-web-layout>

    @include('layouts._web.page-header', [
        'title' => 'Uniform Regulations',
        'breadcrumb' => [
            ['label' => 'Academics', 'url' => route('academics.curriculum')],
            ['label' => 'Uniform Regulations'],
        ],
    ])

    <section class="section-padding">
        <div class="container">
            <div class="section-title-s1">
                <span>Academics</span>
                <h2>Uniform Regulations</h2>
            </div>
            <p style="font-size:15px; color:#555; max-width:780px; line-height:1.85; margin-bottom:38px;">
                Students must wear the prescribed school uniform neatly and consistently on all working days.
                Uniform discipline promotes equality, identity, and a focused learning environment.
            </p>

            <div class="row" style="display:flex; flex-wrap:wrap; margin-top:10px;">
                <div class="col col-md-6 col-sm-6" style="margin-bottom:26px; display:flex;">
                    <div
                        style="background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 3px 16px rgba(0,0,0,0.08); width:100%; display:flex; flex-direction:column;">
                        <div style="background:var(--theme-main); padding:16px 20px; display:flex; align-items:center;">
                            <i class="fa fa-male" style="font-size:22px; color:#fff; margin-right:10px;"></i>
                            <h4 style="margin:0; color:#fff; font-size:17px; font-weight:700;">Boys Uniform</h4>
                        </div>
                        <div style="padding:16px 18px; flex:1;">
                            @foreach ($data['boys'] as $season => $uniform)
                                <div
                                    style="background:{{ $loop->odd ? '#f8fafd' : '#fff' }}; border:1px solid #e8edf5; border-radius:6px; padding:12px 14px; margin-bottom:10px;">
                                    <strong
                                        style="display:block; color:var(--theme-main); font-size:13px; margin-bottom:4px;">{{ $season }}</strong>
                                    <span
                                        style="font-size:14px; color:#555; line-height:1.65;">{{ $uniform }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col col-md-6 col-sm-6" style="margin-bottom:26px; display:flex;">
                    <div
                        style="background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 3px 16px rgba(0,0,0,0.08); width:100%; display:flex; flex-direction:column;">
                        <div style="background:var(--theme-main); padding:16px 20px; display:flex; align-items:center;">
                            <i class="fa fa-female" style="font-size:22px; color:#fff; margin-right:10px;"></i>
                            <h4 style="margin:0; color:#fff; font-size:17px; font-weight:700;">Girls Uniform</h4>
                        </div>
                        <div style="padding:16px 18px; flex:1;">
                            @foreach ($data['girls'] as $season => $uniform)
                                <div
                                    style="background:{{ $loop->odd ? '#f8fafd' : '#fff' }}; border:1px solid #e8edf5; border-radius:6px; padding:12px 14px; margin-bottom:10px;">
                                    <strong
                                        style="display:block; color:var(--theme-main); font-size:13px; margin-bottom:4px;">{{ $season }}</strong>
                                    <span
                                        style="font-size:14px; color:#555; line-height:1.65;">{{ $uniform }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col col-xs-12">
                    <div style="background:#fffbea; border:1px solid #ffe082; border-radius:8px; padding:20px 22px;">
                        <div class="row">
                            <div class="col col-md-6" style="margin-bottom:10px;">
                                <h5 style="margin:0 0 8px; font-size:15px; font-weight:700; color:#6d4c41;">
                                    <i class="fa fa-futbol-o" style="color:#f9a825; margin-right:7px;"></i>
                                    P.E. Uniform
                                </h5>
                                <p style="margin:0; font-size:14px; color:#555; line-height:1.7;">
                                    {{ $data['pe_uniform'] }}</p>
                            </div>
                            <div class="col col-md-6" style="margin-bottom:10px;">
                                <h5 style="margin:0 0 8px; font-size:15px; font-weight:700; color:#6d4c41;">
                                    <i class="fa fa-info-circle" style="color:#f9a825; margin-right:7px;"></i>
                                    Grooming Note
                                </h5>
                                <p style="margin:0; font-size:14px; color:#555; line-height:1.7;">{{ $data['note'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-web-layout>
