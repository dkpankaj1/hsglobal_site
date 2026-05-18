<footer class="site-footer hsga-footer">
    <div class="container">
        <div class="row hsga-footer-grid">
            <div class="col col-lg-5 col-md-6 col-sm-12">
                <div class="widget hsga-footer-brand">
                    <a href="{{ route('home') }}" class="logo" style="display:inline-block; margin-bottom:14px;">
                        <img src="{{ asset('static/logo.png') }}" alt="HSGA School logo" style="max-height:72px; display:block;">
                    </a>
                    <p>
                        Building confident learners through strong academics, disciplined values, and meaningful
                        co-curricular growth in a safe school environment.
                    </p>
                    <ul class="hsga-contact-list">
                        <li><i class="fa fa-map-marker"></i>Haridwar, Uttarakhand</li>
                        <li><i class="fa fa-phone"></i><a href="tel:+910000000000">+91 00000 00000</a></li>
                        <li><i class="fa fa-envelope"></i><a href="mailto:info@hsgaschool.in">info@hsgaschool.in</a></li>
                    </ul>
                </div>
            </div>

            <div class="col col-lg-3 col-md-6 col-sm-6">
                <div class="widget hsga-footer-links">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about.school') }}">About School</a></li>
                        <li><a href="{{ route('admission.procedure') }}">Admissions</a></li>
                        <li><a href="{{ route('gallery.photos') }}">Gallery</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
            </div>

            <div class="col col-lg-4 col-md-12 col-sm-6">
                <div class="widget hsga-footer-links">
                    <h3>Explore</h3>
                    <ul>
                        <li><a href="{{ route('facilities.infrastructure') }}">Infrastructure</a></li>
                        <li><a href="{{ route('facilities.library') }}">Library</a></li>
                        <li><a href="{{ route('gallery.videos') }}">Video Gallery</a></li>
                        <li><a href="{{ route('notifications.list') }}">Notifications</a></li>
                        <li><a href="{{ route('disclosure.general') }}">Mandatory Disclosure</a></li>
                    </ul>
                    <div class="hsga-social-wrap">
                        <a href="#" aria-label="Facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fa fa-instagram"></i></a>
                        <a href="#" aria-label="YouTube"><i class="fa fa-youtube-play"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="lower-footer hsga-lower-footer">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <p class="copyright">
                    &copy; {{ date('Y') }} <a href="{{ route('home') }}">HSGA School</a>. All Rights Reserved.
                    &nbsp;|&nbsp; Developed by <a href="https://dipankarwebdev.co.in" target="_blank" rel="noopener noreferrer">TechWizi</a>
                </p>
            </div>
        </div>
    </div>
</div>