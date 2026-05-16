<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'Documents Required',
        'breadcrumb' => [
            ['label' => 'Admission',          'url' => route('admission.procedure')],
            ['label' => 'Documents Required'],
        ],
    ])

    <section class="section-padding">
        <div class="container">
            <div class="section-title-s1">
                <span>Admission</span>
                <h2>Documents <span>Required</span></h2>
            </div>

            <div class="row" style="margin-top:30px;">
                <div class="col col-md-8">
                    <ul style="list-style:none; padding:0;">
                        @foreach($data as $doc)
                            <li style="padding:12px 15px; border-bottom:1px solid #eee; display:flex; align-items:center; gap:12px;">
                                <i class="fa fa-file-text-o fa-lg" style="color:var(--main-color);"></i>
                                {{ $doc }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

</x-web-layout>
