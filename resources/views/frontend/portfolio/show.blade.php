@extends('layouts.app')

@section('title', $portfolio->meta_title ?? $portfolio->title . ' - Magenta87 Group')

@section('content')
    <section class="relative pt-32 pb-20 dark:bg-dark-950 bg-gray-50 overflow-hidden">
        @if($portfolio->hero_image)
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('storage/' . $portfolio->hero_image) }}" alt="{{ $portfolio->title }}" class="w-full h-full object-cover opacity-20 dark:opacity-30">
                <div class="absolute inset-0 bg-gradient-to-t dark:from-dark-950 from-gray-50 via-transparent to-transparent"></div>
            </div>
        @endif
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl" data-aos="fade-right">
                <a href="{{ route('portfolio.index') }}"
                    class="inline-flex items-center dark:text-dark-400 text-dark-500 hover:text-primary-500 mb-6 transition-colors">
                    <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                    <span>Back to Case Studies</span>
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
                    @if($portfolio->audience_count)<span><i data-lucide="users"
                    class="w-4 h-4 inline mr-2"></i>{{ $portfolio->audience_count }} Audience</span>@endif
                </div>
            </div>
        </div>
    </section>

    {{-- Featured Image --}}
    <section class="py-12 dark:bg-dark-900 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($portfolio->featured_image)
                <div class="aspect-video dark:bg-dark-800 bg-gray-100 rounded-2xl overflow-hidden shadow-xl" data-aos="fade-up">
                    <img src="{{ asset('storage/' . $portfolio->featured_image) }}" alt="{{ $portfolio->title }}"
                        class="w-full h-full object-cover">
                </div>
            @endif
        </div>
    </section>

    {{-- Case Study Content --}}
    <section class="py-16 dark:bg-dark-900 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($portfolio->overview || $portfolio->goals || $portfolio->magenta_role || $portfolio->impact || $portfolio->highlights)
                {{-- Case Study Format --}}
                <div class="grid lg:grid-cols-3 gap-12">
                    {{-- Main Content --}}
                    <div class="lg:col-span-2 space-y-12">
                        @if($portfolio->overview)
                        <div data-aos="fade-up">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-primary-500/10 rounded-lg flex items-center justify-center mr-3">
                                    <i data-lucide="file-text" class="w-5 h-5 text-primary-500"></i>
                                </div>
                                <h2 class="text-2xl font-bold dark:text-white text-dark-900">Overview</h2>
                            </div>
                            <div class="prose prose-lg dark:prose-invert max-w-none dark:text-dark-300 text-dark-600">
                                {!! nl2br(e($portfolio->overview)) !!}
                            </div>
                        </div>
                        @endif

                        @if($portfolio->goals)
                        <div data-aos="fade-up">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-primary-500/10 rounded-lg flex items-center justify-center mr-3">
                                    <i data-lucide="target" class="w-5 h-5 text-primary-500"></i>
                                </div>
                                <h2 class="text-2xl font-bold dark:text-white text-dark-900">Goals</h2>
                            </div>
                            <div class="prose prose-lg dark:prose-invert max-w-none dark:text-dark-300 text-dark-600">
                                {!! nl2br(e($portfolio->goals)) !!}
                            </div>
                        </div>
                        @endif

                        @if($portfolio->magenta_role)
                        <div data-aos="fade-up">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-primary-500/10 rounded-lg flex items-center justify-center mr-3">
                                    <i data-lucide="briefcase" class="w-5 h-5 text-primary-500"></i>
                                </div>
                                <h2 class="text-2xl font-bold dark:text-white text-dark-900">Our Role</h2>
                            </div>
                            <div class="prose prose-lg dark:prose-invert max-w-none dark:text-dark-300 text-dark-600">
                                {!! nl2br(e($portfolio->magenta_role)) !!}
                            </div>
                        </div>
                        @endif
                    </div>

                    {{-- Sidebar --}}
                    <div class="space-y-6">
                        @if($portfolio->impact)
                        <div class="dark:bg-dark-800/50 bg-gray-50 rounded-2xl p-6 dark:border-dark-700 border-gray-200 border" data-aos="fade-left">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-gradient-primary rounded-lg flex items-center justify-center mr-3">
                                    <i data-lucide="trending-up" class="w-5 h-5 text-white"></i>
                                </div>
                                <h3 class="text-xl font-bold dark:text-white text-dark-900">Impact & Results</h3>
                            </div>
                            <div class="dark:text-dark-300 text-dark-600 leading-relaxed">
                                {!! nl2br(e($portfolio->impact)) !!}
                            </div>
                        </div>
                        @endif

                        @if($portfolio->highlights)
                        <div class="dark:bg-dark-800/50 bg-gray-50 rounded-2xl p-6 dark:border-dark-700 border-gray-200 border" data-aos="fade-left" data-aos-delay="100">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-gradient-primary rounded-lg flex items-center justify-center mr-3">
                                    <i data-lucide="star" class="w-5 h-5 text-white"></i>
                                </div>
                                <h3 class="text-xl font-bold dark:text-white text-dark-900">Experience Highlights</h3>
                            </div>
                            <div class="dark:text-dark-300 text-dark-600 leading-relaxed">
                                {!! nl2br(e($portfolio->highlights)) !!}
                            </div>
                        </div>
                        @endif

                        {{-- Project Info Card --}}
                        <div class="dark:bg-dark-800/50 bg-gray-50 rounded-2xl p-6 dark:border-dark-700 border-gray-200 border" data-aos="fade-left" data-aos-delay="200">
                            <h3 class="text-lg font-bold dark:text-white text-dark-900 mb-4">Project Details</h3>
                            <div class="space-y-3">
                                @if($portfolio->client)
                                <div class="flex items-center">
                                    <i data-lucide="building" class="w-4 h-4 text-primary-500 mr-3"></i>
                                    <span class="dark:text-dark-300 text-dark-600">{{ $portfolio->client }}</span>
                                </div>
                                @endif
                                @if($portfolio->location)
                                <div class="flex items-center">
                                    <i data-lucide="map-pin" class="w-4 h-4 text-primary-500 mr-3"></i>
                                    <span class="dark:text-dark-300 text-dark-600">{{ $portfolio->location }}</span>
                                </div>
                                @endif
                                @if($portfolio->project_date)
                                <div class="flex items-center">
                                    <i data-lucide="calendar" class="w-4 h-4 text-primary-500 mr-3"></i>
                                    <span class="dark:text-dark-300 text-dark-600">{{ $portfolio->project_date->format('F Y') }}</span>
                                </div>
                                @endif
                                @if($portfolio->businessUnit)
                                <div class="flex items-center">
                                    <i data-lucide="layers" class="w-4 h-4 text-primary-500 mr-3"></i>
                                    <span class="dark:text-dark-300 text-dark-600">{{ $portfolio->businessUnit->name }}</span>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @else
                {{-- Fallback: Original description format --}}
                <div class="max-w-4xl mx-auto">
                    <div class="prose prose-lg dark:prose-invert max-w-none dark:text-dark-300 text-dark-600" data-aos="fade-up">
                        {!! $portfolio->description !!}
                    </div>
                </div>
            @endif
        </div>
    </section>

    @if($portfolio->images->count() > 0)
        <section class="py-24 dark:bg-dark-950 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold dark:text-white text-dark-900 mb-12" data-aos="fade-up">Project Gallery</h2>
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
                <h2 class="text-3xl font-bold dark:text-white text-dark-900 mb-12" data-aos="fade-up">Related Case Studies</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($relatedPortfolios as $related)
                        <a href="{{ route('portfolio.show', $related) }}"
                            class="group aspect-square dark:bg-dark-800 bg-gray-50 rounded-2xl overflow-hidden card-hover shadow-sm"
                            data-aos="fade-up">
                            @if($related->featured_image)
                                <img src="{{ asset('storage/' . $related->featured_image) }}" alt="{{ $related->title }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t dark:from-dark-900 from-dark-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                <div class="absolute bottom-0 left-0 right-0 p-6 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all">
                                    <span class="text-white font-medium">{{ $related->title }}</span>
                                </div>
                            @else
                                <div
                                    class="w-full h-full bg-gradient-to-br from-primary-500/20 to-primary-500/5 flex items-center justify-center p-4 text-center">
                                    <span class="dark:text-white text-dark-900 font-medium">{{ $related->title }}</span>
                                </div>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection