@php
    /**
    * @var App\Models\Category $category
    */
@endphp

@extends("layout")
@section("content")
    <div
        class="container-fluid no-left-padding no-right-padding page-banner"
        style="
            background-image: url('{{ $category->cover->url }}');
            background-size: 100%;
            background-position: center;
        "
    >
        <!-- Container -->
        <div class="container">
            <h3>
                {{ $category->name }}
            </h3>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route("index") }}">
                        {{ trans("site.home") }}
                    </a>
                </li>
                <li class="active">{{ $category->name }}</li>
            </ol>
        </div>
        <!-- Container /- -->
    </div>
    <!-- Page Banner /- -->

    <main class="site-main">
        <!-- Blog Single -->
        <div
            class="container-fluid no-left-padding no-right-padding blog-single"
        >
            <!-- Container -->
            <div class="container">
                <!-- Content Area -->
                <div class="col-md-9 col-sm-6 col-xs-12 content-area">
                    <!-- Type Post -->
                    <h1>{{ $category->name }}</h1>
                    <article class="type-post">
                        <h3 class="entry-title">
                            {{ $category->cover_sentence }}
                        </h3>
                        <div class="entry-content">
                            {!! $category->description !!}
                        </div>
                    </article>
                    <!-- Type Post /- -->
                </div>
                <!-- Content Area /- -->

                <!-- Widget Area -->
                <div class="col-md-3 col-sm-6 col-xs-12 widget-area">
                    <!-- Widget : Categories -->
                    <aside class="widget widget_categories">
                        <h3 class="widget-title">
                            {{ trans("site.services_under_this_category") }}
                        </h3>
                        <ul>
                            @foreach ($category->services as $service)
                                <li>
                                    <a
                                        href="{{ route("services.show", $service->id) }}"
                                    >
                                        {{ $service->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </aside>
                    <!-- Widget : Categories -->
                </div>
                <!-- Widget Area /- -->
            </div>
            <!-- Container /- -->
        </div>
        <!-- Blog /- -->
    </main>
@endsection
