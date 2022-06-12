<div class="c-cart__single">
    <p class="font-bold">
        {{ $ticket->name }}
    </p>
    <p class="swiper-no-overflow mt-4">
        {{ $ticket->description }}
    </p>
    <p class="my-4">
        €{{ $ticket->price }}
    </p>
    Aantal:
    <input class="product-amount" type="number" value="{{ $amount }}" id="{{ $ticket->id }}" data-type="{{ $ticket->getType() }}" />
</div>
