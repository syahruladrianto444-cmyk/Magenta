@extends('layouts.app')

@section('title', $page->meta_title ?? 'About Us - Magenta87 Group')
@section('meta_description', $page->meta_description ?? 'Magenta87 Group (PT Magenta Jaya Makmur) — A strategic partner ecosystem creating impactful events, experiences, and modern architecture across Indonesia.')

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
                    The Story Behind <span class="text-gradient">Magenta87 Group</span>
                </h1>
                <p class="text-xl dark:text-dark-300 text-dark-600 leading-relaxed">
                    A strategic partner ecosystem building experiences, engagement, and impact across Indonesia.
                </p>
            </div>
        </div>
    </section>

    {{-- Company Story with Team Image --}}
    <section class="py-24 dark:bg-dark-950 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div data-aos="fade-right">
                    <h2 class="text-4xl font-bold dark:text-white text-dark-900 mb-6">Our Journey</h2>
                    <div class="prose prose-lg">
                        <p class="dark:text-dark-300 text-dark-600 leading-relaxed mb-6">
                            PT Magenta Jaya Makmur was founded with a vision to transform the event and creative industry in Indonesia. What began as a single event organizer service has evolved into Magenta87 Group — a multi-unit business ecosystem delivering strategic experiences, corporate engagement, and modern architectural solutions.
                        </p>
                        <p class="dark:text-dark-300 text-dark-600 leading-relaxed">
                            With over a decade of experience, we have been trusted by government institutions, leading corporations, and public brands to create events that move audiences, build experiences that connect people, and design spaces that inspire. We don't just organize — we strategize, execute, and deliver impact.
                        </p>
                    </div>
                </div>
                <div class="relative" data-aos="fade-left">
                    <div class="rounded-3xl overflow-hidden shadow-2xl">
                        <img src="{{ asset('images/INDUSTOPOLIS-11.jpg') }}" alt="Team MAGENTA"
                            class="w-full h-[600px] object-cover">
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
                    <div class="text-5xl font-bold text-primary-500 mb-2">5+</div>
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
                    <div class="dark:text-dark-300 text-dark-600">Klien Corporate</div>
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
                            To be the leading strategic partner ecosystem in events, experiences, and creative spaces — delivering world-class impact with every project.
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
                                <span class="dark:text-dark-300 text-dark-600">Deliver integrated, high-quality experiences across every business unit</span>
                            </li>
                            <li class="flex items-start space-x-3">
                                <i data-lucide="check-circle" class="w-6 h-6 text-primary-500 flex-shrink-0 mt-0.5"></i>
                                <span class="dark:text-dark-300 text-dark-600">Develop professional, competent teams with a passion for excellence</span>
                            </li>
                            <li class="flex items-start space-x-3">
                                <i data-lucide="check-circle" class="w-6 h-6 text-primary-500 flex-shrink-0 mt-0.5"></i>
                                <span class="dark:text-dark-300 text-dark-600">Build sustainable strategic partnerships that create mutual value</span>
                            </li>
                            <li class="flex items-start space-x-3">
                                <i data-lucide="check-circle" class="w-6 h-6 text-primary-500 flex-shrink-0 mt-0.5"></i>
                                <span class="dark:text-dark-300 text-dark-600">Practice ethical, responsible business with measurable impact</span>
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
                <h2 class="text-4xl font-bold dark:text-white text-dark-900 mb-4">Our Core Values</h2>
                <p class="text-lg dark:text-dark-300 text-dark-600 max-w-2xl mx-auto">
                    The principles that drive every experience we create.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center dark:bg-dark-800 bg-white p-8 rounded-2xl shadow-sm" data-aos="fade-up">
                    <div class="w-20 h-20 bg-gradient-primary rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i data-lucide="award" class="w-10 h-10 text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold dark:text-white text-dark-900 mb-3">Excellence</h3>
                    <p class="dark:text-dark-400 text-dark-600">Unwavering commitment to the highest quality in every project.</p>
                </div>
                <div class="text-center dark:bg-dark-800 bg-white p-8 rounded-2xl shadow-sm" data-aos="fade-up"
                    data-aos-delay="100">
                    <div class="w-20 h-20 bg-gradient-primary rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i data-lucide="lightbulb" class="w-10 h-10 text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold dark:text-white text-dark-900 mb-3">Innovation</h3>
                    <p class="dark:text-dark-400 text-dark-600">Continuously innovating to deliver breakthrough solutions.</p>
                </div>
                <div class="text-center dark:bg-dark-800 bg-white p-8 rounded-2xl shadow-sm" data-aos="fade-up"
                    data-aos-delay="200">
                    <div class="w-20 h-20 bg-gradient-primary rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i data-lucide="shield-check" class="w-10 h-10 text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold dark:text-white text-dark-900 mb-3">Integrity</h3>
                    <p class="dark:text-dark-400 text-dark-600">Upholding honesty and ethical business practices always.</p>
                </div>
                <div class="text-center dark:bg-dark-800 bg-white p-8 rounded-2xl shadow-sm" data-aos="fade-up"
                    data-aos-delay="300">
                    <div class="w-20 h-20 bg-gradient-primary rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i data-lucide="users" class="w-10 h-10 text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold dark:text-white text-dark-900 mb-3">Collaboration</h3>
                    <p class="dark:text-dark-400 text-dark-600">Building strong partnerships that create mutual value.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Klien Kami Section --}}
    <section class="py-24 dark:bg-dark-950 bg-white relative overflow-hidden">
        {{-- Decorative Background Elements --}}
        <div class="absolute top-0 left-0 w-72 h-72 bg-primary-500/5 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-primary-500/5 rounded-full blur-3xl animate-float-slow"></div>
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-primary-500/3 rounded-full blur-3xl">
        </div>

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
                    Dipercaya oleh berbagai perusahaan dan instansi ternama di Indonesia untuk mewujudkan event dan proyek
                    berkelas.
                </p>
            </div>

            {{-- Client Image with Creative Frame --}}
            <div class="max-w-4xl mx-auto relative" data-aos="zoom-in" data-aos-duration="800">
                {{-- Decorative Border Glow --}}
                <div
                    class="absolute -inset-1 bg-gradient-to-r from-primary-500/30 via-primary-600/20 to-primary-500/30 rounded-2xl blur-sm opacity-75">
                </div>

                {{-- Main Image Container --}}
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
                        <img src="{{ asset('images/magentaklien.png') }}" alt="Klien PT Magenta Jaya Makmur"
                            class="w-full h-auto object-contain transition-transform duration-700 hover:scale-[1.02]">
                    </div>
                </div>

                {{-- Floating Badge --}}
                <div class="absolute -bottom-6 -right-4 z-20" data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="inline-flex items-center px-7 py-3.5 bg-gradient-primary text-white rounded-full shadow-xl shadow-primary-500/30">
                        <i data-lucide="building-2" class="w-5 h-5 mr-2"></i>
                        <span class="font-bold text-base">100+ Klien Korporat Terpercaya</span>
                        <i data-lucide="verified" class="w-5 h-5 ml-2"></i>
                    </div>
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
                    Four integrated units creating end-to-end solutions for events, experiences, and spaces.
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
                {!! $globalCtas['headline'] ?? "Build Something Meaningful Together" !!}
            </h2>
            <p class="text-xl text-white/80 mb-8 max-w-2xl mx-auto">
                {{ $globalCtas['subheadline'] ?? "Every great experience starts with a conversation. Tell us about your vision." }}
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ $globalCtas['button_link'] ?? route('contact') }}"
                    class="inline-flex items-center justify-center px-8 py-4 bg-white text-primary-600 font-semibold rounded-full hover:shadow-lg transition-all duration-300">
                    <span>{{ $globalCtas['button_text'] ?? 'Discuss Your Next Project' }}</span>
                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i>
                </a>
                <a href="https://wa.me/{{ $globalCtas['whatsapp_general'] ?? '6281821878787' }}" target="_blank" class="inline-flex items-center justify-center px-8 py-4 bg-green-600 text-white font-semibold rounded-full hover:bg-green-700 transition-all duration-300">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                    <span>WhatsApp</span>
                </a>
            </div>
        </div>
    </section>
@endsection