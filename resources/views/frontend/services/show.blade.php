@extends('layouts.app')

@section('title', $service->meta_title ?? $service->title . ' - MAGENTA')
@section('meta_description', $service->meta_description ?? $service->excerpt)

@section('content')
    {{-- Hero Section --}}
    <section class="relative pt-32 pb-20 dark:bg-dark-950 bg-gray-50 overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-primary-500/5 rounded-full blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <a href="{{ route('services.index') }}"
                        class="inline-flex items-center dark:text-dark-400 text-dark-500 hover:text-primary-500 mb-6 transition-colors">
                        <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                        <span>Kembali ke Layanan</span>
                    </a>
                    <div
                        class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6">
                        <i data-lucide="{{ $service->icon ?? 'briefcase' }}" class="w-4 h-4 mr-2"></i>
                        Our Services
                    </div>
                    <h1 class="text-5xl md:text-6xl font-bold dark:text-white text-dark-900 mb-6">{{ $service->title }}</h1>
                    <p class="text-xl dark:text-dark-300 text-dark-600 leading-relaxed">{{ $service->excerpt }}</p>
                </div>
                <div class="relative" data-aos="fade-left">
                    <div
                        class="relative bg-gradient-to-br from-primary-500/20 to-primary-500/5 rounded-3xl p-12 border border-primary-500/20">
                        <div
                            class="w-24 h-24 bg-gradient-primary rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg shadow-primary-500/30">
                            <i data-lucide="{{ $service->icon ?? 'briefcase' }}" class="w-12 h-12 text-white"></i>
                        </div>
                        <div class="text-center">
                            <h3 class="text-2xl font-bold dark:text-white text-dark-900 mb-2">Professional Service</h3>
                            <p class="text-primary-500">MAGENTA Excellence</p>
                        </div>
                        {{-- Floating elements --}}
                        <div
                            class="absolute -top-4 -right-4 w-20 h-20 dark:bg-dark-800 bg-white rounded-xl flex items-center justify-center dark:border-dark-700 border-gray-200 border shadow-xl">
                            <i data-lucide="award" class="w-8 h-8 text-primary-500"></i>
                        </div>
                        <div
                            class="absolute -bottom-4 -left-4 w-16 h-16 dark:bg-dark-800 bg-white rounded-xl flex items-center justify-center dark:border-dark-700 border-gray-200 border shadow-xl">
                            <i data-lucide="star" class="w-6 h-6 text-yellow-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Features/Capabilities Section --}}
    <section class="py-24 dark:bg-dark-900 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <div
                    class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6">
                    What We Offer
                </div>
                <h2 class="text-4xl font-bold dark:text-white text-dark-900 mb-4">Layanan yang Kami Sediakan</h2>
                <p class="text-lg dark:text-dark-400 text-dark-600 max-w-2xl mx-auto">Solusi profesional dan terintegrasi
                    untuk setiap kebutuhan Anda.</p>
            </div>

            {{-- Premium Cards Grid --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $serviceItems = [
                        ['icon' => 'building-2', 'title' => 'Corporate Events', 'desc' => 'Event perusahaan dengan standar profesional tinggi'],
                        ['icon' => 'presentation', 'title' => 'Meetings & Conference', 'desc' => 'Penyelenggaraan meeting dan konferensi berkelas'],
                        ['icon' => 'rocket', 'title' => 'Product Launch', 'desc' => 'Peluncuran produk yang berkesan dan impactful'],
                        ['icon' => 'sparkles', 'title' => 'Brand Activation', 'desc' => 'Aktivasi brand yang kreatif dan engaging'],
                        ['icon' => 'trophy', 'title' => 'Award Ceremony', 'desc' => 'Penghargaan dan gala dinner berkelas'],
                        ['icon' => 'layout-grid', 'title' => 'Exhibition', 'desc' => 'Pameran dan trade show profesional'],
                    ];
                @endphp

                @foreach($serviceItems as $index => $item)
                    <div class="group relative dark:bg-dark-800/50 bg-gray-50 backdrop-blur-sm rounded-2xl p-8 dark:border-dark-700 border-gray-200 border hover:border-primary-500/50 transition-all duration-500 card-hover overflow-hidden shadow-sm"
                        data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        {{-- Gradient overlay on hover --}}
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-primary-500/0 to-primary-500/0 group-hover:from-primary-500/5 group-hover:to-primary-500/5 transition-all duration-500">
                        </div>

                        {{-- Icon --}}
                        <div
                            class="relative z-10 w-16 h-16 bg-gradient-primary rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-3 transition-all duration-500 shadow-lg shadow-primary-500/20">
                            <i data-lucide="{{ $item['icon'] }}" class="w-8 h-8 text-white"></i>
                        </div>

                        {{-- Content --}}
                        <h3
                            class="relative z-10 text-xl font-bold dark:text-white text-dark-900 mb-3 group-hover:text-primary-500 transition-colors">
                            {{ $item['title'] }}</h3>
                        <p class="relative z-10 dark:text-dark-400 text-dark-600 leading-relaxed">{{ $item['desc'] }}</p>

                        {{-- Arrow --}}
                        <div
                            class="relative z-10 mt-6 flex items-center text-primary-500 opacity-0 group-hover:opacity-100 transition-opacity">
                            <span class="text-sm font-medium">Learn more</span>
                            <i data-lucide="arrow-right"
                                class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </div>

                        {{-- Decorative circle --}}
                        <div
                            class="absolute -bottom-10 -right-10 w-40 h-40 bg-primary-500/5 rounded-full group-hover:scale-150 transition-transform duration-700">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Description Section with Icons --}}
    <section class="py-24 dark:bg-dark-950 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div data-aos="fade-right">
                    <h2 class="text-4xl font-bold dark:text-white text-dark-900 mb-8">Mengapa Memilih Layanan Kami?</h2>
                    <div class="prose prose-lg dark:prose-invert max-w-none dark:text-dark-300 text-dark-600">
                        {!! $service->description !!}
                    </div>
                </div>
                <div class="space-y-6" data-aos="fade-left">
                    @php
                        $benefits = [
                            ['icon' => 'clock', 'title' => 'Tepat Waktu', 'desc' => 'Komitmen penuh pada timeline yang disepakati'],
                            ['icon' => 'shield-check', 'title' => 'Terpercaya', 'desc' => 'Dipercaya oleh 100+ korporasi dan instansi'],
                            ['icon' => 'users', 'title' => 'Tim Profesional', 'desc' => 'Didukung tim berpengalaman di bidangnya'],
                            ['icon' => 'headphones', 'title' => 'Support 24/7', 'desc' => 'Layanan support yang responsif'],
                        ];
                    @endphp

                    @foreach($benefits as $index => $benefit)
                        <div class="flex items-start space-x-5 p-6 dark:bg-dark-800/50 bg-white rounded-2xl dark:border-dark-700 border-gray-200 border hover:border-primary-500/30 transition-colors shadow-sm"
                            data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            <div
                                class="w-14 h-14 bg-gradient-primary rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg shadow-primary-500/20">
                                <i data-lucide="{{ $benefit['icon'] }}" class="w-6 h-6 text-white"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold dark:text-white text-dark-900 mb-1">{{ $benefit['title'] }}</h4>
                                <p class="dark:text-dark-400 text-dark-600">{{ $benefit['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Process Section --}}
    <section class="py-24 dark:bg-dark-900 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold dark:text-white text-dark-900 mb-4">Proses Kerja Kami</h2>
                <p class="text-lg dark:text-dark-400 text-dark-600">Langkah-langkah sistematis untuk hasil terbaik</p>
            </div>

            <div class="grid md:grid-cols-4 gap-8">
                @php
                    $steps = [
                        ['num' => '01', 'icon' => 'message-circle', 'title' => 'Konsultasi', 'desc' => 'Diskusi kebutuhan dan tujuan'],
                        ['num' => '02', 'icon' => 'file-text', 'title' => 'Proposal', 'desc' => 'Penyusunan rencana detail'],
                        ['num' => '03', 'icon' => 'play-circle', 'title' => 'Eksekusi', 'desc' => 'Implementasi profesional'],
                        ['num' => '04', 'icon' => 'check-circle', 'title' => 'Evaluasi', 'desc' => 'Review dan laporan hasil'],
                    ];
                @endphp

                @foreach($steps as $index => $step)
                    <div class="relative text-center" data-aos="fade-up" data-aos-delay="{{ $index * 150 }}">
                        {{-- Connector line --}}
                        @if($index < 3)
                            <div
                                class="hidden md:block absolute top-12 left-1/2 w-full h-0.5 bg-gradient-to-r from-primary-500 to-primary-600">
                            </div>
                        @endif

                        <div
                            class="relative z-10 w-24 h-24 bg-gradient-primary rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xl shadow-primary-500/30">
                            <i data-lucide="{{ $step['icon'] }}" class="w-10 h-10 text-white"></i>
                        </div>
                        <div class="text-primary-500 font-bold text-sm mb-2">Step {{ $step['num'] }}</div>
                        <h3 class="text-xl font-bold dark:text-white text-dark-900 mb-2">{{ $step['title'] }}</h3>
                        <p class="dark:text-dark-400 text-dark-600">{{ $step['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Related Portfolio --}}
    @if($relatedPortfolios->count() > 0)
        <section class="py-24 dark:bg-dark-950 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold dark:text-white text-dark-900 mb-12" data-aos="fade-up">Portfolio Terkait</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($relatedPortfolios as $portfolio)
                        <a href="{{ route('portfolio.show', $portfolio) }}"
                            class="group relative aspect-square dark:bg-dark-800 bg-white rounded-2xl overflow-hidden card-hover shadow-sm"
                            data-aos="fade-up">
                            @if($portfolio->featured_image)
                                <img src="{{ asset('storage/' . $portfolio->featured_image) }}" alt="{{ $portfolio->title }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div
                                    class="w-full h-full bg-gradient-to-br from-primary-500/20 to-primary-500/5 flex items-center justify-center">
                                    <i data-lucide="image" class="w-12 h-12 dark:text-dark-600 text-dark-400"></i>
                                </div>
                            @endif
                            <div
                                class="absolute inset-0 bg-gradient-to-t dark:from-dark-900 from-dark-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                            </div>
                            <div
                                class="absolute bottom-0 left-0 right-0 p-6 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all">
                                <h3 class="text-lg font-bold text-white">{{ $portfolio->title }}</h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- CTA Section --}}
    <section class="py-24 bg-gradient-primary relative overflow-hidden">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>

        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 rounded-2xl mb-8">
                <i data-lucide="phone" class="w-10 h-10 text-white"></i>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Tertarik dengan Layanan Ini?
            </h2>
            <p class="text-xl text-white/80 mb-8 max-w-2xl mx-auto">
                Konsultasikan kebutuhan Anda dengan tim profesional kami secara gratis.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center justify-center px-8 py-4 bg-white text-primary-600 font-semibold rounded-full hover:shadow-lg transition-all duration-300">
                    <i data-lucide="mail" class="w-5 h-5 mr-2"></i>
                    <span>Hubungi Kami</span>
                </a>
                <a href="https://wa.me/6287715568639" target="_blank"
                    class="inline-flex items-center justify-center px-8 py-4 bg-green-600 text-white font-semibold rounded-full hover:bg-green-700 transition-all duration-300">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
                    </svg>
                    <span>WhatsApp</span>
                </a>
            </div>
        </div>
    </section>
@endsection