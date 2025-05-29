@props(['order'])

@php
    $status = $order->currentStatus();
@endphp

<div class="rounded-xl bg-gray-800 p-6 shadow-md">
    <div class="flex justify-between items-center mb-4">
        <div>
            <h3 class="text-xl font-semibold">Order #{{ $order->id }}</h3>
            <p class="text-sm text-gray-400">Placed on {{ $order->created_at->format('F j, Y') }}</p>
            <p class="text-sm text-gray-400 mt-1">
                Payment Method:
                <span class="font-semibold text-white">
                    {{ ucfirst($order->payment_method) === 'Card' ? 'Card' : 'Pay later with Cash' }}
                </span>
            </p>
        </div>
        <span class="px-3 py-1 text-sm rounded-full 
            @if($status === 'pending') bg-yellow-600
            @elseif($status === 'paid') bg-blue-600
            @elseif($status === 'shipped') bg-green-600
            @elseif($status === 'cancelled') bg-red-600
            @endif">
            {{ ucfirst($order->currentStatus()) }}
        </span>
    </div>

    <div class="space-y-3">
        @foreach ($order->orderItems as $item)
            <div class="flex justify-between text-sm text-gray-300">
                <span>{{ $item->product->name }} × {{ $item->quantity }}</span>
                <span>${{ number_format($item->price_at_purchase * $item->quantity, 2) }}</span>
            </div>
        @endforeach
    </div>

    <div class="mt-4 text-right font-bold text-lg text-white">
        Total: ${{ number_format($order->total_price, 2) }}
    </div>

    <div class="flex justify-end space-x-4">
        @if ($order->payment_method === 'cash' && $status === 'pending')
            <form action="{{ route('profile.orders.pay', $order) }}" method="POST" class="mt-4 text-right">
                @csrf
                @method('PATCH')
                <button
                    type="submit"
                    class="px-4 py-2 bg-green-600 hover:bg-green-700 rounded text-white text-sm"
                >
                    Pay Now
                </button>
            </form>
        @endif
        @if (in_array($status, ['pending', 'paid']))
            <form action="{{ route('profile.orders.cancel', $order) }}" method="POST" class="mt-4 text-right">
                @csrf
                @method('PATCH')
                <button
                    type="submit"
                    class="px-4 py-2 bg-red-600 hover:bg-red-700 rounded text-white text-sm"
                    onclick="return confirm('Are you sure you want to cancel this order?');"
                >
                    Cancel Order
                </button>
            </form>
        @endif
    </div>
</div>