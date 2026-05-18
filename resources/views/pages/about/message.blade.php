{{-- Shared template for Chairman / Director / Principal messages --}}
<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => $data['role'],
        'breadcrumb' => [
            ['label' => 'About Us', 'url' => route('about.school')],
            ['label' => $data['role']],
        ],
    ])

    <section class="msg-section">
        <div class="container">
            <div class="row msg-row">

                {{-- Profile Card --}}
                <div class="col-md-4 msg-col">
                    <div class="msg-profile">
                        <img src="{{ $data['photo'] }}"
                             alt="{{ $data['name'] }}"
                             class="msg-avatar"
                             onerror="this.onerror=null;this.src='https://ui-avatars.com/api/?name={{ urlencode($data['name']) }}&size=260&background=751419&color=fff';">
                        <h3 class="msg-name">{{ $data['name'] }}</h3>
                        <span class="msg-role-badge">{{ $data['role'] }}</span>
                        <div class="msg-divider"></div>
                        <p class="msg-hint">Message from the {{ $data['role'] }}</p>
                    </div>
                </div>

                {{-- Message Content --}}
                <div class="col-md-8 msg-col">
                    <div class="msg-content">
                        <div class="msg-heading">
                            <div class="msg-accent-bar"></div>
                            <div>
                                <p class="msg-label">A Message From</p>
                                <h2 class="msg-title">{{ $data['role'] }}</h2>
                            </div>
                        </div>

                        <div class="msg-card">
                            <p class="msg-body">{!! nl2br(e($data['message'])) !!}</p>

                            <div class="msg-signature">
                                <img src="{{ $data['photo'] }}"
                                     alt="{{ $data['name'] }}"
                                     class="msg-sig-avatar"
                                     onerror="this.onerror=null;this.src='https://ui-avatars.com/api/?name={{ urlencode($data['name']) }}&size=44&background=751419&color=fff';">
                                <div>
                                    <p class="msg-sig-name">{{ $data['name'] }}</p>
                                    <p class="msg-sig-role">{{ $data['role'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</x-web-layout>
