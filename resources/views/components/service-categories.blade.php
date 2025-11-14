@php
    use Illuminate\Support\Collection;
    use App\Models\Category;
    /**
     * @var Collection<Category>$cateogories
     */
@endphp

@props([
    "categories",
])

<div class="container-fluid no-left-padding no-right-padding features-section">
    <!-- Container -->
    <div class="container">
        <div class="feature-carousel">
            @foreach ($categories as $category)
                <div class="col-md-12">
                    <div class="feature-box">
                        <div class="feature-img-box">
                            <img
                                src="{{ $category->cover->url }}"
                                alt="Features"
                                style="aspect-ratio: 1 / 0.8; width:40rem;"
                            />
                            <div class="feature-content">
                                <i>
                                    <img
                                        src="assets/images/feature-icon.png"
                                        alt="Icon"
                                    />
                                </i>
                                <p>
                                    {{ $category->cover_sentence }}
                                </p>
                                <a
                                    href="{{ route("categories.show", $category->id) }}"
                                    title="Read More"
                                >
                                    Read More
                                    <i class="arrow_right"></i>
                                </a>
                            </div>
                        </div>
                        <h4>{{ $category->name }}</h4>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
