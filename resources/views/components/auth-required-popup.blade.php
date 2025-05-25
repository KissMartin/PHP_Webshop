@if(session('auth_required'))
    @php
        $currentUrl = url()->current();
    @endphp

    <div id="auth-popup" class="fixed bottom-4 right-4 bg-red-700 text-white p-6 rounded-lg shadow-lg w-80 z-50">
        <p class="font-semibold mb-4">
            ⚠️ You need to 
            <a href="{{ route('login', ['redirect' => $currentUrl]) }}" class="underline">login</a> or 
            <a href="{{ route('register', ['redirect' => $currentUrl]) }}" class="underline">register</a> to purchase.
        </p>
        <button onclick="document.getElementById('auth-popup').style.display='none';" class="text-white underline">
            Close
        </button>
    </div>
@endif
