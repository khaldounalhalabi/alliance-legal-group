@extends("layout")
@section("content")
    <main class="site-main">
        <x-hero-slider />

        <x-service-categories :categories="$categories" />

        <!-- About Section -->
        <div
            class="container-fluid no-left-padding no-right-padding about-section d-flex flex-column align-items-center"
            id="about-us-container"
        >
            <div
                class="about-img-block col-md-6 col-xs-12 no-left-padding no-right-padding"
                data-image="assets/images/about-image.jpg"
            ></div>
            <!-- Container -->
            <div class="container">
                <div class="col-md-offset-6 col-md-6 col-xs-12 about-content">
                    <!-- Section Header -->
                    <div class="section-header">
                        <h3>ABOUT US</h3>
                    </div>
                    <!-- Section Header /- -->
                    <div class="about-details">
                        <div class="about-details-box">
                            <i>
                                <img
                                    src="{{ asset("assets/images/about-cnt-icon-1.png") }}"
                                    alt="Icon"
                                />
                            </i>
                            <h4>Our History</h4>
                            <p>{{ $ourHistory->content }}</p>
                        </div>
                        <div class="about-details-box">
                            <i>
                                <img
                                    src="{{ asset("assets/images/about-cnt-icon-2.png") }}"
                                    alt="Icon"
                                />
                            </i>
                            <h4>Our Mission</h4>
                            <p>{{ $ourMission->content }}</p>
                        </div>
                        <div class="about-details-box">
                            <i>
                                <img
                                    src="{{ asset("assets/images/about-cnt-icon-3.png") }}"
                                    alt="Icon"
                                />
                            </i>
                            <h4>Our Vision</h4>
                            <p>{{ $ourVision->content }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container /- -->
        </div>
        <!-- About Section /- -->

        <!-- Services Section -->
        <div
            class="container-fluid no-left-padding no-right-padding team-section"
        >
            <!-- Container -->
            <div class="container">
                <!-- Section Header -->
                <div class="section-header text-center">
                    <h3>Our Services</h3>
                </div>
                <!-- Section Header /- -->
                <!-- Row -->
                <div class="team-carousel">
                    <div class="col-md-12">
                        <div class="practice-box">
                            <a href="corporate.html">
                                <i>
                                    <img
                                        src="{{ asset("assets/images/corporate.jpg") }}"
                                        alt="Practice"
                                        style="height: 24rem"
                                    />
                                </i>
                                <div class="content-box">
                                    <i>
                                        <img
                                            src="{{ asset("assets/images/practice-icon-1.png") }}"
                                            alt="Icon"
                                        />
                                    </i>
                                    <h4>Corporate & Commercial Law</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="practice-box">
                            <a href="dispute.html">
                                <i>
                                    <img
                                        src="{{ asset("assets/images/dispute.jpg") }}"
                                        alt="Practice"
                                        style="height: 24rem"
                                    />
                                </i>
                                <div class="content-box">
                                    <i>
                                        <img
                                            src="{{ asset("assets/images/practice-icon-2.png") }}"
                                            alt="Icon"
                                        />
                                    </i>
                                    <h4>Dispute Resolution & Litigation</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="practice-box">
                            <a href="regulatory.html">
                                <i>
                                    <img
                                        src="{{ asset("assets/images/regulatory.jpg") }}"
                                        alt="Practice"
                                        style="height: 24rem"
                                    />
                                </i>
                                <div class="content-box">
                                    <i>
                                        <img
                                            src="{{ asset("assets/images/practice-icon-3.png") }}"
                                            alt="Icon"
                                        />
                                    </i>
                                    <h4>Regulatory & Compliance</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="practice-box">
                            <a href="international-projects.html">
                                <i>
                                    <img
                                        src="{{ asset("assets/images/international.jpg") }}"
                                        alt="Practice"
                                        style="height: 24rem"
                                    />
                                </i>
                                <div class="content-box">
                                    <i>
                                        <img
                                            src="{{ asset("assets/images/practice-icon-4.png") }}"
                                            alt="Icon"
                                        />
                                    </i>
                                    <h4>International & Projects</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="practice-box">
                            <a href="technology.html">
                                <i>
                                    <img
                                        src="{{ asset("assets/images/technology.jpg") }}"
                                        alt="Practice"
                                        style="height: 24rem"
                                    />
                                </i>
                                <div class="content-box">
                                    <i>
                                        <img
                                            src="{{ asset("assets/images/practice-icon-5.png") }}"
                                            alt="Icon"
                                        />
                                    </i>
                                    <h4>Technology & Cyber Law</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="practice-box">
                            <a href="immigration.html">
                                <img
                                    src="{{ asset("assets/images/immigrations.jpg") }}"
                                    alt="Practice"
                                    style="height: 24rem"
                                    class="img-fluid"
                                />
                                <div class="content-box">
                                    <i>
                                        <img
                                            src="{{ asset("assets/images/practice-icon-6.png") }}"
                                            alt="Icon"
                                        />
                                    </i>
                                    <h4>Private Client & Immigration</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Row /- -->
            </div>
            <!-- Container /- -->
        </div>
        <!-- Services Section /- -->

        <x-team-members :team-members="$teamMembers" />

        <x-testimonials :testimonials="$testimonials" />
    </main>
@endsection
