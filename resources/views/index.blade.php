@extends("layout")
@section("content")
    <main class="site-main">
        <x-hero-slider />

        <x-service-categories :categories="$categories" />

        <x-home-about-us
            :ourHistory="$ourHistory"
            :ourMission="$ourMission"
            :ourVision="$ourVision"
        />

        <x-team-members :team-members="$teamMembers" />

        <x-testimonials :testimonials="$testimonials" />

        <!-- Faq And Latest Post -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <x-faqs-drawer
                    :faqs="$faqs"
                    :showMoreButton="true"
                    class="col-md-6 col-xs-12 faq-section"
                />
                <x-latest-blog-posts :posts="$latestPosts" />
            </div>
            <!-- Row /- -->
        </div>
        <!-- Faq And Latest Post /- -->

        <x-addresses-grid :addresses="$addresses" />
    </main>
@endsection
