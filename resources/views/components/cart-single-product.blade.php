<div class="c-cart__single">
    <p class="font-bold">
        {{ $ticket->getName() }}
    </p>
    <p class="swiper-no-overflow mt-4">
        {{ $ticket->getDescription() }}
    </p>
    <p class="my-4">
        €{{ $ticket->getPrice() }}
    </p>
    Aantal:
    <input class="product-amount" type="number" value="{{ $amount }}" id="{{ $ticket->getId() }}" data-type="{{ $ticket->getType() }}" />
</div>
