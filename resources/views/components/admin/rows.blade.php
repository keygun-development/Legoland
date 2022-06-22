<tr class="c-admin__table-body">
    <td class="admin-table-item">
        {{ $item->id }}
    </td>
    @if($item->name)
        <td class="admin-table-item">
            {{ $item->name }}
        </td>
    @endif
    @if($item->email)
        <td class="admin-table-item">
            {{ $item->email }}
        </td>
    @endif
    @if($item->tickets)
        <td class="admin-table-item">
        @foreach($item->getModelFromOrder($item) as $product)
            {{ $product->name }} <br>
        @endforeach
        </td>
    @endif
    @if($item->description)
        <td class="admin-table-item">
            {{ $item->description }}
        </td>
    @endif
    @if($item->imageUrl)
        <td class="admin-table-item">
            {{ $item->imageUrl }}
        </td>
    @endif
    @if($item->price !== null)
        <td class="admin-table-item">
            €{{ $item->price }}
        </td>
    @endif
    <td class="text-center cursor-pointer" @click="$refs.adminRef.EditRow({{ $item->id }})">
        <i class="fa-solid fa-pen-to-square text-blue-400"></i>
    </td>
    <td class="text-center cursor-pointer" @click="$refs.adminRef.DeleteRow({{ $item->id }},  {{ json_encode($item->resolveUrl()) }})">
        <i class="fa-solid fa-trash text-red-400"></i>
    </td>
</tr>
