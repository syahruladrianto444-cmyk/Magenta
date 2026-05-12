@extends('layouts.app')

@section('title', $businessUnit->meta_title ?? $businessUnit->name . ' - MAGENTA')

@section('content')
    {{-- Hero Section with Brand Color --}}
    <section class="relative pt-32 pb-20 dark:bg-dark-950 bg-gray-50 overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 rounded-full blur-3xl opacity-30"
            style="background-color: {{ $businessUnit->color ?? '#DC2626' }}"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 rounded-full blur-3xl opacity-20"
            style="background-color: {{ $businessUnit->color ?? '#DC2626' }}"></div>

        @php
            $logoMap = [
                '87studio' => ['dark' => '87 studio Gelap.png', 'light' => '87 studio Terang.png'],
                'gajah-contractor' => ['dark' => 'GAJAH ART CONTRACTOR logo gelap.png', 'light' => 'GAJAH ART CONTRACTOR logo terang.png'],
                'gajah-art-contractor' => ['dark' => 'GAJAH ART CONTRACTOR logo gelap.png', 'light' => 'GAJAH ART CONTRACTOR logo terang.png'],
                'bumi-training-center' => ['dark' => 'LOGO BUMI TRAINING CENTER Gelap.png', 'light' => 'LOGO BUMI TRAINING CENTER Terang.png'],
            ];
        @endphp
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <a href="{{ route('units.index') }}"
                        class="inline-flex items-center dark:text-dark-400 text-dark-500 hover:text-primary-500 mb-6 transition-colors">
                        <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                        <span>Kembali ke Business Units</span>
                    </a>

                    <div class="w-20 h-20 rounded-2xl flex items-center justify-center mb-6 shadow-xl overflow-hidden"
                        style="background-color: {{ $businessUnit->color ?? '#DC2626' }}20">
                        @if(isset($logoMap[$businessUnit->slug]))
                            {{-- Light mode: show dark logo --}}
                            <img src="{{ asset('images/' . $logoMap[$businessUnit->slug]['dark']) }}"
                                alt="{{ $businessUnit->name }}" class="w-16 h-16 object-contain dark:hidden">
                            {{-- Dark mode: show light logo --}}
                            <img src="{{ asset('images/' . $logoMap[$businessUnit->slug]['light']) }}"
                                alt="{{ $businessUnit->name }}" class="w-16 h-16 object-contain hidden dark:block">
                        @else
                            <span class="text-3xl font-bold"
                                style="color: {{ $businessUnit->color ?? '#DC2626' }}">{{ substr($businessUnit->name, 0, 2) }}</span>
                        @endif
                    </div>

                    <h1 class="text-5xl md:text-6xl font-bold dark:text-white text-dark-900 mb-4">{{ $businessUnit->name }}
                    </h1>
                    <p class="text-2xl mb-6" style="color: {{ $businessUnit->color ?? '#DC2626' }}">
                        {{ $businessUnit->tagline }}
                    </p>

                    <div class="flex items-center gap-4">
                        @if($businessUnit->instagram)
                            <a href="https://instagram.com/{{ $businessUnit->instagram }}" target="_blank"
                                class="group inline-flex items-center px-5 py-3 dark:bg-dark-800/50 bg-white/80 backdrop-blur-sm rounded-xl hover:bg-gradient-to-r hover:from-purple-500 hover:via-pink-500 hover:to-orange-400 transition-all duration-300 dark:border-dark-700 border-gray-200 border hover:border-transparent">
                                {{-- Instagram SVG icon --}}
                                <svg class="w-5 h-5 mr-2 dark:text-white text-dark-700 group-hover:text-white transition-colors"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                </svg>
                                <span
                                    class="dark:text-white text-dark-700 group-hover:text-white transition-colors font-medium">{{ '@' . $businessUnit->instagram }}</span>
                            </a>
                        @endif
                        @if($businessUnit->website)
                            <a href="{{ $businessUnit->website }}" target="_blank"
                                class="group inline-flex items-center px-5 py-3 dark:bg-dark-800/50 bg-white/80 backdrop-blur-sm rounded-xl dark:text-white text-dark-700 hover:text-primary-500 transition-colors dark:border-dark-700 border-gray-200 border">
                                <i data-lucide="globe" class="w-5 h-5 mr-2"></i>
                                <span>Website</span>
                            </a>
                        @endif
                    </div>
                </div>

                <div class="relative" data-aos="fade-left">
                    <div
                        class="relative dark:bg-dark-800/50 bg-white/80 backdrop-blur-sm rounded-3xl p-10 dark:border-dark-700 border-gray-200 border shadow-xl">
                        <div class="absolute -top-6 -right-6 w-24 h-24 rounded-2xl flex items-center justify-center shadow-2xl"
                            style="background: linear-gradient(135deg, {{ $businessUnit->color ?? '#DC2626' }}, {{ $businessUnit->color ?? '#DC2626' }}80)">
                            <i data-lucide="sparkles" class="w-10 h-10 text-white"></i>
                        </div>

                        <div class="grid grid-cols-2 gap-6">
                            <div class="text-center p-5 dark:bg-dark-700/50 bg-gray-100 rounded-xl">
                                <div class="text-4xl font-bold dark:text-white text-dark-900 mb-1">
                                    {{ count($businessUnit->services_array) }}
                                </div>
                                <div class="dark:text-dark-400 text-dark-500">Services</div>
                            </div>
                            <div class="text-center p-5 dark:bg-dark-700/50 bg-gray-100 rounded-xl">
                                <div class="text-4xl font-bold dark:text-white text-dark-900 mb-1">
                                    {{ $portfolios->count() }}
                                </div>
                                <div class="dark:text-dark-400 text-dark-500">Projects</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- About Section with Premium Cards --}}
    <section class="py-24 dark:bg-dark-900 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16">
                <div data-aos="fade-right">
                    <div class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium mb-6"
                        style="background-color: {{ $businessUnit->color ?? '#DC2626' }}15; color: {{ $businessUnit->color ?? '#DC2626' }}">
                        <i data-lucide="info" class="w-4 h-4 mr-2"></i>
                        About Us
                    </div>
                    <h2 class="text-4xl font-bold dark:text-white text-dark-900 mb-6">Tentang {{ $businessUnit->name }}</h2>
                    <div class="prose prose-lg dark:prose-invert max-w-none dark:text-dark-300 text-dark-600">
                        {!! $businessUnit->description ?: '<p>Unit bisnis profesional yang bergerak dalam bidang ' . strtolower($businessUnit->tagline ?? 'services') . '.</p>' !!}
                    </div>
                </div>

                <div data-aos="fade-left">
                    <div class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium mb-6"
                        style="background-color: {{ $businessUnit->color ?? '#DC2626' }}15; color: {{ $businessUnit->color ?? '#DC2626' }}">
                        <i data-lucide="list-checks" class="w-4 h-4 mr-2"></i>
                        Our Services
                    </div>
                    <h3 class="text-2xl font-bold dark:text-white text-dark-900 mb-6">Layanan yang Kami Tawarkan</h3>

                    <div class="space-y-4">
                        @php
                            $icons = ['calendar', 'users', 'video', 'mic-2', 'camera', 'palette', 'megaphone', 'target', 'award', 'zap'];
                        @endphp
                        @foreach($businessUnit->services_array as $index => $serviceItem)
                            <div class="group flex items-center p-5 dark:bg-dark-800/50 bg-gray-50 rounded-2xl dark:border-dark-700 border-gray-200 border hover:border-opacity-50 transition-all duration-300 shadow-sm"
                                data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                                <div class="w-12 h-12 rounded-xl flex items-center justify-center mr-5 transition-all duration-300 group-hover:scale-110"
                                    style="background-color: {{ $businessUnit->color ?? '#DC2626' }}20">
                                    <i data-lucide="{{ $icons[$index % count($icons)] }}" class="w-6 h-6"
                                        style="color: {{ $businessUnit->color ?? '#DC2626' }}"></i>
                                </div>
                                <span
                                    class="dark:text-white text-dark-900 font-medium group-hover:translate-x-1 transition-transform">{{ $serviceItem }}</span>
                                <i data-lucide="arrow-right"
                                    class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition-opacity"
                                    style="color: {{ $businessUnit->color ?? '#DC2626' }}"></i>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Why Choose Us Section --}}
    <section class="py-24 dark:bg-dark-950 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold dark:text-white text-dark-900 mb-4">Why Choose {{ $businessUnit->name }}?
                </h2>
                <p class="text-lg dark:text-dark-400 text-dark-600 max-w-2xl mx-auto">What makes our approach different and impactful.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    if ($businessUnit->slug === '87studio') {
                        $features = [
                            ['icon' => 'zap', 'title' => 'Energetic Execution', 'desc' => 'High-impact delivery that captivates audiences'],
                            ['icon' => 'video', 'title' => 'Cinematic Vision', 'desc' => 'Premium visual storytelling and production'],
                            ['icon' => 'target', 'title' => 'Brand Impact', 'desc' => 'Strategic engagement that elevates your brand'],
                            ['icon' => 'layers', 'title' => 'End-to-End', 'desc' => 'Seamless management from concept to closing'],
                        ];
                    } elseif ($businessUnit->slug === 'bumi-training-center') {
                        $features = [
                            ['icon' => 'users', 'title' => 'Team Collaboration', 'desc' => 'Fostering unity and effective communication'],
                            ['icon' => 'book-open', 'title' => 'Skill Development', 'desc' => 'Practical training for real-world application'],
                            ['icon' => 'heart-handshake', 'title' => 'Warm Approach', 'desc' => 'Empathetic guidance that brings out the best'],
                            ['icon' => 'trending-up', 'title' => 'Professional Growth', 'desc' => 'Empowering individuals to reach their potential'],
                        ];
                    } elseif (str_contains($businessUnit->slug, 'gajah')) {
                        $features = [
                            ['icon' => 'ruler', 'title' => 'Architectural Precision', 'desc' => 'Exact standards and meticulous attention to detail'],
                            ['icon' => 'hammer', 'title' => 'Premium Build Quality', 'desc' => 'Using the best materials for enduring results'],
                            ['icon' => 'box', 'title' => 'Structural Integrity', 'desc' => 'Safe, robust, and reliable constructions'],
                            ['icon' => 'gem', 'title' => 'Timeless Design', 'desc' => 'Aesthetic mastery that stands the test of time'],
                        ];
                    } else {
                        $features = [
                            ['icon' => 'target', 'title' => 'Strategic Approach', 'desc' => 'Every project driven by clear goals and audience insight'],
                            ['icon' => 'clock', 'title' => 'On-Time Delivery', 'desc' => 'Full commitment to agreed timelines'],
                            ['icon' => 'sparkles', 'title' => 'Creative Excellence', 'desc' => 'Innovative concepts that leave lasting impressions'],
                            ['icon' => 'layers', 'title' => 'End-to-End', 'desc' => 'Integrated handling from concept to completion'],
                        ];
                    }
                @endphp

                @foreach($features as $index => $feature)
                    <div class="group relative dark:bg-dark-800/50 bg-white rounded-2xl p-8 dark:border-dark-700 border-gray-200 border text-center overflow-hidden hover:border-opacity-50 transition-all duration-500 shadow-sm"
                        data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"
                            style="background: linear-gradient(135deg, {{ $businessUnit->color ?? '#DC2626' }}10, transparent)">
                        </div>

                        <div class="relative z-10">
                            <div class="w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform shadow-lg"
                                style="background: linear-gradient(135deg, {{ $businessUnit->color ?? '#DC2626' }}, {{ $businessUnit->color ?? '#DC2626' }}80)">
                                <i data-lucide="{{ $feature['icon'] }}" class="w-8 h-8 text-white"></i>
                            </div>
                            <h3 class="text-xl font-bold dark:text-white text-dark-900 mb-2">{{ $feature['title'] }}</h3>
                            <p class="dark:text-dark-400 text-dark-600">{{ $feature['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Portfolio Section --}}
    @if($portfolios->count() > 0)
        <section class="py-24 dark:bg-dark-900 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-end justify-between mb-12" data-aos="fade-up">
                    <div>
                        <div class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium mb-4"
                            style="background-color: {{ $businessUnit->color ?? '#DC2626' }}15; color: {{ $businessUnit->color ?? '#DC2626' }}">
                            <i data-lucide="images" class="w-4 h-4 mr-2"></i>
                            Portfolio
                        </div>
                        <h2 class="text-4xl font-bold dark:text-white text-dark-900">Case Studies</h2>
                    </div>
                    <a href="{{ route('portfolio.index', ['unit' => $businessUnit->slug]) }}"
                        class="hidden md:inline-flex items-center font-semibold transition-colors"
                        style="color: {{ $businessUnit->color ?? '#DC2626' }}">
                        <span>Lihat Semua</span>
                        <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i>
                    </a>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($portfolios->take(6) as $index => $portfolio)
                        <a href="{{ route('portfolio.show', $portfolio) }}"
                            class="group relative aspect-[4/3] dark:bg-dark-800 bg-gray-100 rounded-2xl overflow-hidden card-hover shadow-sm"
                            data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            @if($portfolio->featured_image)
                                <img src="{{ asset('storage/' . $portfolio->featured_image) }}" alt="{{ $portfolio->title }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center"
                                    style="background: linear-gradient(135deg, {{ $businessUnit->color ?? '#DC2626' }}20, {{ $businessUnit->color ?? '#DC2626' }}05)">
                                    <i data-lucide="image" class="w-12 h-12 dark:text-dark-600 text-dark-400"></i>
                                </div>
                            @endif

                            <div
                                class="absolute inset-0 bg-gradient-to-t dark:from-dark-900 from-dark-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>

                            <div
                                class="absolute bottom-0 left-0 right-0 p-6 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                                <h3 class="text-xl font-bold text-white mb-1">{{ $portfolio->title }}</h3>
                                @if($portfolio->client)
                                <p class="text-dark-300">{{ $portfolio->client }}</p>@endif
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="text-center mt-8 md:hidden">
                    <a href="{{ route('portfolio.index', ['unit' => $businessUnit->slug]) }}"
                        class="inline-flex items-center font-semibold" style="color: {{ $businessUnit->color ?? '#DC2626' }}">
                        <span>Lihat Semua Portfolio</span>
                        <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i>
                    </a>
                </div>
            </div>
        </section>
    @endif

    {{-- CTA Section --}}
    <section class="py-24 relative overflow-hidden dark:bg-dark-950 bg-gray-50">
        <div class="absolute inset-0 opacity-10"
            style="background: linear-gradient(135deg, {{ $businessUnit->color ?? '#DC2626' }}, transparent)"></div>
        <div class="absolute top-0 right-0 w-96 h-96 rounded-full blur-3xl opacity-20"
            style="background-color: {{ $businessUnit->color ?? '#DC2626' }}"></div>

        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl mb-8 shadow-2xl"
                style="background: linear-gradient(135deg, {{ $businessUnit->color ?? '#DC2626' }}, {{ $businessUnit->color ?? '#DC2626' }}80)">
                <i data-lucide="message-circle" class="w-10 h-10 text-white"></i>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold dark:text-white text-dark-900 mb-6">
                Let's Create Something Impactful with {{ $businessUnit->name }}
            </h2>
            <p class="text-xl dark:text-dark-300 text-dark-600 mb-8 max-w-2xl mx-auto">
                Tell us about your vision and let's build an experience that people remember.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center justify-center px-8 py-4 text-white font-semibold rounded-full hover:shadow-lg transition-all duration-300"
                    style="background: linear-gradient(135deg, {{ $businessUnit->color ?? '#DC2626' }}, {{ $businessUnit->color ?? '#DC2626' }}80)">
                    <i data-lucide="mail" class="w-5 h-5 mr-2"></i>
                    <span>Discuss Your Project</span>
                </a>
                @php
                    $waNumber = '6281821878787'; // Default general
                    if (Str::contains(strtolower($businessUnit->name), 'gajah')) {
                        $waNumber = '6281236944802'; // Gajah Contractor number
                    }
                @endphp
                <a href="https://wa.me/{{ $waNumber }}" target="_blank"
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