<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Digitech</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(to right, #f8fafc, #e0f2fe);
        }
    </style>
</head>
<body class="text-gray-700 bg-white">

    <div class="hero px-6">
        <div class="max-w-4xl w-full mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <!-- Left Content -->
            <div>
                <h1 class="text-4xl font-bold mb-4">
                    Hello, Welcome to <span class="text-sky-500">MoonLight<span>
                </h1>
                <p class="text-lg mb-6 text-gray-600">
                    Your trusted partner in digital transformation.
                </p>

                @if (Route::has('login'))
                    <div class="flex gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-6 py-3 bg-sky-500 hover:bg-sky-600 text-white rounded-md text-sm">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="px-6 py-3 border border-sky-500 text-sky-500 hover:bg-sky-50 rounded-md text-sm">
                                Login
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-6 py-3 border border-gray-300 text-gray-700 hover:bg-gray-100 rounded-md text-sm">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>

            <!-- Right Image / Logo -->
            <div class="flex justify-center">
                <div class="w-48 h-48 bg-sky-100 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" className="size-6">
                        <path fillRule="evenodd" d="M9.528 1.718a.75.75 0 0 1 .162.819A8.97 8.97 0 0 0 9 6a9 9 0 0 0 9 9 8.97 8.97 0 0 0 3.463-.69.75.75 0 0 1 .981.98 10.503 10.503 0 0 1-9.694 6.46c-5.799 0-10.5-4.7-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 0 1 .818.162Z" clipRule="evenodd" />
                      </svg>                      
                </div>
            </div>
        </div>
    </div>

    <footer class="py-4 text-center text-xs text-gray-400">
        &copy; {{ date('Y') }} MoonLight
    </footer>

</body>
</html>