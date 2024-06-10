<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        /* Include Tailwind CSS */
        @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');

        /* Custom button color */
        .btn-custom {
            background-color: #067dc1;
            color: white;
        }

        .btn-custom:hover {
            background-color: #000000;
        }
    </style>
</head>
<body class="antialiased bg-gray-100">
    <div class="flex items-center justify-center min-h-screen bg-dots-darker bg-center selection:bg-red-500 selection:text-white">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <!-- Large Logo -->
            <div class="mb-4">
                <img src="{{ asset('image\ccmaresme_Logo.jpg') }}" alt="Logo" class="mx-auto h-32 w-auto"> <!-- Adjust the path and size as needed -->
            </div>
            <h1 class="text-2xl font-semibold text-gray-900 mb-4">Bienvenido usuario</h1>
            <p class="mb-6 text-gray-600">A continuación, inicia sesión o regístrate por favor.</p>

            @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn-custom px-4 py-2 rounded-md font-semibold">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn-custom px-4 py-2 rounded-md font-semibold mr-4">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-custom px-4 py-2 rounded-md font-semibold">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</body>
</html>
