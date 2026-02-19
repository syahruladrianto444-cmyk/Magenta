@extends('layouts.admin')

@section('title', isset($partner) ? 'Edit Partner' : 'Add Partner')

@section('content')
    <div class="mb-8">
        <a href="{{ route('admin.partners.index') }}"
            class="inline-flex items-center text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white mb-4">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i><span>Kembali</span>
        </a>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ isset($partner) ? 'Edit Partner' : 'Add Partner' }}
        </h1>
    </div>

    <form action="{{ isset($partner) ? route('admin.partners.update', $partner) : route('admin.partners.store') }}"
        method="POST" enctype="multipart/form-data" class="max-w-3xl">
        @csrf
        @if(isset($partner)) @method('PUT') @endif

        <div
            class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 p-8 space-y-6 shadow-sm dark:shadow-none">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Name *</label>
                <input type="text" name="name" value="{{ old('name', $partner->name ?? '') }}" required
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Type *</label>
                    <select name="type" required
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
                        <option value="client" {{ old('type', $partner->type ?? '') == 'client' ? 'selected' : '' }}>Client
                        </option>
                        <option value="partner" {{ old('type', $partner->type ?? '') == 'partner' ? 'selected' : '' }}>Partner
                        </option>
                        <option value="community" {{ old('type', $partner->type ?? '') == 'community' ? 'selected' : '' }}>
                            Community</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Website</label>
                    <input type="url" name="website" value="{{ old('website', $partner->website ?? '') }}"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                <textarea name="description" rows="3"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">{{ old('description', $partner->description ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Logo</label>
                @if(isset($partner) && $partner->logo)
                <div class="mb-3"><img src="{{ asset('storage/' . $partner->logo) }}" alt="" class="h-16"></div>@endif
                <input type="file" name="logo" accept="image/*"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-magenta-500 file:text-white">
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $partner->sort_order ?? 0) }}"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
                </div>
                <div class="flex items-center pt-8">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $partner->is_active ?? true) ? 'checked' : '' }}
                            class="w-5 h-5 rounded bg-gray-50 dark:bg-navy-900 border-gray-300 dark:border-navy-700 text-magenta-500">
                        <span class="ml-3 text-gray-700 dark:text-gray-300">Active</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center space-x-4">
            <button type="submit"
                class="px-8 py-3 bg-magenta-500 text-white font-semibold rounded-xl hover:bg-magenta-600 transition-colors">{{ isset($partner) ? 'Update' : 'Save' }}
                Partner</button>
            <a href="{{ route('admin.partners.index') }}"
                class="px-8 py-3 border border-gray-300 dark:border-navy-600 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-100 dark:hover:bg-navy-800 transition-colors">Cancel</a>
        </div>
    </form>
@endsection