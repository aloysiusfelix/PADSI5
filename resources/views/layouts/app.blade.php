<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Font Awesome CDN -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script>
            function toggleSidebar() {
                const sidebar = document.getElementById('sidebar');
                sidebar.classList.toggle('hidden');
            }
        </script>

        <!-- Inline CSS -->
        <style>
            /* Sidebar styles */
            nav#sidebar ul li {
                display: flex;
                align-items: center;
                padding: 0.5rem 1rem;
                border-radius: 0.5rem;
                transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
                position: relative;
            }

            /* Hover effect with elevation */
            nav#sidebar ul li:hover {
                background-color: #3b82f6; /* Hover background color */
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.06); /* Elevation effect */
                transform: translateY(-2px); /* Slight lift */
            }

            nav#sidebar ul li .icon {
                margin-right: 0.75rem;
                font-size: 1.2rem; /* Adjust icon size */
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
        <div class="min-h-screen flex">
            <!-- Sidebar -->
            <nav id="sidebar" class="w-64 bg-white dark:bg-gray-800 p-4 transition-transform duration-300 ease-in-out">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-6">
                    Kopi Dari Hati
                </h2>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('penjualan.index') }}" class="text-gray-800 dark:text-white flex items-center">
                            <i class="fas fa-shopping-cart icon"></i>
                            Penjualan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pembelian.index') }}" class="text-gray-800 dark:text-white flex items-center">
                            <i class="fas fa-box icon"></i>
                            Pembelian
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('menus.index') }}" class="text-gray-800 dark:text-white flex items-center">
                            <i class="fas fa-utensils icon"></i>
                            Menu
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('stoks.index') }}" class="text-gray-800 dark:text-white flex items-center">
                            <i class="fas fa-warehouse icon"></i>
                            Stok
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pelanggans.index') }}" class="text-gray-800 dark:text-white flex items-center">
                            <i class="fas fa-users icon"></i>
                            Pelanggan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('laporan_penjualan.index') }}" class="text-gray-800 dark:text-white flex items-center">
                            <i class="fas fa-file-alt icon"></i>
                            Laporan Penjualan
                        </a>
                    </li>
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
