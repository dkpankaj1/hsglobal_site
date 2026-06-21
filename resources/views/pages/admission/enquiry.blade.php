<x-web-layout>

    @include('layouts._web.page-header', [
        'title' => 'Admission Enquiry',
        'breadcrumb' => [
            ['label' => 'Admission', 'url' => route('admission.procedure')],
            ['label' => 'Admission Enquiry'],
        ],
    ])

    <section style="padding:52px 0 70px; background:#f8fbff;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12" style="margin-bottom:30px;">
                    <div
                        style="background:#fff; border-radius:20px; padding:28px; box-shadow:0 14px 40px rgba(15,23,42,.08); border:1px solid rgba(15,23,42,.08); height:100%;">
                        <div class="section-title-s1">
                            <span>Admission Help</span>
                            <h2>Talk to Us</h2>
                        </div>

                        <p style="color:#64748b; margin-top:12px; line-height:1.8;">
                            Fill out the enquiry form and our admission team will connect with you shortly.
                        </p>

                        <ul style="list-style:none; padding:0; margin:22px 0 0;">
                            @if ($setting?->contact_phone)
                                <li style="display:flex; gap:12px; margin-bottom:16px;">
                                    <i class="fa fa-phone"
                                        style="color:var(--main-color); width:18px; margin-top:4px;"></i>
                                    <a href="tel:{{ $setting->contact_phone }}">{{ $setting->contact_phone }}</a>
                                </li>
                            @endif
                            @if ($setting?->contact_email)
                                <li style="display:flex; gap:12px; margin-bottom:16px;">
                                    <i class="fa fa-envelope"
                                        style="color:var(--main-color); width:18px; margin-top:4px;"></i>
                                    <a href="mailto:{{ $setting->contact_email }}">{{ $setting->contact_email }}</a>
                                </li>
                            @endif
                        </ul>

                        @if ($setting?->is_open && $setting?->start_date && $setting?->end_date)
                            <div class="mt-3 p-3 rounded"
                                style="background:#ecfdf5; border:1px solid #a7f3d0; padding:0.5rem">
                                <small class="text-success fw-bold">
                                    <i class="fa fa-calendar-check me-1"></i> Admissions Open
                                </small>
                                <p class="mb-0 mt-1" style="font-size:12px; color:#065f46;">
                                    {{ $setting->start_date->format('d M Y') }} &ndash;
                                    {{ $setting->end_date->format('d M Y') }}
                                    @if ($setting->academic_year)
                                        <br>Academic Year: {{ $setting->academic_year }}
                                    @endif
                                </p>
                            </div>
                        @elseif ($setting && !$setting->is_open)
                            <div class="mt-3 p-3 rounded"
                                style="background:#fef2f2; border:1px solid #fecaca; padding:0.5rem">
                                <small class="text-danger fw-bold">
                                    <i class="fa fa-calendar-times me-1"></i> Admissions Closed
                                </small>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-8 col-md-12" style="margin-bottom:30px;">
                    <div
                        style="background:#fff; border-radius:20px; padding:30px; box-shadow:0 14px 40px rgba(15,23,42,.08); border:1px solid rgba(15,23,42,.08);">
                        <div class="section-title-s1">
                            <span>Admission Form</span>
                            <h2>Enquiry Form</h2>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success" style="margin-top:18px; border-radius:12px;">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger" style="margin-top:18px; border-radius:12px;">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if ($setting && !$setting->is_open)
                            <div class="alert alert-warning" style="margin-top:18px; border-radius:12px;">
                                <strong>Admissions are currently closed.</strong> The enquiry form is temporarily
                                disabled.
                                Please check back later or contact us directly.
                            </div>
                        @else
                            @if ($setting?->instructions)
                                <div class="p-3 mb-3 rounded"
                                    style="background:#f8fafc; border:1px solid #e2e8f0; font-size:13px; color:#475569;padding: 0.7rem;">
                                    <i class="fa fa-info-circle text-primary me-1"></i> {!! nl2br(e($setting->instructions)) !!}
                                </div>
                            @endif

                            <form action="{{ route('admission.enquiry.submit') }}" method="POST"
                                style="margin-top:8px;">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="student_name" class="form-control"
                                                placeholder="Student Name *" value="{{ old('student_name') }}"
                                                required>
                                            @error('student_name')
                                                <span class="text-danger"
                                                    style="font-size:12px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select name="admission_class" class="form-control" required>
                                                <option value="">Applying For Class *</option>
                                                @foreach ($classList as $class)
                                                    <option value="{{ $class }}"
                                                        {{ old('admission_class') == $class ? 'selected' : '' }}>
                                                        {{ $class }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('admission_class')
                                                <span class="text-danger"
                                                    style="font-size:12px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="parent_name" class="form-control"
                                                placeholder="Parent Name *" value="{{ old('parent_name') }}" required>
                                            @error('parent_name')
                                                <span class="text-danger"
                                                    style="font-size:12px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="phone" class="form-control"
                                                placeholder="Phone Number *" value="{{ old('phone') }}" required>
                                            @error('phone')
                                                <span class="text-danger"
                                                    style="font-size:12px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Email Address" value="{{ old('email') }}">
                                            @error('email')
                                                <span class="text-danger"
                                                    style="font-size:12px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <textarea name="message" class="form-control" rows="5" placeholder="Your Message *" required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn theme-btn-s2">Submit Enquiry</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-web-layout>
