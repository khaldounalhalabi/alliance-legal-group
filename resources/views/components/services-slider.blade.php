@props([
    "services",
])

@php
    use App\Models\Service;
    use Illuminate\Database\Eloquent\Collection;
    /**
     * @var Collection<Service>|Service[] $services
     */
@endphp

<!-- Services Section -->
<div class="container-fluid no-left-padding no-right-padding team-section">
    <!-- Container -->
    <div class="container">
        <!-- Section Header -->
        <div class="section-header text-center">
            <h3>Our Services</h3>
        </div>
        <!-- Section Header /- -->
        <!-- Row -->
        <div class="team-carousel">
            @foreach ($services as $service)
                <div class="col-md-12">
                    <div class="practice-box">
                        <a href="{{ route("services.show", $service->id) }}">
                            <i>
                                <img
                                    src="{{ $service->cover->url }}"
                                    alt="Practice"
                                    style="
                                        aspect-ratio: 1/1;
                                        height: 32rem;
                                        width: 100%;
                                    "
                                />
                            </i>
                            <div class="content-box">
                                <i>
                                    <img
                                        src="{{ asset("assets/images/practice-icon-" . fake()->numberBetween(1, 8) . ".png") }}"
                                        alt="Icon"
                                    />
                                </i>
                                <h4>
                                    {{ $service->name }}
                                </h4>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Row /- -->
    </div>
    <!-- Container /- -->
</div>
<!-- Services Section /- -->
