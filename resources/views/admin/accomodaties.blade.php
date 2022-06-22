@extends('layouts.admin')
@section('pageTitle', 'Admin Accommodaties')
@section('content')
    <div class="container mx-auto">
        <h1>
            {{ $title }}
        </h1>
        <div class="flex justify-start">
            <a href="/admin/accommodaties?new=true" class="p-4 bg-lime-500 cursor-pointer">
                <i class="fa-solid fa-plus text-white fa-2xl"></i>
            </a>
        </div>
        <admin-table
            ref="adminRef"
        >
            <template v-slot:tablehead>
                <tr class="c-admin__table-top">
                    <td>
                        ID
                    </td>
                    <td>
                        Naam
                    </td>
                    <td>
                        Beschrijving
                    </td>
                    <td>
                        ImageUrl
                    </td>
                    <td>
                        Prijs
                    </td>
                    <td>
                        Edit
                    </td>
                    <td>
                        Verwijder
                    </td>
                </tr>
            </template>
            <template v-slot:tablebody>
                @each('components.admin.rows', $accommodations, 'item')
            </template>
        </admin-table>

        @if(Request::get('new'))
            <open-close-modal
                ref="adminRef"
            >
                <template v-slot:modal>
                    <div class="c-admin__single">
                        <div class="c-admin__single-box w-6/12">
                            <div @click="$refs.adminRef.closeModal()" class="flex justify-end">
                                <i class="cursor-pointer fa-solid fa-xmark text-red-500 fa-2xl"></i>
                            </div>
                            <form action="/admin/accommodaties/new" method="post" class="flex flex-col">
                                @csrf
                                <div>
                                    <p class="font-bold">
                                        Naam:
                                    </p>
                                    <input class="mt-2 p-2" type="text" name="name" value="" />
                                </div>
                                <div class="mt-4">
                                    <p class="font-bold">
                                        Beschrijving:
                                    </p>
                                    <textarea class="mt-2 p-2" type="text" name="description" value=""></textarea>
                                </div>
                                <div class="mt-4">
                                    <p class="font-bold">
                                        Image Url:
                                    </p>
                                    <input class="mt-2 p-2" type="text" name="imageUrl" value="" />
                                </div>
                                <div class="mt-4">
                                    <p class="font-bold">
                                        Prijs:
                                    </p>
                                    <input class="mt-2 p-2" type="text" name="price" value="" />
                                </div>
                                <div class="mt-4">
                                    <input class="c-button c-button__default cursor-pointer" type="submit" name="addTicket" value="Toevoegen" />
                                </div>
                            </form>
                        </div>
                    </div>
                </template>
            </open-close-modal>

        @endif

        @if(Request::get('edit'))
            @include('components.admin.edit')
        @endif

        @if(Request::get('delete'))
            <admin-delete></admin-delete>
        @endif
        @if (session('success'))
            <p class="text-lime-500">
                {{ session('success') }}
            </p>
        @endif
        @if (session('error'))
            <p class="text-red-500">
                {{ session('error') }}
            </p>
        @endif
    </div>
@endsection
