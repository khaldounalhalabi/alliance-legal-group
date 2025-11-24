@php
    use App\Models\Service;
    use Illuminate\Pagination\LengthAwarePaginator;

    /**
     * @var LengthAwarePaginator<int, Service>
     */
@endphp

@extends("layout")
<style>
    .service-card-title {
        min-height: 72px;
        max-height: 72px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
@section("content")
    <!-- Page Banner -->
    <div class="container-fluid no-left-padding no-right-padding page-banner">
        <!-- Container -->
        <div class="container">
            <h3>services</h3>
            <ol class="breadcrumb">
                <li><a href="{{ route("index") }}">Home</a></li>
                <li class="active">services</li>
            </ol>
        </div>
        <!-- Container /- -->
    </div>
    <!-- Page Banner /- -->

    <main class="site-main">
        <!-- Our Practice Section -->
        <div
            class="container-fluid no-left-padding no-right-padding no-top-padding our-practice-section bg-transparent"
        >
            <!-- Container -->
            <div class="container">
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-md-3 col-xs-6">
                            <div class="practice-box">
                                <a
                                    href="{{ route("services.show", $service->id) }}"
                                >
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
                                        <h4 class="service-card-title">
                                            {{ $service->name }}
                                        </h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div style="margin-top: 2rem">
                    {{ $services->links("vendor.pagination.ow") }}
                </div>
            </div>
            <!-- Container /- -->
        </div>
        <!-- Our Practice Section /- -->
    </main>
@endsection
