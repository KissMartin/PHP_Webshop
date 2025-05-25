@if (session('cart_message'))
    <div id="cart-notification" class="fixed bottom-4 right-4 bg-gray-800 text-white p-6 rounded-lg shadow-lg w-80 z-50">
        <p class="font-semibold mb-4">✅ {{ session('cart_message')['text'] }}</p>

        @if (session('cart_message')['show_options'])
            <div class="flex justify-end space-x-4">
                <button 
                    onclick="document.getElementById('cart-notification').style.display = 'none';" 
                    class="text-gray-300 hover:text-white focus:outline-none"
                >
                    Continue Browsing
                </button>
                <a href="{{ route('cart') }}" class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700 text-white text-sm">
                    View Cart
                </a>
            </div>
        @endif
    </div>
@endif
