<x-web-layout>

    @include('layouts._web.page-header', [
        'title' => 'Notice Board',
        'breadcrumb' => [
            ['label' => 'Notice Board', 'url' => route('notifications.list')],
            ['label' => $notification->title],
        ],
    ])

    <section style="padding:50px 0 60px; background:#fafafa;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">

                    <div class="notice-detail-card">
                        <div class="notice-detail-header">
                            <span class="notice-detail-date">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                {{ $notification->created_at->format('d M, Y') }}
                            </span>
                            @if ($notification->is_publish)
                                <span class="notice-detail-badge">Published</span>
                            @endif
                        </div>

                        <h1 class="notice-detail-title">{{ $notification->title }}</h1>

                        <div class="notice-detail-body">
                            {!! nl2br(e($notification->description)) ?:
                                '<p class="text-muted">No additional details provided for this notice.</p>' !!}
                        </div>

                        @if ($notification->document)
                            <hr style="margin:24px 0; border-color:#e2e8f0;">
                            <a href="{{ $notification->getDocumentUrl() }}" target="_blank" class="notice-doc-btn">
                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                Download Attachment
                                <i class="fa fa-download" aria-hidden="true"></i>
                            </a>
                        @endif

                        <hr style="margin:28px 0; border-color:#e2e8f0;">

                        <div class="notice-detail-footer">
                            <a href="{{ route('notifications.list') }}" class="notice-back-btn">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> All Notices
                            </a>
                            <span class="text-muted" style="font-size:.82rem;">
                                HS Global Academy &middot; Notice Board
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    @push('pageStyles')
        <style>
            .notice-detail-card {
                background: #fff;
                border-radius: 14px;
                border: 1px solid #e2e8f0;
                padding: 34px 36px 28px;
                box-shadow: 0 2px 12px rgba(15, 23, 42, .05);
            }

            .notice-detail-header {
                display: flex;
                align-items: center;
                gap: 12px;
                margin-bottom: 20px;
                flex-wrap: wrap;
            }

            .notice-detail-date {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                font-size: .85rem;
                color: #64748b;
                background: #f1f5f9;
                padding: 4px 14px;
                border-radius: 20px;
            }

            .notice-detail-date i {
                color: #f97316;
            }

            .notice-detail-badge {
                display: inline-block;
                font-size: .75rem;
                font-weight: 600;
                padding: 3px 14px;
                border-radius: 20px;
                background: #fef3c7;
                color: #b45309;
                text-transform: uppercase;
                letter-spacing: .4px;
            }

            .notice-detail-title {
                font-size: 1.7rem;
                font-weight: 700;
                color: #0f172a;
                line-height: 1.35;
                margin-bottom: 24px;
            }

            .notice-detail-body {
                font-size: .98rem;
                color: #475569;
                line-height: 1.85;
            }

            .notice-doc-btn {
                display: inline-flex;
                align-items: center;
                gap: 10px;
                background: #f8fafc;
                border: 1px solid #e2e8f0;
                border-radius: 10px;
                padding: 12px 22px;
                text-decoration: none;
                color: #1e40af;
                font-weight: 550;
                font-size: .9rem;
                transition: all .2s;
            }

            .notice-doc-btn:hover {
                background: #eff6ff;
                border-color: #bfdbfe;
                color: #1e3a8a;
            }

            .notice-doc-btn i:first-child {
                color: #f97316;
                font-size: 1.1rem;
            }

            .notice-doc-btn i:last-child {
                margin-left: auto;
                font-size: .82rem;
                opacity: .55;
            }

            .notice-detail-footer {
                display: flex;
                align-items: center;
                justify-content: space-between;
                flex-wrap: wrap;
                gap: 12px;
            }

            .notice-back-btn {
                display: inline-flex;
                align-items: center;
                gap: 7px;
                background: var(--theme-main);
                color: #fff;
                border: none;
                padding: 10px 22px;
                border-radius: 8px;
                font-weight: 550;
                font-size: .9rem;
                text-decoration: none;
                transition: opacity .2s;
            }

            .notice-back-btn:hover {
                opacity: .88;
                color: #fff;
            }
        </style>
    @endpush

</x-web-layout>
