@extends('layouts.layout')

@section('content')
<section class="min-h-screen bg-gray-900 py-20 pt-24 text-white">
    <div class="container mx-auto px-4 max-w-7xl">
        <h1 class="text-4xl font-bold mb-10 text-center">Admin Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
            <!-- Customers -->
            <div class="bg-gray-800 rounded-xl p-6 shadow flex flex-col items-center">
                <div class="text-5xl mb-2 text-orange-400"><i class="fa fa-users"></i></div>
                <div class="text-3xl font-bold">{{ $customers }}</div>
                <div class="text-gray-400 mt-1">Customers</div>
            </div>
            <!-- Orders -->
            <div class="bg-gray-800 rounded-xl p-6 shadow flex flex-col items-center">
                <div class="text-5xl mb-2 text-green-400"><i class="fa fa-shopping-bag"></i></div>
                <div class="text-3xl font-bold">{{ $orders }}</div>
                <div class="text-gray-400 mt-1">Orders</div>
            </div>
            <!-- Products -->
            <div class="bg-gray-800 rounded-xl p-6 shadow flex flex-col items-center">
                <div class="text-5xl mb-2 text-blue-400"><i class="fa fa-cube"></i></div>
                <div class="text-3xl font-bold">{{ $products }}</div>
                <div class="text-gray-400 mt-1">Products</div>
            </div>
            <!-- Gross Revenue -->
            <div class="bg-gray-800 rounded-xl p-6 shadow flex flex-col items-center">
                <div class="text-5xl mb-2 text-yellow-400"><i class="fa fa-dollar-sign"></i></div>
                <div class="text-3xl font-bold">${{ number_format($revenue, 2) }}</div>
                <div class="text-gray-400 mt-1">Gross Revenue</div>
            </div>
        </div>
        <div class="bg-gray-800 rounded-xl p-8 shadow flex flex-col items-center">
            <div class="text-2xl font-bold mb-2">Site Visitors (This Month)</div>
            <div class="text-5xl font-bold text-purple-400 mb-4">{{ $visitors }}</div>
            <div class="w-full h-32 bg-gray-900 rounded-lg flex items-end overflow-hidden">
                <!-- Fake visitor chart bars -->
                @foreach($visitorChart as $bar)
                    <div class="flex-1 mx-1 bg-purple-500 rounded-t" style="height: {{ $bar }}%;"></div>
                @endforeach
            </div>
            <div class="flex justify-between w-full text-xs text-gray-400 mt-2">
                <span>1st</span>
                <span>7th</span>
                <span>14th</span>
                <span>21st</span>
                <span>28th</span>
            </div>
        </div>
    </div>
</section>
@endsection