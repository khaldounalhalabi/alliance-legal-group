@props([
    "posts" => [],
])

@php
    use App\Models\BlogPost;
    use Illuminate\Database\Eloquent\Collection;
    /** @var Collection<BlogPost>|BlogPost[] $posts */
@endphp

@if (count($posts))
    <div class="col-md-6 col-xs-12 latest-post-section">
        <div class="section-header">
            <h3>latest posts</h3>
        </div>
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a
                    href="#images"
                    aria-controls="images"
                    role="tab"
                    data-toggle="tab"
                >
                    LATEST
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="images">
                @foreach ($posts as $post)
                    <div class="latest-post">
                        <a href="#">
                            <img
                                src="{{ $post->cover->url }}"
                                style="width: 12rem; aspect-ratio: 1.5/1"
                                alt="Post"
                            />
                        </a>
                        <h4>
                            <a href="#">
                                {{ $post->title }}
                            </a>
                        </h4>
                        <span>
                            <a href="#">
                                {{ $post->created_at->format("F d,Y") }}
                            </a>
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
