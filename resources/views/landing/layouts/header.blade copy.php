<header class="ltn__header-area ltn__header-5 ltn__header-logo-and-mobile-menu-in-mobile ltn__header-logo-and-mobile-menu ltn__header-transparent--- gradient-color-4---">
    <!-- ltn__header-middle-area start -->
    <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-white">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="site-logo-wrap">
                        <div class="site-logo">
                            <a href="index.html"><img src="{{ asset('bna-assets/logo-bna-dark.png') }}" alt="Logo" width="120px"></a>
                        </div>
                        <div class="get-support clearfix d-none">
                            <div class="get-support-icon">
                                <i class="icon-call"></i>
                            </div>
                            <div class="get-support-info">
                                <h6>Get Support</h6>
                                <h4><a href="tel:+123456789">123-456-789-10</a></h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col header-menu-column">
                    <div class="header-menu d-none d-xl-block">
                        <nav>
                            <div class="ltn__main-menu">
                                <ul>
                                    <li><a style="{{ Route::is('landing.index') ? 'color: #FF5A3B' : '' }}" href="{{ route('landing.index') }}">Home</a></li>
                                    <li><a style="{{ Route::is('landing.about.index') ? 'color: #FF5A3B' : '' }}" href="{{ route('landing.about.index') }}">About Us</a></li>
                                    <li><a style="{{ Route::is('landing.properties.*') ? 'color: #FF5A3B' : '' }}" href="{{ route('landing.properties.index') }}">Property List</a></li>

                                    <li><a style="{{ Route::is('landing.contact') ? 'color: #FF5A3B' : '' }}" href="{{ route('landing.contact') }}">Contact</a></li>
                                    <li class="special-link">
                                        <a href="{{ route('login') }}">Login Panel</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>

                <div class="col--- ltn__header-options ltn__header-options-2">
                    <!-- Mobile Menu Button -->
                    <div class="mobile-menu-toggle d-xl-none">
                        <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                            <svg viewBox="0 0 800 600">
                                <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                <path d="M300,320 L540,320" id="middle"></path>
                                <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-middle-area end -->
</header>
<!-- Utilize Mobile Menu Start -->
<div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
    <div class="ltn__utilize-menu-inner ltn__scrollbar">
        <div class="ltn__utilize-menu-head">
            <div class="site-logo">
                <a href="index.html"><img src="{{ asset('bna-assets/logo-bna-dark.png') }}" alt="Logo" width="100"></a>
            </div>
            <button class="ltn__utilize-close">×</button>
        </div>
        <div class="ltn__utilize-menu">
            <ul>
                <li><a style="{{ Route::is('landing.index') ? 'color: #FF5A3B' : '' }}" href="{{ route('landing.index') }}">Home</a></li>
                <li><a style="{{ Route::is('landing.about.index') ? 'color: #FF5A3B' : '' }}" href="{{ route('landing.about.index') }}">About Us</a></li>
                <li><a style="{{ Route::is('landing.properties.*') ? 'color: #FF5A3B' : '' }}" href="{{ route('landing.properties.index') }}">Property List</a></li>
                <li><a style="{{ Route::is('landing.index') ? 'color: #FF5A3B' : '' }}" href="{{ route('landing.contact') }}">Contact</a></li>
            </ul>
        </div>

        <div class="ltn__social-media-2">
            <ul>
                <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<!-- Utilize Mobile Menu End -->