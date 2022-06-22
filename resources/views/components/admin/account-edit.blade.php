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
                    <form action="/admin/accounts/{{ $item->id }}/update" method="post" class="flex flex-col">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}" />
                        <div>
                            <p class="font-bold">
                                Naam:
                            </p>
                            <input class="mt-2 p-2" type="text" name="name" value="{{ $item->name }}" />
                        </div>
                        <div class="mt-4">
                            <p class="font-bold">
                                Email:
                            </p>
                            <textarea class="mt-2 p-2" type="text" name="email" value="{{ $item->email }}">
                            </textarea>
                        </div>
                        <div class="mt-4">
                            <p class="font-bold">
                                Wachtwoord:
                            </p>
                            <textarea class="mt-2 p-2" type="text" name="password" value="{{ $item->password }}">
                            </textarea>
                        </div>
                        <div class="mt-4">
                            <p class="font-bold">
                                Rol
                            </p>
                            <input class="mt-2 p-2" type="text" name="role" value="{{ $item->role }}" />
                        </div>
                        <div class="mt-4">
                            <input class="c-button c-button__default cursor-pointer" type="submit" name="updateAccount" value="Update" />
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </template>
</open-close-modal>
