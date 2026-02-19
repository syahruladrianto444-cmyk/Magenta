<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: localStorage.getItem('darkMode') !== 'false' }"
    x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - MAGENTA</title>
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

        /* Global Form Input Styles */
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"],
        input[type="date"],
        input[type="url"],
        input[type="tel"],
        input[type="file"],
        select,
        textarea {
            @apply bg-gray-50 dark:bg-dark-900 border-gray-300 dark:border-dark-700 text-gray-900 dark:text-white;
        }

        input:focus,
        select:focus,
        textarea:focus {
            @apply border-primary-500 ring-1 ring-primary-500 outline-none;
            box-shadow: 0 0 0 1px #DC2626;
        }

        input::placeholder,
        textarea::placeholder {
            @apply text-gray-400 dark:text-gray-500;
        }

        /* Select dropdown styling */
        select option {
            @apply bg-white dark:bg-dark-900 text-gray-900 dark:text-white;
        }

        /* File input styling */
        input[type="file"]::file-selector-button {
            background-color: #DC2626;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            cursor: pointer;
            margin-right: 1rem;
        }

        input[type="file"]::file-selector-button:hover {
            background-color: #B91C1C;
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
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center space-x-3 text-center w-full justify-center">
                    {{-- Light Mode Logo --}}
                    <img src="{{ asset('images/Magenta Logo Alternate Gelap.png') }}" alt="MAGENTA"
                        class="h-10 w-auto transition-all duration-300 dark:hidden"
                        :class="sidebarOpen ? 'h-10' : 'h-8'">
                    {{-- Dark Mode Logo --}}
                    <img src="{{ asset('images/Magenta Logo Alternate Terang.png') }}" alt="MAGENTA"
                        class="h-10 w-auto transition-all duration-300 hidden dark:block"
                        :class="sidebarOpen ? 'h-10' : 'h-8'">
                </a>
            </div>

            <nav class="flex-1 py-6 px-3 space-y-1 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-primary-500/10 text-primary-500' : 'text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-dark-800 hover:text-gray-900 dark:hover:text-white' }} transition-colors">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    <span x-show="sidebarOpen" class="ml-3">Dashboard</span>
                </a>
                <a href="{{ route('admin.services.index') }}"
                    class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('admin.services.*') ? 'bg-primary-500/10 text-primary-500' : 'text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-dark-800 hover:text-gray-900 dark:hover:text-white' }} transition-colors">
                    <i data-lucide="briefcase" class="w-5 h-5"></i>
                    <span x-show="sidebarOpen" class="ml-3">Services</span>
                </a>
                <a href="{{ route('admin.units.index') }}"
                    class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('admin.units.*') ? 'bg-primary-500/10 text-primary-500' : 'text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-dark-800 hover:text-gray-900 dark:hover:text-white' }} transition-colors">
                    <i data-lucide="building-2" class="w-5 h-5"></i>
                    <span x-show="sidebarOpen" class="ml-3">Business Units</span>
                </a>
                <a href="{{ route('admin.portfolios.index') }}"
                    class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('admin.portfolios.*') ? 'bg-primary-500/10 text-primary-500' : 'text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-dark-800 hover:text-gray-900 dark:hover:text-white' }} transition-colors">
                    <i data-lucide="images" class="w-5 h-5"></i>
                    <span x-show="sidebarOpen" class="ml-3">Portfolio</span>
                </a>
                <a href="{{ route('admin.news.index') }}"
                    class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('admin.news.*') ? 'bg-primary-500/10 text-primary-500' : 'text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-dark-800 hover:text-gray-900 dark:hover:text-white' }} transition-colors">
                    <i data-lucide="newspaper" class="w-5 h-5"></i>
                    <span x-show="sidebarOpen" class="ml-3">News</span>
                </a>
                <a href="{{ route('admin.careers.index') }}"
                    class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('admin.careers.*') ? 'bg-primary-500/10 text-primary-500' : 'text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-dark-800 hover:text-gray-900 dark:hover:text-white' }} transition-colors">
                    <i data-lucide="briefcase" class="w-5 h-5"></i>
                    <span x-show="sidebarOpen" class="ml-3">Career</span>
                </a>
                <a href="{{ route('admin.partners.index') }}"
                    class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('admin.partners.*') ? 'bg-primary-500/10 text-primary-500' : 'text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-dark-800 hover:text-gray-900 dark:hover:text-white' }} transition-colors">
                    <i data-lucide="users" class="w-5 h-5"></i>
                    <span x-show="sidebarOpen" class="ml-3">Partners</span>
                </a>
                <a href="{{ route('admin.contacts.index') }}"
                    class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('admin.contacts.*') ? 'bg-primary-500/10 text-primary-500' : 'text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-dark-800 hover:text-gray-900 dark:hover:text-white' }} transition-colors">
                    <i data-lucide="mail" class="w-5 h-5"></i>
                    <span x-show="sidebarOpen" class="ml-3">Contacts</span>
                </a>

                <div class="my-3 border-t border-gray-200 dark:border-dark-800"></div>

                <a href="{{ route('admin.events.index') }}"
                    class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('admin.events.*') ? 'bg-primary-500/10 text-primary-500' : 'text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-dark-800 hover:text-gray-900 dark:hover:text-white' }} transition-colors">
                    <i data-lucide="video" class="w-5 h-5"></i>
                    <span x-show="sidebarOpen" class="ml-3">Event Management</span>
                </a>
                <a href="{{ route('admin.users.index') }}"
                    class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('admin.users.*') ? 'bg-primary-500/10 text-primary-500' : 'text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-dark-800 hover:text-gray-900 dark:hover:text-white' }} transition-colors">
                    <i data-lucide="user-cog" class="w-5 h-5"></i>
                    <span x-show="sidebarOpen" class="ml-3">User Management</span>
                </a>
            </nav>

            <div class="p-3 border-t border-gray-200 dark:border-dark-800">
                <a href="{{ route('home') }}" target="_blank"
                    class="flex items-center px-4 py-3 rounded-xl text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-dark-800 hover:text-gray-900 dark:hover:text-white transition-colors">
                    <i data-lucide="external-link" class="w-5 h-5"></i>
                    <span x-show="sidebarOpen" class="ml-3">View Site</span>
                </a>
            </div>
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
                        <i x-show="darkMode" data-lucide="sun" class="w-5 h-5"></i>
                        <i x-show="!darkMode" x-cloak data-lucide="moon" class="w-5 h-5"></i>
                    </button>
                    <span class="text-gray-600 dark:text-gray-400">{{ auth()->user()->name ?? 'Admin' }}</span>
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open"
                            class="w-10 h-10 bg-primary-500 rounded-full flex items-center justify-center hover:bg-primary-600 transition-colors">
                            <span class="font-bold text-white">{{ substr(auth()->user()->name ?? 'A', 0, 1) }}</span>
                        </button>
                        <div x-show="open" x-cloak @click.away="open = false"
                            class="absolute right-0 mt-2 w-48 bg-white dark:bg-dark-800 border border-gray-200 dark:border-dark-700 rounded-xl shadow-xl py-2">
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="w-full flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-dark-700 hover:text-gray-900 dark:hover:text-white transition-colors">
                                    <i data-lucide="log-out" class="w-4 h-4 mr-3"></i>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            {{-- Page Content --}}
            <main class="flex-1 p-6 overflow-auto">
                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-500/10 border border-green-500/20 rounded-xl text-green-400">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 rounded-xl text-red-400">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script>lucide.createIcons();</script>
    @stack('scripts')
</body>

</html>