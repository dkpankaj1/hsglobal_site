<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'Withdrawal / Transfer',
        'breadcrumb' => [
            ['label' => 'Admission',             'url' => route('admission.procedure')],
            ['label' => 'Withdrawal / Transfer'],
        ],
    ])

    <section class="section-padding">
        <div class="container">
            <div class="section-title-s1">
                <span>Admission</span>
                <h2>Withdrawal / <span>Transfer</span></h2>
            </div>

            <div class="row" style="margin-top:30px;">
                <div class="col col-md-8">
                    <ul style="list-style:none; padding:0;">
                        @foreach($data as $rule)
                            <li style="padding:12px 15px; border-bottom:1px solid #e8e8e8; display:flex; gap:12px; align-items:flex-start;">
                                <i class="fa fa-angle-right fa-lg" style="color:var(--main-color); margin-top:2px;"></i>
                                {{ $rule }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

</x-web-layout>
