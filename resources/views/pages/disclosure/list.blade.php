{{-- Reusable disclosure list view (e.g. Safety Details) --}}
<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => $pageTitle,
        'breadcrumb' => [
            ['label' => 'Mandatory Disclosure', 'url' => route('disclosure.general')],
            ['label' => $pageTitle],
        ],
    ])

    <section class="section-padding">
        <div class="container">
            <div class="section-title-s1">
                <span>Mandatory Disclosure</span>
                <h2><span>{{ $pageTitle }}</span></h2>
            </div>

            <div class="row" style="margin-top:30px;">
                <div class="col col-md-8">
                    <ul style="list-style:none; padding:0;">
                        @foreach($items as $item)
                            <li style="padding:12px 15px; border-bottom:1px solid #eee; display:flex; gap:12px; align-items:flex-start;">
                                <i class="fa fa-check-square-o fa-lg" style="color:var(--main-color); margin-top:2px;"></i>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

</x-web-layout>
