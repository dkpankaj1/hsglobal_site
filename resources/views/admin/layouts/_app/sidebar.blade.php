<div data-simplebar>
    <ul class="app-menu">

        {{-- ──────────────── HOME ──────────────── --}}
        <li class="menu-title">Home</li>

        <li class="menu-item">
            <a href="{{ route('admin.dashboard') }}" class="menu-link waves-effect">
                <span class="menu-icon"><i data-lucide="airplay"></i></span>
                <span class="menu-text"> Dashboard </span>
            </a>
        </li>

        {{-- ──────────────── CONTENT ──────────────── --}}
        <li class="menu-title">Content</li>

        <li class="menu-item">
            <a href="{{ route('admin.important-notice.edit') }}" class="menu-link waves-effect">
                <span class="menu-icon"><i data-lucide="megaphone"></i></span>
                <span class="menu-text"> Important Notice </span>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('admin.image-slider.index') }}" class="menu-link waves-effect">
                <span class="menu-icon"><i data-lucide="image"></i></span>
                <span class="menu-text"> Image Slider </span>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('admin.notice-board.index') }}" class="menu-link waves-effect">
                <span class="menu-icon"><i data-lucide="clipboard-list"></i></span>
                <span class="menu-text"> Notice Board </span>
            </a>
        </li>

        <li class="menu-item">
            <a href="#menuGallery" data-bs-toggle="collapse" class="menu-link waves-effect">
                <span class="menu-icon"><i data-lucide="images"></i></span>
                <span class="menu-text"> Gallery </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="menuGallery">
                <ul class="sub-menu">
                    <li class="menu-item">
                        <a href="{{ route('admin.video-gallery.index') }}" class="menu-link">
                            <span class="menu-text">Video Gallery</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.gallery.index') }}" class="menu-link">
                            <span class="menu-text">Photo Gallery</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="menu-item">
            <a href="{{ route('admin.facility.index') }}" class="menu-link waves-effect">
                <span class="menu-icon"><i data-lucide="building-2"></i></span>
                <span class="menu-text"> Facilities </span>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('admin.mandatory-disclosure.index') }}" class="menu-link waves-effect">
                <span class="menu-icon"><i data-lucide="file-text"></i></span>
                <span class="menu-text"> Mandatory Disclosure </span>
            </a>
        </li>

        {{-- ──────────────── PAGES ──────────────── --}}
        <li class="menu-title">Pages</li>

        <li class="menu-item">
            <a href="#menuAcademics" data-bs-toggle="collapse" class="menu-link waves-effect">
                <span class="menu-icon"><i data-lucide="book-open"></i></span>
                <span class="menu-text"> Academics Pages </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="menuAcademics">
                <ul class="nav flex-column sub-menu">
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('admin.academics.pages.edit', 'curriculum') }}">
                            <span class="menu-text">Curriculum</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('admin.academics.pages.edit', 'examination-policy') }}">
                            <span class="menu-text">Examination Policy</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('admin.academics.pages.edit', 'school-timing') }}">
                            <span class="menu-text">School Timing</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('admin.academics.pages.edit', 'rules-regulations') }}">
                            <span class="menu-text">Rules &amp; Regulations</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('admin.academics.pages.edit', 'uniform-regulations') }}">
                            <span class="menu-text">Uniform Regulations</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('admin.academics.pages.edit', 'book-list') }}">
                            <span class="menu-text">Book List</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('admin.academics.pages.edit', 'fee-structure') }}">
                            <span class="menu-text">Fee Structure</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="menu-item">
            <a href="#menuAdmission" data-bs-toggle="collapse" class="menu-link waves-effect">
                <span class="menu-icon"><i data-lucide="graduation-cap"></i></span>
                <span class="menu-text"> Admission Pages </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="menuAdmission">
                <ul class="nav flex-column sub-menu">
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('admin.admission.pages.edit', 'admission-procedure') }}">
                            <span class="menu-text">Admission Procedure</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link"
                            href="{{ route('admin.admission.pages.edit', 'eligibility-criteria') }}">
                            <span class="menu-text">Eligibility Criteria</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('admin.admission.pages.edit', 'documents-required') }}">
                            <span class="menu-text">Documents Required</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('admin.admission.pages.edit', 'fee-payment-rules') }}">
                            <span class="menu-text">Fee Payment Rules</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('admin.admission.pages.edit', 'withdrawal-transfer') }}">
                            <span class="menu-text">Withdrawal / Transfer</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('admin.admission.pages.edit', 'tc-sample') }}">
                            <span class="menu-text">TC Sample</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- ──────────────── ABOUT SCHOOL ──────────────── --}}
        <li class="menu-title">About School</li>

        <li class="menu-item">
            <a href="{{ route('admin.about-setting.edit') }}" class="menu-link waves-effect">
                <span class="menu-icon"><i data-lucide="info"></i></span>
                <span class="menu-text"> About School </span>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('admin.vision-mission.edit') }}" class="menu-link waves-effect">
                <span class="menu-icon"><i data-lucide="eye"></i></span>
                <span class="menu-text"> Vision &amp; Mission </span>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('admin.core-value.index') }}" class="menu-link waves-effect">
                <span class="menu-icon"><i data-lucide="star"></i></span>
                <span class="menu-text"> Core Values </span>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('admin.home-stat.index') }}" class="menu-link waves-effect">
                <span class="menu-icon"><i data-lucide="bar-chart-3"></i></span>
                <span class="menu-text"> Home Stats </span>
            </a>
        </li>

        <li class="menu-item">
            <a href="#menuAuthority" data-bs-toggle="collapse" class="menu-link waves-effect">
                <span class="menu-icon"><i data-lucide="users"></i></span>
                <span class="menu-text"> School Authorities </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="menuAuthority">
                <ul class="nav flex-column sub-menu">
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('admin.authority.chairman') }}">
                            <span class="menu-text">Chairman</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('admin.authority.director') }}">
                            <span class="menu-text">Director</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('admin.authority.principal') }}">
                            <span class="menu-text">Principal</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- ──────────────── ADMISSION & ENQUIRIES ──────────────── --}}
        <li class="menu-title">Admission &amp; Enquiries</li>

        <li class="menu-item">
            <a href="{{ route('admin.admission.edit') }}" class="menu-link waves-effect">
                <span class="menu-icon"><i data-lucide="sliders-horizontal"></i></span>
                <span class="menu-text"> Admission Settings </span>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('admin.admission.enquiries.index') }}" class="menu-link waves-effect">
                <span class="menu-icon"><i data-lucide="mail-question"></i></span>
                <span class="menu-text"> Admission Enquiries </span>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('admin.contact-enquiries.index') }}" class="menu-link waves-effect">
                <span class="menu-icon"><i data-lucide="message-square"></i></span>
                <span class="menu-text"> Contact Enquiries </span>
            </a>
        </li>

        {{-- ──────────────── SETTINGS ──────────────── --}}
        <li class="menu-title">Settings</li>

        <li class="menu-item">
            <a href="{{ route('admin.settings.edit') }}" class="menu-link waves-effect">
                <span class="menu-icon"><i data-lucide="settings"></i></span>
                <span class="menu-text"> Site Settings </span>
            </a>
        </li>

        <li class="menu-item">
            <a href="#menuAccount" data-bs-toggle="collapse" class="menu-link waves-effect">
                <span class="menu-icon"><i data-lucide="user-circle"></i></span>
                <span class="menu-text"> My Account </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="menuAccount">
                <ul class="sub-menu">
                    <li class="menu-item">
                        <a href="{{ route('admin.account.index') }}" class="menu-link">
                            <span class="menu-text">My Account</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.account.update') }}" class="menu-link">
                            <span class="menu-text">Update Profile</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.account.password') }}" class="menu-link">
                            <span class="menu-text">Change Password</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
</div>
