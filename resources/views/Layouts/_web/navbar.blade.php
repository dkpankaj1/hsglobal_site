<nav class="navigation navbar navbar-default original">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="open-btn">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div id="navbar" class="navbar-collapse collapse navigation-holder">
            <button class="close-navbar"><i class="fa fa-close"></i></button>
            <ul class="nav navbar-nav small-nav">
                <li><a href="{{ route('home') }}">Home</a></li>

                <li class="menu-item-has-children">
                    <a href="{{ route('about.school') }}">About Us <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <ul class="sub-menu" style="display: none;">
                        <li><a href="{{ route('about.school') }}">About School</a></li>
                        <li><a href="{{ route('about.vision') }}">Vision &amp; Mission</a></li>
                        <li><a href="{{ route('about.chairman') }}">Chairman&rsquo;s Message</a></li>
                        <li><a href="{{ route('about.director') }}">Director&rsquo;s Message</a></li>
                        <li><a href="{{ route('about.principal') }}">Principal&rsquo;s Message</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children">
                    <a href="{{ route('academics.curriculum') }}">Academics <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <ul class="sub-menu" style="display: none;">
                        <li><a href="{{ route('academics.curriculum') }}">Curriculum</a></li>
                        <li><a href="{{ route('academics.examination') }}">Examination Policy</a></li>
                        <li><a href="{{ route('academics.timing') }}">School Timing</a></li>
                        <li><a href="{{ route('academics.rules') }}">Rules &amp; Regulations</a></li>
                        <li><a href="{{ route('academics.uniform') }}">Uniform Regulations</a></li>
                        <li><a href="{{ route('academics.books') }}">Book List</a></li>
                        <li><a href="{{ route('academics.fee') }}">Fee Structure</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children">
                    <a href="{{ route('admission.procedure') }}">Admission <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <ul class="sub-menu" style="display: none;">
                        <li><a href="{{ route('admission.procedure') }}">Admission Procedure</a></li>
                        <li><a href="{{ route('admission.eligibility') }}">Eligibility Criteria</a></li>
                        <li><a href="{{ route('admission.documents') }}">Documents Required</a></li>
                        <li><a href="{{ route('admission.fee-payment') }}">Fee Payment Rules</a></li>
                        <li><a href="{{ route('admission.withdrawal') }}">Withdrawal / Transfer</a></li>
                        <li><a href="{{ route('admission.tc') }}">TC Sample</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children">
                    <a href="{{ route('facilities.infrastructure') }}">Facilities <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <ul class="sub-menu" style="display: none;">
                        <li><a href="{{ route('facilities.infrastructure') }}">Infrastructure</a></li>
                        <li><a href="{{ route('facilities.smart-classrooms') }}">Smart Classrooms</a></li>
                        <li><a href="{{ route('facilities.library') }}">Library</a></li>
                        <li><a href="{{ route('facilities.science-lab') }}">Science Lab</a></li>
                        <li><a href="{{ route('facilities.computer-lab') }}">Computer Lab</a></li>
                        <li><a href="{{ route('facilities.sports') }}">Sports Facility</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children">
                    <a href="{{ route('gallery.photos') }}">Gallery <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <ul class="sub-menu" style="display: none;">
                        <li><a href="{{ route('gallery.photos') }}">Photo Gallery</a></li>
                        <li><a href="{{ route('gallery.videos') }}">Video Gallery</a></li>
                        <li><a href="{{ route('gallery.sports') }}">Sports Events</a></li>
                        <li><a href="{{ route('gallery.cultural') }}">Cultural Programs</a></li>
                        <li><a href="{{ route('gallery.prize') }}">Prize Distribution</a></li>
                        <li><a href="{{ route('gallery.achievements') }}">Student Achievements</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children">
                    <a href="{{ route('disclosure.general') }}">Mandatory Disclosure <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <ul class="sub-menu" style="display: none;">
                        <li><a href="{{ route('disclosure.general') }}">General Information</a></li>
                        <li><a href="{{ route('disclosure.management') }}">School Management</a></li>
                        <li><a href="{{ route('disclosure.documents') }}">Documents &amp; Information</a></li>
                        <li><a href="{{ route('disclosure.infrastructure') }}">Infrastructure Details</a></li>
                        <li><a href="{{ route('disclosure.fee') }}">Fee Structure</a></li>
                        <li><a href="{{ route('disclosure.staff') }}">Staff Details</a></li>
                        <li><a href="{{ route('disclosure.safety') }}">Safety Details</a></li>
                        <li><a href="{{ route('disclosure.transport') }}">Transport Details</a></li>
                        <li><a href="{{ route('disclosure.financial') }}">Financial Status</a></li>
                    </ul>
                </li>

                <li><a href="{{ route('contact') }}">Contact Us</a></li>

            </ul>
        </div>

    </div>
</nav>