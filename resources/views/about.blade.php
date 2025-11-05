@extends("layout")
@section("content")
    <!-- Page Banner -->
    <div class="container-fluid no-left-padding no-right-padding page-banner">
        <!-- Container -->
        <div class="container">
            <h3>ABOUT</h3>
            <ol class="breadcrumb">
                <li><a href="{{ route("index") }}">Home</a></li>
                <li class="active">About Us</li>
            </ol>
        </div>
        <!-- Container /- -->
    </div>
    <!-- Page Banner /- -->

    <main class="site-main">
        <!-- Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <!-- About Section 2 -->
                <div class="col-md-6 col-xs-12 about-section2 no-top-margin">
                    <!-- Section Header -->
                    <div class="section-header">
                        <h3>about us</h3>
                    </div>
                    <!-- Section Header /- -->
                    <p>
                        Alliance Legal Group Ltd is an international corporate
                        and commercial law firm headquartered in Manchester,
                        United Kingdom. We advise corporations, investors, and
                        entrepreneurs on complex cross-border transactions,
                        regulatory compliance, and commercial strategy. Our
                        mission is simple: to provide precise, ethical, and
                        forward-thinking legal advice that empowers businesses
                        to thrive in a global marketplace. Our Vision: To
                        redefine international legal practice by blending deep
                        local knowledge with global commercial awareness. Our
                        Values: Integrity, Excellence, Innovation, Global
                        Mindset, Client Focus. Global Presence: With a strong
                        base in the UK and partnerships across Europe and the
                        Middle East, we offer multilingual and business-minded
                        legal support.
                    </p>
                    <div class="about-detail row">
                        <div class="col-sm-6">
                            <div class="about-box">
                                <i class="icon icon-Bulb"></i>
                                <h4>brilliant ideas</h4>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="about-box">
                                <i class="icon icon-User"></i>
                                <h4>professional specialists</h4>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="about-box">
                                <i class="icon icon-WorldGlobe"></i>
                                <h4>multi cases dealing</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- About Section 2 /- -->
                <!-- Work Section -->
                <div class="col-md-6 col-xs-12 work-section no-top-margin">
                    <!-- Section Header -->
                    <div class="section-header">
                        <h3>WHY CHOOSE US</h3>
                    </div>
                    <!-- Section Header /- -->
                    <p>
                        We understand that modern business doesn’t stop at
                        borders. Our lawyers advise on international structures,
                        multi-jurisdictional deals, and regulatory frameworks
                        that shape cross-border commerce. Every client is
                        unique. We build solutions around your business model,
                        risk profile, and long-term goals — not templates. From
                        startups to multinational corporations, our clients rely
                        on us for clear, strategic, and actionable legal advice
                        grounded in real-world business needs.
                    </p>
                    <div class="work-carousel">
                        <div class="item">
                            <img
                                src="{{ asset("assets/images/work-1.jpg") }}"
                                alt="Work"
                            />
                        </div>
                        <div class="item">
                            <img
                                src="{{ asset("assets/images/work-2.jpg") }}"
                                alt="Work"
                            />
                        </div>
                        <div class="item">
                            <img
                                src="{{ asset("assets/images/work-3.jpg") }}"
                                alt="Work"
                            />
                        </div>
                    </div>
                </div>
                <!-- Work Section /- -->
            </div>
            <!-- Row /- -->
        </div>
        <!-- Container /- -->

        <x-team-members />

        <x-testimonials />
    </main>
@endsection
