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