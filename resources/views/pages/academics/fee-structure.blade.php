<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'Fee Structure',
        'breadcrumb' => [
            ['label' => 'Academics',     'url' => route('academics.curriculum')],
            ['label' => 'Fee Structure'],
        ],
    ])

    <section class="section-padding">
        <div class="container">
            <div class="section-title-s1">
                <span>Academics</span>
                <h2>Fee <span>Structure</span></h2>
            </div>

            <div class="table-responsive" style="margin-top:30px;">
                <table class="table table-bordered table-hover">
                    <thead style="background-color:var(--main-color); color:#fff;">
                        <tr>
                            <th>Class</th>
                            <th>Admission Fee (â‚¹)</th>
                            <th>Monthly Tuition (â‚¹)</th>
                            <th>Annual Charges (â‚¹)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td>{{ $row['class'] }}</td>
                                <td>{{ $row['admission'] }}</td>
                                <td>{{ $row['tuition'] }}</td>
                                <td>{{ $row['annual'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <p class="text-muted" style="font-size:13px; margin-top:10px;">
                * Fees are subject to revision. Kindly contact the school office for the latest fee schedule.
            </p>
        </div>
    </section>

</x-web-layout>
