@extends('layouts.app')

@section('title', 'MAGENTA - Corporate Event & Creative Solutions')
@section('meta_description', 'MAGENTA adalah mitra strategis terdepan untuk solusi event, training, media production, dan konstruksi di Indonesia.')

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
        <img src="{{ asset('images/hero-event.png') }}" alt="MAGENTA Corporate Event" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r dark:from-dark-950 dark:via-dark-950/90 dark:to-dark-950/60 from-white via-white/90 to-white/60"></div>
    </div>
    
    {{-- Red Accent Glow --}}
    <div class="absolute top-1/4 -left-32 w-96 h-96 bg-primary-500/20 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-1/4 right-0 w-64 h-64 bg-primary-500/10 rounded-full blur-3xl animate-float-slow"></div>
    
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
                
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold dark:text-white text-dark-900 leading-tight mb-6">
                    <span class="text-gradient">Magenta</span>
                    Is Your Event Management
                </h1>
                
                <p class="text-xl dark:text-dark-300 text-dark-600 leading-relaxed mb-8 max-w-xl">
                    Partner terpercaya untuk solusi event, corporate training, dan produksi korporat berkelas internasional di Indonesia.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-primary text-white font-semibold rounded-full hover:shadow-lg hover:shadow-primary-500/30 transition-all duration-300 btn-animate shine-effect hover-wiggle">
                        <span>Konsultasi Gratis</span>
                        <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i>
                    </a>
                    <a href="{{ route('portfolio.index') }}" class="inline-flex items-center justify-center px-8 py-4 border dark:border-dark-600 border-gray-300 dark:text-white text-dark-700 font-semibold rounded-full dark:hover:bg-dark-800 hover:bg-gray-100 transition-all duration-300">
                        <i data-lucide="play-circle" class="w-5 h-5 mr-2"></i>
                        <span>Lihat Portfolio</span>
                    </a>
                </div>
                
                {{-- Stats with Counter Animation --}}
                <div class="grid grid-cols-3 gap-8 mt-12 pt-8 border-t dark:border-dark-700 border-gray-200">
                    <div class="text-center sm:text-left" data-aos="fade-up" data-aos-delay="100">
                        <div class="text-3xl font-bold dark:text-white text-dark-900" x-data="{ count: 0 }" x-init="setTimeout(() => { let interval = setInterval(() => { if(count < 10) count++; else clearInterval(interval); }, 100); }, 500)">
                            <span x-text="count"></span>+
                        </div>
                        <div class="dark:text-dark-400 text-dark-500 text-sm">Tahun Pengalaman</div>
                    </div>
                    <div class="text-center sm:text-left" data-aos="fade-up" data-aos-delay="200">
                        <div class="text-3xl font-bold dark:text-white text-dark-900" x-data="{ count: 0 }" x-init="setTimeout(() => { let interval = setInterval(() => { if(count < 500) count += 10; else clearInterval(interval); }, 30); }, 700)">
                            <span x-text="count"></span>+
                        </div>
                        <div class="dark:text-dark-400 text-dark-500 text-sm">Event Sukses</div>
                    </div>
                    <div class="text-center sm:text-left" data-aos="fade-up" data-aos-delay="300">
                        <div class="text-3xl font-bold dark:text-white text-dark-900" x-data="{ count: 0 }" x-init="setTimeout(() => { let interval = setInterval(() => { if(count < 100) count += 2; else clearInterval(interval); }, 50); }, 900)">
                            <span x-text="count"></span>+
                        </div>
                        <div class="dark:text-dark-400 text-dark-500 text-sm">Klien Korporat</div>
                    </div>
                </div>
            </div>
            
            {{-- Hero Visual - Production Image --}}
            <div class="relative hidden lg:block" data-aos="fade-left" data-aos-delay="200">
                <div class="relative z-10 rounded-3xl overflow-hidden shadow-2xl dark:border-dark-700 border-gray-200 border">
                    <img src="{{ asset('images/production.png') }}" alt="Event Production" class="w-full h-auto">
                    <div class="absolute inset-0 bg-gradient-to-t dark:from-dark-950 from-white via-transparent to-transparent"></div>
                </div>
                
                {{-- Floating Notification Cards --}}
                {{-- Card 1: Trusted Partner (Top Right) --}}
                <div class="absolute -top-4 -right-4 z-20 dark:bg-dark-800 bg-white rounded-xl p-4 shadow-2xl dark:border-dark-700 border-gray-200 border animate-float" data-aos="zoom-in" data-aos-delay="600">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-green-500/20 rounded-full flex items-center justify-center">
                            <i data-lucide="check-circle" class="w-5 h-5 text-green-500"></i>
                        </div>
                        <div>
                            <div class="dark:text-white text-dark-900 font-semibold text-sm">Trusted Partner</div>
                            <div class="dark:text-dark-400 text-dark-500 text-xs">Korporasi & Pemerintah</div>
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
                            <div class="dark:text-white text-dark-900 font-semibold text-sm">500+ Events</div>
                            <div class="dark:text-dark-400 text-dark-500 text-xs">Sukses Terselenggara</div>
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
            <h3 class="text-2xl font-bold dark:text-white text-dark-900">Dipercaya oleh Berbagai Perusahaan</h3>
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
                <span>Lihat Semua Partner</span>
                <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
            </a>
        </div>
    </div>
</section>
@endif

{{-- About Preview Section --}}
<section class="py-24 dark:bg-dark-950 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <div class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6">
                    Tentang Kami
                </div>
                <h2 class="text-4xl md:text-5xl font-bold dark:text-white text-dark-900 mb-6">
                    Lebih Dari Satu Dekade <span class="text-gradient">Membangun Kepercayaan</span>
                </h2>
                <p class="text-lg dark:text-dark-300 text-dark-600 leading-relaxed mb-8">
                    PT Magenta Jaya Makmur hadir sebagai mitra strategis yang menyediakan solusi terintegrasi untuk kebutuhan event, training, media production, dan konstruksi. Dengan komitmen pada kualitas dan profesionalisme, kami telah dipercaya oleh berbagai korporasi dan instansi pemerintah di Indonesia.
                </p>
                <div class="grid grid-cols-2 gap-6 mb-8">
                    @php
                        $values = [
                            ['icon' => 'award', 'title' => 'Excellence', 'desc' => 'Kualitas Terbaik'],
                            ['icon' => 'lightbulb', 'title' => 'Innovation', 'desc' => 'Solusi Kreatif'],
                            ['icon' => 'shield-check', 'title' => 'Integrity', 'desc' => 'Kepercayaan'],
                            ['icon' => 'users', 'title' => 'Collaboration', 'desc' => 'Kemitraan'],
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
                    <span>Selengkapnya Tentang Kami</span>
                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform"></i>
                </a>
            </div>
            <div class="relative" data-aos="fade-left">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                    <img src="{{ asset('images/team.png') }}" alt="Team MAGENTA" class="w-full h-auto">
                    <div class="absolute inset-0 bg-gradient-to-t dark:from-dark-950/80 from-white/80 via-transparent to-transparent"></div>
                </div>
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
<section class="py-24 dark:bg-dark-900 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6">
                Layanan Kami
            </div>
            <h2 class="text-4xl md:text-5xl font-bold dark:text-white text-dark-900 mb-6">
                Solusi <span class="text-gradient">Terintegrasi</span> untuk Kebutuhan Anda
            </h2>
            <p class="text-lg dark:text-dark-300 text-dark-600 max-w-2xl mx-auto">
                Kami menyediakan berbagai layanan profesional untuk memenuhi kebutuhan korporasi Anda.
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($services as $index => $service)
            <div class="group dark:bg-dark-800 bg-white rounded-2xl p-8 dark:border-dark-700 border-gray-200 border hover:border-primary-500/50 transition-all duration-300 card-hover shadow-sm" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
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
                <span>Lihat Semua Layanan</span>
                <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
    </div>
</section>

{{-- Business Units Section --}}
<section class="py-24 dark:bg-dark-950 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6">
                Business Units
            </div>
            <h2 class="text-4xl md:text-5xl font-bold dark:text-white text-dark-900 mb-6">
                Ekosistem Bisnis <span class="text-gradient">Terintegrasi</span>
            </h2>
            <p class="text-lg dark:text-dark-300 text-dark-600 max-w-2xl mx-auto">
                Empat unit bisnis yang saling melengkapi untuk memberikan solusi end-to-end.
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
                        <span>Explore Unit</span>
                        <i data-lucide="arrow-right" class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Training Section Image --}}
<section class="py-24 dark:bg-dark-900 bg-gray-50 relative overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('images/training.png') }}" alt="Training Session" class="w-full h-full object-cover opacity-10 dark:opacity-20">
        <div class="absolute inset-0 dark:bg-gradient-to-r dark:from-dark-900 dark:via-dark-900/95 dark:to-dark-900 bg-gradient-to-r from-gray-50 via-gray-50/95 to-gray-50"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <div class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6">
                    Corporate Training
                </div>
                <h2 class="text-4xl md:text-5xl font-bold dark:text-white text-dark-900 mb-6">
                    Tingkatkan Kompetensi <span class="text-gradient">Tim Anda</span>
                </h2>
                <p class="text-lg dark:text-dark-300 text-dark-600 leading-relaxed mb-8">
                    Program pelatihan profesional untuk pengembangan SDM korporasi. Team building, leadership training, outbound, dan workshop yang dirancang khusus sesuai kebutuhan perusahaan Anda.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('services.index') }}" class="inline-flex items-center px-8 py-4 bg-gradient-primary text-white font-semibold rounded-full hover:shadow-lg hover:shadow-primary-500/30 transition-all btn-animate shine-effect">
                        <span>Lihat Program</span>
                        <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i>
                    </a>
                </div>
            </div>
            <div class="relative" data-aos="fade-left">
                <div class="dark:bg-dark-800/80 bg-white/80 backdrop-blur-sm rounded-3xl p-8 dark:border-dark-700 border-gray-200 border shadow-lg">
                    <div class="grid grid-cols-2 gap-4">
                        @php
                            $trainingPrograms = [
                                ['icon' => 'users', 'title' => 'Team Building'],
                                ['icon' => 'target', 'title' => 'Leadership'],
                                ['icon' => 'mountain', 'title' => 'Outbound'],
                                ['icon' => 'presentation', 'title' => 'Workshop'],
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

{{-- CTA Section --}}
<section class="py-24 bg-gradient-primary relative overflow-hidden">
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-white/10 rounded-full blur-3xl animate-float"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-white/10 rounded-full blur-3xl animate-float-delayed"></div>
    
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
            Siap Memulai <span class="text-white/90">Proyek</span> Anda?
        </h2>
        <p class="text-xl text-white/80 mb-8 max-w-2xl mx-auto">
            Konsultasikan kebutuhan Anda dengan tim profesional kami. Kami siap membantu mewujudkan visi Anda.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-4 bg-white text-primary-600 font-semibold rounded-full hover:shadow-lg transition-all duration-300 hover-wiggle">
                <span>Hubungi Kami Sekarang</span>
                <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i>
            </a>
            <a href="https://wa.me/6287715568639" target="_blank" class="inline-flex items-center justify-center px-8 py-4 bg-green-600 text-white font-semibold rounded-full hover:bg-green-700 transition-all duration-300">
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
                        title: 'Selamat Datang! 👋',
                        message: 'Jelajahi layanan kami untuk event terbaik'
                    });
                }, 3000);
                
                // Show promo toast after 8 seconds
                setTimeout(() => {
                    this.addToast({
                        type: 'success',
                        icon: 'gift',
                        title: 'Promo Spesial! 🎉',
                        message: 'Konsultasi gratis untuk proyek pertama Anda'
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
