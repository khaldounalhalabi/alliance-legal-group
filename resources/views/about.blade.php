@extends("layout")
@section("content")
    <!-- Page Banner -->
    <div class="container-fluid no-left-padding no-right-padding page-banner">
        <!-- Container -->
        <div class="container">
            <h3>{{ trans("site.about") }}</h3>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route("index") }}">
                        {{ trans("site.home") }}
                    </a>
                </li>
                <li class="active">{{ trans("site.about_us") }}</li>
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
                        <h3>{{ trans("site.about_us") }}</h3>
                    </div>
                    <!-- Section Header /- -->
                    <p>{{ $aboutUs->content }}</p>
                    <div class="about-detail row">
                        <div class="col-sm-6">
                            <div class="about-box">
                                <i class="icon icon-Bulb"></i>
                                <h4>{{ trans("site.brilliant_ideas") }}</h4>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="about-box">
                                <i class="icon icon-User"></i>
                                <h4>
                                    {{ trans("site.professional_specialists") }}
                                </h4>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="about-box">
                                <i class="icon icon-WorldGlobe"></i>
                                <h4>
                                    {{ trans("site.multi_cases_dealing") }}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- About Section 2 /- -->
                <!-- Work Section -->
                <div class="col-md-6 col-xs-12 work-section no-top-margin">
                    <!-- Section Header -->
                    <div class="section-header">
                        <h3>{{ trans("site.why_choose_us") }}</h3>
                    </div>
                    <!-- Section Header /- -->
                    <p>
                        {{ $whyUs->content }}
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

        <x-team-members :team-members="$teamMembers" />

        <x-testimonials :testimonials="$testimonials" />
    </main>
@endsection
