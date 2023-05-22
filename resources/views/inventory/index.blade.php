<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>
<body class="antialiased pt-24 h-screen">
<nav class="p-6 border-b-2 flex items-center justify-between absolute top-0 left-0 w-full bg-white h-24">
    <a class="flex gap-6 cursor-pointer" href="/">
        <img src="https://assos.utc.fr/polar/styles/0/textures/head.png" alt="polar logo" class="w-12"/>
        <div class="flex gap-1.5">
            <h1 class="text-2xl">Le Polar</h1>
        </div>
    </a>
    <div class="flex">
        <a href="/inventory" class="h-24 px-8 bg-gray-100 flex items-center transition">
            Inventaire
        </a>
    </div>
    <a href="/admin">
        <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded inline-flex items-center">
            <span>Admin Panel</span>
        </button>
    </a>
</nav>
<div
    class="min-h-full selection:bg-red-500 selection:text-white bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 p-12">
    <h2 class="text-2xl">
        Liste des articles
    </h2>
    <div class="flex flex-wrap items-center w-full h-full gap-6 mt-6">
        @foreach($items as $item)
            <div class="bg-white rounded-lg p-6">
                <img src="{{ env("APP_URL")."/storage/".$item->image }}" alt="image" class="w-full h-64 object-cover rounded-lg mb-6"/>
                <h3 class="text-xl font-bold">
                    {{ $item->name }}
                </h3>
                <p class="text-gray-500">
                    {{ $item->description }}
                </p>
                <div class="text-green-600 font-bold text-right">
                    {{ $item->price }}€
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
