@props([
    "faqs" => [],
    "showMoreButton" => false,
])

@php
    use App\Models\FrequentlyAskedQuestion;
    use Illuminate\Database\Eloquent\Collection;
    /** @var Collection<FrequentlyAskedQuestion>|FrequentlyAskedQuestion[] $faqs */
@endphp

@if (count($faqs))
    <div {{ $attributes }}>
        <div class="section-header">
            <h3>frequently asked questions</h3>
        </div>
        <div
            class="panel-group"
            id="accordion"
            role="tablist"
            aria-multiselectable="true"
        >
            @foreach ($faqs as $faq)
                <div class="panel panel-default">
                    <div
                        class="panel-heading"
                        role="tab"
                        id="heading{{ $loop->index }}"
                    >
                        <h4 class="panel-title">
                            <a
                                role="button"
                                data-toggle="collapse"
                                data-parent="#accordion"
                                href="#collapse{{ $loop->index }}"
                                aria-expanded="true"
                            >
                                {{ $faq->question }}
                            </a>
                        </h4>
                    </div>
                    <div
                        id="collapse{{ $loop->index }}"
                        class="panel-collapse {{ $loop->index == 0 ? "in" : "" }} collapse"
                        role="tabpanel"
                        aria-labelledby="heading{{ $loop->index }}"
                    >
                        <div class="panel-body" style="padding: 0">
                            <p style="width: 100% !important">
                                {{ $faq->answer }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if ($showMoreButton)
            <a href="{{ route("faqs") }}">Show More</a>
        @endif
    </div>
@endif
