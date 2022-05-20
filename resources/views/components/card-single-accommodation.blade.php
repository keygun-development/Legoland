<div class="c-card__single">
    <p class="font-bold">
        {{ $accommodation->title }}
    </p>
    <p class="swiper-no-overflow mt-4">
        {{ $accommodation->shortDescription }}
    </p>
    <p class="my-4">
        {{-- image wordt verplaatst na werkend backend --}}
        <img src="{{ $accommodation->imageUrl }}">
    </p>
    <p class="my-4">
        €{{ $accommodation->price }}
    </p>
    <a href="{{ '/accommodation/'.$accommodation->id }}" class="c-button c-button__default" href="#">
        Meer informatie
    </a>
</div>
