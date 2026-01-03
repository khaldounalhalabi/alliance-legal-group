@php
    use Illuminate\Support\Collection;
    use App\Models\Category;
    /**
     * @var Collection<Category>$categories
     */
@endphp

@props([
    "categories",
])

<div class="container-fluid no-left-padding no-right-padding features-section">
    <div class="custom-grid-container container">
        <div class="row category-grid">
            @foreach ($categories as $category)
                <div class="col-md-6 col-sm-6 col-xs-12 category-grid-item">
                    <div class="feature-box custom-grid-box">
                        <div class="feature-img-box">
                            <img
                                src="{{ $category->cover->url }}"
                                alt="{{ $category->name }}"
                                class="main-category-img"
                            />

                            <div class="feature-content-overlay">
                                <div class="overlay-inner">
                                    <div class="content-stack">
                                        <i class="hover-icon-wrapper">
                                            <img
                                                src="{{ asset("assets/images/feature-icon.png") }}"
                                                alt="Icon"
                                            />
                                        </i>
                                        <p class="hover-description">
                                            {{ Str::limit($category->cover_sentence, 75) }}
                                        </p>
                                        <a
                                            href="{{ route("categories.show", $category->id) }}"
                                            class="hover-read-more"
                                        >
                                            {{ trans("site.read_more") }}
                                            <i class="arrow_right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="category-title">{{ $category->name }}</h4>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    .custom-grid-container {
        max-width: 960px;
        margin: 0 auto;
    }

    .feature-img-box {
        position: relative;
        overflow: hidden;
        background-color: #002147; /* Fallback background */
    }

    .main-category-img {
        width: 100% !important;
        aspect-ratio: 16 / 10;
        object-fit: cover;
        display: block;
        transition: transform 0.5s ease;
    }

    .feature-img-box:hover .main-category-img {
        transform: scale(1.1); /* Subtle zoom effect */
    }

    /* THE FIX: Overlay Layer */
    .feature-content-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /* Reduced opacity for better visibility */
        background: rgba(0, 33, 71, 0.6);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease-in-out;
        z-index: 5;
    }

    .feature-img-box:hover .feature-content-overlay {
        opacity: 1;
        visibility: visible;
    }

    /* THE FIX: Content Layer (Stacks elements above the blue background) */
    .content-stack {
        position: relative;
        z-index: 10; /* Higher than overlay */
        padding: 20px;
        text-align: center;
    }

    .hover-icon-wrapper img {
        width: 35px !important;
        height: auto;
        margin-bottom: 12px;
        pointer-events: none;
    }

    .hover-description {
        color: #ffffff !important; /* Force white text */
        font-size: 14px !important;
        line-height: 1.5 !important;
        margin-bottom: 18px !important;
        font-weight: normal;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5); /* Helps readability */
        pointer-events: none;
    }

    .hover-read-more {
        position: relative;
        display: inline-block;
        color: #ffffff !important;
        border: 1px solid #c5a059;
        padding: 8px 22px;
        font-size: 12px;
        font-weight: bold;
        text-transform: uppercase;
        text-decoration: none !important;
        background: transparent;
        transition: all 0.3s ease;
        z-index: 15; /* Highest level */
    }

    .hover-read-more:hover {
        background: #c5a059 !important;
        color: #002147 !important;
        border-color: #c5a059 !important;
    }

    .category-title {
        margin-top: 15px;
        font-weight: bold;
        color: #002147;
        text-align: center;
        text-transform: uppercase;
        font-size: 18px;
    }

    /* RTL Support */
    html[dir='rtl'] .category-grid-item {
        float: right !important;
    }
    html[dir='rtl'] .hover-read-more i {
        transform: rotate(180deg);
        display: inline-block;
        margin-right: 5px;
    }
</style>
