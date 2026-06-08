<x-web-layout>

    @include('layouts._web.page-header', [
        'title' => 'Book List',
        'breadcrumb' => [
            ['label' => 'Academics', 'url' => route('academics.curriculum')],
            ['label' => 'Book List'],
        ],
    ])

    <section class="section-padding">
        <div class="container">
            <div class="section-title-s1">
                <span>Academics</span>
                <h2>Book List</h2>
            </div>
            <p style="font-size:15px; color:#555; max-width:780px; line-height:1.85; margin-bottom:34px;">
                This class-wise list helps students and parents quickly identify the required books for the academic
                session.
                Please verify editions and publication updates with the school office before purchase.
            </p>

            <div class="table-responsive"
                style="border-radius:8px; overflow:hidden; box-shadow:0 3px 16px rgba(0,0,0,0.08);">
                <table class="table" style="margin:0; background:#fff;">
                    <thead>
                        <tr style="background:var(--theme-main); color:#fff;">
                            <th style="padding:14px 16px; border:none; width:60px;">#</th>
                            <th style="padding:14px 16px; border:none; width:180px;">Class</th>
                            <th style="padding:14px 16px; border:none;">Required Books</th>
                            <th style="padding:14px 16px; border:none; width:130px; text-align:center;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)
                            <tr
                                style="background:{{ $index % 2 === 0 ? '#ffffff' : '#f8fafd' }}; border-bottom:1px solid #edf1f6;">
                                <td
                                    style="padding:14px 16px; border:none; color:#888; font-size:13px; vertical-align:top;">
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </td>
                                <td style="padding:14px 16px; border:none; vertical-align:top;">
                                    <strong
                                        style="color:var(--theme-main); font-size:14px;">{{ $item['class'] }}</strong>
                                </td>
                                <td style="padding:14px 16px; border:none; vertical-align:top;">
                                    <ol
                                        style="margin:0; padding-left:18px; color:#555; font-size:13px; line-height:1.75;">
                                        @foreach ($item['books'] as $book)
                                            <li>{{ $book }}</li>
                                        @endforeach
                                    </ol>
                                </td>
                                <td style="padding:14px 16px; border:none; vertical-align:top; text-align:center;">
                                    <span
                                        style="display:inline-block; min-width:34px; height:34px; line-height:34px;
                                             border-radius:50%; background:#eef3ff; color:var(--theme-main);
                                             font-size:13px; font-weight:700; border:1px solid #c6d4f4;">
                                        {{ count($item['books']) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div
                style="margin-top:20px; background:#fffbea; border:1px solid #ffe082; border-radius:8px; padding:14px 18px;">
                <p style="margin:0; font-size:13px; color:#666; line-height:1.75;">
                    <i class="fa fa-info-circle" style="color:#f9a825; margin-right:6px;"></i>
                    For Classes XI and XII, books vary by stream. Final subject-wise book details are shared by the
                    respective stream coordinators.
                </p>
            </div>
        </div>
    </section>

</x-web-layout>
