<nav class="bg-white shadow p-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-2xl font-bold">My Webshop</h1>
        <ul class="flex space-x-4">
            <li><a href="/" class="hover:text-blue-500">Home</a></li>
            <li><a href="#" class="hover:text-blue-500">Products</a></li>
            <li><a href="#" class="hover:text-blue-500">Cart</a></li>
            <a href="{{ route('register') }}" class="hover:text-blue-500">Register</a>
            <a href="{{ route('login') }}" class="hover:text-blue-500">Login</a>
        </ul>
    </div>
</nav>