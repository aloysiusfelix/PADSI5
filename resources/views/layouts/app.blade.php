<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
        <div class="min-h-screen flex">
            <!-- Sidebar -->
            <nav class="w-64 bg-white dark:bg-gray-800 p-4">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-6">
                    Kopi Dari Hati
                </h2>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('penjualan.index') }}" class="block px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
                            Penjualan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('menus.index') }}" class="block px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
                            Menu
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('stoks.index') }}" class="block px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
                            Stok
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pelanggans.index') }}" class="block px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
                            Pelanggan
                        </a>
                    </li>
                    <!-- Tambahkan item menu lainnya jika diperlukan -->
                </ul>
            </nav>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col">
                <!-- Navigation -->
                @include('layouts.navigation')

                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white dark:bg-gray-800 shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-gray-800 dark:text-white">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main class="flex-1 p-6">
                    @yield('content')
                </main>
            </div>
        </div>
    </body>
</html>