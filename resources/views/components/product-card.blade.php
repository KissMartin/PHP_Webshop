<div class="bg-gray-800 p-4 rounded shadow">
    <img src="{{ $image ?? 'https://via.placeholder.com/300' }}" alt="{{ $name }}" class="w-full h-48 object-cover mb-4">
    <h4 class="text-xl font-semibold">{{ $name }}</h4>
    <p class="text-gray-700 mb-2">{{ $description }}</p>
    <span class="text-lg font-bold">{{ number_format($price, 2) }} $</span>
    <button class="mt-2 block w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Add to Cart</button>
</div>