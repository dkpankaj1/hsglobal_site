<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'Vision & Mission',
        'breadcrumb' => [
            ['label' => 'About Us', 'url' => route('about.school')],
            ['label' => 'Vision & Mission'],
        ],
    ])

    <section class="section-padding">
        <div class="container">

            <div class="row">
                <div class="col col-md-6" style="margin-bottom:30px;">
                    <div class="section-title-s1">
                        <span>Our Vision</span>
                        <h2>What We Aspire To Be</h2>
                    </div>
                    <p>{{ $data['vision'] }}</p>
                </div>
                <div class="col col-md-6" style="margin-bottom:30px;">
                    <div class="section-title-s1">
                        <span>Our Mission</span>
                        <h2>How We Achieve It</h2>
                    </div>
                    <p>{{ $data['mission'] }}</p>
                </div>
            </div>

            <hr style="margin:30px 0;">

            <div class="row section-title-s3">
                <div class="col col-xs-12 text-center">
                    <h2>Our Core <span>Values</span></h2>
                </div>
            </div>

            <div class="row" style="margin-top:20px;">
                @foreach($data['core_values'] as $value)
                    <div class="col col-sm-6 col-md-3" style="margin-bottom:25px; text-align:center;">
                        <i class="fa {{ $value['icon'] }} fa-3x" style="color:var(--main-color); margin-bottom:12px;"></i>
                        <h4>{{ $value['title'] }}</h4>
                        <p>{{ $value['text'] }}</p>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

</x-web-layout>
