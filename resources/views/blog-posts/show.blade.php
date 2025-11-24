@php
    use App\Models\BlogPost;
    use Illuminate\Database\Eloquent\Collection;
    /**
     * @var BlogPost $post
     * @var Collection<BlogPost>|BlogPost[] $latestPosts
     */
@endphp

@extends("layout")
@section("content")
    <!-- Page Banner -->
    <div
        class="container-fluid no-left-padding no-right-padding page-banner"
        style="
            background-image: url('{{ $post->cover->url }}');
            background-size: 100%;
            background-position: center;
        "
    >
        <!-- Container -->
        <div class="container">
            <h3>{{ $post->title }}</h3>
            <ol class="breadcrumb">
                <li><a href="{{ route("index") }}">Home</a></li>
                <li class="active">{{ $post->title }}</li>
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
                            <h4>{{ $post->small_description }}</h4>
                            {!! $post->content !!}
                        </div>
                    </div>
                    <!-- Content Area /- -->
                    <!-- Widget Area -->
                    <div class="col-md-3 col-sm-5 col-xs-6 widget-area">
                        <!-- Widget : Practice -->
                        <aside class="widget widget_practice">
                            <h3 class="widget-title">Latest Posts:</h3>
                            <ul>
                                @foreach ($latestPosts as $lp)
                                    <li>
                                        <a
                                            href="{{ route("blog.posts.show", $lp->id) }}"
                                            title="{{ $lp->title }}"
                                            style="font-size: 12px"
                                        >
                                            {{ $lp->title }}
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
