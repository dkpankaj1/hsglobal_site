<x-web-layout>

    @include('Layouts._web.page-header', [
        'title'      => 'Contact Us',
        'breadcrumb' => [
            ['label' => 'Contact Us'],
        ],
    ])

    <section class="section-padding">
        <div class="container">
            <div class="row">

                {{-- Contact Information --}}
                <div class="col col-md-4" style="margin-bottom:30px;">
                    <div class="section-title-s1">
                        <span>Get In Touch</span>
                        <h2>Contact <span>Info</span></h2>
                    </div>

                    <ul style="list-style:none; padding:0; margin-top:20px;">
                        <li style="display:flex; gap:15px; margin-bottom:20px;">
                            <i class="fa fa-map-marker fa-lg" style="color:var(--main-color); width:20px; margin-top:3px;"></i>
                            <span>{{ $info['address'] }}</span>
                        </li>
                        <li style="display:flex; gap:15px; margin-bottom:20px;">
                            <i class="fa fa-phone fa-lg" style="color:var(--main-color); width:20px;"></i>
                            <a href="tel:{{ $info['phone'] }}">{{ $info['phone'] }}</a>
                        </li>
                        <li style="display:flex; gap:15px; margin-bottom:20px;">
                            <i class="fa fa-envelope fa-lg" style="color:var(--main-color); width:20px;"></i>
                            <a href="mailto:{{ $info['email'] }}">{{ $info['email'] }}</a>
                        </li>
                        <li style="display:flex; gap:15px; margin-bottom:20px;">
                            <i class="fa fa-clock-o fa-lg" style="color:var(--main-color); width:20px;"></i>
                            <span>{{ $info['timings'] }}</span>
                        </li>
                    </ul>
                </div>

                {{-- Contact Form --}}
                <div class="col col-md-8">
                    <div class="section-title-s1">
                        <span>Send Us A Message</span>
                        <h2>Contact <span>Form</span></h2>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success" style="margin-top:15px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" style="margin-top:20px;">
                        @csrf

                        <div class="row">
                            <div class="col col-sm-6">
                                <div class="form-group">
                                    <input type="text"
                                           name="name"
                                           class="form-control"
                                           placeholder="Your Name *"
                                           value="{{ old('name') }}"
                                           required>
                                    @error('name')
                                        <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-sm-6">
                                <div class="form-group">
                                    <input type="email"
                                           name="email"
                                           class="form-control"
                                           placeholder="Your Email *"
                                           value="{{ old('email') }}"
                                           required>
                                    @error('email')
                                        <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-sm-6">
                                <div class="form-group">
                                    <input type="text"
                                           name="phone"
                                           class="form-control"
                                           placeholder="Phone Number"
                                           value="{{ old('phone') }}">
                                </div>
                            </div>
                            <div class="col col-sm-6">
                                <div class="form-group">
                                    <input type="text"
                                           name="subject"
                                           class="form-control"
                                           placeholder="Subject *"
                                           value="{{ old('subject') }}"
                                           required>
                                    @error('subject')
                                        <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <textarea name="message"
                                      class="form-control"
                                      rows="5"
                                      placeholder="Your Message *"
                                      required>{{ old('message') }}</textarea>
                            @error('message')
                                <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn theme-btn-s2">Send Message</button>
                    </form>
                </div>

            </div>
        </div>
    </section>

</x-web-layout>
