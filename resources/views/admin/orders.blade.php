@extends('layouts.layout')

@section('content')

<section class="min-h-screen bg-gray-900 py-20 pt-24 text-white">
    <div class="container mx-auto px-4">
        <!-- Title -->
        <div class="mb-6 text-center">
            <h1 class="text-4xl font-bold">Admin - Orders List</h1>
        </div>

        <x-small-search-bar 
            :route="route('admin.orders')" 
            placeholder="Search orders..." 
            :value="request('order_search')" 
            name="order_search"
        />

        <div class="max-w-6xl mx-auto overflow-x-auto">
            @if($orders->count())
                <table class="w-full table-auto text-sm text-left border border-gray-700 text-gray-300">
                    <thead class="bg-gray-700 sticky top-0">
                        <tr>
                            <th class="px-4 py-2 border border-gray-600">ID</th>
                            <th class="px-4 py-2 border border-gray-600">User</th>
                            <th class="px-4 py-2 border border-gray-600">Total</th>
                            <th class="px-4 py-2 border border-gray-600">Status</th>
                            <th class="px-4 py-2 border border-gray-600">Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr class="border border-gray-600 hover:bg-gray-700 transition">
                                <td class="px-4 py-2 border border-gray-600">{{ $order->id }}</td>
                                
                                <td class="px-4 py-2 border border-gray-600">
                                    <a href="{{ route('admin.users', ['user_search' => $order->user->name]) }}" 
                                    class="text-orange-400 hover:text-orange-600">
                                        {{ $order->user->name }}
                                    </a>
                                </td>

                                <td class="px-4 py-2 border border-gray-600">${{ number_format($order->total_price, 2) }}</td>
                                <td class="px-4 py-2 border border-gray-600">
                                    <span class="capitalize">{{ $order->status }}</span>
                                </td>
                                <td class="px-4 py-2 border border-gray-600">{{ $order->created_at->format('M d, Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $orders->withQueryString()->links() }}
                </div>
            @else
                <p class="text-center text-gray-400 text-lg">No orders found.</p>
            @endif
        </div>
    </div>
</section>

@endsection
