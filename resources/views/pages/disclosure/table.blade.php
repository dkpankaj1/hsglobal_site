{{-- Reusable disclosure table view --}}
<x-web-layout>

    @include('Layouts._web.page-header', [
        'title' => $pageTitle,
        'breadcrumb' => [
            ['label' => 'Mandatory Disclosure', 'url' => route('disclosure.index')],
            ['label' => $pageTitle],
        ],
    ])

    <section class="section-padding">
        <div class="container">
            <div class="section-title-s1">
                <span>Mandatory Disclosure</span>
                <h2><span>{{ $pageTitle }}</span></h2>
            </div>

            <div class="table-responsive" style="margin-top:30px;">
                <table class="table table-bordered table-hover">
                    <thead style="background-color:var(--main-color); color:#fff;">
                        <tr>
                            @foreach ($columns as $col)
                                <th>{{ $col }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $row)
                            <tr>
                                @foreach ($row as $cell)
                                    <td>{{ $cell }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</x-web-layout>
