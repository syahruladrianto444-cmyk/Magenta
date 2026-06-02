@extends('layouts.app')

@section('title', 'Magenta87 Group — Strategic Events, Experiences & Creative Spaces')
@section('meta_description', 'Magenta87 Group (PT Magenta Jaya Makmur) — Strategic partner for impactful events, brand activation, corporate experiences, and modern architecture across Indonesia.')

@section('content')
{{-- Toast Notification Container (Alpine.js) --}}
<div x-data="toastNotifications()" x-init="init()" class="toast-container" x-cloak>
    <template x-for="toast in toasts" :key="toast.id">
        <div 
            class="flex items-center gap-3 px-5 py-4 rounded-xl shadow-2xl animate-slide-in-right"
            :class="toast.type === 'success' ? 'dark:bg-green-900/90 bg-green-500 text-white' : 
                    toast.type === 'info' ? 'dark:bg-blue-900/90 bg-blue-500 text-white' :
                    'dark:bg-primary-900/90 bg-primary-500 text-white'"
        >
            <div class="w-10 h-10 rounded-full flex items-center justify-center bg-white/20">
                <i :data-lucide="toast.icon" class="w-5 h-5"></i>
            </div>
            <div>
                <div class="font-semibold text-sm" x-text="toast.title"></div>
                <div class="text-xs opacity-80" x-text="toast.message"></div>
            </div>
            <button @click="removeToast(toast.id)" class="ml-2 opacity-60 hover:opacity-100">
                <i data-lucide="x" class="w-4 h-4"></i>
            </button>
        </div>
    </template>
</div>

{{-- Hero Section with Background Image --}}
<section class="relative min-h-screen flex items-center overflow-hidden">
    {{-- Background Image --}}
    <div class="absolute inset-0">
        <img src="{{ asset('images/hero-event.png') }}" alt="Magenta87 Group Strategic Events" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r dark:from-dark-950 dark:via-dark-950/90 dark:to-dark-950/60 from-white via-white/90 to-white/60"></div>
    </div>
    
    {{-- Red Accent Glow --}}
    <div class="absolute top-1/4 -left-32 w-96 h-96 bg-primary-500/20 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-1/4 right-0 w-64 h-64 bg-primary-500/10 rounded-full blur-3xl animate-float-slow"></div>
    
    {{-- Hexagonal Decorative Elements --}}
    <div class="absolute -left-32 bottom-1/4 hidden lg:block pointer-events-none">
        <div class="hex-deco w-[350px] h-[400px] opacity-[0.04] dark:opacity-[0.06] text-primary-500 animate-hex-rotate">
            <svg viewBox="0 0 100 116" fill="none" xmlns="http://www.w3.org/2000/svg"><polygon points="50,1 99,29 99,87 50,115 1,87 1,29" stroke="currentColor" stroke-width="1"/></svg>
        </div>
    </div>
    <div class="absolute -right-20 top-20 hidden lg:block pointer-events-none">
        <div class="hex-deco w-[250px] h-[290px] opacity-[0.05] dark:opacity-[0.07] text-primary-500 animate-hex-float">
            <svg viewBox="0 0 100 116" fill="none" xmlns="http://www.w3.org/2000/svg"><polygon points="50,1 99,29 99,87 50,115 1,87 1,29" stroke="currentColor" stroke-width="1"/></svg>
        </div>
    </div>
    <div class="hex-dot w-6 h-7 bg-primary-500/15 left-[15%] top-[20%] animate-hex-float-delayed hidden lg:block"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            {{-- Hero Content --}}
            <div data-aos="fade-right">
                <div class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6 border border-primary-500/20 animate-glow-pulse">
                    <span class="relative w-2 h-2 bg-primary-500 rounded-full mr-2">
                        <span class="absolute inset-0 bg-primary-500 rounded-full animate-ping-slow"></span>
                    </span>
                    PT Magenta Jaya Makmur
                </div>
                
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold dark:text-white text-dark-900 leading-tight mb-6">
                    Building <span class="text-gradient">Experiences</span>
                    That Create Impact
                </h1>
                
                <p class="text-lg dark:text-dark-400 text-dark-500 font-medium mb-3">
                    Event Management • Brand Activation • Team Building • Architecture & Construction
                </p>
                <p class="text-xl dark:text-dark-300 text-dark-600 leading-relaxed mb-8 max-w-xl">
                    Strategic partner ecosystem for impactful events, brand activation, corporate experiences, and modern architecture across Indonesia.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ $ctas['button_link'] ?? route('contact') }}" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-primary text-white font-semibold rounded-full hover:shadow-lg hover:shadow-primary-500/30 transition-all duration-300 btn-animate shine-effect hover-wiggle">
                        <span>{{ $ctas['button_text'] ?? 'Discuss Your Project' }}</span>
                        <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i>
                    </a>
                    <a href="{{ route('portfolio.index') }}" class="inline-flex items-center justify-center px-8 py-4 border dark:border-dark-600 border-gray-300 dark:text-white text-dark-700 font-semibold rounded-full dark:hover:bg-dark-800 hover:bg-gray-100 transition-all duration-300">
                        <i data-lucide="play-circle" class="w-5 h-5 mr-2"></i>
                        <span>Explore Our Works</span>
                    </a>
                </div>
                
                {{-- Stats --}}
                <div class="grid grid-cols-3 gap-8 mt-12 pt-8 border-t dark:border-dark-700 border-gray-200">
                    <div class="text-center sm:text-left" data-aos="fade-up" data-aos-delay="100">
                        <div class="text-3xl font-bold dark:text-white text-dark-900">
                            {{ $stats['events_managed'] ?? '50+' }}
                        </div>
                        <div class="dark:text-dark-400 text-dark-500 text-sm">Events Managed</div>
                    </div>
                    <div class="text-center sm:text-left" data-aos="fade-up" data-aos-delay="200">
                        <div class="text-3xl font-bold dark:text-white text-dark-900">
                            {{ $stats['cities_reached'] ?? '20+' }}
                        </div>
                        <div class="dark:text-dark-400 text-dark-500 text-sm">Cities Reached</div>
                    </div>
                    <div class="text-center sm:text-left" data-aos="fade-up" data-aos-delay="300">
                        <div class="text-3xl font-bold dark:text-white text-dark-900">
                            {{ $stats['audience_engagement'] ?? '100K+' }}
                        </div>
                        <div class="dark:text-dark-400 text-dark-500 text-sm">Audience Engagement</div>
                    </div>
                </div>
            </div>
            
            {{-- Hero Visual - Production Image --}}
            <div class="relative hidden lg:block" data-aos="fade-left" data-aos-delay="200">
                {{-- Hexagonal Photo Frame (Company Profile Style) --}}
                <div class="relative z-10 flex items-center justify-center">
                    <div class="hex-shadow">
                        <div class="hex-frame-border w-[520px] h-[585px]">
                            <div class="hex-clip w-full h-full overflow-hidden relative">
                                <img src="{{ asset('images/production.png') }}" alt="Event Production" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t dark:from-dark-950/60 from-white/30 via-transparent to-transparent"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Floating Notification Cards --}}
                {{-- Card 1: Trusted Partner (Top Right) --}}
                <div class="absolute -top-4 -right-4 z-20 dark:bg-dark-800 bg-white rounded-xl p-4 shadow-2xl dark:border-dark-700 border-gray-200 border animate-float" data-aos="zoom-in" data-aos-delay="600">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-green-500/20 rounded-full flex items-center justify-center">
                            <i data-lucide="check-circle" class="w-5 h-5 text-green-500"></i>
                        </div>
                        <div>
                            <div class="dark:text-white text-dark-900 font-semibold text-sm">Strategic Partner</div>
                            <div class="dark:text-dark-400 text-dark-500 text-xs">Government & Brands</div>
                        </div>
                    </div>
                </div>
                
                {{-- Card 2: Event Success (Bottom Left) --}}
                <div class="absolute -bottom-4 -left-4 z-20 dark:bg-dark-800 bg-white rounded-xl p-4 shadow-2xl dark:border-dark-700 border-gray-200 border animate-float-delayed" data-aos="zoom-in" data-aos-delay="800">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-primary-500/20 rounded-full flex items-center justify-center">
                            <i data-lucide="trophy" class="w-5 h-5 text-primary-500"></i>
                        </div>
                        <div>
                            <div class="dark:text-white text-dark-900 font-semibold text-sm">100+ Events</div>
                            <div class="dark:text-dark-400 text-dark-500 text-xs">Impactful Experiences</div>
                        </div>
                    </div>
                </div>
                
                {{-- Card 3: Rating Badge (Middle Right) --}}
                <div class="absolute top-1/2 -right-8 z-20 transform -translate-y-1/2 dark:bg-gradient-to-br dark:from-primary-500 dark:to-primary-700 bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl p-4 shadow-2xl animate-float-slow" data-aos="zoom-in" data-aos-delay="1000">
                    <div class="text-center text-white">
                        <div class="flex items-center justify-center mb-1">
                            <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                            <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                            <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                            <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                            <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                        </div>
                        <div class="font-bold text-lg">5.0</div>
                        <div class="text-xs opacity-80">Rating</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Scroll Indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <i data-lucide="chevron-down" class="w-8 h-8 dark:text-white/50 text-dark-400"></i>
    </div>
</section>

{{-- Trusted Partners Section --}}
@if($clients->count() > 0)
<section class="py-16 dark:bg-dark-900 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10" data-aos="fade-up">
            <div class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-4">
                <i data-lucide="award" class="w-4 h-4 mr-2"></i>
                Trusted By
            </div>
            <h3 class="text-2xl font-bold dark:text-white text-dark-900">Trusted by Leading Organizations</h3>
        </div>
        <div class="flex flex-wrap justify-center items-center gap-8 md:gap-12" data-aos="fade-up" data-aos-delay="100">
            @foreach($clients as $client)
            <div class="group p-4 dark:bg-dark-800/50 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 hover-wiggle">
                @if($client->logo)
                <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" class="h-12 w-auto grayscale group-hover:grayscale-0 opacity-70 group-hover:opacity-100 transition-all duration-300">
                @else
                <span class="dark:text-dark-300 text-dark-600 font-medium text-lg px-4">{{ $client->name }}</span>
                @endif
            </div>
            @endforeach
        </div>
        <div class="text-center mt-8" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('partners') }}" class="inline-flex items-center text-primary-500 font-medium hover:text-primary-600 transition-colors hover-wiggle">
                <span>View All Partners</span>
                <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
            </a>
        </div>
    </div>
</section>
@endif

{{-- WHAT WE SOLVE Section --}}
<section class="py-24 dark:bg-dark-950 bg-white relative overflow-hidden">
    <div class="absolute top-0 left-0 w-96 h-96 bg-primary-500/5 rounded-full blur-3xl"></div>
    {{-- Hex Decoration --}}
    <div class="absolute -right-40 bottom-0 hidden lg:block pointer-events-none">
        <div class="hex-deco w-[400px] h-[460px] opacity-[0.03] dark:opacity-[0.05] text-primary-500 animate-hex-rotate">
            <svg viewBox="0 0 100 116" fill="none" xmlns="http://www.w3.org/2000/svg"><polygon points="50,1 99,29 99,87 50,115 1,87 1,29" stroke="currentColor" stroke-width="1"/></svg>
        </div>
    </div>
    <div class="absolute -left-20 top-40 hidden lg:block pointer-events-none">
        <div class="hex-deco w-[240px] h-[280px] opacity-[0.04] dark:opacity-[0.06] text-primary-500 animate-hex-float-delayed">
            <svg viewBox="0 0 100 116" fill="none" xmlns="http://www.w3.org/2000/svg"><polygon points="50,1 99,29 99,87 50,115 1,87 1,29" stroke="currentColor" stroke-width="1"/></svg>
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6">
                <i data-lucide="zap" class="w-4 h-4 mr-2"></i>
                What We Solve
            </div>
            <h2 class="text-4xl md:text-5xl font-bold dark:text-white text-dark-900 mb-6">
                Challenges We <span class="text-gradient">Transform</span>
            </h2>
            <p class="text-lg dark:text-dark-300 text-dark-600 max-w-2xl mx-auto">
                We turn common industry challenges into strategic opportunities for impact and engagement.
            </p>
        </div>

        <div class="grid lg:grid-cols-2 gap-8">
            {{-- Challenges Column --}}
            <div class="relative dark:bg-dark-800/50 bg-gray-50 rounded-3xl p-8 dark:border-dark-700 border-gray-200 border overflow-hidden" data-aos="fade-right">
                {{-- Hex Edge Cut Accent --}}
                <div class="absolute -right-12 -top-10 w-32 h-36 opacity-[0.05] dark:opacity-[0.08] text-primary-500 animate-hex-rotate pointer-events-none">
                    <svg viewBox="0 0 100 116" fill="none" xmlns="http://www.w3.org/2000/svg"><polygon points="50,1 99,29 99,87 50,115 1,87 1,29" stroke="currentColor" stroke-width="2"/></svg>
                </div>
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-red-500/10 rounded-xl flex items-center justify-center mr-4">
                        <i data-lucide="alert-triangle" class="w-6 h-6 text-red-500"></i>
                    </div>
                    <h3 class="text-2xl font-bold dark:text-white text-dark-900">Market Challenges</h3>
                </div>
                <div class="space-y-4">
                    @php
                        $challenges = [
                            'Events that feel crowded but lack real impact',
                            'Low audience interaction and engagement',
                            'Complicated stakeholder coordination',
                            'Weak brand experience and activation',
                            'Unorganized event execution and logistics',
                            'Spaces without identity or functionality',
                        ];
                    @endphp
                    @foreach($challenges as $index => $challenge)
                    <div class="flex items-start space-x-3" data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                        <i data-lucide="x-circle" class="w-5 h-5 text-red-400 flex-shrink-0 mt-0.5"></i>
                        <span class="dark:text-dark-300 text-dark-600">{{ $challenge }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Solutions Column --}}
            <div class="relative dark:bg-dark-800/50 bg-gray-50 rounded-3xl p-8 border-2 border-primary-500/30 overflow-hidden" data-aos="fade-left">
                {{-- Hex Edge Cut Accent --}}
                <div class="absolute -left-12 -bottom-10 w-32 h-36 opacity-[0.06] dark:opacity-[0.1] text-primary-500 animate-hex-rotate-reverse pointer-events-none">
                    <svg viewBox="0 0 100 116" fill="none" xmlns="http://www.w3.org/2000/svg"><polygon points="50,1 99,29 99,87 50,115 1,87 1,29" stroke="currentColor" stroke-width="2"/></svg>
                </div>
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-primary-500/10 rounded-xl flex items-center justify-center mr-4">
                        <i data-lucide="check-circle" class="w-6 h-6 text-primary-500"></i>
                    </div>
                    <h3 class="text-2xl font-bold dark:text-white text-dark-900">Magenta87 Solutions</h3>
                </div>
                <div class="space-y-4">
                    @php
                        $solutions = [
                            'Audience-driven event strategy for maximum impact',
                            'Integrated production and activation system',
                            'Strategic activation and engagement planning',
                            'Experience-focused execution and brand storytelling',
                            'Collaborative stakeholder handling and coordination',
                            'Functional & aesthetic architecture solutions',
                        ];
                    @endphp
                    @foreach($solutions as $index => $solution)
                    <div class="flex items-start space-x-3" data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                        <i data-lucide="check-circle" class="w-5 h-5 text-primary-500 flex-shrink-0 mt-0.5"></i>
                        <span class="dark:text-dark-300 text-dark-600">{{ $solution }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- EXPERIENCE IN NUMBERS Section --}}
<section class="py-24 dark:bg-dark-900 bg-gray-50 relative overflow-hidden">
    <div class="absolute bottom-0 right-0 w-80 h-80 bg-primary-500/5 rounded-full blur-3xl animate-float-slow"></div>
    {{-- Hex Decoration --}}
    <div class="absolute -left-48 top-0 hidden lg:block pointer-events-none">
        <div class="hex-deco w-[450px] h-[520px] opacity-[0.03] dark:opacity-[0.05] text-primary-500 animate-hex-rotate">
            <svg viewBox="0 0 100 116" fill="none" xmlns="http://www.w3.org/2000/svg"><polygon points="50,1 99,29 99,87 50,115 1,87 1,29" stroke="currentColor" stroke-width="1"/></svg>
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6">
                <i data-lucide="bar-chart-3" class="w-4 h-4 mr-2"></i>
                Experience in Numbers
            </div>
            <h2 class="text-4xl md:text-5xl font-bold dark:text-white text-dark-900 mb-6">
                Impact That <span class="text-gradient">Speaks</span>
            </h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5">
            @php
                $stats = [
                    ['value' => '100+', 'label' => 'Events Managed', 'icon' => 'calendar'],
                    ['value' => '20+', 'label' => 'Cities Reached', 'icon' => 'map-pin'],
                    ['value' => '50K+', 'label' => 'Audience Engagement', 'icon' => 'users'],
                    ['value' => '4', 'label' => 'Business Units', 'icon' => 'building-2'],
                    ['value' => 'Multi', 'label' => 'Sector Clients', 'icon' => 'briefcase']
                ];
            @endphp
            @foreach($stats as $index => $stat)
            <div class="group relative overflow-hidden text-center dark:bg-dark-800/50 bg-white p-6 rounded-2xl dark:border-dark-700 border-gray-200 border hover:border-primary-500/50 transition-all duration-300 card-hover shadow-sm" data-aos="fade-up" data-aos-delay="{{ $index * 80 }}">
                {{-- Hex Edge Cut Accent --}}
                <div class="absolute -right-6 -bottom-6 w-20 h-24 opacity-[0.05] dark:opacity-[0.08] text-primary-500 group-hover:scale-125 transition-transform duration-500 pointer-events-none">
                    <svg viewBox="0 0 100 116" fill="none" xmlns="http://www.w3.org/2000/svg"><polygon points="50,1 99,29 99,87 50,115 1,87 1,29" stroke="currentColor" stroke-width="2"/></svg>
                </div>
                <div class="w-14 h-16 bg-primary-500/10 hex-icon flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <i data-lucide="{{ $stat['icon'] }}" class="w-6 h-6 text-primary-500"></i>
                </div>
                <div class="text-3xl font-bold dark:text-white text-dark-900 mb-1">{{ $stat['value'] }}</div>
                <div class="dark:text-dark-400 text-dark-500 text-sm">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- WHY MAGENTA87 GROUP Section --}}
<section class="py-24 dark:bg-dark-950 bg-white relative overflow-hidden">
    <div class="absolute top-1/4 right-0 w-64 h-64 bg-primary-500/5 rounded-full blur-3xl animate-pulse"></div>
    {{-- Hex Decoration --}}
    <div class="absolute -right-32 top-10 hidden lg:block pointer-events-none">
        <div class="hex-deco w-[350px] h-[400px] opacity-[0.04] dark:opacity-[0.06] text-primary-500 animate-hex-rotate">
            <svg viewBox="0 0 100 116" fill="none" xmlns="http://www.w3.org/2000/svg"><polygon points="50,1 99,29 99,87 50,115 1,87 1,29" stroke="currentColor" stroke-width="1"/></svg>
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6">
                <i data-lucide="heart" class="w-4 h-4 mr-2"></i>
                Why Magenta87
            </div>
            <h2 class="text-4xl md:text-5xl font-bold dark:text-white text-dark-900 mb-6">
                Why <span class="text-gradient">Choose Us</span>
            </h2>
            <p class="text-xl dark:text-dark-300 text-dark-600 max-w-3xl mx-auto italic">
                "We believe every event, experience, and space should create connection, impact, and lasting impressions."
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($whyChooseUs as $index => $point)
            <div class="group relative overflow-hidden dark:bg-dark-800/50 bg-gray-50 rounded-2xl p-6 dark:border-dark-700 border-gray-200 border hover:border-primary-500/50 transition-all duration-300 card-hover shadow-sm" data-aos="fade-up" data-aos-delay="{{ $index * 80 }}">
                {{-- Hex Edge Cut Accent --}}
                <div class="absolute -right-8 -top-8 w-24 h-28 opacity-[0.04] dark:opacity-[0.06] text-primary-500 group-hover:scale-125 transition-transform duration-500 pointer-events-none">
                    <svg viewBox="0 0 100 116" fill="none" xmlns="http://www.w3.org/2000/svg"><polygon points="50,1 99,29 99,87 50,115 1,87 1,29" stroke="currentColor" stroke-width="2"/></svg>
                </div>
                <div class="w-14 h-14 bg-gradient-primary rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                    <i data-lucide="{{ $point['icon'] ?? 'star' }}" class="w-7 h-7 text-white"></i>
                </div>
                <h3 class="text-lg font-bold dark:text-white text-dark-900 mb-2 group-hover:text-primary-500 transition-colors">{{ $point['title'] }}</h3>
                <p class="dark:text-dark-400 text-dark-600 text-sm leading-relaxed">{{ $point['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- About Preview Section --}}
<section class="py-24 dark:bg-dark-950 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <div class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6">
                    Tentang Kami
                </div>
                <h2 class="text-4xl md:text-5xl font-bold dark:text-white text-dark-900 mb-6">
                    More Than a Decade <span class="text-gradient">Building Connections</span>
                </h2>
                <p class="text-lg dark:text-dark-300 text-dark-600 leading-relaxed mb-8">
                    Magenta87 Group is not just a service provider — we are a strategic partner ecosystem that creates experiences, engagement, public impact, and functional spaces. From large-scale public events to intimate corporate gatherings and modern architectural projects, we deliver end-to-end solutions that leave lasting impressions.
                </p>
                <div class="grid grid-cols-2 gap-6 mb-8">
                    @php
                        $values = [
                            ['icon' => 'target', 'title' => 'Strategic', 'desc' => 'Impact-Driven'],
                            ['icon' => 'sparkles', 'title' => 'Creative', 'desc' => 'Experience-Focused'],
                            ['icon' => 'shield-check', 'title' => 'Trusted', 'desc' => 'Multi-Sector'],
                            ['icon' => 'users', 'title' => 'Integrated', 'desc' => 'End-to-End'],
                        ];
                    @endphp
                    @foreach($values as $index => $value)
                    <div class="flex items-center space-x-3 group" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="w-12 h-12 bg-primary-500/10 rounded-xl flex items-center justify-center group-hover:scale-110 group-hover:bg-primary-500/20 transition-all duration-300">
                            <i data-lucide="{{ $value['icon'] }}" class="w-6 h-6 text-primary-500"></i>
                        </div>
                        <div>
                            <div class="dark:text-white text-dark-900 font-semibold">{{ $value['title'] }}</div>
                            <div class="dark:text-dark-400 text-dark-500 text-sm">{{ $value['desc'] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('about') }}" class="inline-flex items-center text-primary-500 font-semibold hover:text-primary-400 transition-colors group">
                    <span>Discover Our Story</span>
                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform"></i>
                </a>
            </div>
            <div class="relative" data-aos="fade-left">
                {{-- Hexagonal Photo Frame (Company Profile Style) --}}
                <div class="flex items-center justify-center">
                    <div class="hex-shadow">
                        <div class="hex-frame-border w-[480px] h-[540px]">
                            <div class="hex-clip w-full h-full overflow-hidden relative">
                                <img src="{{ asset('images/INDUSTOPOLIS-31.jpg') }}" alt="Team MAGENTA" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t dark:from-dark-950/60 from-white/30 via-transparent to-transparent"></div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Hex Accent --}}
                <div class="hex-dot w-5 h-6 bg-primary-500/15 -left-2 top-1/4 hidden lg:block"></div>
                {{-- Stats Card with Glow --}}
                <div class="absolute -bottom-6 -right-6 dark:bg-dark-800 bg-white rounded-2xl p-6 dark:border-dark-700 border-gray-200 border shadow-xl animate-float" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-4xl font-bold text-primary-500 mb-2">4</div>
                    <div class="dark:text-white text-dark-900 font-medium">Business Units</div>
                    <div class="dark:text-dark-400 text-dark-500 text-sm">Terintegrasi</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Services Section --}}
<section class="py-24 dark:bg-dark-900 bg-gray-50 relative overflow-hidden">
    {{-- Hex Decoration --}}
    <div class="absolute -left-20 bottom-10 hidden lg:block pointer-events-none">
        <div class="hex-deco w-[300px] h-[345px] opacity-[0.04] dark:opacity-[0.06] text-primary-500 animate-hex-rotate">
            <svg viewBox="0 0 100 116" fill="none" xmlns="http://www.w3.org/2000/svg"><polygon points="50,1 99,29 99,87 50,115 1,87 1,29" stroke="currentColor" stroke-width="1"/></svg>
        </div>
    </div>
    <div class="absolute right-0 top-1/4 hidden lg:block pointer-events-none">
        <div class="hex-deco w-[200px] h-[230px] opacity-[0.04] dark:opacity-[0.06] text-primary-500 animate-hex-float">
            <svg viewBox="0 0 100 116" fill="none" xmlns="http://www.w3.org/2000/svg"><polygon points="50,1 99,29 99,87 50,115 1,87 1,29" stroke="currentColor" stroke-width="1"/></svg>
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6">
                Layanan Kami
            </div>
            <h2 class="text-4xl md:text-5xl font-bold dark:text-white text-dark-900 mb-6">
                Experience-Driven <span class="text-gradient">Solutions</span>
            </h2>
            <p class="text-lg dark:text-dark-300 text-dark-600 max-w-2xl mx-auto">
                Comprehensive services designed to create impact, engagement, and lasting impressions.
            </p>
        </div>
        
        @php
            $lgCols = $services->count() === 1 ? 'lg:grid-cols-1 max-w-lg mx-auto' : 
                      ($services->count() === 2 ? 'lg:grid-cols-2 max-w-4xl mx-auto' : 
                      ($services->count() === 3 ? 'lg:grid-cols-3 max-w-6xl mx-auto' : 'lg:grid-cols-4'));
        @endphp
        <div class="grid md:grid-cols-2 {{ $lgCols }} gap-8">
            @foreach($services as $index => $service)
            <div class="group relative overflow-hidden dark:bg-dark-800 bg-white rounded-2xl p-8 dark:border-dark-700 border-gray-200 border hover:border-primary-500/50 transition-all duration-300 card-hover shadow-sm" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                {{-- Hex Edge Cut Accent --}}
                <div class="absolute -right-10 -bottom-10 w-32 h-36 opacity-[0.03] dark:opacity-[0.05] text-primary-500 group-hover:rotate-12 transition-transform duration-500 pointer-events-none">
                    <svg viewBox="0 0 100 116" fill="none" xmlns="http://www.w3.org/2000/svg"><polygon points="50,1 99,29 99,87 50,115 1,87 1,29" stroke="currentColor" stroke-width="1.5"/></svg>
                </div>
                <div class="w-14 h-14 bg-gradient-primary rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                    <i data-lucide="{{ $service->icon ?? 'briefcase' }}" class="w-7 h-7 text-white"></i>
                </div>
                <h3 class="text-xl font-bold dark:text-white text-dark-900 mb-3 group-hover:text-primary-500 transition-colors">{{ $service->title }}</h3>
                <p class="dark:text-dark-400 text-dark-600 leading-relaxed mb-6">{{ $service->excerpt }}</p>
                <a href="{{ route('services.show', $service) }}" class="inline-flex items-center text-primary-500 font-medium hover:text-primary-400 transition-colors">
                    <span>Selengkapnya</span>
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-12" data-aos="fade-up">
            <a href="{{ route('services.index') }}" class="inline-flex items-center px-8 py-4 border-2 border-primary-500 text-primary-500 font-semibold rounded-full hover:bg-primary-500 hover:text-white transition-all duration-300 group">
                <span>Explore All Services</span>
                <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
    </div>
</section>

{{-- OUR CREATIVE ECOSYSTEM Section --}}
<section class="py-32 dark:bg-dark-950 bg-white relative overflow-hidden">
    {{-- Background Decorative Elements --}}
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-primary-500/5 rounded-full blur-[120px] pointer-events-none"></div>
    {{-- Central Hex Decoration --}}
    <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 hidden lg:block pointer-events-none">
        <div class="hex-deco w-[600px] h-[690px] opacity-[0.03] dark:opacity-[0.04] text-primary-500 animate-hex-rotate">
            <svg viewBox="0 0 100 116" fill="none" xmlns="http://www.w3.org/2000/svg"><polygon points="50,1 99,29 99,87 50,115 1,87 1,29" stroke="currentColor" stroke-width="1"/></svg>
        </div>
    </div>
    <div class="hex-dot w-4 h-5 bg-primary-500/15 left-[10%] top-[20%] animate-hex-float hidden lg:block"></div>
    <div class="hex-dot w-3 h-3.5 bg-primary-500/10 right-[12%] bottom-[25%] animate-hex-float-delayed hidden lg:block"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        {{-- Section Header --}}
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6">
                Integrated Experience Ecosystem
            </div>
            <h2 class="text-4xl md:text-5xl font-bold dark:text-white text-dark-900 mb-6">
                Event • Experience • <span class="text-gradient">Design Build</span>
            </h2>
            <p class="text-lg dark:text-dark-300 text-dark-600 max-w-3xl mx-auto font-light leading-relaxed">
                “Magenta87 Group menghadirkan ekosistem layanan terintegrasi yang menghubungkan event, experience, engagement, creative production, hingga kebutuhan desain dan konstruksi dalam satu sistem kreatif yang saling terhubung.”
            </p>
        </div>

        {{-- Business Unit Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
            @php
                $ecosystem = [
                    [
                        'title' => 'M87',
                        'desc' => 'Public Event & Brand Activation Specialist',
                        'services' => ['Event Management', 'Corporate Event', 'Brand Activation', 'Rental Stage Lighting Audio', 'Production Support'],
                        'delay' => 100
                    ],
                    [
                        'title' => 'Bumi Training Center',
                        'desc' => 'Team Building & Corporate Experience',
                        'services' => ['Outbound Training', 'Team Building', 'Leadership Activity', 'Corporate Gathering'],
                        'delay' => 200
                    ],
                    [
                        'title' => '87 Studio',
                        'desc' => 'Creative Production & Media Experience',
                        'services' => ['Creative Design', 'Photography & Videography', 'Advertising', 'Media Digital'],
                        'delay' => 300
                    ],
                    [
                        'title' => 'Gajah Art Contractor',
                        'desc' => 'Architecture & Design Build Partner',
                        'services' => ['Architecture Design', 'Interior Design', 'Construction Service', 'Design & Build'],
                        'delay' => 400
                    ]
                ];
            @endphp

            @foreach($ecosystem as $unit)
            <div class="group relative p-8 rounded-3xl dark:bg-dark-800 bg-white border border-gray-200 dark:border-dark-700 hover:border-primary-500/50 transition-all duration-500 overflow-hidden flex flex-col h-full shadow-sm hover:shadow-xl" data-aos="fade-up" data-aos-delay="{{ $unit['delay'] }}">
                {{-- Hex Edge Cut Accent --}}
                <div class="absolute -right-16 -top-16 w-40 h-48 opacity-[0.03] dark:opacity-[0.05] text-primary-500 group-hover:rotate-45 transition-transform duration-700 pointer-events-none">
                    <svg viewBox="0 0 100 116" fill="none" xmlns="http://www.w3.org/2000/svg"><polygon points="50,1 99,29 99,87 50,115 1,87 1,29" stroke="currentColor" stroke-width="2"/></svg>
                </div>
                <div class="relative z-10 flex flex-col h-full">
                    <h3 class="text-2xl font-bold text-primary-500 mb-2 tracking-tighter">{{ $unit['title'] }}</h3>
                    <p class="text-sm font-semibold dark:text-white text-dark-900 mb-6 leading-tight">{{ $unit['desc'] }}</p>
                    
                    <div class="mt-auto pt-6 border-t dark:border-dark-700 border-gray-300">
                        <ul class="space-y-2">
                            @foreach($unit['services'] as $service)
                            <li class="text-[12px] tracking-wider dark:text-dark-400 text-dark-500 group-hover:text-primary-500 transition-colors duration-300">
                                {{ $service }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Supporting Service Line --}}
        <div class="text-center" data-aos="fade-up" data-aos-delay="500">
            <p class="text-[10px] md:text-[11px] uppercase tracking-[0.3em] dark:text-dark-400 text-dark-500 font-medium leading-loose max-w-5xl mx-auto">
                Event Management | Corporate Event | Brand Activation | Outbound Training | Rental Stage Lighting Audio | Production Support | Creative Design | Photography & Videography | Advertising | Media Digital | Architecture & Construction
            </p>
        </div>
    </div>
</section>

{{-- Detailed Business Units Grid (Optional or Replaced) --}}
@if(false) {{-- Temporarily hiding the old grid to focus on the new ecosystem overview --}}
<section class="py-24 dark:bg-dark-950 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6">
                Business Units
            </div>
            <h2 class="text-4xl md:text-5xl font-bold dark:text-white text-dark-900 mb-6">
                Our Creative <span class="text-gradient">Ecosystem</span>
            </h2>
            <p class="text-lg dark:text-dark-300 text-dark-600 max-w-2xl mx-auto">
                Four specialized units working together to create experiences, engagement, and spaces.
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 gap-8">
            @foreach($businessUnits as $index => $unit)
            <div class="group relative dark:bg-dark-800 bg-white rounded-3xl p-8 dark:border-dark-700 border-gray-200 border overflow-hidden card-hover shadow-sm" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                {{-- Background Gradient --}}
                <div class="absolute top-0 right-0 w-40 h-40 rounded-full blur-3xl opacity-20 group-hover:opacity-40 transition-opacity" style="background-color: {{ $unit->color ?? '#DC2626' }}"></div>
                
                <div class="relative z-10">
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-16 h-16 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform" style="background-color: {{ $unit->color ?? '#DC2626' }}20">
                            <span class="text-2xl font-bold" style="color: {{ $unit->color ?? '#DC2626' }}">{{ substr($unit->name, 0, 1) }}</span>
                        </div>
                        @if($unit->instagram)
                        <a href="https://instagram.com/{{ $unit->instagram }}" target="_blank" class="dark:text-dark-400 text-dark-500 hover:text-primary-500 transition-colors hover-wiggle">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069z"/></svg>
                        </a>
                        @endif
                    </div>
                    
                    <h3 class="text-2xl font-bold dark:text-white text-dark-900 mb-2">{{ $unit->name }}</h3>
                    <p class="dark:text-dark-400 text-dark-600 mb-6">{{ $unit->tagline }}</p>
                    
                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach(array_slice($unit->services_array, 0, 3) as $serviceItem)
                        <span class="px-3 py-1 dark:bg-dark-700 bg-gray-100 rounded-full text-sm dark:text-dark-300 text-dark-600">{{ $serviceItem }}</span>
                        @endforeach
                    </div>
                    
                    <a href="{{ route('units.show', $unit) }}" class="inline-flex items-center font-medium transition-colors" style="color: {{ $unit->color ?? '#DC2626' }}">
                        <span>Discover More</span>
                        <i data-lucide="arrow-right" class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Training Section Image --}}
<section class="py-24 dark:bg-dark-900 bg-gray-50 relative overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('images/training.png') }}" alt="Training Session" class="w-full h-full object-cover opacity-10 dark:opacity-20">
        <div class="absolute inset-0 dark:bg-gradient-to-r dark:from-dark-900 dark:via-dark-900/95 dark:to-dark-900 bg-gradient-to-r from-gray-50 via-gray-50/95 to-gray-50"></div>
    </div>
    
    {{-- Hex Decoration --}}
    <div class="absolute -right-20 -top-10 hidden lg:block pointer-events-none">
        <div class="hex-deco w-[350px] h-[400px] opacity-[0.04] dark:opacity-[0.06] text-primary-500 animate-hex-rotate">
            <svg viewBox="0 0 100 116" fill="none" xmlns="http://www.w3.org/2000/svg"><polygon points="50,1 99,29 99,87 50,115 1,87 1,29" stroke="currentColor" stroke-width="1"/></svg>
        </div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <div class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6">
                    Creative Business Network
                </div>
                <h2 class="text-4xl md:text-5xl font-bold dark:text-white text-dark-900 mb-6">
                    Beyond Events, <span class="text-gradient">Building Experiences</span>
                </h2>
                <p class="text-lg dark:text-dark-300 text-dark-600 leading-relaxed mb-8">
                    Berawal dari event management, Magenta87 Group berkembang menjadi ekosistem kreatif yang menghadirkan solusi experience, activation, team engagement, creative production, hingga architecture & construction untuk berbagai kebutuhan brand, corporate, maupun public sector.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('services.index') }}" class="inline-flex items-center px-8 py-4 bg-gradient-primary text-white font-semibold rounded-full hover:shadow-lg hover:shadow-primary-500/30 transition-all btn-animate shine-effect">
                        <span>Explore Team Experiences</span>
                        <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i>
                    </a>
                </div>
            </div>
            <div class="relative" data-aos="fade-left">
                <div class="relative overflow-hidden dark:bg-dark-800/80 bg-white/80 backdrop-blur-sm rounded-3xl p-8 dark:border-dark-700 border-gray-200 border shadow-lg">
                    {{-- Hex Edge Cut Accent --}}
                    <div class="absolute -left-12 -bottom-12 w-32 h-36 opacity-[0.04] dark:opacity-[0.06] text-primary-500 animate-hex-rotate-reverse pointer-events-none">
                        <svg viewBox="0 0 100 116" fill="none" xmlns="http://www.w3.org/2000/svg"><polygon points="50,1 99,29 99,87 50,115 1,87 1,29" stroke="currentColor" stroke-width="2"/></svg>
                    </div>
                    <div class="grid grid-cols-2 gap-4 relative z-10">
                        @php
                            $trainingPrograms = [
                                ['icon' => 'users', 'title' => 'Public Experience'],
                                ['icon' => 'target', 'title' => 'Corporate Engangement'],
                                ['icon' => 'brain', 'title' => 'Creative Production'],
                                ['icon' => 'home', 'title' => 'Architecture & Construction'],
                            ];
                        @endphp
                        @foreach($trainingPrograms as $index => $program)
                        <div class="flex items-center p-4 dark:bg-dark-700/50 bg-gray-50 rounded-xl group hover:bg-primary-500/10 transition-colors" data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}">
                            <div class="w-10 h-10 bg-primary-500/20 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                                <i data-lucide="{{ $program['icon'] }}" class="w-5 h-5 text-primary-500"></i>
                            </div>
                            <span class="dark:text-white text-dark-900 font-medium">{{ $program['title'] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Klien Kami Section --}}
<section class="py-24 dark:bg-dark-950 bg-white relative overflow-hidden">
    {{-- Decorative Background --}}
    <div class="absolute top-0 right-0 w-80 h-80 bg-primary-500/5 rounded-full blur-3xl animate-float-slow"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-primary-500/5 rounded-full blur-3xl animate-pulse"></div>
    {{-- Hex Decoration --}}
    <div class="absolute -left-32 top-10 hidden lg:block pointer-events-none">
        <div class="hex-deco w-[320px] h-[370px] opacity-[0.04] dark:opacity-[0.06] text-primary-500 animate-hex-rotate">
            <svg viewBox="0 0 100 116" fill="none" xmlns="http://www.w3.org/2000/svg"><polygon points="50,1 99,29 99,87 50,115 1,87 1,29" stroke="currentColor" stroke-width="1"/></svg>
        </div>
    </div>
    <div class="absolute -right-20 bottom-0 hidden lg:block pointer-events-none">
        <div class="hex-deco w-[280px] h-[320px] opacity-[0.04] dark:opacity-[0.06] text-primary-500 animate-hex-float-delayed">
            <svg viewBox="0 0 100 116" fill="none" xmlns="http://www.w3.org/2000/svg"><polygon points="50,1 99,29 99,87 50,115 1,87 1,29" stroke="currentColor" stroke-width="1"/></svg>
        </div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6 border border-primary-500/20">
                <i data-lucide="handshake" class="w-4 h-4 mr-2"></i>
                Our Clients
            </div>
            <h2 class="text-4xl md:text-5xl font-bold dark:text-white text-dark-900 mb-4">
                Klien <span class="text-gradient">Kami</span>
            </h2>
            <p class="text-lg dark:text-dark-300 text-dark-600 max-w-2xl mx-auto">
                Leading organizations and government institutions trust us to deliver impactful projects.
            </p>
        </div>

        {{-- Client Image with Premium Frame --}}
        <div class="max-w-4xl mx-auto relative" data-aos="zoom-in" data-aos-duration="800">
            {{-- Outer Glow --}}
            <div class="absolute -inset-1 bg-gradient-to-r from-primary-500/20 via-primary-600/30 to-primary-500/20 rounded-2xl blur-sm"></div>
            
            {{-- Main Container --}}
            <div class="relative dark:bg-dark-800/50 bg-white rounded-2xl p-4 md:p-6 dark:border-dark-700/50 border-gray-200 border shadow-2xl backdrop-blur-sm">
                {{-- Corner Accents --}}
                <div class="absolute top-0 left-0 w-16 h-16 border-t-2 border-l-2 border-primary-500/30 rounded-tl-2xl"></div>
                <div class="absolute top-0 right-0 w-16 h-16 border-t-2 border-r-2 border-primary-500/30 rounded-tr-2xl"></div>
                <div class="absolute bottom-0 left-0 w-16 h-16 border-b-2 border-l-2 border-primary-500/30 rounded-bl-2xl"></div>
                <div class="absolute bottom-0 right-0 w-16 h-16 border-b-2 border-r-2 border-primary-500/30 rounded-br-2xl"></div>

                {{-- Image --}}
                <div class="rounded-xl overflow-hidden">
                    <img src="{{ asset('images/magentaklien.png') }}" 
                         alt="Klien PT Magenta Jaya Makmur" 
                         class="w-full h-auto object-contain transition-transform duration-700 hover:scale-[1.02]">
                </div>
            </div>

            {{-- Floating Badge --}}
            <div class="absolute -bottom-6 -right-4 z-20" data-aos="fade-up" data-aos-delay="300">
                <div class="inline-flex items-center px-7 py-3.5 bg-gradient-primary text-white rounded-full shadow-xl shadow-primary-500/30 animate-float">
                    <i data-lucide="building-2" class="w-5 h-5 mr-2"></i>
                    <span class="font-bold text-base">100+ Klien Korporat Terpercaya</span>
                    <i data-lucide="verified" class="w-5 h-5 ml-2"></i>
                </div>
            </div>
        </div>

        {{-- View Partners Link --}}
        <div class="text-center mt-14" data-aos="fade-up" data-aos-delay="400">
            <a href="{{ route('partners') }}" class="inline-flex items-center text-primary-500 font-semibold hover:text-primary-400 transition-colors group">
                <span>View All Our Partners</span>
                <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform"></i>
            </a>
        </div>
    </div>
</section>

{{-- CTA Section --}}
<section class="py-24 bg-gradient-primary relative overflow-hidden">
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-white/10 rounded-full blur-3xl animate-float"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-white/10 rounded-full blur-3xl animate-float-delayed"></div>
    {{-- White Hex Decoration --}}
    <div class="absolute -left-20 -top-20 hidden lg:block pointer-events-none">
        <div class="hex-deco w-[380px] h-[440px] opacity-[0.06] text-white animate-hex-rotate">
            <svg viewBox="0 0 100 116" fill="none" xmlns="http://www.w3.org/2000/svg"><polygon points="50,1 99,29 99,87 50,115 1,87 1,29" stroke="currentColor" stroke-width="1"/></svg>
        </div>
    </div>
    <div class="absolute -right-20 -bottom-20 hidden lg:block pointer-events-none">
        <div class="hex-deco w-[300px] h-[345px] opacity-[0.06] text-white animate-hex-float-delayed">
            <svg viewBox="0 0 100 116" fill="none" xmlns="http://www.w3.org/2000/svg"><polygon points="50,1 99,29 99,87 50,115 1,87 1,29" stroke="currentColor" stroke-width="1"/></svg>
        </div>
    </div>
    <div class="hex-dot w-4 h-5 bg-white/15 left-[65%] top-[25%] animate-hex-float-slow-alt hidden lg:block"></div>
    
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
            {!! $ctas['headline'] ?? "Let's Build Something <span class=\"text-white/90\">Meaningful</span> Together" !!}
        </h2>
        <p class="text-xl text-white/80 mb-8 max-w-2xl mx-auto">
            {{ $ctas['subheadline'] ?? "Every great experience starts with a conversation. Tell us about your vision and let's create impact together." }}
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ $ctas['button_link'] ?? route('contact') }}" class="inline-flex items-center justify-center px-8 py-4 bg-white text-primary-600 font-semibold rounded-full hover:shadow-lg transition-all duration-300 hover-wiggle">
                <span>{{ $ctas['button_text'] ?? 'Discuss Your Next Project' }}</span>
                <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i>
            </a>
            <a href="https://wa.me/{{ $ctas['whatsapp_general'] ?? '6281821878787' }}" target="_blank" class="inline-flex items-center justify-center px-8 py-4 bg-green-600 text-white font-semibold rounded-full hover:bg-green-700 transition-all duration-300">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                <span>WhatsApp</span>
            </a>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Toast Notifications Alpine Component
    function toastNotifications() {
        return {
            toasts: [],
            init() {
                // Show welcome toast after 3 seconds
                setTimeout(() => {
                    this.addToast({
                        type: 'info',
                        icon: 'sparkles',
                        title: 'Welcome! 👋',
                        message: 'Discover impactful event & experience solutions'
                    });
                }, 3000);
                
                // Show promo toast after 8 seconds
                setTimeout(() => {
                    this.addToast({
                        type: 'success',
                        icon: 'gift',
                        title: 'Let\'s Connect! 🌟',
                        message: 'Build something meaningful together with us'
                    });
                }, 8000);
            },
            addToast(toast) {
                const id = Date.now();
                this.toasts.push({ ...toast, id });
                
                // Re-initialize lucide icons for new toast
                setTimeout(() => lucide.createIcons(), 100);
                
                // Auto remove after 5 seconds
                setTimeout(() => this.removeToast(id), 5000);
            },
            removeToast(id) {
                const index = this.toasts.findIndex(t => t.id === id);
                if (index > -1) {
                    this.toasts.splice(index, 1);
                }
            }
        };
    }
</script>
@endpush
