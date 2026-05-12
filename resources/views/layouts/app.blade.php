<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: localStorage.getItem('darkMode') !== 'false' }"
    x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Magenta87 Group — Strategic Events, Experiences & Creative Spaces')</title>
    <meta name="description"
        content="@yield('meta_description', 'Magenta87 Group (PT Magenta Jaya Makmur) — Strategic partner for impactful events, brand activation, corporate experiences, and modern architecture across Indonesia.')">

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#fef2f2',
                            100: '#fee2e2',
                            200: '#fecaca',
                            300: '#fca5a5',
                            400: '#f87171',
                            500: '#DC2626',
                            600: '#B91C1C',
                            700: '#991B1B',
                            800: '#7F1D1D',
                            900: '#450A0A',
                        },
                        dark: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                            950: '#030712',
                        },
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    {{-- AOS Animation --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    {{-- Alpine.js --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Lucide Icons --}}
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        .dark ::-webkit-scrollbar-track {
            background: #0f172a;
        }

        .dark ::-webkit-scrollbar-thumb {
            background: #DC2626;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #DC2626;
            border-radius: 4px;
        }

        /* Gradient Text */
        .text-gradient {
            background: linear-gradient(135deg, #DC2626 0%, #f87171 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Gradient Background */
        .bg-gradient-primary {
            background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%);
        }

        .dark .bg-gradient-hero {
            background: linear-gradient(135deg, #030712 0%, #0f172a 50%, #1e293b 100%);
        }

        .bg-gradient-hero {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 50%, #f1f5f9 100%);
        }

        /* Card Hover Effect */
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-8px);
        }

        .dark .card-hover:hover {
            box-shadow: 0 25px 50px -12px rgba(220, 38, 38, 0.15);
        }

        .card-hover:hover {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        }

        /* Button Animation */
        .btn-animate {
            position: relative;
            overflow: hidden;
        }

        .btn-animate::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-animate:hover::after {
            left: 100%;
        }

        /* Glass Effect */
        .dark .glass {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .glass {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        /* ========================================
           CREATIVE ANIMATIONS
           ======================================== */

        /* Floating Animation */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            25% {
                transform: translateY(-10px) rotate(1deg);
            }

            50% {
                transform: translateY(-5px) rotate(-1deg);
            }

            75% {
                transform: translateY(-15px) rotate(2deg);
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-float-delayed {
            animation: float 6s ease-in-out infinite;
            animation-delay: 2s;
        }

        .animate-float-slow {
            animation: float 8s ease-in-out infinite;
        }

        /* Slide In from Right (Toast) */
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOutRight {
            from {
                transform: translateX(0);
                opacity: 1;
            }

            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }

        .animate-slide-in-right {
            animation: slideInRight 0.5s ease-out forwards;
        }

        .animate-slide-out-right {
            animation: slideOutRight 0.5s ease-in forwards;
        }

        /* Pop In Animation */
        @keyframes popIn {
            0% {
                transform: scale(0);
                opacity: 0;
            }

            70% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .animate-pop-in {
            animation: popIn 0.4s ease-out forwards;
        }

        /* Wiggle Animation */
        @keyframes wiggle {

            0%,
            100% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(-3deg);
            }

            75% {
                transform: rotate(3deg);
            }
        }

        .animate-wiggle {
            animation: wiggle 0.5s ease-in-out;
        }

        .hover-wiggle:hover {
            animation: wiggle 0.3s ease-in-out;
        }

        /* Ping (Notification Dot) */
        @keyframes ping-slow {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            75%,
            100% {
                transform: scale(2);
                opacity: 0;
            }
        }

        .animate-ping-slow {
            animation: ping-slow 2s cubic-bezier(0, 0, 0.2, 1) infinite;
        }

        /* Typing Effect */
        @keyframes typing {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }

        @keyframes blink-caret {

            from,
            to {
                border-color: transparent;
            }

            50% {
                border-color: #DC2626;
            }
        }

        .typing-effect {
            overflow: hidden;
            white-space: nowrap;
            border-right: 3px solid #DC2626;
            animation: typing 3s steps(30, end), blink-caret 0.75s step-end infinite;
        }

        /* Shine Effect */
        @keyframes shine {
            0% {
                left: -100%;
            }

            100% {
                left: 200%;
            }
        }

        .shine-effect {
            position: relative;
            overflow: hidden;
        }

        .shine-effect::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 50%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: shine 3s infinite;
        }

        /* Glow Pulse */
        @keyframes glow-pulse {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(220, 38, 38, 0.3);
            }

            50% {
                box-shadow: 0 0 40px rgba(220, 38, 38, 0.6);
            }
        }

        .animate-glow-pulse {
            animation: glow-pulse 2s ease-in-out infinite;
        }

        /* Counter Animation */
        @keyframes count-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-count-up {
            animation: count-up 0.6s ease-out forwards;
        }

        /* Confetti Burst */
        @keyframes confetti-fall {
            0% {
                transform: translateY(-100%) rotate(0deg);
                opacity: 1;
            }

            100% {
                transform: translateY(100vh) rotate(720deg);
                opacity: 0;
            }
        }

        .confetti {
            position: fixed;
            width: 10px;
            height: 10px;
            top: -10px;
            z-index: 9999;
            animation: confetti-fall 3s ease-in-out forwards;
        }

        /* Progress Bar Animation */
        @keyframes progress-fill {
            from {
                width: 0%;
            }

            to {
                width: 100%;
            }
        }

        .animate-progress {
            animation: progress-fill 2s ease-out forwards;
        }

        /* Toast Container */
        .toast-container {
            position: fixed;
            top: 100px;
            right: 20px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        /* Gradient Border Animation */
        @keyframes gradient-border {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .gradient-border {
            background: linear-gradient(90deg, #DC2626, #f87171, #DC2626);
            background-size: 200% 200%;
            animation: gradient-border 3s ease infinite;
        }
    </style>

    @stack('styles')
</head>

<body class="font-sans antialiased transition-colors duration-300
             dark:bg-dark-950 dark:text-white
             bg-gray-50 text-dark-900">
    {{-- Header --}}
    @include('components.header')

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

    {{-- Initialize AOS --}}
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 50
        });
    </script>

    {{-- Initialize Lucide Icons --}}
    <script>
        lucide.createIcons();
    </script>

    @stack('scripts')
</body>

</html>