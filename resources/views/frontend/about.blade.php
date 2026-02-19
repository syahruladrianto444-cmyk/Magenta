@extends('layouts.app')

@section('title', $page->meta_title ?? 'Tentang Kami - MAGENTA')
@section('meta_description', $page->meta_description ?? 'MAGENTA adalah mitra strategis terdepan untuk solusi event, training, media production, dan konstruksi di Indonesia.')

@section('content')
    {{-- Hero Section with Background Image --}}
    <section class="relative pt-32 pb-20 overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('images/hero-event.png') }}" alt="MAGENTA Event" class="w-full h-full object-cover">
            <div
                class="absolute inset-0 dark:bg-gradient-to-r dark:from-dark-950 dark:via-dark-950/90 dark:to-dark-950/70 bg-gradient-to-r from-white via-white/90 to-white/70">
            </div>
        </div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary-500/10 rounded-full blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl" data-aos="fade-right">
                <div
                    class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6">
                    Tentang Kami
                </div>
                <h1 class="text-5xl md:text-6xl font-bold dark:text-white text-dark-900 mb-6">
                    Tentang <span class="text-gradient">MAGENTA</span>
                </h1>
                <p class="text-xl dark:text-dark-300 text-dark-600 leading-relaxed">
                    Mitra strategis terdepan dalam industri event dan creative solutions di Indonesia.
                </p>
            </div>
        </div>
    </section>

    {{-- Company Story with Team Image --}}
    <section class="py-24 dark:bg-dark-950 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div data-aos="fade-right">
                    <h2 class="text-4xl font-bold dark:text-white text-dark-900 mb-6">Sejarah Perusahaan</h2>
                    <div class="prose prose-lg">
                        <p class="dark:text-dark-300 text-dark-600 leading-relaxed mb-6">
                            PT Magenta Jaya Makmur didirikan dengan visi menjadi mitra strategis terdepan dalam industri
                            event dan creative solutions di Indonesia. Berawal dari layanan event organizer, MAGENTA terus
                            berkembang dan kini memiliki empat unit bisnis yang saling terintegrasi.
                        </p>
                        <p class="dark:text-dark-300 text-dark-600 leading-relaxed">
                            Dengan pengalaman lebih dari satu dekade, kami telah dipercaya oleh berbagai korporasi dan
                            instansi pemerintah untuk menyelenggarakan event berkelas, menyediakan pelatihan profesional,
                            produksi media berkualitas, dan solusi konstruksi yang terpercaya.
                        </p>
                    </div>
                </div>
                <div class="relative" data-aos="fade-left">
                    <div class="rounded-3xl overflow-hidden shadow-2xl">
                        <img src="{{ asset('images/team.png') }}" alt="Team MAGENTA" class="w-full h-auto">
                    </div>
                    {{-- Stats Card Overlay --}}
                    <div
                        class="absolute -bottom-6 -left-6 dark:bg-dark-800 bg-white rounded-2xl p-6 dark:border-dark-700 border-gray-200 border shadow-xl">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-center px-4">
                                <div class="text-3xl font-bold text-primary-500">10+</div>
                                <div class="dark:text-dark-400 text-dark-500 text-sm">Tahun</div>
                            </div>
                            <div class="text-center px-4">
                                <div class="text-3xl font-bold text-primary-500">4</div>
                                <div class="dark:text-dark-400 text-dark-500 text-sm">Units</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="py-16 dark:bg-dark-900 bg-gray-50 border-y dark:border-dark-800 border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center" data-aos="fade-up">
                    <div class="text-5xl font-bold text-primary-500 mb-2">10+</div>
                    <div class="dark:text-dark-300 text-dark-600">Tahun Pengalaman</div>
                </div>
                <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-5xl font-bold text-primary-500 mb-2">4</div>
                    <div class="dark:text-dark-300 text-dark-600">Unit Bisnis</div>
                </div>
                <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-5xl font-bold text-primary-500 mb-2">500+</div>
                    <div class="dark:text-dark-300 text-dark-600">Event Sukses</div>
                </div>
                <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-5xl font-bold text-primary-500 mb-2">100+</div>
                    <div class="dark:text-dark-300 text-dark-600">Klien Korporat</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Vision & Mission with Image --}}
    <section class="py-24 dark:bg-dark-950 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                {{-- Image Section --}}
                <div class="relative order-2 lg:order-1" data-aos="fade-right">
                    <div class="rounded-3xl overflow-hidden shadow-2xl">
                        <img src="{{ asset('images/training.png') }}" alt="Training Session" class="w-full h-auto">
                    </div>
                </div>

                {{-- Content Section --}}
                <div class="order-1 lg:order-2" data-aos="fade-left">
                    {{-- Vision --}}
                    <div class="mb-12">
                        <div class="flex items-center mb-4">
                            <div class="w-14 h-14 bg-gradient-primary rounded-xl flex items-center justify-center mr-4">
                                <i data-lucide="eye" class="w-7 h-7 text-white"></i>
                            </div>
                            <h3 class="text-3xl font-bold dark:text-white text-dark-900">Visi</h3>
                        </div>
                        <p class="text-lg dark:text-dark-300 text-dark-600 leading-relaxed">
                            Menjadi pemimpin industri event dan creative solutions dengan standar internasional yang
                            mengutamakan kualitas, inovasi, dan kepuasan klien.
                        </p>
                    </div>

                    {{-- Mission --}}
                    <div>
                        <div class="flex items-center mb-4">
                            <div
                                class="w-14 h-14 dark:bg-dark-700 bg-gray-100 rounded-xl flex items-center justify-center mr-4">
                                <i data-lucide="target" class="w-7 h-7 text-primary-500"></i>
                            </div>
                            <h3 class="text-3xl font-bold dark:text-white text-dark-900">Misi</h3>
                        </div>
                        <ul class="space-y-4">
                            <li class="flex items-start space-x-3">
                                <i data-lucide="check-circle" class="w-6 h-6 text-primary-500 flex-shrink-0 mt-0.5"></i>
                                <span class="dark:text-dark-300 text-dark-600">Memberikan layanan terintegrasi berkualitas
                                    tinggi</span>
                            </li>
                            <li class="flex items-start space-x-3">
                                <i data-lucide="check-circle" class="w-6 h-6 text-primary-500 flex-shrink-0 mt-0.5"></i>
                                <span class="dark:text-dark-300 text-dark-600">Mengembangkan SDM profesional dan
                                    berkompetensi</span>
                            </li>
                            <li class="flex items-start space-x-3">
                                <i data-lucide="check-circle" class="w-6 h-6 text-primary-500 flex-shrink-0 mt-0.5"></i>
                                <span class="dark:text-dark-300 text-dark-600">Membangun kemitraan strategis yang
                                    berkelanjutan</span>
                            </li>
                            <li class="flex items-start space-x-3">
                                <i data-lucide="check-circle" class="w-6 h-6 text-primary-500 flex-shrink-0 mt-0.5"></i>
                                <span class="dark:text-dark-300 text-dark-600">Menerapkan praktik bisnis yang etis dan
                                    bertanggung jawab</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Core Values --}}
    <section class="py-24 dark:bg-dark-900 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold dark:text-white text-dark-900 mb-4">Nilai-Nilai Kami</h2>
                <p class="text-lg dark:text-dark-300 text-dark-600 max-w-2xl mx-auto">
                    Prinsip yang menjadi fondasi dalam setiap langkah kami.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center dark:bg-dark-800 bg-white p-8 rounded-2xl shadow-sm" data-aos="fade-up">
                    <div class="w-20 h-20 bg-gradient-primary rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i data-lucide="award" class="w-10 h-10 text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold dark:text-white text-dark-900 mb-3">Excellence</h3>
                    <p class="dark:text-dark-400 text-dark-600">Komitmen pada kualitas tertinggi dalam setiap proyek.</p>
                </div>
                <div class="text-center dark:bg-dark-800 bg-white p-8 rounded-2xl shadow-sm" data-aos="fade-up"
                    data-aos-delay="100">
                    <div class="w-20 h-20 bg-gradient-primary rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i data-lucide="lightbulb" class="w-10 h-10 text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold dark:text-white text-dark-900 mb-3">Innovation</h3>
                    <p class="dark:text-dark-400 text-dark-600">Terus berinovasi untuk memberikan solusi terbaik.</p>
                </div>
                <div class="text-center dark:bg-dark-800 bg-white p-8 rounded-2xl shadow-sm" data-aos="fade-up"
                    data-aos-delay="200">
                    <div class="w-20 h-20 bg-gradient-primary rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i data-lucide="shield-check" class="w-10 h-10 text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold dark:text-white text-dark-900 mb-3">Integrity</h3>
                    <p class="dark:text-dark-400 text-dark-600">Menjunjung tinggi kejujuran dan etika bisnis.</p>
                </div>
                <div class="text-center dark:bg-dark-800 bg-white p-8 rounded-2xl shadow-sm" data-aos="fade-up"
                    data-aos-delay="300">
                    <div class="w-20 h-20 bg-gradient-primary rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i data-lucide="users" class="w-10 h-10 text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold dark:text-white text-dark-900 mb-3">Collaboration</h3>
                    <p class="dark:text-dark-400 text-dark-600">Membangun kemitraan yang kuat dan saling menguntungkan.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Business Units Overview --}}
    <section class="py-24 dark:bg-dark-950 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <div
                    class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6">
                    Our Ecosystem
                </div>
                <h2 class="text-4xl font-bold dark:text-white text-dark-900 mb-4">Unit Bisnis Kami</h2>
                <p class="text-lg dark:text-dark-300 text-dark-600 max-w-2xl mx-auto">
                    Empat unit bisnis terintegrasi untuk memberikan solusi menyeluruh.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($businessUnits as $index => $unit)
                    <a href="{{ route('units.show', $unit) }}"
                        class="group dark:bg-dark-800 bg-white rounded-2xl p-6 dark:border-dark-700 border-gray-200 border hover:border-opacity-50 transition-all duration-300 card-hover shadow-sm"
                        data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="w-14 h-14 rounded-xl flex items-center justify-center mb-4"
                            style="background-color: {{ $unit->color ?? '#DC2626' }}20">
                            <span class="text-xl font-bold"
                                style="color: {{ $unit->color ?? '#DC2626' }}">{{ substr($unit->name, 0, 2) }}</span>
                        </div>
                        <h3 class="text-xl font-bold dark:text-white text-dark-900 mb-2">{{ $unit->name }}</h3>
                        <p class="dark:text-dark-400 text-dark-600 text-sm mb-4">{{ $unit->tagline }}</p>
                        <div class="flex items-center font-medium" style="color: {{ $unit->color ?? '#DC2626' }}">
                            <span>Explore</span>
                            <i data-lucide="arrow-right"
                                class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-24 bg-gradient-primary relative overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('images/production.png') }}" alt="Production" class="w-full h-full object-cover opacity-20">
            <div class="absolute inset-0 bg-primary-600/80"></div>
        </div>
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>

        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Mari Berkolaborasi
            </h2>
            <p class="text-xl text-white/80 mb-8 max-w-2xl mx-auto">
                Kami siap menjadi mitra Anda dalam mewujudkan event dan proyek yang luar biasa.
            </p>
            <a href="{{ route('contact') }}"
                class="inline-flex items-center justify-center px-8 py-4 bg-white text-primary-600 font-semibold rounded-full hover:shadow-lg transition-all duration-300">
                <span>Hubungi Kami</span>
                <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i>
            </a>
        </div>
    </section>
@endsection