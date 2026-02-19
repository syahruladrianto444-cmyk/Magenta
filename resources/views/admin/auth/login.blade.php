<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: localStorage.getItem('darkMode') !== 'false' }"
    x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - MAGENTA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: { 500: '#DC2626', 600: '#B91C1C' },
                        dark: { 700: '#334155', 800: '#1e293b', 900: '#0f172a', 950: '#030712' }
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body
    class="bg-gray-100 dark:bg-dark-950 min-h-screen flex items-center justify-center p-4 transition-colors duration-300">
    {{-- Theme Toggle --}}
    <div class="absolute top-4 right-4">
        <button @click="darkMode = !darkMode"
            class="p-2 rounded-xl bg-white dark:bg-dark-800 text-gray-600 dark:text-yellow-400 shadow-lg hover:scale-105 transition-all duration-300">
            <i x-show="darkMode" data-lucide="sun" class="w-6 h-6"></i>
            <i x-show="!darkMode" x-cloak data-lucide="moon" class="w-6 h-6"></i>
        </button>
    </div>

    <div class="w-full max-w-md">
        {{-- Logo --}}
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="inline-flex items-center space-x-3">
                <img src="{{ asset('images/Magenta Logo Alternate Gelap.png') }}" alt="MAGENTA"
                    class="h-16 w-auto dark:hidden">
                <img src="{{ asset('images/Magenta Logo Alternate Terang.png') }}" alt="MAGENTA"
                    class="h-16 w-auto hidden dark:block">
            </a>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white mt-4 transition-colors">Admin Login</h1>
            <p class="text-gray-500 dark:text-gray-400 transition-colors">Masuk ke dashboard admin MAGENTA</p>
        </div>

        {{-- Login Form --}}
        <div
            class="bg-white dark:bg-dark-800 rounded-2xl p-8 border border-gray-200 dark:border-dark-700 shadow-2xl transition-all duration-300">
            @if(session('error'))
                <div
                    class="mb-6 p-4 bg-red-500/10 border border-red-500/20 rounded-xl text-red-500 dark:text-red-400 text-sm">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div
                    class="mb-6 p-4 bg-green-500/10 border border-green-500/20 rounded-xl text-green-500 dark:text-green-400 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="email"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 transition-colors">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i data-lucide="mail"
                                class="w-5 h-5 text-gray-400 dark:text-gray-500 transition-colors"></i>
                        </div>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                            class="w-full pl-12 pr-4 py-3 bg-gray-50 dark:bg-dark-900 border border-gray-300 dark:border-dark-700 rounded-xl text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:border-primary-500 focus:ring-1 focus:ring-primary-500 outline-none transition-all"
                            placeholder="admin@magenta.co.id">
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm text-red-500 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 transition-colors">Password</label>
                    <div class="relative" x-data="{ showPassword: false }">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i data-lucide="lock"
                                class="w-5 h-5 text-gray-400 dark:text-gray-500 transition-colors"></i>
                        </div>
                        <input :type="showPassword ? 'text' : 'password'" id="password" name="password" required
                            class="w-full pl-12 pr-12 py-3 bg-gray-50 dark:bg-dark-900 border border-gray-300 dark:border-dark-700 rounded-xl text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:border-primary-500 focus:ring-1 focus:ring-primary-500 outline-none transition-all"
                            placeholder="••••••••">
                        <button type="button" @click="showPassword = !showPassword"
                            class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 dark:text-gray-500 dark:hover:text-white transition-colors">
                            <i x-show="!showPassword" data-lucide="eye" class="w-5 h-5"></i>
                            <i x-show="showPassword" data-lucide="eye-off" class="w-5 h-5"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-red-500 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember"
                            class="w-4 h-4 rounded bg-gray-50 dark:bg-dark-900 border-gray-300 dark:border-dark-700 text-primary-500 focus:ring-primary-500 transition-all">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400 transition-colors">Ingat saya</span>
                    </label>
                </div>

                <button type="submit"
                    class="w-full py-3 px-4 bg-primary-500 hover:bg-primary-600 text-white font-semibold rounded-xl transition-all shadow-lg hover:shadow-primary-500/30 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 focus:ring-offset-gray-100 dark:focus:ring-offset-dark-800">
                    <span class="flex items-center justify-center">
                        <i data-lucide="log-in" class="w-5 h-5 mr-2"></i>
                        Masuk
                    </span>
                </button>
            </form>
        </div>

        <div class="text-center mt-6">
            <a href="{{ route('home') }}"
                class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white text-sm transition-colors">
                ← Kembali ke Website
            </a>
        </div>

        {{-- Default Credentials Info --}}
        <div
            class="mt-8 p-4 bg-white/50 dark:bg-dark-800/50 rounded-xl border border-gray-200 dark:border-dark-700 transition-colors">
            <p class="text-gray-500 dark:text-gray-400 text-xs text-center transition-colors">
                <strong class="text-primary-500">Demo Login:</strong><br>
                Email: admin@magenta.co.id<br>
                Password: password123
            </p>
        </div>
    </div>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>lucide.createIcons();</script>
</body>

</html>