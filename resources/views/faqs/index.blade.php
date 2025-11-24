@extends("layout")
@section("content")
    <main class="site-main" style="padding: 3rem">
        <x-faqs-drawer :faqs="$faqs" class="faq-section" />
    </main>
@endsection
