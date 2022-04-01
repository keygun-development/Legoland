<div class="c-card__single">
    <p class="font-bold">
        {{ $ticket->name }}
    </p>
    <p class="swiper-no-overflow mt-4">
        {{ $ticket->description }}
    </p>
    <p class="my-4">
        €{{ $ticket->price }}
    </p>
    <a href="{{ '/tickets/'.$ticket->id }}" class="c-button c-button__default" href="#">
        Meer informatie
    </a>
</div>
