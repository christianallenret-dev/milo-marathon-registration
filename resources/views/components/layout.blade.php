<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @vite('resources/css/app.css')
</head>
<body>
    <header class="flex items-center justify-between max-w-5xl mx-auto px-6 py-4 border-b">
        <h1 class="text-4xl font-bold tracking-tight text-gray-400"> Milo Marathon Registration</h1>
        <a href="">All Registrants</a>
        <a href=""> Add New Registrant </a>
    </header>

    <main>
        {{ $slot }}
    </main>
</body>
</html>