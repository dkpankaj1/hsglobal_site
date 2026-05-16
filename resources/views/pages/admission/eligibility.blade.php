<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'Eligibility Criteria',
        'breadcrumb' => [
            ['label' => 'Admission',          'url' => route('admission.procedure')],
            ['label' => 'Eligibility Criteria'],
        ],
    ])

    <section class="section-padding">
        <div class="container">
            <div class="section-title-s1">
                <span>Admission</span>
                <h2>Eligibility <span>Criteria</span></h2>
            </div>

            <div class="table-responsive" style="margin-top:30px;">
                <table class="table table-bordered table-hover">
                    <thead style="background-color:var(--main-color); color:#fff;">
                        <tr><th>Class</th><th>Age / Eligibility</th></tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td><strong>{{ $row['class'] }}</strong></td>
                                <td>{{ $row['age'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</x-web-layout>
