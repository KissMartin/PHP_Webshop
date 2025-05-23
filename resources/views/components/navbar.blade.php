<nav class="bg-gray-900 shadow p-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-bold">HoneyHive</h1>
        <ul class="flex space-x-4 text-lg">
            <li><a href="/" class="py-2 px-5 hover:text-gray-400">Home</a></li>
            <li><a href="#" class="py-2 px-5 hover:text-gray-400">Cart</a></li>
            @if (Auth::check())
                <x-profile-menu />
            @else
                <li><a href="{{ route('login') }}" class="py-2 px-5 hover:text-gray-400 font-semibold">Sign in</a></li>
                <li><a href="{{ route('register') }}" class="py-2 px-5 hover:text-gray-400 font-semibold">Sign up</a></li>
            @endif
            {{-- <a href="{{ route('login') }}" class="hover:text-blue-500">Login</a> --}}
        </ul>
    </div>
</nav>