<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'Examination Policy',
        'breadcrumb' => [
            ['label' => 'Academics',        'url' => route('academics.curriculum')],
            ['label' => 'Examination Policy'],
        ],
    ])

    <section style="padding:50px 0;">
        <div class="container">
            <div class="section-title-s1">
                <span>Academics</span>
                <h2>Examination Policy</h2>
            </div>
            <p>{{ $data['overview'] }}</p>

            <div class="row" style="margin-top:30px;">
                <div class="col col-md-6">
                    <h4>Academic Terms</h4>
                    <table class="table table-bordered table-hover">
                        <thead style="background-color:var(--theme-main); color:#fff;">
                            <tr><th>Term</th><th>Period</th><th>Weightage</th></tr>
                        </thead>
                        <tbody>
                            @foreach($data['terms'] as $term)
                                <tr>
                                    <td>{{ $term['term'] }}</td>
                                    <td>{{ $term['period'] }}</td>
                                    <td>{{ $term['weightage'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col col-md-6">
                    <h4>Rules & Guidelines</h4>
                    <ul class="about-details">
                        @foreach($data['rules'] as $rule)
                            <li><i class="fa fa-angle-right" style="color:var(--theme-main); margin-right:6px;"></i> {{ $rule }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

</x-web-layout>
