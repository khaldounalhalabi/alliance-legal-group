<!-- Header Section -->
<header class="header_s header_s1">
    <!-- SidePanel -->
    <div id="slidepanel">
        <!-- Top Header -->
        <div
            class="container-fluid no-right-padding no-left-padding top-header"
        >
            <!-- Container -->
            <div class="container">
                <div class="top-left">
                    <p>
                        <i class="fa fa-map-marker"></i>
                        {{ $address->value }}
                    </p>
                    <p>
                        <i class="fa fa-phone"></i>
                        Mobile:
                        <a href="tel:+4401612601985">{{ $phone->value }}</a>
                    </p>
                </div>
            </div>
            <!-- Container /- -->
        </div>
        <!-- Top Header /- -->
    </div>
    <!-- SidePanel /- -->

    <!-- Navigation -->
    <nav class="navbar ownavigation">
        <!-- Container -->
        <div class="container">
            <div class="navbar-header">
                <button
                    type="button"
                    class="navbar-toggle collapsed"
                    data-toggle="collapse"
                    data-target="#navbar"
                    aria-expanded="false"
                    aria-controls="navbar"
                >
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a
                    class="navbar-brand"
                    href="{{ route("index") }}"
                    style="display: flex; align-items: center; gap: 0.75rem"
                >
                    <img
                        src="{{ asset("assets/images/logo.png") }}"
                        alt="logo"
                        style="width: 6rem"
                    />
                    <span
                        style="
                            font-family: 'Vollkorn', serif;
                            font-size: 1.75rem;
                            font-weight: 700;
                            color: #2c3e50;
                            letter-spacing: 1px;
                        "
                    >
                        Alliance Legal Group
                    </span>
                </a>
            </div>

            <div id="navbar" class="navbar-collapse navbar-right collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ route("index") }}" title="Home">Home</a>
                    </li>
                    <li>
                        <a href="{{ route("about") }}" title="About">About</a>
                    </li>
                    <li>
                        <a
                            href="{{ route("services.index") }}"
                            title="Services"
                        >
                            Services
                        </a>
                    </li>
                    <li>
                        <a href="{{ route("contact") }}" title="Contact Us">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>
            <div id="loginpanel" class="desktop-hide">
                <div class="right" id="toggle">
                    <a id="slideit" href="#slidepanel">
                        <i class="fo-icons fa fa-inbox"></i>
                    </a>
                    <a id="closeit" href="#slidepanel">
                        <i class="fo-icons fa fa-close"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- Container /- -->
    </nav>
    <!-- Ownavigation /- -->
</header>
<!-- Header Section /- -->
