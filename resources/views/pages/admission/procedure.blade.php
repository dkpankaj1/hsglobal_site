<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'Admission Procedure',
        'breadcrumb' => [
            ['label' => 'Admission',          'url' => route('admission.procedure')],
            ['label' => 'Admission Procedure'],
        ],
    ])

    <section class="section-padding">
        <div class="container">
            <div class="section-title-s1">
                <span>Admission</span>
                <h2>Admission <span>Procedure</span></h2>
            </div>

            <div class="row" style="margin-top:30px;">
                @foreach($data as $step)
                    <div class="col col-xs-12" style="margin-bottom:20px;">
                        <div style="display:flex; align-items:flex-start; gap:20px; border:1px solid #e0e0e0; border-left:5px solid var(--main-color); padding:20px; border-radius:4px;">
                            <div style="min-width:50px; height:50px; background:var(--main-color); color:#fff; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:20px; font-weight:700;">
                                {{ $step['step'] }}
                            </div>
                            <div>
                                <h4 style="margin-top:0; color:var(--main-color);">{{ $step['title'] }}</h4>
                                <p style="margin:0;">{{ $step['desc'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</x-web-layout>
