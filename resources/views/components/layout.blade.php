<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Milo Marathon Registration and Tracking System' }}</title>

    @vite('resources/css/app.css')
</head>
<body>
    <header class="bg-green-600 flex items-center justify-between max-w-full mx-auto px-6 py-4 border-b">
        <div class="flex items-center gap-4">
                <img
                    src="https://vectorseek.com/wp-content/uploads/2023/10/Nestle-Milo-Logo-Vector.svg-.png"
                    alt="Logo"
                    class="h-14 w-20 object-cover"
                />

                <h1 class="text-2xl md:text-4xl font-bold text-white">
                    Milo Marathon Registration
                </h1>
            </div>
        <nav class="flex items-center gap-6 text-white font-medium">
            <a href="{{ route('registration.index') }}"
                class="hover:text-yellow-300 transition">
                All Registrants
            </a>

            <a href="{{ route('registration.create') }}"
                class="hover:text-yellow-300 transition">
                Add New Registrant
            </a>
        </nav>
        <form action="{{ route('registration.search') }}" class="w-full max-w-sm" method="GET">
            @csrf
            <input 
            type="text"
            name="query"
            id="query"
            value="{{ old('query') }}"
            placeholder="Search by name, email, phone, address, or category"
            required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:outline-none text-gray-700 bg-white">
        </form>
    </header>

    <main>
        {{ $slot }}
    </main>
</body>
</html>