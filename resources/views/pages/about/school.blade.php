<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'About School',
        'breadcrumb' => [
            ['label' => 'About Us', 'url' => route('about.school')],
            ['label' => 'About School'],
        ],
    ])

    <section class="about-us section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-md-7">
                    <div class="section-title-s1">
                        <span>About Us</span>
                        <h2>{{ $data['name'] }}</h2>
                    </div>
                    <p>{{ $data['description'] }}</p>

                    <div class="row" style="margin-top:20px;">
                        <div class="col col-sm-6">
                            <ul class="about-details" style="list-style:none; padding:0;">
                                <li><strong>Established:</strong> {{ $data['established'] }}</li>
                                <li><strong>Affiliation:</strong> {{ $data['affiliation'] }}</li>
                                <li><strong>Aff. No.:</strong> {{ $data['aff_no'] }}</li>
                                <li><strong>School No.:</strong> {{ $data['school_no'] }}</li>
                            </ul>
                        </div>
                        <div class="col col-sm-6">
                            <ul class="about-details" style="list-style:none; padding:0;">
                                <li><strong>Phone:</strong> {{ $data['phone'] }}</li>
                                <li><strong>Email:</strong> {{ $data['email'] }}</li>
                                <li><strong>Address:</strong> {{ $data['address'] }}</li>
                            </ul>
                        </div>
                    </div>

                    <div style="margin-top:25px;">
                        <h4>Our Highlights</h4>
                        <ul class="about-details">
                            @foreach($data['highlights'] as $highlight)
                                <li><i class="fa fa-check-circle" style="color:var(--main-color); margin-right:6px;"></i> {{ $highlight }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col col-md-5">
                    <img src="{{ asset('assets/web/images/about-us/img-1.jpg') }}"
                         alt="About {{ $data['name'] }}"
                         class="img img-responsive"
                         style="border-radius:4px; width:100%;">
                </div>
            </div>
        </div>
    </section>

</x-web-layout>
