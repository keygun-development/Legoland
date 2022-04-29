<div class="c-card__single">
    <p class="font-bold">
<<<<<<< Updated upstream
        {{ $accommodation->name }}
    </p>
    <p class="swiper-no-overflow mt-4">
        {{ $accommodation->description }}
    </p>
    <p class="my-4">
        €{{ $accommodation->price }}
=======
        {{ $accommodation->title }}
    </p>
    <p class="swiper-no-overflow mt-4">
        {{ $accommodation->shortDescription }}
    </p>
    <p class="my-4">
        <img src="{{ $accommodation->imageUrl }}">
>>>>>>> Stashed changes
    </p>
    <a href="{{ '/accommodation/'.$accommodation->id }}" class="c-button c-button__default" href="#">
        Meer informatie
    </a>
</div>
