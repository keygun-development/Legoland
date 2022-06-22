
<tr class="c-admin__table-body">
    <td class="admin-table-item">
        {{ $item->id }}
    </td>
    <td class="admin-table-item">
        {{ $item->name }}
    </td>
    <td class="admin-table-item">
        {{ $item->email }}
    </td>
    <td class="admin-table-item">
        {{ $item->password }}
    </td>
    <td class="admin-table-item">
        {{ $item->role }}
    </td>
    <td class="text-center cursor-pointer" @click="$refs.adminRef.EditRow({{ $item->id }})">
        <i class="fa-solid fa-pen-to-square text-blue-400"></i>
    </td>
    <td class="text-center cursor-pointer" @click="$refs.adminRef.DeleteRow({{ $item->id }})">
        <i class="fa-solid fa-trash text-red-400"></i>
    </td>
</tr>
