<div class="bottom-topbar">
    <div class="container">
        <div class="row">
            <div class="col col-md-4 logo-holder">
                <a href="{{ route('home') }}">
                    <img src="{{ $setting?->logo_url ?? asset('static/logo/logo.png') }}"
                        alt="{{ $setting?->brand_name ?? 'HSGA School' }}" style="max-height: 85px;">
                </a>
            </div>
            <div class="col col-md-8 bottom-topbar-info-wrapper">
                <div class="bottom-topbar-info">


                    <div>
                        <span class="icon">
                            <i class="fi flaticon-interface"></i>
                        </span>
                        <h4>Email</h4>
                        <p>{{ $setting->contact_email }}</p>
                    </div>

                    <div>
                        <span class="icon">
                            <i class="fi flaticon-interface"></i>
                        </span>
                        <h4>Phone</h4>
                        <p>{{ $setting->contact_phone }}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
