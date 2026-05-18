<div class="logo-box">
    <!-- Brand Logo Light -->
    <a href="{{ route('admin.dashboard') }}" class="logo-light">
        <img src="{{ $setting?->logo_url ?? asset('assets/backend/images/logo-light.png') }}" alt="{{ $setting?->brand_name ?? 'logo' }}" class="logo-lg" height="18">
        <img src="{{ $setting?->logo_url ?? asset('assets/backend/images/logo-sm.png') }}" alt="{{ $setting?->brand_name ?? 'logo' }}" class="logo-sm" height="24">
    </a>

    <!-- Brand Logo Dark -->
    <a href="{{ route('admin.dashboard') }}" class="logo-dark">
        <img src="{{ $setting?->logo_url ?? asset('assets/backend/images/logo-dark.png') }}" alt="{{ $setting?->brand_name ?? 'logo' }}" class="logo-lg" height="18">
        <img src="{{ $setting?->logo_url ?? asset('assets/backend/images/logo-sm.png') }}" alt="{{ $setting?->brand_name ?? 'logo' }}" class="logo-sm" height="24">
    </a>
</div>

