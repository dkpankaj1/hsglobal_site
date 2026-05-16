<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'Uniform Regulations',
        'breadcrumb' => [
            ['label' => 'Academics',            'url' => route('academics.curriculum')],
            ['label' => 'Uniform Regulations'],
        ],
    ])

    <section class="section-padding">
        <div class="container">
            <div class="section-title-s1">
                <span>Academics</span>
                <h2>Uniform <span>Regulations</span></h2>
            </div>

            <div class="row" style="margin-top:30px;">
                <div class="col col-md-6" style="margin-bottom:25px;">
                    <h4 style="color:var(--main-color);">Boys</h4>
                    <table class="table table-bordered">
                        @foreach($data['boys'] as $season => $uniform)
                            <tr><td><strong>{{ $season }}</strong></td><td>{{ $uniform }}</td></tr>
                        @endforeach
                    </table>
                </div>
                <div class="col col-md-6" style="margin-bottom:25px;">
                    <h4 style="color:var(--main-color);">Girls</h4>
                    <table class="table table-bordered">
                        @foreach($data['girls'] as $season => $uniform)
                            <tr><td><strong>{{ $season }}</strong></td><td>{{ $uniform }}</td></tr>
                        @endforeach
                    </table>
                </div>
                <div class="col col-xs-12">
                    <div class="alert" style="background-color:#fff8e1; border-left:4px solid var(--main2-color); padding:15px 20px;">
                        <strong>P.E. Uniform:</strong> {{ $data['pe_uniform'] }}<br>
                        <strong>Note:</strong> {{ $data['note'] }}
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-web-layout>
