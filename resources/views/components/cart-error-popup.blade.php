@props(['message'])

@if($message)
    <div id="cart-popup" class="fixed bottom-4 right-4 bg-red-700 text-white p-6 rounded-lg shadow-lg w-80 z-50">
        <p class="font-semibold mb-4">
            ⚠️ {{ $message }}
        </p>
        <button onclick="document.getElementById('cart-popup').style.display='none';" class="text-white underline">
            Close
        </button>
    </div>
@endif