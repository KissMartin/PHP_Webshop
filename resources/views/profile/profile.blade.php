@extends('layouts.layout')

@section('content')

<?php 
if ($user == null) {
    $user = auth()->user();
}
?>

<div class="container mx-auto p-4 mt-30">
    <div class="space-y-6">
        <div>
            <x-defaults.backdrop>
                <h1 class="text-3xl font-bold pb-5">{{ $user->name }}'s Profile</h1>
                <div class="flex gap-5 items-center">
                    <img src="{{asset('images/UserPlaceholder.jpg')}}" alt="user_avatar" class="max-w-xs">
                    <div class="space-y-3">
                        <div>
                            <p class="text-md text-gray-400">Email:</p>
                            <p class="text-lg">{{ $user->email }}</p>
                        </div>
                        <div>
                            <p class="text-md text-gray-400">Account created:</p>
                            <p class="text-lg">{{ $user->created_at->format('F j, Y') }}</p>
                        </div>
                        <div>
                            <p class="text-md text-gray-400">Description:</p>
                            <p class="text-lg max-w-3xl text-justify">{{ $user->description }} Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo quisquam iste animi dicta soluta officia corporis quibusdam alias magni excepturi! Dolore odio inventore, necessitatibus vitae quia exercitationem accusantium ab pariatur?Vitae voluptas laudantium eligendi, quaerat quos accusamus officiis. Dolorum, accusantium? Voluptatum recusandae nisi ex ut blanditiis dolorum possimus, eaque, in, officiis vero voluptas quae consequuntur et. Magnam placeat nemo praesentium?</p>
                        </div>
                    </div>
                </div>
            </x-defaults.backdrop>
        </div>
        <div>
            <x-defaults.backdrop>
                <h1 class="text-3xl pb-5">Sales Statistics</h1>
                @if($statistics === null)
                    <p class="text-gray-400">No sales data available.</p>
                @else
                    <div class="flex gap-8 w-full">
                        <div class="border border-gray-500 p-4 rounded-lg space-y-1.5 w-full">
                            <p class="text-lg text-gray-300">Total Purchases</p>
                            <p class="text-2xl">{{ $statistics->total_purchases }} <span class="text-lg">pcs</span></p>
                            <p class="text-md text-red-400">-42%</p>
                        </div>

                        <div class="border border-gray-500 p-4 rounded-lg space-y-1.5 w-full">
                            <p class="text-lg text-gray-300">Total Purchases Amount</p>
                            <p class="text-2xl"><x-pricetag :price="$statistics->total_purchases_amount" /></p>
                            <p class="text-md text-red-400">-12%</p>
                        </div>

                        <div class="border border-gray-500 p-4 rounded-lg space-y-1.5 w-full">
                            <p class="text-lg text-gray-300">Total Sales</p>
                            <p class="text-2xl">{{ $statistics->total_sales }} <span class="text-lg">pcs</span></p>
                            <p class="text-md text-green-400">+19%</p>
                        </div>
    
                        <div class="border border-gray-500 p-4 rounded-lg space-y-1.5 w-full">
                            <p class="text-lg text-gray-300">Total Sales Amount</p>
                            <p class="text-2xl"><x-pricetag :price="$statistics->total_sales_amount" /></p>
                            <p class="text-md text-green-400">+34%</p>
                        </div>
                    </div>
                @endif
            </x-defaults.backdrop>
        </div>
        <div>
            <x-defaults.backdrop>
                <h1 class="text-3xl pb-5">Products</h1>
                @if($products === null || count($products) === 0)
                    <p class="text-gray-400">No products available.</p>
                @else                    
                    <div class="w-full grid grid-cols-3 gap-8 m-4">
                        @foreach ($products as $product)
                            {{-- @dd($product); --}}
                            <a href="{{ route('product.show', $product->id) }}" class="block">
                                <x-product-card 
                                    :name="$product->name"
                                    :description="$product->description"
                                    :price="$product->price"
                                    :image="$product->image_url"
                                    :buttonRoute="route('cart.store', $product->id)"
                                />
                            </a>
                        @endforeach
                    </div>

                @endif
            </x-defaults.backdrop>
        </div>
    </div>
</div>
@endsection

{{-- @dd($statistics); --}}