<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Webshop</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100 text-gray-800">

    <nav class="bg-white shadow p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">My Webshop</h1>
            <ul class="flex space-x-4">
                <li><a href="#" class="hover:text-blue-500">Home</a></li>
                <li><a href="#" class="hover:text-blue-500">Products</a></li>
                <li><a href="#" class="hover:text-blue-500">Cart</a></li>
                <li><a href="#" class="hover:text-blue-500">Login</a></li>
            </ul>
        </div>
    </nav>

    <section class="bg-blue-600 text-white text-center py-16">
        <h2 class="text-4xl font-bold mb-4">Welcome to Our Shop</h2>
        <p class="text-lg">Find the best products at unbeatable prices</p>
        <a href="#" class="mt-6 inline-block bg-white text-blue-600 font-semibold px-6 py-2 rounded shadow hover:bg-gray-100">Shop Now</a>
    </section>

    <section class="container mx-auto py-12 px-4">
        <h3 class="text-2xl font-bold mb-6">Featured Products</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($products ?? [] as $product)
                <x-product-card 
                    :name="$product->name"
                    :description="$product->description"
                    :price="$product->price"
                    :image="$product->image_url"
                />
            @endforeach

        </div>
    </section>

    <footer class="bg-gray-800 text-white text-center py-6 mt-12">
        <p>&copy; {{ date('Y') }} My Webshop. All rights reserved.</p>
    </footer>

</body>
</html>
