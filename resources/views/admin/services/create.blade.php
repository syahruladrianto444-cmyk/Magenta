@extends('layouts.admin')

@section('title', isset($service) ? 'Edit Service' : 'Add Service')

@section('content')
    <div class="mb-8">
        <a href="{{ route('admin.services.index') }}"
            class="inline-flex items-center text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white mb-4">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i><span>Kembali</span>
        </a>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ isset($service) ? 'Edit Service' : 'Add Service' }}
        </h1>
    </div>

    <form action="{{ isset($service) ? route('admin.services.update', $service) : route('admin.services.store') }}"
        method="POST" class="max-w-3xl">
        @csrf
        @if(isset($service)) @method('PUT') @endif

        <div
            class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 p-8 space-y-6 shadow-sm dark:shadow-none">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title *</label>
                <input type="text" name="title" value="{{ old('title', $service->title ?? '') }}" required
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Icon (Lucide icon
                    name)</label>
                <input type="text" name="icon" value="{{ old('icon', $service->icon ?? 'briefcase') }}"
                    placeholder="briefcase, calendar, users..."
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
                <p class="mt-1 text-sm text-gray-500">Icons: <a href="https://lucide.dev/icons" target="_blank"
                        class="text-magenta-500">lucide.dev/icons</a></p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Excerpt</label>
                <textarea name="excerpt" rows="3"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">{{ old('excerpt', $service->excerpt ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                <textarea name="description" rows="8"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">{{ old('description', $service->description ?? '') }}</textarea>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $service->sort_order ?? 0) }}"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
                </div>
                <div class="flex items-center pt-8">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }}
                            class="w-5 h-5 rounded bg-gray-50 dark:bg-navy-900 border-gray-300 dark:border-navy-700 text-magenta-500">
                        <span class="ml-3 text-gray-700 dark:text-gray-300">Active</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center space-x-4">
            <button type="submit"
                class="px-8 py-3 bg-magenta-500 text-white font-semibold rounded-xl hover:bg-magenta-600 transition-colors">{{ isset($service) ? 'Update' : 'Save' }}
                Service</button>
            <a href="{{ route('admin.services.index') }}"
                class="px-8 py-3 border border-gray-300 dark:border-navy-600 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-100 dark:hover:bg-navy-800 transition-colors">Cancel</a>
        </div>
    </form>
@endsection