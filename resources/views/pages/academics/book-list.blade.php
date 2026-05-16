<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'Book List',
        'breadcrumb' => [
            ['label' => 'Academics', 'url' => route('academics.curriculum')],
            ['label' => 'Book List'],
        ],
    ])

    <section class="section-padding">
        <div class="container">
            <div class="section-title-s1">
                <span>Academics</span>
                <h2>Book <span>List</span></h2>
            </div>

            <div class="row" style="margin-top:30px;">
                @foreach($data as $item)
                    <div class="col col-md-6 col-lg-4" style="margin-bottom:20px;">
                        <div style="border:1px solid #e0e0e0; border-top:4px solid var(--main-color); border-radius:4px; padding:15px;">
                            <h5 style="color:var(--main-color); margin-top:0;">{{ $item['class'] }}</h5>
                            <ul style="padding-left:16px; margin:0; font-size:13px;">
                                @foreach($item['books'] as $book)
                                    <li>{{ $book }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</x-web-layout>
