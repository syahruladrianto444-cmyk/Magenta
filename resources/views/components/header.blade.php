{{-- Main Header Component --}}
<header x-data="{ mobileMenuOpen: false, scrolled: false }"
    x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })"
    :class="scrolled ? 'dark:bg-dark-950/95 bg-white/95 backdrop-blur-lg shadow-lg' : 'bg-transparent'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center space-x-3">
                {{-- Light Mode Logo (Visible in Light Mode, Hidden in Dark Mode) --}}
                <img src="{{ asset('images/Magenta Logo Alternate Gelap.png') }}" alt="MAGENTA Logo"
                    class="h-10 w-auto dark:hidden">

                {{-- Dark Mode Logo (Hidden in Light Mode, Visible in Dark Mode) --}}
                <img src="{{ asset('images/Magenta Logo Alternate Terang.png') }}" alt="MAGENTA Logo"
                    class="h-10 w-auto hidden dark:block">
            </a>

            {{-- Desktop Navigation --}}
            <nav class="hidden lg:flex items-center space-x-1">
                <a href="{{ route('home') }}"
                    class="px-4 py-2 text-sm font-medium {{ request()->routeIs('home') ? 'text-primary-500' : 'dark:text-white text-dark-700 hover:text-primary-500' }} transition-colors">
                    Home
                </a>
                <a href="{{ route('about') }}"
                    class="px-4 py-2 text-sm font-medium {{ request()->routeIs('about') ? 'text-primary-500' : 'dark:text-white text-dark-700 hover:text-primary-500' }} transition-colors">
                    About
                </a>

                {{-- Services Dropdown --}}
                <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
                    <a href="{{ route('services.index') }}"
                        class="flex items-center px-4 py-2 text-sm font-medium {{ request()->routeIs('services.*') ? 'text-primary-500' : 'dark:text-white text-dark-700 hover:text-primary-500' }} transition-colors">
                        <span>Services</span>
                        <i data-lucide="chevron-down" class="w-4 h-4 ml-1"></i>
                    </a>
                    <div x-show="open" x-cloak x-transition
                        class="absolute top-full left-0 w-64 dark:bg-dark-900 bg-white dark:border-dark-700 border-gray-200 border rounded-xl shadow-xl py-2 mt-2">
                        @php $services = \App\Models\Service::active()->ordered()->take(6)->get(); @endphp
                        @foreach($services as $service)
                            <a href="{{ route('services.show', $service) }}"
                                class="flex items-center px-4 py-3 text-sm dark:text-dark-300 text-dark-600 hover:text-primary-500 dark:hover:bg-dark-800 hover:bg-gray-50 transition-colors">
                                <i data-lucide="{{ $service->icon ?? 'briefcase' }}"
                                    class="w-4 h-4 mr-3 text-primary-500"></i>
                                <span>{{ $service->title }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- Business Units Dropdown --}}
                <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
                    <a href="{{ route('units.index') }}"
                        class="flex items-center px-4 py-2 text-sm font-medium {{ request()->routeIs('units.*') ? 'text-primary-500' : 'dark:text-white text-dark-700 hover:text-primary-500' }} transition-colors">
                        <span>Business Units</span>
                        <i data-lucide="chevron-down" class="w-4 h-4 ml-1"></i>
                    </a>
                    <div x-show="open" x-cloak x-transition
                        class="absolute top-full left-0 w-64 dark:bg-dark-900 bg-white dark:border-dark-700 border-gray-200 border rounded-xl shadow-xl py-2 mt-2">
                        @php $units = \App\Models\BusinessUnit::active()->ordered()->get(); @endphp
                        @foreach($units as $unit)
                            <a href="{{ route('units.show', $unit) }}"
                                class="flex items-center px-4 py-3 text-sm dark:text-dark-300 text-dark-600 hover:text-primary-500 dark:hover:bg-dark-800 hover:bg-gray-50 transition-colors">
                                <span class="w-3 h-3 rounded-full mr-3"
                                    style="background-color: {{ $unit->color ?? '#DC2626' }}"></span>
                                <span>{{ $unit->name }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <a href="{{ route('portfolio.index') }}"
                    class="px-4 py-2 text-sm font-medium {{ request()->routeIs('portfolio.*') ? 'text-primary-500' : 'dark:text-white text-dark-700 hover:text-primary-500' }} transition-colors">
                    Portfolio
                </a>
                <a href="{{ route('news.index') }}"
                    class="px-4 py-2 text-sm font-medium {{ request()->routeIs('news.*') ? 'text-primary-500' : 'dark:text-white text-dark-700 hover:text-primary-500' }} transition-colors">
                    News
                </a>
                <a href="{{ route('career.index') }}"
                    class="px-4 py-2 text-sm font-medium {{ request()->routeIs('career.*') ? 'text-primary-500' : 'dark:text-white text-dark-700 hover:text-primary-500' }} transition-colors">
                    Career
                </a>
                <a href="{{ route('partners') }}"
                    class="px-4 py-2 text-sm font-medium {{ request()->routeIs('partners') ? 'text-primary-500' : 'dark:text-white text-dark-700 hover:text-primary-500' }} transition-colors">
                    Partners
                </a>
            </nav>

            {{-- Right Side: Theme Toggle + CTA --}}
            <div class="hidden lg:flex items-center space-x-4">
                {{-- Theme Toggle Button --}}
                <button @click="darkMode = !darkMode"
                    class="p-2 rounded-xl dark:bg-dark-800 bg-gray-100 dark:text-yellow-400 text-dark-600 hover:bg-primary-500 hover:text-white transition-all duration-300"
                    :title="darkMode ? 'Switch to Light Mode' : 'Switch to Dark Mode'">
                    <i x-show="darkMode" data-lucide="sun" class="w-5 h-5"></i>
                    <i x-show="!darkMode" x-cloak data-lucide="moon" class="w-5 h-5"></i>
                </button>

                <a href="{{ route('contact') }}"
                    class="px-6 py-3 bg-gradient-primary text-white text-sm font-semibold rounded-full hover:shadow-lg hover:shadow-primary-500/30 transition-all duration-300 btn-animate">
                    Contact Us
                </a>
            </div>

            {{-- Mobile Menu Toggle --}}
            <div class="lg:hidden flex items-center space-x-2">
                {{-- Mobile Theme Toggle --}}
                <button @click="darkMode = !darkMode"
                    class="p-2 rounded-xl dark:bg-dark-800 bg-gray-100 dark:text-yellow-400 text-dark-600">
                    <i x-show="darkMode" data-lucide="sun" class="w-5 h-5"></i>
                    <i x-show="!darkMode" x-cloak data-lucide="moon" class="w-5 h-5"></i>
                </button>

                <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 dark:text-white text-dark-700">
                    <i x-show="!mobileMenuOpen" data-lucide="menu" class="w-6 h-6"></i>
                    <i x-show="mobileMenuOpen" x-cloak data-lucide="x" class="w-6 h-6"></i>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="mobileMenuOpen" x-cloak x-transition
        class="lg:hidden dark:bg-dark-900 bg-white border-t dark:border-dark-800 border-gray-200">
        <div class="px-4 py-6 space-y-3">
            <a href="{{ route('home') }}"
                class="block px-4 py-3 rounded-xl dark:text-white text-dark-700 dark:hover:bg-dark-800 hover:bg-gray-50">Home</a>
            <a href="{{ route('about') }}"
                class="block px-4 py-3 rounded-xl dark:text-white text-dark-700 dark:hover:bg-dark-800 hover:bg-gray-50">About</a>
            <a href="{{ route('services.index') }}"
                class="block px-4 py-3 rounded-xl dark:text-white text-dark-700 dark:hover:bg-dark-800 hover:bg-gray-50">Services</a>
            <a href="{{ route('units.index') }}"
                class="block px-4 py-3 rounded-xl dark:text-white text-dark-700 dark:hover:bg-dark-800 hover:bg-gray-50">Business
                Units</a>
            <a href="{{ route('portfolio.index') }}"
                class="block px-4 py-3 rounded-xl dark:text-white text-dark-700 dark:hover:bg-dark-800 hover:bg-gray-50">Portfolio</a>
            <a href="{{ route('news.index') }}"
                class="block px-4 py-3 rounded-xl dark:text-white text-dark-700 dark:hover:bg-dark-800 hover:bg-gray-50">News</a>
            <a href="{{ route('career.index') }}"
                class="block px-4 py-3 rounded-xl dark:text-white text-dark-700 dark:hover:bg-dark-800 hover:bg-gray-50">Career</a>
            <a href="{{ route('partners') }}"
                class="block px-4 py-3 rounded-xl dark:text-white text-dark-700 dark:hover:bg-dark-800 hover:bg-gray-50">Partners</a>
            <a href="{{ route('contact') }}"
                class="block px-4 py-3 mt-4 bg-gradient-primary text-white text-center font-semibold rounded-xl">Contact
                Us</a>
        </div>
    </div>
</header>