@props(['product'])

<tr class="border border-gray-600">
    <td class="px-4 py-2 border border-gray-600">{{ $product->id }}</td>
    <td class="px-4 py-2 border border-gray-600">{{ $product->name }}</td>
    <td class="px-4 py-2 border border-gray-600">
        @if ($product->categories->count())
            {{ $product->categories->pluck('name')->map(fn($n) => ucfirst($n))->join(', ') }}
        @else
            Uncategorized
        @endif
    </td>
    <td class="px-4 py-2 border border-gray-600">${{ number_format($product->price, 2) }}</td>
    <td class="px-4 py-2 border border-gray-600">{{ $product->stock }}</td>
    <td class="px-4 py-2 border border-gray-600">{{ $product->created_at->format('M d, Y') }}</td>
    <td class="px-4 py-2 border border-gray-600 flex space-x-2">
        <button 
            @click.prevent="$dispatch('edit-product', {{ json_encode($product) }})" 
            class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded"
        >
            Edit
        </button>

        <form action="{{ route('profile.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                Delete
            </button>
        </form>
    </td>
</tr>
