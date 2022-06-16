@extends('layouts.app')
@section('pageTitle', 'Ticket detail')
@section('content')
    <div class="py-16 container">
        <div class="w-full flex justify-between">
            <div class="w-7/12">
                <h1>
                    {{ $post->name }}
                </h1>
                <h3 class="mt-4">
                    Beschrijving:
                </h3>
                <p>
                    {{ $post->description }}
                </p>
                <h3 class="mt-4">
                    Prijs per stuk:
                </h3>
                <p>
                    €{{ $post->price }}
                </p>
                <p class="mt-4">
                    Aantal:
                </p>
                <add-to-cart
                    :item-id="{{ $post->id }}"
                    :item-amount="'amount'"
                    :item-type="'{{ $post->getType() }}'"
                    ref="childRef"
                >
                    <template v-slot:items>
                        <div class="flex flex-col w-3/12">
                            <input value="1" id="amount" type="number" />
                            <button v-on:click="$refs.childRef.addItems()" class="c-button c-button__default mt-4">
                                Toevoegen aan <i class="fa fa-shopping-cart"></i>
                            </button>
                        </div>
                    </template>
                </add-to-cart>
            </div>
            <div class="w-5/12">
                <img src="{{ asset('images/legoland_home.jpg')  }}" />
            </div>
        </div>
        <h2>
            Andere kaartjes:
        </h2>
        <swiper
            :slides="{{ json_encode(\App\Models\Ticket::all()) }}"
            :property="'c-card__single'"
            class="mt-4"
            ref="mySwiperRef"
        >

        </swiper>
    </div>
@endsection
