@extends('layouts.layout')

@section('content')

<section class="min-h-screen bg-gray-900 py-20 pt-24 text-white">
    <div class="container mx-auto px-4">
        
        <div class="mb-6 text-center">
            <h1 class="text-4xl font-bold">Admin - User List</h1>
        </div>

        <x-admin-search-bar 
            :route="route('admin.users')" 
            placeholder="Search users..." 
            :value="request('user_search')" 
            name="user_search"
        />

        <div class="space-y-6 max-w-4xl mx-auto">
            @forelse ($users as $user)
                <div x-data="{ open: false }" class="bg-gray-800 rounded-2xl overflow-hidden shadow-lg border border-gray-700">
                    <div 
                        @click="open = !open"
                        class="flex justify-between items-center px-6 py-4 bg-gray-700 hover:bg-gray-600 cursor-pointer"
                    >
                        <div>
                            <p class="text-lg font-semibold text-white">{{ $user->name }}</p>
                        </div>
                        <div>
                            <svg 
                                :class="{ 'rotate-180': open }" 
                                class="h-5 w-5 transform transition-transform duration-200 text-white"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>

                    <div x-show="open" x-transition class="px-6 py-4 bg-gray-800 text-sm text-gray-200 border-t border-gray-600">
                        <ul class="space-y-1">
                            <li><strong>ID:</strong> {{ $user->id }}</li>
                            <li><strong>Name:</strong> {{ $user->name }}</li>
                            <li><strong>Email:</strong> {{ $user->email }}</li>
                            <li><strong>Created At:</strong> {{ $user->created_at }}</li>
                            <li><strong>Updated At:</strong> {{ $user->updated_at }}</li>
                            <li><strong>Is Admin:</strong> <span class="{{ $user->is_admin ? 'text-green-400' : 'text-red-400' }}">{{ $user->is_admin ? 'Yes' : 'No' }}</span></li>
                        </ul>

                        @if ($user->products->count())
                            <div class="mt-4">
                                <h3 class="font-semibold mb-2 text-white">Products:</h3>
                                <div class="max-h-70 overflow-y-auto pr-2 custom-scrollbar">
                                    <table class="w-full table-auto text-sm text-left border border-gray-700 text-gray-300">
                                        <thead class="bg-gray-700 sticky top-0">
                                            <tr>
                                                <th class="px-3 py-2 border border-gray-600">ID</th>
                                                <th class="px-3 py-2 border border-gray-600">Name</th>
                                                <th class="px-3 py-2 border border-gray-600">Description</th>
                                                <th class="px-3 py-2 border border-gray-600">Price</th>
                                                <th class="px-3 py-2 border border-gray-600">Stock</th>
                                                <th class="px-3 py-2 border border-gray-600">Created At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user->products as $product)
                                                <tr class="border border-gray-600">
                                                    <td class="px-3 py-2 border border-gray-600">{{ $product->id }}</td>
                                                    <td class="px-3 py-2 border border-gray-600">{{ $product->name }}</td>
                                                    <td class="px-3 py-2 border border-gray-600 truncate max-w-xs" title="{{ $product->description }}">
                                                        {{ Str::limit($product->description, 50) }}
                                                    </td>
                                                    <td class="px-3 py-2 border border-gray-600">${{ number_format($product->price, 2) }}</td>
                                                    <td class="px-3 py-2 border border-gray-600">{{ $product->stock }}</td>
                                                    <td class="px-3 py-2 border border-gray-600">{{ $product->created_at->format('M d, Y') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @else
                            <p class="mt-4 text-gray-500">No products found.</p>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-400 text-lg">No users found.</p>
            @endforelse
        </div>
    </div>
</section>

@endsection
