@extends('layouts.layout')

@section('content')

<section class="min-h-screen bg-gray-900 py-20 pt-24 text-white">
    <div class="container mx-auto px-4">
        <!-- Title -->
        <div class="mb-6 text-center">
            <h1 class="text-4xl font-bold">Admin - Products List</h1>
        </div>

        <x-admin-search-bar 
            :route="route('admin.products')" 
            placeholder="Search products..." 
            :value="request('product_search')" 
            name="product_search"
        />


        <div class="max-w-6xl mx-auto overflow-x-auto">
            @if($products->count())
                <table class="w-full table-auto text-sm text-left border border-gray-700 text-gray-300">
                    <thead class="bg-gray-700 sticky top-0">
                        <tr>
                            <th class="px-4 py-2 border border-gray-600">ID</th>
                            <th class="px-4 py-2 border border-gray-600">Name</th>
                            <th class="px-4 py-2 border border-gray-600">Owner</th>
                            <th class="px-4 py-2 border border-gray-600">Description</th>
                            <th class="px-4 py-2 border border-gray-600">Price</th>
                            <th class="px-4 py-2 border border-gray-600">Stock</th>
                            <th class="px-4 py-2 border border-gray-600">Created At</th>
                            <th class="px-4 py-2 border border-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="border border-gray-600 hover:bg-gray-700 transition">
                                <td class="px-4 py-2 border border-gray-600">{{ $product->id }}</td>
                                <td class="px-4 py-2 border border-gray-600">{{ $product->name }}</td>
                                
                                <td class="px-4 py-2 border border-gray-600">
                                    <a href="{{ route('admin.users', ['user-search' => $product->user->name]) }}" 
                                    class="text-orange-400 hover:text-orange-600">
                                        {{ $product->user->name }}
                                    </a>
                                </td>

                                
                                <td class="px-4 py-2 border border-gray-600 truncate max-w-xs" title="{{ $product->description }}">
                                    {{ Str::limit($product->description, 50) }}
                                </td>
                                <td class="px-4 py-2 border border-gray-600">${{ number_format($product->price, 2) }}</td>
                                <td class="px-4 py-2 border border-gray-600">{{ $product->stock }}</td>
                                <td class="px-4 py-2 border border-gray-600">{{ $product->created_at->format('M d, Y') }}</td>
                                <td class="px-4 py-2 border border-gray-600 space-x-2">
                                    
                                    {{-- todo:
                                        {{ route('admin.products.edit', $product) }}
                                        {{ route('admin.products.destroy', $product) }}
                                    --}}

                                    <a href="#" class="text-blue-400 hover:text-blue-600">Edit</a>
                                    
                                    <form action="#" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-600">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $products->withQueryString()->links() }}
                </div>
            @else
                <p class="text-center text-gray-400 text-lg">No products found.</p>
            @endif
        </div>
    </div>
</section>

@endsection
