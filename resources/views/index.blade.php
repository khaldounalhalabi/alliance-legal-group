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

        <x-services-slider :services="$services" />

        <x-team-members :team-members="$teamMembers" />

        <x-testimonials :testimonials="$testimonials" />
    </main>
@endsection
