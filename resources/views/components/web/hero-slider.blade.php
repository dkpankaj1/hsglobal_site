@props([
    'slides' => [],
    'autoplayMs' => 5000,
])

<section class="hsga-hero-slider" aria-label="School highlights">
    <div class="hsga-slider" data-autoplay-ms="{{ $autoplayMs }}" tabindex="0">
        <div class="hsga-slides" aria-live="polite">
            @foreach($slides as $slide)
                <article class="hsga-slide" aria-roledescription="slide" aria-label="{{ $loop->iteration }} of {{ count($slides) }}">
                    <img src="{{ $slide['src'] }}" alt="{{ $slide['title'] ?? ('Slide ' . $loop->iteration) }}" class="hsga-slide-image">
                </article>
            @endforeach
        </div>

        <button type="button" class="hsga-slider-control hsga-slider-prev" aria-label="Previous slide">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
        </button>
        <button type="button" class="hsga-slider-control hsga-slider-next" aria-label="Next slide">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
        </button>

        <div class="hsga-slider-indicators" role="tablist" aria-label="Choose slide">
            @foreach($slides as $slide)
                <button type="button" class="hsga-slider-indicator"
                    data-slide-to="{{ $loop->index }}"
                    role="tab"
                    aria-label="Go to slide {{ $loop->iteration }}"
                    aria-selected="false"></button>
            @endforeach
        </div>
    </div>
</section>
