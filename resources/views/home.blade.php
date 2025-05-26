@extends('layouts.layout')

@section('content')
    <section class="min-h-screen h-screen w-screen bg-black">
        <div class="w-full h-4/6 flex justify-center items-center" id="Group1">
            <div class="w-7/12 h-full flex flex-col justify-center items-end pl-30 pr-10 space-y-10">
                <div class="w-full">
                    <h2 class="text-2xl cursor-pointer" id="LearnMoreBtn"><i class="fa fa-play-circle" aria-hidden="true"></i> Learn more about HoneyHive</h2>
                    <h1 class="text-5xl font-bold mt-2">The highest rated webshop of 2025</h1>
                </div>
                <div class="bg-gray-800 w-full flex rounded-4xl items-center justify-center">
                    <x-searchbar/>
                </div>
            </div>
            <div class="w-5/12 h-full"></div>
        </div>
        <div class="w-full h-2/6 flex justify-center items-center gap-20">
            @foreach ($praiseCards as $i => $product)
                <x-review-card 
                    :name="$product->title"
                    :description="$product->content"
                />
            @endforeach
        </div>
    </section>
@endsection
