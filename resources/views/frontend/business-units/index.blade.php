@extends('layouts.app')

@section('title', 'Business Units - MAGENTA')

@section('content')
    <section class="relative pt-32 pb-20 dark:bg-dark-950 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl" data-aos="fade-right">
                <div
                    class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6">
                    Our Ecosystem
                </div>
                <h1 class="text-5xl md:text-6xl font-bold dark:text-white text-dark-900 mb-6">Business <span
                        class="text-gradient">Units</span></h1>
                <p class="text-xl dark:text-dark-300 text-dark-600">Empat unit bisnis terintegrasi untuk solusi menyeluruh.
                </p>
            </div>
        </div>
    </section>

    <section class="py-24 dark:bg-dark-900 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-8">
                @php
                    $logoMap = [
                        '87studio' => ['dark' => '87 studio Gelap.png', 'light' => '87 studio Terang.png'],
                        'gajah-contractor' => ['dark' => 'GAJAH ART CONTRACTOR logo gelap.png', 'light' => 'GAJAH ART CONTRACTOR logo terang.png'],
                        'gajah-art-contractor' => ['dark' => 'GAJAH ART CONTRACTOR logo gelap.png', 'light' => 'GAJAH ART CONTRACTOR logo terang.png'],
                        'bumi-training-center' => ['dark' => 'LOGO BUMI TRAINING CENTER Gelap.png', 'light' => 'LOGO BUMI TRAINING CENTER Terang.png'],
                    ];
                @endphp
                @foreach($units as $index => $unit)
                    <a href="{{ route('units.show', $unit) }}"
                        class="group dark:bg-dark-800 bg-gray-50 rounded-3xl p-10 dark:border-dark-700 border-gray-200 border hover:border-opacity-50 transition-all card-hover shadow-sm"
                        data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="w-20 h-20 rounded-2xl flex items-center justify-center mb-6 overflow-hidden"
                            style="background-color: {{ $unit->color ?? '#DC2626' }}20">
                            @if(isset($logoMap[$unit->slug]))
                                {{-- Light mode: show dark logo (dark text on light bg) --}}
                                <img src="{{ asset('images/' . $logoMap[$unit->slug]['dark']) }}"
                                    alt="{{ $unit->name }}" class="w-16 h-16 object-contain dark:hidden">
                                {{-- Dark mode: show light logo (light text on dark bg) --}}
                                <img src="{{ asset('images/' . $logoMap[$unit->slug]['light']) }}"
                                    alt="{{ $unit->name }}" class="w-16 h-16 object-contain hidden dark:block">
                            @else
                                <span class="text-3xl font-bold"
                                    style="color: {{ $unit->color ?? '#DC2626' }}">{{ substr($unit->name, 0, 2) }}</span>
                            @endif
                        </div>
                        <h3 class="text-3xl font-bold dark:text-white text-dark-900 mb-3">{{ $unit->name }}</h3>
                        <p class="text-lg dark:text-dark-400 text-dark-600 mb-6">{{ $unit->tagline }}</p>
                        <div class="flex flex-wrap gap-2 mb-6">
                            @foreach(array_slice($unit->services_array, 0, 4) as $serviceItem)
                                <span
                                    class="px-3 py-1 dark:bg-dark-700 bg-gray-200 rounded-full text-sm dark:text-dark-300 text-dark-600">{{ $serviceItem }}</span>
                            @endforeach
                        </div>
                        <div class="flex items-center font-semibold" style="color: {{ $unit->color ?? '#DC2626' }}">
                            <span>Explore Unit</span>
                            <i data-lucide="arrow-right"
                                class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection