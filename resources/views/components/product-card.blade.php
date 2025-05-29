<div class="bg-gray-800 p-4 rounded shadow">
    <img src="{{ $image ?? 'https://placehold.co/300?text='.$name }}" alt="{{ $name }}" class="w-full h-48 object-cover mb-4">
    {{-- <img src="{{ 'https://placehold.co/300?text='.$name }}" alt="{{ $name }}" class="w-full h-48 object-cover mb-4"> --}}
    <h4 class="text-xl font-semibold">{{ $name }}</h4>
    <p data-limit='90' class="shorten text-gray-500 mb-2 h-12">{{ $description }} Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem illum aliquid esse repellat minima earum consectetur pariatur et, non nesciunt voluptas! Quis iure officiis totam facere omnis magnam esse reiciendis.</p>
    <span class="text-lg font-bold">{{ number_format($price, 2) }} $</span>
    @if(isset($buttonRoute))
        <form method="POST" action="{{ $buttonRoute }}">
            @csrf
            <x-primary-button type="submit" class="block w-full mt-2 text-4xl">
                {{ __('Add to Cart') }}
            </x-primary-button>
        </form>
    @else
        <form onsubmit="return false;">
            <x-primary-button type="button" class="block w-full mt-2 text-4xl opacity-50 cursor-not-allowed">
                {{ __('Add to Cart') }}
            </x-primary-button>
        </form>
    @endif

</div>