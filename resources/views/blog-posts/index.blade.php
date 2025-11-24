@php
    use App\Models\BlogPost;
    use Illuminate\Pagination\LengthAwarePaginator;

    /**
     * @var LengthAwarePaginator<int, BlogPost> $posts
     */
@endphp

@extends("layout")
@section("content")
    <!-- Page Banner -->
    <div class="container-fluid no-left-padding no-right-padding page-banner">
        <!-- Container -->
        <div class="container">
            <h3>Blog</h3>
            <ol class="breadcrumb">
                <li><a href="{{ route("index") }}">Home</a></li>
                <li class="active">Blog</li>
            </ol>
        </div>
        <!-- Container /- -->
    </div>
    <!-- Page Banner /- -->

    <main class="site-main">
        <div
            class="container-fluid no-left-padding no-right-padding no-top-padding our-practice-section bg-transparent"
        >
            <!-- Container -->
            <div class="container">
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-md-3 col-xs-6">
                            <div class="practice-box">
                                <a
                                    href="{{ route("blog.posts.show", $post->id) }}"
                                >
                                    <i>
                                        <img
                                            src="{{ $post->cover->url }}"
                                            alt="Practice"
                                            style="
                                                aspect-ratio: 1/1;
                                                height: 32rem;
                                                width: 100%;
                                            "
                                        />
                                    </i>
                                    <div class="content-box">
                                        <h4 class="service-card-title">
                                            {{ $post->title }}
                                        </h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div style="margin-top: 2rem">
                    {{ $posts->links("vendor.pagination.ow") }}
                </div>
            </div>
            <!-- Container /- -->
        </div>
    </main>
@endsection
