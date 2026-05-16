<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'Documents & Information',
        'breadcrumb' => [
            ['label' => 'Mandatory Disclosure', 'url' => route('disclosure.general')],
            ['label' => 'Documents & Information'],
        ],
    ])

    <section class="section-padding">
        <div class="container">
            <div class="section-title-s1">
                <span>Mandatory Disclosure</span>
                <h2>Documents <span>&amp; Information</span></h2>
            </div>

            <div class="row" style="margin-top:30px;">
                <div class="col col-md-8">
                    <table class="table table-bordered table-hover">
                        <thead style="background-color:var(--main-color); color:#fff;">
                            <tr><th>#</th><th>Document Name</th><th>Download</th></tr>
                        </thead>
                        <tbody>
                            @foreach($data as $i => $doc)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $doc['name'] }}</td>
                                    <td>
                                        <a href="{{ $doc['file'] }}" class="btn btn-xs btn-default">
                                            <i class="fa fa-download"></i> Download
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</x-web-layout>
