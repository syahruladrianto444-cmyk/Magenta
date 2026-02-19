@extends('layouts.app')

@section('title', $portfolio->meta_title ?? $portfolio->title . ' - MAGENTA')

@section('content')
    <section class="relative pt-32 pb-20 dark:bg-dark-950 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl" data-aos="fade-right">
                <a href="{{ route('portfolio.index') }}"
                    class="inline-flex items-center dark:text-dark-400 text-dark-500 hover:text-primary-500 mb-6 transition-colors">
                    <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                    <span>Kembali ke Portfolio</span>
                </a>
                @if($portfolio->businessUnit)
                    <span
                        class="inline-block px-4 py-2 bg-primary-500/10 text-primary-500 text-sm font-medium rounded-full mb-4">{{ $portfolio->businessUnit->name }}</span>
                @endif
                <h1 class="text-4xl md:text-5xl font-bold dark:text-white text-dark-900 mb-4">{{ $portfolio->title }}</h1>
                <div class="flex flex-wrap gap-6 dark:text-dark-400 text-dark-500">
                    @if($portfolio->client)<span><i data-lucide="building"
                    class="w-4 h-4 inline mr-2"></i>{{ $portfolio->client }}</span>@endif
                    @if($portfolio->location)<span><i data-lucide="map-pin"
                    class="w-4 h-4 inline mr-2"></i>{{ $portfolio->location }}</span>@endif
                    @if($portfolio->project_date)<span><i data-lucide="calendar"
                    class="w-4 h-4 inline mr-2"></i>{{ $portfolio->project_date->format('F Y') }}</span>@endif
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 dark:bg-dark-900 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($portfolio->featured_image)
                <div class="aspect-video dark:bg-dark-800 bg-gray-100 rounded-2xl overflow-hidden mb-12" data-aos="fade-up">
                    <img src="{{ asset('storage/' . $portfolio->featured_image) }}" alt="{{ $portfolio->title }}"
                        class="w-full h-full object-cover">
                </div>
            @endif
            <div class="prose prose-lg dark:prose-invert max-w-none dark:text-dark-300 text-dark-600" data-aos="fade-up">
                {!! $portfolio->description !!}</div>
        </div>
    </section>

    @if($portfolio->images->count() > 0)
        <section class="py-24 dark:bg-dark-950 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold dark:text-white text-dark-900 mb-12" data-aos="fade-up">Gallery</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($portfolio->images as $image)
                        <div class="aspect-[4/3] dark:bg-dark-800 bg-gray-100 rounded-xl overflow-hidden shadow-sm"
                            data-aos="fade-up">
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->caption }}"
                                class="w-full h-full object-cover">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($relatedPortfolios->count() > 0)
        <section class="py-24 dark:bg-dark-900 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold dark:text-white text-dark-900 mb-12" data-aos="fade-up">Proyek Terkait</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($relatedPortfolios as $related)
                        <a href="{{ route('portfolio.show', $related) }}"
                            class="group aspect-square dark:bg-dark-800 bg-gray-50 rounded-2xl overflow-hidden card-hover shadow-sm"
                            data-aos="fade-up">
                            <div
                                class="w-full h-full bg-gradient-to-br from-primary-500/20 to-primary-500/5 flex items-center justify-center p-4 text-center">
                                <span class="dark:text-white text-dark-900 font-medium">{{ $related->title }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection