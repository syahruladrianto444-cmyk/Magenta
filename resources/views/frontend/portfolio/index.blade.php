@extends('layouts.app')

@section('title', 'Portfolio - MAGENTA')

@section('content')
    <section class="relative pt-32 pb-20 dark:bg-dark-950 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl" data-aos="fade-right">
                <div
                    class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6">
                    Our Work
                </div>
                <h1 class="text-5xl md:text-6xl font-bold dark:text-white text-dark-900 mb-6">Portfolio</h1>
                <p class="text-xl dark:text-dark-300 text-dark-600">Proyek-proyek yang telah kami kerjakan bersama klien.
                </p>
            </div>
        </div>
    </section>

    <section class="py-12 dark:bg-dark-900 bg-white border-b dark:border-dark-800 border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('portfolio.index') }}"
                    class="px-4 py-2 rounded-full text-sm font-medium transition-colors {{ !request('unit') && !request('service') ? 'bg-primary-500 text-white' : 'dark:bg-dark-800 bg-gray-100 dark:text-dark-300 text-dark-600 hover:text-primary-500' }}">Semua</a>
                @foreach($units as $unit)
                    <a href="{{ route('portfolio.index', ['unit' => $unit->slug]) }}"
                        class="px-4 py-2 rounded-full text-sm font-medium transition-colors {{ request('unit') == $unit->slug ? 'bg-primary-500 text-white' : 'dark:bg-dark-800 bg-gray-100 dark:text-dark-300 text-dark-600 hover:text-primary-500' }}">{{ $unit->name }}</a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-24 dark:bg-dark-950 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($portfolios->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($portfolios as $index => $portfolio)
                        <a href="{{ route('portfolio.show', $portfolio) }}"
                            class="group relative aspect-[4/3] dark:bg-dark-800 bg-white rounded-2xl overflow-hidden card-hover shadow-sm"
                            data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
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
                                @if($portfolio->businessUnit)
                                    <span
                                        class="inline-block px-3 py-1 bg-primary-500/20 text-primary-400 text-xs rounded-full mb-2">{{ $portfolio->businessUnit->name }}</span>
                                @endif
                                <h3 class="text-xl font-bold text-white">{{ $portfolio->title }}</h3>
                                @if($portfolio->client)
                                    <p class="text-dark-300">{{ $portfolio->client }}</p>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="mt-12">{{ $portfolios->links() }}</div>
            @else
                <div class="text-center py-20">
                    <i data-lucide="folder-open" class="w-16 h-16 dark:text-dark-600 text-dark-400 mx-auto mb-4"></i>
                    <h3 class="text-xl dark:text-white text-dark-900 mb-2">Belum Ada Portfolio</h3>
                    <p class="dark:text-dark-400 text-dark-600">Portfolio akan segera ditambahkan.</p>
                </div>
            @endif
        </div>
    </section>
@endsection