<nav class="bg-gradient-to-b from-[rgba(0,0,0,0.8)] from-30 to-transparent text-white p-4 fixed w-screen top-0 left-0 z-40">
    @php
        $currentUrl = url()->current();
    @endphp
    <div class="container mx-auto flex justify-between items-center h-12">
        <h1 class="text-3xl font-bold"><a href="/" class="py-2 px-5 hover:text-gray-400">HoneyHive</a></h1>
        <ul class="flex space-x-4 text-lg">
            <li><a href="{{ route('products') }}" class="py-2 px-5 hover:text-gray-400"><i class="fa fa-cube"></i> Products</a></li>
            <li><a href="{{ route('cart') }}" class="py-2 px-5 hover:text-gray-400"><i class="fa fa-shopping-cart"></i> Cart</a></li>
            @if (Auth::check())
                <x-profile-menu />
            @else
                <li><a href="{{ route('login', ['redirect' => $currentUrl]) }}" class="py-2 px-5 hover:text-gray-400 font-semibold"><i class="fa fa-user"></i> Sign in</a></li>
                <li>
                    <x-defaults.link-background href="{{ route('register', ['redirect' => $currentUrl]) }}" class="font-semibold">Craete Account</x-defaults.link-background>
                </li>
            @endif
        </ul>
    </div>
</nav>