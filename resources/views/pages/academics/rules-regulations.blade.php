<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'Rules & Regulations',
        'breadcrumb' => [
            ['label' => 'Academics',           'url' => route('academics.curriculum')],
            ['label' => 'Rules & Regulations'],
        ],
    ])

    <section class="section-padding">
        <div class="container">
            <div class="section-title-s1">
                <span>Academics</span>
                <h2>Rules <span>&amp; Regulations</span></h2>
            </div>

            <div class="row" style="margin-top:30px;">
                @foreach(['general' => 'General Rules', 'discipline' => 'Discipline', 'attendance' => 'Attendance'] as $key => $heading)
                    <div class="col col-md-4" style="margin-bottom:25px;">
                        <h4 style="color:var(--main-color);">{{ $heading }}</h4>
                        <ul style="padding-left:18px;">
                            @foreach($data[$key] as $rule)
                                <li style="margin-bottom:8px;">{{ $rule }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</x-web-layout>
