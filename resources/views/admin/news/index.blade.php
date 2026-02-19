@extends('layouts.admin')

@section('title', 'News')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">News & Insight</h1>
            <p class="text-gray-500 dark:text-gray-400">Kelola berita dan artikel</p>
        </div>
        <a href="{{ route('admin.news.create') }}"
            class="flex items-center px-6 py-3 bg-magenta-500 text-white font-semibold rounded-xl hover:bg-magenta-600 transition-colors">
            <i data-lucide="plus" class="w-5 h-5 mr-2"></i>
            <span>Add News</span>
        </a>
    </div>

    <div class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 overflow-hidden shadow-sm dark:shadow-none">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-600 dark:text-gray-400 border-b border-gray-200 dark:border-navy-700 bg-gray-50 dark:bg-navy-900">
                        <th class="px-6 py-4">Title</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="px-6 py-4">Published</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($news as $article)
                        <tr class="border-b border-gray-100 dark:border-navy-700 hover:bg-gray-50 dark:hover:bg-navy-700/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    @if($article->featured_image)
                                        <img src="{{ asset('storage/' . $article->featured_image) }}" alt=""
                                            class="w-12 h-12 rounded-lg object-cover mr-3">
                                    @else
                                        <div class="w-12 h-12 bg-gray-100 dark:bg-navy-600 rounded-lg mr-3 flex items-center justify-center">
                                            <i data-lucide="newspaper" class="w-5 h-5 text-gray-400 dark:text-gray-500"></i>
                                        </div>
                                    @endif
                                    <span class="font-medium text-gray-900 dark:text-white">{{ Str::limit($article->title, 40) }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $article->category ?? '-' }}</td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $article->published_at?->format('d M Y') ?? '-' }}</td>
                            <td class="px-6 py-4">
                                @if($article->is_active)
                                    <span class="px-2 py-1 bg-green-100 dark:bg-green-500/10 text-green-700 dark:text-green-500 text-xs font-semibold rounded-full">Active</span>
                                @else
                                    <span class="px-2 py-1 bg-gray-100 dark:bg-gray-500/10 text-gray-700 dark:text-gray-500 text-xs font-semibold rounded-full">Draft</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('admin.news.edit', $article) }}"
                                        class="p-2 bg-gray-100 dark:bg-navy-600 rounded-lg hover:bg-magenta-500/10 hover:text-magenta-500 text-gray-600 dark:text-gray-300 transition-colors">
                                        <i data-lucide="pencil" class="w-4 h-4"></i>
                                    </a>
                                    <form action="{{ route('admin.news.destroy', $article) }}" method="POST"
                                        onsubmit="return confirm('Yakin?')">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="p-2 bg-gray-100 dark:bg-navy-600 rounded-lg hover:bg-red-500/10 hover:text-red-500 text-gray-600 dark:text-gray-300 transition-colors">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500">Belum ada berita.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($news->hasPages())
        <div class="px-6 py-4 border-t border-gray-200 dark:border-navy-700">{{ $news->links() }}</div>@endif
    </div>
@endsection