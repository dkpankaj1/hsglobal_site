<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'Notification',
        'breadcrumb' => [
            ['label' => 'Notifications', 'url' => route('notifications.list')],
            ['label' => $notification['title']],
        ],
    ])

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-lg-8 col-lg-offset-2">
                    <div class="notification-detail">
                        <div class="notification-detail-header">
                            <span class="notification-category badge" style="background-color: {{ $notification['category'] === 'Admissions' ? 'var(--main-color)' : ($notification['category'] === 'Academics' ? '#0066cc' : ($notification['category'] === 'Activities' ? '#00a86b' : ($notification['category'] === 'Transport' ? '#ff6b6b' : ($notification['category'] === 'Sports' ? '#ffa500' : '#666')))) }};">
                                {{ $notification['category'] }}
                            </span>
                            <span class="notification-date">
                                <i class="fa fa-calendar" aria-hidden="true"></i> {{ \Carbon\Carbon::parse($notification['date'])->format('d M Y') }}
                            </span>
                        </div>

                        <h1 class="notification-detail-title">{{ $notification['title'] }}</h1>

                        <div class="notification-detail-content">
                            <p>{{ $notification['content'] }}</p>
                        </div>

                        <div class="notification-actions">
                            <a href="{{ route('notifications.list') }}" class="theme-btn-s2">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Notifications
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-web-layout>
