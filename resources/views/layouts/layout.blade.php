<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HoneyHive</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-800 text-gray-200 overflow-x-hidden">
    <x-navbar />

    @yield('content')
    
    <x-footer />
</body>
</html>