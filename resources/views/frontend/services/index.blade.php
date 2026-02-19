@extends('layouts.app')

@section('title', 'Layanan - MAGENTA')

@section('content')
    <section class="relative pt-32 pb-20 dark:bg-dark-950 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl" data-aos="fade-right">
                <div
                    class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6">
                    Our Services
                </div>
                <h1 class="text-5xl md:text-6xl font-bold dark:text-white text-dark-900 mb-6">Layanan <span
                        class="text-gradient">Profesional</span></h1>
                <p class="text-xl dark:text-dark-300 text-dark-600">Solusi terintegrasi untuk kebutuhan korporasi Anda.</p>
            </div>
        </div>
    </section>

    <section class="py-24 dark:bg-dark-900 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-8">
                @foreach($services as $index => $service)
                    <div class="group dark:bg-dark-800 bg-gray-50 rounded-3xl p-10 dark:border-dark-700 border-gray-200 border hover:border-primary-500/50 transition-all card-hover shadow-sm"
                        data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="flex items-start space-x-6">
                            <div
                                class="w-16 h-16 bg-gradient-primary rounded-2xl flex items-center justify-center flex-shrink-0">
                                <i data-lucide="{{ $service->icon ?? 'briefcase' }}" class="w-8 h-8 text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold dark:text-white text-dark-900 mb-3">{{ $service->title }}</h3>
                                <p class="dark:text-dark-400 text-dark-600 mb-6">{{ $service->excerpt }}</p>
                                <a href="{{ route('services.show', $service) }}"
                                    class="inline-flex items-center text-primary-500 font-medium hover:text-primary-600 transition-colors">
                                    <span>Selengkapnya</span>
                                    <i data-lucide="arrow-right"
                                        class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection