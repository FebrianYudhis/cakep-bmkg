<header class="header-desktop3 d-none d-lg-block bg-secondary">
    <div class="section__content section__content--p35">
        <div class="header3-wrap">
            <div class="header__logo">
                @yield('logo')
            </div>
            <div class="header__navbar">
                <ul class="list-unstyled">
                    @yield('navigasidesktop')
                </ul>
            </div>
            <div class="header__tool">
                @yield('profile')
            </div>
        </div>
    </div>
</header>

<header class="header-mobile header-mobile-2 d-block d-lg-none bg-secondary">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                @yield('logo')
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                @yield('navigasimobile')
            </ul>
        </div>
    </nav>
</header>
<div class="sub-header-mobile-2 d-block d-lg-none shadow-lg">
    <div class="header__tool">
        @yield('profile')
    </div>
</div>