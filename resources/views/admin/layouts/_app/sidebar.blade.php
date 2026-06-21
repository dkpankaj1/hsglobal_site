<div data-simplebar>
    <ul class="app-menu">

        <li class="menu-title">Menu</li>

        <li class="menu-item">
            <a href="{{ route('admin.dashboard') }}" class="menu-link waves-effect">
                <span class="menu-icon"><i data-lucide="airplay"></i></span>
                <span class="menu-text"> Dashboards </span>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('admin.important-notice.edit') }}" class="menu-link waves-effect">
                <span class="menu-icon"><i data-lucide="megaphone"></i></span>
                <span class="menu-text"> Important Notice </span>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('admin.mandatory-disclosure.index') }}" class="menu-link waves-effect">
                <span class="menu-icon"><i data-lucide="file-text"></i></span>
                <span class="menu-text"> Mandatory Disclosure </span>
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

        <li class="menu-title">Authorities</li>
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
            <a href="{{ route('admin.admission.edit') }}" class="menu-link waves-effect">
                <span class="menu-icon"><i data-lucide="graduation-cap"></i></span>
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

        <li class="menu-item">
            <a href="{{ route('admin.settings.edit') }}" class="menu-link waves-effect">
                <span class="menu-icon"><i data-lucide="settings"></i></span>
                <span class="menu-text"> Setting </span>
            </a>
        </li>

        <li class="menu-item">
            <a href="#menuAccount" data-bs-toggle="collapse" class="menu-link waves-effect">
                <span class="menu-icon"><i data-lucide="copy"></i></span>
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
