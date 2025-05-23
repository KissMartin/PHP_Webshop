@extends('layouts.layout')

@section('content')
    <section class="h-screen w-screen bg-amber-950">
        <div class="w-full h-3/5 flex justify-center items-center" id="Group1">
            <div class="w-7/12 h-full flex flex-col justify-center items-end pl-30 pr-10 space-y-10">
                <div class="w-full">
                    <h2 class="text-2xl">Learn more about HoneyHive</h2>
                    <h1 class="text-5xl font-bold">The highest rated webshop of 2025</h1>
                </div>
                <div class="bg-gray-800 h-[4rem] w-full flex rounded-4xl items-center justify-center">
                    <input class="rounded-l-4xl h-full w-full text-2xl pl-5" type="text" placeholder="Search for your favourite items!">
                    <button class="rounded-3xl h-[80%] w-[8rem] bg-orange-800 text-xl mx-2 my-2 cursor-pointer hover:bg-orange-700">Search</button>
                </div>
            </div>
            <div class="w-5/12 h-full"></div>
        </div>
        <div class="w-full h-2/5 bg-red-500">
            
        </div>
    </section>
    {{-- <section class="bg-blue-500 text-white text-center py-16">
        <h2 class="text-4xl font-bold mb-4">Welcome to Our Shop</h2>
        <p class="text-lg">Find the best products at unbeatable prices</p>
        <a href="#" class="mt-6 inline-block bg-white text-blue-600 font-semibold px-6 py-2 rounded shadow hover:bg-gray-100">Shop Now</a>
    </section> --}}

    {{-- <section class="container mx-auto py-12 px-4">
        <h3 class="text-2xl font-bold mb-6">Featured Products</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($products ?? [] as $product)
                <x-product-card 
                    :name="$product->name"
                    :description="$product->description"
                    :price="$product->price"
                    :image="$product->image_url"
                />
            @endforeach

        </div>
    </section> --}}
@endsection
