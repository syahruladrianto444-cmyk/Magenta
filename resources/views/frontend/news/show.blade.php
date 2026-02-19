@extends('layouts.app')

@section('title', $news->meta_title ?? $news->title . ' - MAGENTA')

@section('content')
    <section class="relative pt-32 pb-20 dark:bg-dark-950 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up">
                <a href="{{ route('news.index') }}"
                    class="inline-flex items-center dark:text-dark-400 text-dark-500 hover:text-primary-500 mb-6 transition-colors">
                    <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                    <span>Kembali ke Berita</span>
                </a>
                <div class="flex items-center gap-4 text-sm mb-4">
                    @if($news->category)<span
                    class="px-3 py-1 bg-primary-500/20 text-primary-500 rounded-full">{{ $news->category }}</span>@endif
                    @if($news->published_at)<span
                    class="dark:text-dark-400 text-dark-500">{{ $news->published_at->format('d F Y') }}</span>@endif
                </div>
                <h1 class="text-4xl md:text-5xl font-bold dark:text-white text-dark-900 mb-6">{{ $news->title }}</h1>
                @if($news->author)
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-primary-500/20 rounded-full flex items-center justify-center">
                            <span class="text-primary-500 font-medium">{{ substr($news->author->name, 0, 1) }}</span>
                        </div>
                        <span class="dark:text-dark-300 text-dark-600">{{ $news->author->name }}</span>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="py-24 dark:bg-dark-900 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($news->featured_image)
                <div class="aspect-video dark:bg-dark-800 bg-gray-100 rounded-2xl overflow-hidden mb-12" data-aos="fade-up">
                    <img src="{{ asset('storage/' . $news->featured_image) }}" alt="{{ $news->title }}"
                        class="w-full h-full object-cover">
                </div>
            @endif
            <div class="prose prose-lg dark:prose-invert max-w-none dark:text-dark-300 text-dark-600" data-aos="fade-up">
                {!! $news->content !!}</div>
        </div>
    </section>

    @if($relatedNews->count() > 0)
        <section class="py-24 dark:bg-dark-950 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold dark:text-white text-dark-900 mb-12" data-aos="fade-up">Artikel Terkait</h2>
                <div class="grid md:grid-cols-3 gap-6">
                    @foreach($relatedNews as $related)
                        <a href="{{ route('news.show', $related) }}"
                            class="group dark:bg-dark-800 bg-white rounded-2xl overflow-hidden dark:border-dark-700 border-gray-200 border card-hover shadow-sm"
                            data-aos="fade-up">
                            <div class="aspect-video bg-gradient-to-br from-primary-500/20 to-primary-500/5"></div>
                            <div class="p-6">
                                <h3
                                    class="text-lg font-bold dark:text-white text-dark-900 group-hover:text-primary-500 transition-colors">
                                    {{ $related->title }}</h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection