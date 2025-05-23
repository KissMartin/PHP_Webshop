@extends('layouts.layout')

@section('content')
    <section class="min-h-screen h-screen w-screen bg-amber-950">
        <div class="w-full h-3/5 flex justify-center items-center" id="Group1">
            <div class="w-7/12 h-full flex flex-col justify-center items-end pl-30 pr-10 space-y-10">
                <div class="w-full">
                    <h2 class="text-2xl">Learn more about HoneyHive</h2>
                    <h1 class="text-5xl font-bold">The highest rated webshop of 2025</h1>
                </div>
                <div class="bg-gray-800 h-[4rem] w-full flex rounded-4xl items-center justify-center">
                    <input class="rounded-l-4xl h-full w-full text-2xl pl-5" type="text" placeholder="Search for your favourite items!">
                    {{-- <button class="rounded-3xl h-[80%] w-[8rem] bg-orange-700 text-2xl mx-2 cursor-pointer hover:bg-orange-600">Search</button> --}}
                    <a href="{{ route('products') }}" class="h-[80%] w-[8rem] bg-orange-700 rounded-3xl text-2xl mx-2 cursor-pointer flex items-center justify-center hover:bg-orange-600">Search</a>
                </div>
            </div>
            <div class="w-5/12 h-full"></div>
        </div>
        <div class="w-full h-2/5 flex justify-center items-center gap-20">
            @foreach ($praiseCards as $i => $product)
                <x-review-card 
                    :name="$product->title"
                    :description="$product->content"
                />
            @endforeach
        </div>
    </section>
@endsection
