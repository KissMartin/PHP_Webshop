@extends('layouts.layout')

@section('content')

<section class="min-h-screen bg-gray-900 py-20 pt-24 text-white" x-data="{ showActive: true }">
    <div class="container mx-auto px-4">

        <div class="mb-12 text-center">
            <h1 class="text-4xl font-bold mb-4">Your Orders</h1>
            <p class="text-lg text-gray-400 mb-6">Track your active and past orders</p>

            <div class="inline-flex rounded-lg overflow-hidden border border-gray-700">
                <button
                    class="px-4 py-2 text-sm font-semibold focus:outline-none"
                    :class="showActive ? 'bg-orange-500 text-white' : 'bg-gray-800 text-gray-400 hover:bg-gray-700'"
                    @click="showActive = true"
                >
                    Active Orders
                </button>
                <button
                    class="px-4 py-2 text-sm font-semibold focus:outline-none"
                    :class="!showActive ? 'bg-orange-500 text-white' : 'bg-gray-800 text-gray-400 hover:bg-gray-700'"
                    @click="showActive = false"
                >
                    Past Orders
                </button>
            </div>
        </div>

        <!-- Active Orders -->
        <div x-show="showActive" x-transition>
            <h2 class="text-2xl font-semibold mb-4 text-orange-500">Active Orders</h2>
            @if ($activeOrders->isEmpty())
                <p class="text-gray-500 italic">You have no active orders.</p>
            @else
                <div class="space-y-6">
                    @foreach ($activeOrders as $order)
                        <x-order-card :order="$order" />
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Past Orders -->
        <div x-show="!showActive" x-transition>
            <h2 class="text-2xl font-semibold mb-4 text-gray-300">Past Orders</h2>
            @if ($pastOrders->isEmpty())
                <p class="text-gray-500 italic">No completed or cancelled orders yet.</p>
            @else
                <div class="space-y-6">
                    @foreach ($pastOrders as $order)
                        <x-order-card :order="$order" />
                    @endforeach
                </div>
            @endif
        </div>

    </div>
</section>

@endsection
