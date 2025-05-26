<nav class="bg-gradient-to-b from-[rgba(0,0,0,0.8)] from-30 to-transparent text-white p-4 fixed w-screen top-0 left-0 z-40">
    @php
        $currentUrl = url()->current();
    @endphp
    <div class="container mx-auto flex justify-between items-center h-12">
        <h1 class="text-3xl font-bold"><a href="/" class="py-2 px-5 hover:text-gray-400">HoneyHive</a></h1>
        @if (Route::currentRouteName() != "home")
            <div class="w-1/2">
                <x-searchbar/>
            </div>
        @endif
        <ul class="flex space-x-4 text-lg">
            <li><a href="{{ route('cart') }}" class="py-2 px-5 hover:text-gray-400"><i class="fa fa-shopping-cart"></i> Cart</a></li>
            @if (Auth::check())
                <x-profile-menu />
            @else
                <li><a href="{{ route('login', ['redirect' => $currentUrl]) }}" class="py-2 px-5 hover:text-gray-400 font-semibold"><i class="fa fa-user"></i> Sign in</a></li>
                <li><a href="{{ route('register', ['redirect' => $currentUrl]) }}" class="py-2 px-5 bg-amber-700 rounded-full hover:text-gray-300 font-semibold">Create Account</a></li>
            @endif
            {{-- <a href="{{ route('login') }}" class="hover:text-blue-500">Login</a> --}}
        </ul>
    </div>
</nav>