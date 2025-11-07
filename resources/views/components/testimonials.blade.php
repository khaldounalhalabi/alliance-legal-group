@php
    use App\Models\Testimonial;
    use Illuminate\Database\Eloquent\Collection;
    /** @var Collection<Testimonial>|Testimonial[] $testimonials */
@endphp

@props([
    "testimonials",
])
<!-- Testimonial Section -->
<div
    class="container-fluid no-left-padding no-right-padding testimonial-section"
>
    <!-- Container -->
    <div class="container">
        <!-- Section Header -->
        <div class="section-header text-center">
            <h3>what is our customer say’s</h3>
        </div>
        <!-- Section Header /- -->
        <div class="col-md-offset-2 col-md-8 no-left-padding no-right-padding">
            <div
                id="testimonial-carousel"
                class="carousel slide"
                data-ride="carousel"
            >
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    @foreach ($testimonials as $testimonial)
                        <div class="item {{$loop->index == 0 ? 'active' : ''}}">
                            <div class="testimonial-content">
                                <div class="testimonial-box">
                                    <i>
                                        <img
                                            src="{{ $testimonial->customer_image?->url ?? asset("assets/images/profile.jpg") }}"
                                            alt="Testi"
                                            style="width: 6rem"
                                        />
                                    </i>
                                    <h4>{{ $testimonial->customer_name }}</h4>
                                    <span>
                                        {{ $testimonial->customer_position }}
                                    </span>
                                </div>
                                <p>
                                    {{ $testimonial->testimonial }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Controls -->
                <a
                    class="left carousel-control"
                    href="#testimonial-carousel"
                    role="button"
                    data-slide="prev"
                >
                    <i class="arrow_left"></i>
                </a>
                <a
                    class="right carousel-control"
                    href="#testimonial-carousel"
                    role="button"
                    data-slide="next"
                >
                    <i class="arrow_right"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- Container /- -->
</div>
<!-- Testimonial Section /- -->
