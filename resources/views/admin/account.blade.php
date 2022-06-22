@extends('layouts.admin')
@section('pageTitle', 'Admin User')
@section('content')
<div class="container flex justify-center mx-auto">
    <h1>
        {{ $title }}
    </h1>
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
                    Email
                </td>
                <td>
                    Wachtwoord
                </td>
                <td>
                    Rol
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
            @each('components.admin.account-rows', $users, 'item')
        </template>
    </admin-table>

    @if(Request::get('new'))
        @include('components.admin.account-new')
    @endif

    @if(Request::get('edit'))
        @include('components.admin.account-edit')
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
