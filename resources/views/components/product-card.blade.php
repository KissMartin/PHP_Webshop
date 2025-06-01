<x-defaults.backdrop>
    <img src="{{ $image ?? 'https://placehold.co/300?text='.$name }}" alt="{{ $name }}" class="w-full h-48 object-cover mb-4">
    <h4 class="text-xl font-semibold">{{ $name }}</h4>
    <p data-limit='90' class="shorten text-gray-500 mb-2 h-12">{{ $description }}</p>
    <x-pricetag :price="$price" class="text-xl font-bold" />
    <div>
        @if(isset($stock) && $stock > 0)
            <form method="POST" action="{{ $buttonRoute ?? '#' }}">
                @csrf
                <x-primary-button type="submit" class="block w-full mt-2 text-4xl">
                    {{ __('Add to Cart') }}
                </x-primary-button>
            </form>
        @else
            <x-secondary-button type="button" class="block w-full mt-2 text-4xl opacity-50 cursor-not-allowed" disabled>
                Out of Stock
            </x-secondary-button>
        @endif
    </div>
</x-defaults.backdrop>
