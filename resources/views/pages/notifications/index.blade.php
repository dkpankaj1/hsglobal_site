<x-web-layout>

    @include('Layouts._web.page-header', [
        'title' => 'Notice Board',
        'breadcrumb' => [['label' => 'Notice Board']],
    ])

    <section style="padding:50px 0 60px; background:#fafafa;">
        <div class="container">
            <div class="section-title-s1">
                <span>Stay Informed</span>
                <h2>Notice Board</h2>
            </div>

            @if ($notifications->count() > 0)
                <div class="table-responsive" style="margin-top:28px;">
                    <table class="table notice-table">
                        <thead>
                            <tr>
                                <th style="width:60px;">#</th>
                                <th>Title</th>
                                <th style="width:130px;">Date</th>
                                <th style="width:100px;">Attachment</th>
                                <th style="width:100px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notifications as $notice)
                                <tr>
                                    <td class="notice-num">
                                        {{ $loop->iteration + ($notifications->currentPage() - 1) * $notifications->perPage() }}
                                    </td>
                                    <td>
                                        <a href="{{ route('notifications.show', $notice->id) }}"
                                            class="notice-row-title">
                                            {{ $notice->title }}
                                        </a>
                                        <p class="notice-row-desc">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($notice->description ?? ''), 100) ?: '—' }}
                                        </p>
                                    </td>
                                    <td class="notice-row-date">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        {{ $notice->created_at->format('d M, Y') }}
                                    </td>
                                    <td class="text-center">
                                        @if ($notice->document)
                                            <a href="{{ $notice->getDocumentUrl() }}" target="_blank"
                                                class="notice-doc-icon" title="Download">
                                                <i class="fa fa-paperclip" aria-hidden="true"></i>
                                            </a>
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('notifications.show', $notice->id) }}"
                                            class="notice-view-btn">
                                            View <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if ($notifications->hasPages())
                    <div class="d-flex justify-content-center" style="margin-top:24px;">
                        {{ $notifications->links() }}
                    </div>
                @endif
            @else
                <div class="text-center" style="padding:60px 0;">
                    <i class="fa fa-bullhorn" aria-hidden="true"
                        style="font-size:3rem; color:#cbd5e1; display:block; margin-bottom:16px;"></i>
                    <h4 style="color:#475569;">No Notices Yet</h4>
                    <p style="color:#94a3b8;">There are no notices published at the moment. Please check back soon.</p>
                </div>
            @endif
        </div>
    </section>

    @push('pageStyles')
        <style>
            .notice-table {
                background: #fff;
                border-radius: 10px;
                overflow: hidden;
                border: 1px solid #e2e8f0;
                margin-bottom: 0;
            }

            .notice-table thead th {
                background: #f8fafc;
                border-bottom: 2px solid #e2e8f0;
                font-size: .82rem;
                font-weight: 650;
                color: #475569;
                text-transform: uppercase;
                letter-spacing: .4px;
                padding: 14px 16px;
                vertical-align: middle;
            }

            .notice-table tbody td {
                padding: 16px;
                vertical-align: middle;
                border-bottom: 1px solid #f1f5f9;
                font-size: .92rem;
                color: #334155;
            }

            .notice-table tbody tr:hover {
                background: #fafbfc;
            }

            .notice-table tbody tr:last-child td {
                border-bottom: none;
            }

            .notice-num {
                font-weight: 650;
                color: #94a3b8;
                text-align: center;
            }

            .notice-row-title {
                color: #1e293b;
                font-weight: 600;
                text-decoration: none;
                font-size: .95rem;
                display: block;
                margin-bottom: 4px;
            }

            .notice-row-title:hover {
                color: var(--theme-main);
            }

            .notice-row-desc {
                font-size: .82rem;
                color: #94a3b8;
                margin: 0;
                line-height: 1.4;
            }

            .notice-row-date {
                white-space: nowrap;
                font-size: .84rem;
                color: #64748b;
            }

            .notice-row-date i {
                color: #f97316;
                margin-right: 4px;
            }

            .notice-doc-icon {
                color: #3b82f6;
                font-size: 1.05rem;
                padding: 6px 10px;
                border-radius: 6px;
                transition: background .18s;
            }

            .notice-doc-icon:hover {
                background: #eff6ff;
                color: #1d4ed8;
            }

            .notice-view-btn {
                display: inline-block;
                background: var(--theme-main);
                color: #fff;
                padding: 6px 16px;
                border-radius: 6px;
                font-size: .82rem;
                font-weight: 550;
                text-decoration: none;
                transition: opacity .2s;
                white-space: nowrap;
            }

            .notice-view-btn:hover {
                opacity: .85;
                color: #fff;
            }

            @media (max-width: 768px) {
                .notice-table thead {
                    display: none;
                }

                .notice-table tbody td {
                    display: block;
                    text-align: right;
                    padding: 10px 14px;
                }

                .notice-table tbody td::before {
                    content: attr(data-label);
                    float: left;
                    font-weight: 650;
                    color: #64748b;
                    font-size: .78rem;
                    text-transform: uppercase;
                }

                .notice-table tbody td:first-child {
                    display: none;
                }

                .notice-row-desc {
                    display: none;
                }
            }
        </style>
    @endpush

</x-web-layout>
