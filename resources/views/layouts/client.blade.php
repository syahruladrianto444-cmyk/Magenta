<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: localStorage.getItem('darkMode') !== 'false' }"
    x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Client Panel') - MAGENTA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: { 500: '#DC2626', 600: '#B91C1C' },
                        dark: { 700: '#334155', 800: '#1e293b', 900: '#0f172a', 950: '#030712' },
                        navy: { 600: '#475569', 700: '#334155', 800: '#1e293b', 900: '#0f172a', 950: '#020617' },
                        magenta: { 500: '#DC2626', 600: '#B91C1C' }
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-dark-950 text-gray-900 dark:text-white transition-colors duration-300"
    x-data="{ sidebarOpen: true }">
    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside :class="sidebarOpen ? 'w-64' : 'w-20'"
            class="bg-white dark:bg-dark-900 border-r border-gray-200 dark:border-dark-800 transition-all duration-300 flex flex-col z-20">
            <div class="h-16 flex items-center justify-center border-b border-gray-200 dark:border-dark-800">
                <a href="{{ route('client.dashboard') }}"
                    class="flex items-center space-x-3 text-center w-full justify-center">
                    <img src="{{ asset('images/Magenta Logo Alternate Gelap.png') }}" alt="MAGENTA"
                        class="h-10 w-auto transition-all duration-300 dark:hidden"
                        :class="sidebarOpen ? 'h-10' : 'h-8'">
                    <img src="{{ asset('images/Magenta Logo Alternate Terang.png') }}" alt="MAGENTA"
                        class="h-10 w-auto transition-all duration-300 hidden dark:block"
                        :class="sidebarOpen ? 'h-10' : 'h-8'">
                </a>
            </div>

            <nav class="flex-1 py-6 px-3 space-y-1 overflow-y-auto">
                <a href="{{ route('client.dashboard') }}"
                    class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('client.dashboard') ? 'bg-primary-500/10 text-primary-500' : 'text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-dark-800 hover:text-gray-900 dark:hover:text-white' }} transition-colors">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    <span x-show="sidebarOpen" class="ml-3">Dashboard</span>
                </a>
                <a href="{{ route('client.events.index') }}"
                    class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('client.events.*') ? 'bg-primary-500/10 text-primary-500' : 'text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-dark-800 hover:text-gray-900 dark:hover:text-white' }} transition-colors">
                    <i data-lucide="video" class="w-5 h-5"></i>
                    <span x-show="sidebarOpen" class="ml-3">Event Management</span>
                </a>
            </nav>
        </aside>

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col">
            {{-- Top Header --}}
            <header
                class="h-16 bg-white dark:bg-dark-900 border-b border-gray-200 dark:border-dark-800 flex items-center justify-between px-6 transition-colors duration-300">
                <button @click="sidebarOpen = !sidebarOpen"
                    class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white transition-colors">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
                <div class="flex items-center space-x-4">
                    {{-- Theme Toggle --}}
                    <button @click="darkMode = !darkMode"
                        class="p-2 rounded-xl bg-gray-100 dark:bg-dark-800 text-gray-600 dark:text-yellow-400 hover:bg-gray-200 dark:hover:bg-dark-700 transition-colors"
                        :title="darkMode ? 'Switch to Light Mode' : 'Switch to Dark Mode'">
                        <i x-show="!darkMode" data-lucide="moon" class="w-5 h-5"></i>
                        <i x-show="darkMode" data-lucide="sun" class="w-5 h-5"></i>
                    </button>

                    {{-- User Dropdown --}}
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center space-x-3 p-2 rounded-xl hover:bg-gray-100 dark:hover:bg-dark-800 transition-colors">
                            <div
                                class="w-8 h-8 bg-primary-500 rounded-full flex items-center justify-center text-white font-bold text-sm">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <span x-show="sidebarOpen"
                                class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ auth()->user()->name }}</span>
                            <i data-lucide="chevron-down" class="w-4 h-4 text-gray-400"></i>
                        </button>
                        <div x-show="open" @click.outside="open = false" x-transition x-cloak
                            class="absolute right-0 mt-2 w-48 bg-white dark:bg-dark-800 rounded-xl shadow-lg border border-gray-200 dark:border-dark-700 py-2 z-50">
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="w-full flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-dark-700 transition-colors">
                                    <i data-lucide="log-out" class="w-4 h-4 mr-3"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            {{-- Page Content --}}
            <main class="flex-1 p-6 lg:p-8">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>

</html>