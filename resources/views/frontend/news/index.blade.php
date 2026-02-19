@extends('layouts.app')

@section('title', 'News & Insight - MAGENTA')

@section('content')
    <section class="relative pt-32 pb-20 dark:bg-dark-950 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl" data-aos="fade-right">
                <div
                    class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6">
                    News & Insight
                </div>
                <h1 class="text-5xl md:text-6xl font-bold dark:text-white text-dark-900 mb-6">Berita & <span
                        class="text-gradient">Insight</span></h1>
                <p class="text-xl dark:text-dark-300 text-dark-600">Update terbaru dari MAGENTA dan industri.</p>
            </div>
        </div>
    </section>

    <section class="py-24 dark:bg-dark-900 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($news->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($news as $index => $article)
                        <a href="{{ route('news.show', $article) }}"
                            class="group dark:bg-dark-800 bg-gray-50 rounded-2xl overflow-hidden dark:border-dark-700 border-gray-200 border card-hover shadow-sm"
                            data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                            <div class="aspect-video bg-gradient-to-br from-primary-500/20 to-primary-500/5">
                                @if($article->featured_image)
                                    <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @endif
                            </div>
                            <div class="p-6">
                                <div class="flex items-center gap-4 text-sm dark:text-dark-400 text-dark-500 mb-3">
                                    @if($article->category)<span class="text-primary-500">{{ $article->category }}</span>@endif
                                    @if($article->published_at)<span>{{ $article->published_at->format('d M Y') }}</span>@endif
                                </div>
                                <h3
                                    class="text-xl font-bold dark:text-white text-dark-900 mb-3 group-hover:text-primary-500 transition-colors">
                                    {{ $article->title }}
                                </h3>
                                <p class="dark:text-dark-400 text-dark-600 line-clamp-2">{{ $article->excerpt }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="mt-12">{{ $news->links() }}</div>
            @else
                <div class="text-center py-20">
                    <i data-lucide="newspaper" class="w-16 h-16 dark:text-dark-600 text-dark-400 mx-auto mb-4"></i>
                    <h3 class="text-xl dark:text-white text-dark-900 mb-2">Belum Ada Berita</h3>
                    <p class="dark:text-dark-400 text-dark-600">Berita akan segera ditambahkan.</p>
                </div>
            @endif
        </div>
    </section>
@endsection