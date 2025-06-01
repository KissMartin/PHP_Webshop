<div class="bg-gray-800 p-4 rounded shadow">
    <img src="{{ $image ?? 'https://placehold.co/300?text='.$name }}" alt="{{ $name }}" class="w-full h-48 object-cover mb-4">
    <h4 class="text-xl font-semibold">{{ $name }}</h4>
    <p data-limit='90' class="shorten text-gray-500 mb-2 h-12">{{ $description }}</p>
    <span class="text-lg font-bold">{{ number_format($price, 2) }} $</span>
    <div class="mt-4">
        @if(isset($stock) && $stock > 0)
            <form method="POST" action="{{ $buttonRoute ?? '#' }}">
                @csrf
                <x-primary-button type="submit" class="block w-full mt-2 text-4xl">
                    {{ __('Add to Cart') }}
                </x-primary-button>
            </form>
        @else
            <x-primary-button type="button" class="block w-full mt-2 text-4xl opacity-50 cursor-not-allowed" disabled>
                Out of Stock
            </x-primary-button>
        @endif
    </div>
</div>