<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'Curriculum',
        'breadcrumb' => [
            ['label' => 'Academics', 'url' => route('academics.curriculum')],
            ['label' => 'Curriculum'],
        ],
    ])

    <section class="section-padding">
        <div class="container">
            <div class="section-title-s1">
                <span>Academics</span>
                <h2>Our <span>Curriculum</span></h2>
            </div>
            <p>We follow the CBSE curriculum designed to provide a balanced education across all levels.</p>

            <div class="row" style="margin-top:30px;">
                @foreach($data as $item)
                    <div class="col col-md-6" style="margin-bottom:25px;">
                        <div class="panel panel-default" style="border-left:4px solid var(--main-color); padding:15px 20px;">
                            <h4 style="color:var(--main-color); margin-top:0;">{{ $item['class'] }}</h4>
                            <ul style="margin:0; padding-left:18px;">
                                @foreach($item['subjects'] as $subject)
                                    <li>{{ $subject }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</x-web-layout>
