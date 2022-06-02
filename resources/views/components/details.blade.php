<h1 class="mt-12">
    {{ $item->getName() }}
</h1>
<div class="flex w-full justify-between mt-8">
    <div class="w-5/12">
        <img class="c-image__rounded" src="{{ $item->getImageUrl() }}" />
    </div>
    <div class="w-6/12">
        <h2>
            Beschrijving
        </h2>
        {{ $item->getDescription() }}

        @if($details)
            <div class="box-border">
                <h2 class="mt-8">
                    Details
                </h2>
                <ul>
                    @foreach($details as $detail)
                        <li>
                            {{ $detail['name'] }}: @if($detail['value'] === true)
                                Ja
                            @else
                                {{ $detail['value'] }}
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if($item->price)
            <div class="flex items-end">
                <h2>
                    €{{ $item->getPrice() }}
                </h2>
                <p class="ml-2">
                    Per persoon Per nacht
                </p>
            </div>
            <add-to-cart
                :item-id="{{ $post->id }}"
                :item-amount="'amount'"
                :item-type="{{ $post->getType() }}"
                ref="childRef"
            >
                <template v-slot:items>
                    <button v-on:click="$refs.childRef.addItems()" class="c-button c-button__default mt-4">
                        Toevoegen aan <i class="fa fa-shopping-cart"></i>
                    </button>
                </template>
            </add-to-cart>
        @endif
    </div>
</div>
