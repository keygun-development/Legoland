<open-close-modal
    ref="adminRef"
>
    <template v-slot:modal>
        <div class="c-admin__single">
            <div class="c-admin__single-box w-6/12">
                <div @click="$refs.adminRef.closeModal()" class="flex justify-end">
                    <i class="cursor-pointer fa-solid fa-xmark text-red-500 fa-2xl"></i>
                </div>
                @foreach($single as $item)
                    <form action="/admin/{{ $item->resolveUrl() }}/{{ $item->id }}/update" method="post" class="flex flex-col">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}" />
                        @if($item->name)
                            <div>
                                <p class="font-bold">
                                    Naam:
                                </p>
                                <input class="mt-2 p-2" type="text" name="name" value="{{ $item->name }}" />
                            </div>
                        @endif
                        @if($item->email)
                            <div>
                                <p class="font-bold">
                                    Email:
                                </p>
                                <input class="mt-2 p-2" type="email" name="email" value="{{ $item->email }}" />
                            </div>
                        @endif
                        @if($item->tickets)
                            <div>
                                <p class="font-bold">
                                    Tickets:
                                </p>
                                <div class="flex flex-col w-3/12">
                                    @foreach($item->getModelFromOrder($item) as $product)
                                        @if($product->getType() === \App\Models\Ticket::getType())
                                            <select name="tickets" class="mt-2 p-2">
                                                @foreach(\App\Models\Ticket::all() as $ticket)
                                                    <option {{ $product->name === $ticket->name ? 'selected' : '' }}>{{ $ticket->name }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div>
                                <p class="font-bold">
                                    Accommodaties:
                                </p>
                                @foreach($item->getModelFromOrder($item) as $product)
                                    @if($product->getType() === \App\Models\Accommodation::getType())
                                        <select name="accommodaties" class="mt-2 p-2">
                                            @foreach(\App\Models\Accommodation::all() as $accommodation)
                                                <option {{ $product->name === $accommodation->name ? 'selected' : '' }}>{{ $accommodation->name }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                        @if($item->description)
                            <div class="mt-4">
                                <p class="font-bold">
                                    Beschrijving:
                                </p>
                                <textarea class="mt-2 p-2" type="text" name="description" value="{{ $item->description }}"></textarea>
                            </div>
                        @endif
                        @if($item->price)
                            <div class="mt-4">
                                <p class="font-bold">
                                    Prijs:
                                </p>
                                <input class="mt-2 p-2" type="text" name="price" value="{{ $item->price }}" />
                            </div>
                        @endif
                        <div class="mt-4">
                            <input class="c-button c-button__default cursor-pointer" type="submit" name="updateTicket" value="Update" />
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </template>
</open-close-modal>
