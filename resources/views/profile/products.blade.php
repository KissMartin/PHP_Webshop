@extends('layouts.layout')

@section('content')

<section 
    x-data="{
        addOpen: false, 
        editOpen: false, 
        editProduct: {},

        openAddModal() {
            this.addOpen = true;
        },

        openEditModal(product) {
            this.editProduct = {
                ...product,
                categories: product.categories.map(c => c.name), // map categories for select binding
                new_category: '',
            };
            this.editOpen = true;
        }
    }"

    @edit-product.window="openEditModal($event.detail)"
    class="min-h-screen bg-gray-900 py-20 pt-24 text-white"
>
    <div class="container mx-auto px-4">

        <div class="mb-6 text-center">
            <h1 class="text-4xl font-bold">Your Products</h1>
        </div>

        <div class="text-center mb-8">
            <button @click="openAddModal()" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-2 rounded-full">
                + Add Product
            </button>
        </div>

        <x-product-add-modal :categories="$categories" />

        <x-product-edit-modal :categories="$categories" />

        <div class="max-w-6xl mx-auto overflow-x-auto">
            @if($products->count())
                <table class="w-full table-auto text-sm text-left border border-gray-700 text-gray-300">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="px-4 py-2 border border-gray-600">ID</th>
                            <th class="px-4 py-2 border border-gray-600">Name</th>
                            <th class="px-4 py-2 border border-gray-600">Category</th>
                            <th class="px-4 py-2 border border-gray-600">Price</th>
                            <th class="px-4 py-2 border border-gray-600">Stock</th>
                            <th class="px-4 py-2 border border-gray-600">Created At</th>
                            <th class="px-4 py-2 border border-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <x-product-table-row :product="$product" />
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center text-gray-400 text-lg">You have no products yet.</p>
            @endif
        </div>
    </div>
</section>

@endsection
