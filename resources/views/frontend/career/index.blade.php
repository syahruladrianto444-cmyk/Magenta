@extends('layouts.app')

@section('title', 'Career - MAGENTA')

@section('content')
    <section class="relative pt-32 pb-20 dark:bg-dark-950 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl" data-aos="fade-right">
                <div class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6">
                    Join Our Team
                </div>
                <h1 class="text-5xl md:text-6xl font-bold dark:text-white text-dark-900 mb-6">Karir di <span class="text-gradient">MAGENTA</span></h1>
                <p class="text-xl dark:text-dark-300 text-dark-600">Bergabunglah dengan tim kami dan berkembang bersama.</p>
            </div>
        </div>
    </section>

    <section class="py-24 dark:bg-dark-900 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($careers->count() > 0)
                <div class="space-y-6">
                    @foreach($careers as $index => $career)
                        <a href="{{ route('career.show', $career) }}"
                            class="group block dark:bg-dark-800 bg-gray-50 rounded-2xl p-8 dark:border-dark-700 border-gray-200 border hover:border-primary-500/50 transition-all card-hover shadow-sm"
                            data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                                <div>
                                    <h3 class="text-xl font-bold dark:text-white text-dark-900 mb-2 group-hover:text-primary-500 transition-colors">
                                        {{ $career->title }}</h3>
                                    <div class="flex flex-wrap gap-3 text-sm">
                                        @if($career->department)
                                        <span class="px-3 py-1 dark:bg-dark-700 bg-gray-200 rounded-full dark:text-dark-300 text-dark-600">{{ $career->department }}</span>
                                        @endif
                                        @if($career->location)
                                        <span class="px-3 py-1 dark:bg-dark-700 bg-gray-200 rounded-full dark:text-dark-300 text-dark-600">
                                            <i data-lucide="map-pin" class="w-3 h-3 inline mr-1"></i>{{ $career->location }}
                                        </span>
                                        @endif
                                        <span class="px-3 py-1 bg-primary-500/20 rounded-full text-primary-500">{{ ucfirst($career->type) }}</span>
                                    </div>
                                </div>
                                <div class="flex items-center text-primary-500 font-medium">
                                    <span>Detail</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform"></i>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="mt-12">{{ $careers->links() }}</div>
            @else
                <div class="text-center py-20">
                    <i data-lucide="briefcase" class="w-16 h-16 dark:text-dark-600 text-dark-400 mx-auto mb-4"></i>
                    <h3 class="text-xl dark:text-white text-dark-900 mb-2">Belum Ada Lowongan</h3>
                    <p class="dark:text-dark-400 text-dark-600 mb-8">Saat ini belum ada lowongan tersedia.</p>
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center px-6 py-3 bg-gradient-primary text-white font-semibold rounded-full">
                        <span>Kirim CV Spekulatif</span>
                    </a>
                </div>
            @endif
        </div>
    </section>
@endsection