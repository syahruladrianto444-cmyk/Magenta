@extends('layouts.app')

@section('title', 'Partners & Community - MAGENTA')

@section('content')
    <section class="relative pt-32 pb-20 dark:bg-dark-950 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl" data-aos="fade-right">
                <div
                    class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6">
                    Our Network
                </div>
                <h1 class="text-5xl md:text-6xl font-bold dark:text-white text-dark-900 mb-6">Partners & <span
                        class="text-gradient">Community</span></h1>
                <p class="text-xl dark:text-dark-300 text-dark-600">Jaringan mitra dan komunitas yang mendukung ekosistem
                    MAGENTA.</p>
            </div>
        </div>
    </section>

    {{-- Klien Kami - Recap Image Section --}}
    <section class="py-24 dark:bg-dark-950 bg-white relative overflow-hidden">
        {{-- Decorative Background --}}
        <div class="absolute top-0 left-0 w-72 h-72 bg-primary-500/5 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-primary-500/5 rounded-full blur-3xl animate-float-slow"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Section Header --}}
            <div class="text-center mb-16" data-aos="fade-up">
                <div
                    class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6 border border-primary-500/20">
                    <i data-lucide="handshake" class="w-4 h-4 mr-2"></i>
                    Trusted Partnerships
                </div>
                <h2 class="text-4xl md:text-5xl font-bold dark:text-white text-dark-900 mb-4">
                    Klien <span class="text-gradient">Kami</span>
                </h2>
                <p class="text-lg dark:text-dark-300 text-dark-600 max-w-2xl mx-auto">
                    Berikut merupakan rekap logo klien yang telah bekerja sama dengan PT Magenta Jaya Makmur.
                </p>
            </div>

            {{-- Client Recap Image with Premium Frame --}}
            <div class="max-w-4xl mx-auto relative" data-aos="zoom-in" data-aos-duration="800">
                {{-- Outer Glow --}}
                <div
                    class="absolute -inset-1 bg-gradient-to-r from-primary-500/20 via-primary-600/30 to-primary-500/20 rounded-2xl blur-sm">
                </div>

                {{-- Main Container --}}
                <div
                    class="relative dark:bg-dark-800/50 bg-white rounded-2xl p-4 md:p-6 dark:border-dark-700/50 border-gray-200 border shadow-2xl backdrop-blur-sm">
                    {{-- Corner Accents --}}
                    <div class="absolute top-0 left-0 w-16 h-16 border-t-2 border-l-2 border-primary-500/40 rounded-tl-2xl">
                    </div>
                    <div
                        class="absolute top-0 right-0 w-16 h-16 border-t-2 border-r-2 border-primary-500/40 rounded-tr-2xl">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 w-16 h-16 border-b-2 border-l-2 border-primary-500/40 rounded-bl-2xl">
                    </div>
                    <div
                        class="absolute bottom-0 right-0 w-16 h-16 border-b-2 border-r-2 border-primary-500/40 rounded-br-2xl">
                    </div>

                    {{-- Image --}}
                    <div class="rounded-xl overflow-hidden">
                        <img src="{{ asset('images/magentaklien.png') }}" alt="Rekap Logo Klien PT Magenta Jaya Makmur"
                            class="w-full h-auto object-contain transition-transform duration-700 hover:scale-[1.02]">
                    </div>
                </div>

                {{-- Floating Badge --}}
                <div class="absolute -bottom-6 -right-4 z-20" data-aos="fade-up" data-aos-delay="300">
                    <div class="inline-flex items-center px-7 py-3.5 bg-gradient-primary text-white rounded-full shadow-xl shadow-primary-500/30">
                        <i data-lucide="building-2" class="w-5 h-5 mr-2"></i>
                        <span class="font-bold text-base">100+ Klien Korporat Terpercaya</span>
                        <i data-lucide="verified" class="w-5 h-5 ml-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($clients->count() > 0)
        <section class="py-24 dark:bg-dark-900 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold dark:text-white text-dark-900 mb-12 text-center" data-aos="fade-up">Klien Kami
                </h2>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
                    @foreach($clients as $index => $client)
                        <div class="dark:bg-dark-800 bg-gray-50 rounded-xl p-6 flex items-center justify-center aspect-square grayscale hover:grayscale-0 transition-all shadow-sm dark:border-dark-700 border-gray-200 border"
                            data-aos="fade-up" data-aos-delay="{{ ($index % 6) * 50 }}">
                            @if($client->logo)
                                <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" class="max-h-12 w-auto">
                            @else
                                <span
                                    class="dark:text-dark-400 text-dark-600 text-sm text-center font-medium">{{ $client->name }}</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($partners->count() > 0)
        <section class="py-24 dark:bg-dark-950 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold dark:text-white text-dark-900 mb-12 text-center" data-aos="fade-up">Strategic
                    Partners</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($partners as $partner)
                        <div class="dark:bg-dark-800 bg-white rounded-2xl p-8 dark:border-dark-700 border-gray-200 border text-center shadow-sm"
                            data-aos="fade-up">
                            <div class="w-20 h-20 bg-primary-500/10 rounded-full flex items-center justify-center mx-auto mb-4">
                                @if($partner->logo)
                                    <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}"
                                        class="max-h-12 w-auto">
                                @else
                                    <span class="text-2xl font-bold text-primary-500">{{ substr($partner->name, 0, 2) }}</span>
                                @endif
                            </div>
                            <h3 class="text-xl font-bold dark:text-white text-dark-900 mb-2">{{ $partner->name }}</h3>
                            @if($partner->description)
                                <p class="dark:text-dark-400 text-dark-600">{{ $partner->description }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($communities->count() > 0)
        <section class="py-24 dark:bg-dark-900 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold dark:text-white text-dark-900 mb-4 text-center" data-aos="fade-up">Community
                    Partners</h2>
                <p class="dark:text-dark-400 text-dark-600 text-center mb-12 max-w-2xl mx-auto" data-aos="fade-up">
                    Komunitas profesional yang menjadi bagian dari ekosistem industry event.
                </p>
                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($communities as $community)
                        <div class="bg-gradient-to-br from-primary-500/10 to-primary-500/5 rounded-2xl p-8 border border-primary-500/20 text-center"
                            data-aos="fade-up">
                            <div class="w-16 h-16 bg-primary-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i data-lucide="users" class="w-8 h-8 text-primary-500"></i>
                            </div>
                            <h3 class="text-xl font-bold dark:text-white text-dark-900 mb-2">{{ $community->name }}</h3>
                            @if($community->description)
                                <p class="dark:text-dark-400 text-dark-600">{{ $community->description }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection