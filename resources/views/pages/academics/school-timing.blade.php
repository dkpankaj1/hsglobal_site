<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'School Timing',
        'breadcrumb' => [
            ['label' => 'Academics',     'url' => route('academics.curriculum')],
            ['label' => 'School Timing'],
        ],
    ])

    <section class="section-padding">
        <div class="container">
            <div class="section-title-s1">
                <span>Academics</span>
                <h2>School <span>Timing</span></h2>
            </div>

            <div class="row" style="margin-top:30px;">
                <div class="col col-md-6">
                    <table class="table table-bordered table-striped">
                        <thead style="background-color:var(--main-color); color:#fff;">
                            <tr><th>Day</th><th>Timing</th></tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{ $row['day'] }}</td>
                                    <td>{{ $row['timing'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</x-web-layout>
