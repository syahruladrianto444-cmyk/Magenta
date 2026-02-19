@extends('layouts.admin')

@section('title', isset($news) ? 'Edit News' : 'Add News')

@section('content')
    <div class="mb-8">
        <a href="{{ route('admin.news.index') }}"
            class="inline-flex items-center text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white mb-4">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i><span>Kembali</span>
        </a>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ isset($news) ? 'Edit News' : 'Add News' }}</h1>
    </div>

    <form action="{{ isset($news) ? route('admin.news.update', $news) : route('admin.news.store') }}" method="POST"
        enctype="multipart/form-data" class="max-w-3xl">
        @csrf
        @if(isset($news)) @method('PUT') @endif

        <div
            class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 p-8 space-y-6 shadow-sm dark:shadow-none">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title *</label>
                <input type="text" name="title" value="{{ old('title', $news->title ?? '') }}" required
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category</label>
                    <input type="text" name="category" value="{{ old('category', $news->category ?? '') }}"
                        placeholder="News, Insight, Update..."
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Published Date</label>
                    <input type="date" name="published_at"
                        value="{{ old('published_at', isset($news) ? $news->published_at?->format('Y-m-d') : date('Y-m-d')) }}"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Excerpt</label>
                <textarea name="excerpt" rows="3"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">{{ old('excerpt', $news->excerpt ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Content</label>
                <textarea name="content" rows="12"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">{{ old('content', $news->content ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Featured Image</label>
                @if(isset($news) && $news->featured_image)
                    <div class="mb-3"><img src="{{ asset('storage/' . $news->featured_image) }}" alt=""
                class="w-40 h-28 object-cover rounded-xl"></div>@endif
                <input type="file" name="featured_image" accept="image/*"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-magenta-500 file:text-white">
            </div>

            <div class="flex items-center">
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $news->is_active ?? true) ? 'checked' : '' }}
                        class="w-5 h-5 rounded bg-gray-50 dark:bg-navy-900 border-gray-300 dark:border-navy-700 text-magenta-500">
                    <span class="ml-3 text-gray-700 dark:text-gray-300">Active</span>
                </label>
            </div>
        </div>

        <div class="mt-6 flex items-center space-x-4">
            <button type="submit"
                class="px-8 py-3 bg-magenta-500 text-white font-semibold rounded-xl hover:bg-magenta-600 transition-colors">{{ isset($news) ? 'Update' : 'Save' }}
                News</button>
            <a href="{{ route('admin.news.index') }}"
                class="px-8 py-3 border border-gray-300 dark:border-navy-600 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-100 dark:hover:bg-navy-800 transition-colors">Cancel</a>
        </div>
    </form>
@endsection