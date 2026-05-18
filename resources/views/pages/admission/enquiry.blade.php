<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'Admission Enquiry',
        'breadcrumb' => [
            ['label' => 'Admission', 'url' => route('admission.procedure')],
            ['label' => 'Admission Enquiry'],
        ],
    ])

    <section style="padding:52px 0 70px; background:#f8fbff;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12" style="margin-bottom:30px;">
                    <div style="background:#fff; border-radius:20px; padding:28px; box-shadow:0 14px 40px rgba(15,23,42,.08); border:1px solid rgba(15,23,42,.08); height:100%;">
                        <div class="section-title-s1">
                            <span>Admission Help</span>
                            <h2>Talk to Us</h2>
                        </div>

                        <p style="color:#64748b; margin-top:12px; line-height:1.8;">
                            Fill out the enquiry form and our admission team will connect with you shortly.
                        </p>

                        <ul style="list-style:none; padding:0; margin:22px 0 0;">
                            <li style="display:flex; gap:12px; margin-bottom:16px;">
                                <i class="fa fa-map-marker" style="color:var(--main-color); width:18px; margin-top:4px;"></i>
                                <span>{{ $info['address'] }}</span>
                            </li>
                            <li style="display:flex; gap:12px; margin-bottom:16px;">
                                <i class="fa fa-phone" style="color:var(--main-color); width:18px; margin-top:4px;"></i>
                                <a href="tel:{{ $info['phone'] }}">{{ $info['phone'] }}</a>
                            </li>
                            <li style="display:flex; gap:12px; margin-bottom:16px;">
                                <i class="fa fa-envelope" style="color:var(--main-color); width:18px; margin-top:4px;"></i>
                                <a href="mailto:{{ $info['email'] }}">{{ $info['email'] }}</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-8 col-md-12" style="margin-bottom:30px;">
                    <div style="background:#fff; border-radius:20px; padding:30px; box-shadow:0 14px 40px rgba(15,23,42,.08); border:1px solid rgba(15,23,42,.08);">
                        <div class="section-title-s1">
                            <span>Admission Form</span>
                            <h2>Enquiry Form</h2>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success" style="margin-top:18px; border-radius:12px;">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('admission.enquiry.submit') }}" method="POST" style="margin-top:22px;">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="student_name" class="form-control" placeholder="Student Name *" value="{{ old('student_name') }}" required>
                                        @error('student_name')
                                            <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="admission_class" class="form-control" placeholder="Applying For Class *" value="{{ old('admission_class') }}" required>
                                        @error('admission_class')
                                            <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="parent_name" class="form-control" placeholder="Parent Name *" value="{{ old('parent_name') }}" required>
                                        @error('parent_name')
                                            <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control" placeholder="Phone Number *" value="{{ old('phone') }}" required>
                                        @error('phone')
                                            <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email Address" value="{{ old('email') }}">
                                        @error('email')
                                            <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
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
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-web-layout>