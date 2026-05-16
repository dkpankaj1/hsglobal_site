<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'TC Sample',
        'breadcrumb' => [
            ['label' => 'Admission', 'url' => route('admission.procedure')],
            ['label' => 'TC Sample'],
        ],
    ])

    <section class="section-padding">
        <div class="container">
            <div class="section-title-s1">
                <span>Admission</span>
                <h2>Transfer Certificate <span>Sample</span></h2>
            </div>

            <div class="row" style="margin-top:30px;">
                <div class="col col-md-8">
                    <p>{{ $data['note'] }}</p>
                    <div style="border:2px solid var(--main-color); border-radius:4px; padding:25px; margin-top:20px;">
                        <h4 style="text-align:center; margin-bottom:20px; color:var(--main-color);">
                            H.S. Global Academy<br>
                            <small style="font-size:13px; color:#666;">CBSE Affiliated | Transfer Certificate</small>
                        </h4>
                        <table class="table table-bordered" style="margin-bottom:0;">
                            @foreach($data['fields'] as $i => $field)
                                <tr>
                                    <td style="width:40%; background:#f8f8f8;"><strong>{{ $i + 1 }}. {{ $field }}</strong></td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </table>
                        <div style="margin-top:30px; text-align:right;">
                            <p style="margin:0;">Principal's Signature &amp; School Stamp</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-web-layout>
