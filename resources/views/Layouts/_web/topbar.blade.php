<div class="topbar">
    <div class="container">
        <div class="row">
            <div class="col col-sm-6 contact-info">
                <ul>
                    {{-- <li><i class="fa fa-envelope-o" aria-hidden="true"></i> {{ $setting?->contact_email ?? 'info@hsgaschool.in' }}</li> --}}
                    <li><i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                        {{ $setting?->contact_phone ?? '+91 00000 00000' }}</li>
                </ul>
            </div>
            @if ($admission_setting->is_open)
                <div class="col col-sm-6 language-login-wrapper">
                    <div class="language-login clearfix">

                        <div class="client-login">
                            <a href="{{ route('admission.enquiry') }}">
                                <i class="fa fa-key" aria-hidden="true"></i>
                                Admission 2026-27</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
