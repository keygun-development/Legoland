<div class="c-card__single">
    <p class="font-bold">
        {{ $accommodation->name }}
    </p>
    <p class="swiper-no-overflow mt-4">
        {{ $accommodation->description }}
    </p>
    <p class="my-4">
        {{-- image wordt verplaatst na werkend backend --}}
        <img src="{{ asset($accommodation->imageUrl) }}">
    </p>
    <p class="my-4">
        €{{ $accommodation->price }}
    </p>
    <a href="{{ '/accommodation/'.$accommodation->id }}" class="c-button c-button__default" href="#">
        Meer informatie
    </a>
</div>
