@php
    /**
    * @var App\Models\Service $service
    */
@endphp

@extends("layout")
@section("content")
    <!-- Page Banner -->
    <div
        class="container-fluid no-left-padding no-right-padding page-banner"
        style="
            background-image: url('{{ $service->cover->url }}');
            background-size: 100%;
            background-position: center;
        "
    >
        <!-- Container -->
        <div class="container">
            <h3>{{ $service->name }}</h3>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route("index") }}">
                        {{ trans("site.home") }}
                    </a>
                </li>
                <li class="active">{{ $service->name }}</li>
            </ol>
        </div>
        <!-- Container /- -->
    </div>
    <!-- Page Banner /- -->

    <main class="site-main">
        <!-- Services Single -->
        <div
            class="container-fluid no-left-padding no-right-padding service-single"
        >
            <!-- Container -->
            <div class="container">
                <div class="row">
                    <!-- Content Area -->
                    <div class="col-md-9 col-sm-7 col-xs-6 content-area">
                        <div class="service-single-detail">
                            <img
                                src="{{ $service->image->url }}"
                                alt="{{ $service->name }}"
                            />
                            <h4>{{ $service->name }}</h4>
                            {!! $service->description !!}
                        </div>
                    </div>
                    <!-- Content Area /- -->
                    <!-- Widget Area -->
                    <div class="col-md-3 col-sm-5 col-xs-6 widget-area">
                        <!-- Widget : Practice -->
                        <aside class="widget widget_practice">
                            <h3 class="widget-title">
                                {{ trans("site.services_from_the_same_category") }}
                            </h3>
                            <ul>
                                @foreach ($service->category->services as $subService)
                                    <li>
                                        <a
                                            href="{{ route("services.show", $subService->id) }}"
                                            title="{{ $subService->name }}"
                                            style="font-size: 12px"
                                        >
                                            {{ $subService->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>
                        <!-- Widget : Practice /- -->
                    </div>
                    <!-- Widget Area /- -->
                </div>
            </div>
            <!-- Container /- -->
        </div>
        <!-- Services Single /- -->
    </main>
@endsection
