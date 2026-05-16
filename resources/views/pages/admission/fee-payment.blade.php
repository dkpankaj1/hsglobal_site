<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'Fee Payment Rules',
        'breadcrumb' => [
            ['label' => 'Admission',        'url' => route('admission.procedure')],
            ['label' => 'Fee Payment Rules'],
        ],
    ])

    <section class="section-padding">
        <div class="container">
            <div class="section-title-s1">
                <span>Admission</span>
                <h2>Fee Payment <span>Rules</span></h2>
            </div>

            <div class="row" style="margin-top:30px;">
                <div class="col col-md-8">
                    <ul style="list-style:none; padding:0;">
                        @foreach($data as $rule)
                            <li style="padding:12px 15px; border-left:4px solid var(--main-color); background:#fafafa; margin-bottom:10px; border-radius:0 4px 4px 0;">
                                <i class="fa fa-info-circle" style="color:var(--main-color); margin-right:8px;"></i>{{ $rule }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

</x-web-layout>
