<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'Notifications',
        'breadcrumb' => [
            ['label' => 'Notifications'],
        ],
    ])

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-lg-8 col-lg-offset-2">
                    @if(count($notifications) > 0)
                        <div class="notifications-list">
                            @foreach($notifications as $notif)
                                <div class="notification-card">
                                    <div class="notification-header">
                                        <div class="notification-meta">
                                            <span class="notification-category badge" style="background-color: {{ $notif['category'] === 'Admissions' ? 'var(--main-color)' : ($notif['category'] === 'Academics' ? '#0066cc' : ($notif['category'] === 'Activities' ? '#00a86b' : ($notif['category'] === 'Transport' ? '#ff6b6b' : ($notif['category'] === 'Sports' ? '#ffa500' : '#666')))) }};">
                                                {{ $notif['category'] }}
                                            </span>
                                            <span class="notification-date">
                                                <i class="fa fa-calendar" aria-hidden="true"></i> {{ \Carbon\Carbon::parse($notif['date'])->format('d M Y') }}
                                            </span>
                                        </div>
                                    </div>
                                    <h3 class="notification-title">
                                        <a href="{{ route('notifications.show', $notif['id']) }}">{{ $notif['title'] }}</a>
                                    </h3>
                                    <p class="notification-excerpt">{{ $notif['excerpt'] }}</p>
                                    <a href="{{ route('notifications.show', $notif['id']) }}" class="read-more">
                                        Read More <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-info">
                            <p>No notifications at this time. Please check back soon.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

</x-web-layout>
