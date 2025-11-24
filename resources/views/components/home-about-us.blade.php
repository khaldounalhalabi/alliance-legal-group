@props([
    /**@var\null*/"ourHistory",
    /**@var\null*/"ourMission",
    /**@var\null*/"ourVision",
])

<div
    {{ $attributes->class(["container-fluid no-left-padding no-right-padding about-section d-flex flex-column align-items-center"]) }}
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
                <h3>{{ trans("site.about_us") }}</h3>
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
                    <h4>{{ trans("site.our_history") }}</h4>
                    <p>{{ $ourHistory->content }}</p>
                </div>
                <div class="about-details-box">
                    <i>
                        <img
                            src="{{ asset("assets/images/about-cnt-icon-2.png") }}"
                            alt="Icon"
                        />
                    </i>
                    <h4>{{ trans("site.our_mission") }}</h4>
                    <p>{{ $ourMission->content }}</p>
                </div>
                <div class="about-details-box">
                    <i>
                        <img
                            src="{{ asset("assets/images/about-cnt-icon-3.png") }}"
                            alt="Icon"
                        />
                    </i>
                    <h4>{{ trans("site.our_vision") }}</h4>
                    <p>{{ $ourVision->content }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Container /- -->
</div>
