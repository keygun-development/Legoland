<a href="/account/orders/{{ $order->mollie_order_id }}" class="c-cart__single">
    <p class="font-bold">
        Naam: {{ $order->name }}
    </p>
    <p class="swiper-no-overflow mt-4">
        Email: {{ $order->email }}
    </p>
    <p class="my-4">
        @if($order->price)
            €{{ $order->price }}
        @endif
    </p>
</a>
