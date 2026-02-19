@extends('layouts.admin')

@section('title', isset($unit) ? 'Edit Unit' : 'Add Unit')

@section('content')
    <div class="mb-8">
        <a href="{{ route('admin.units.index') }}"
            class="inline-flex items-center text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white mb-4">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i><span>Kembali</span>
        </a>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ isset($unit) ? 'Edit Unit' : 'Add Unit' }}</h1>
    </div>

    <form action="{{ isset($unit) ? route('admin.units.update', $unit) : route('admin.units.store') }}" method="POST"
        enctype="multipart/form-data" class="max-w-3xl">
        @csrf
        @if(isset($unit)) @method('PUT') @endif

        <div
            class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 p-8 space-y-6 shadow-sm dark:shadow-none">
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Name *</label>
                    <input type="text" name="name" value="{{ old('name', $unit->name ?? '') }}" required
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tagline</label>
                    <input type="text" name="tagline" value="{{ old('tagline', $unit->tagline ?? '') }}"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                <textarea name="description" rows="5"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">{{ old('description', $unit->description ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Services List (one per
                    line)</label>
                <textarea name="services_list" rows="4" placeholder="Event Organizer&#10;Wedding Organizer&#10;..."
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">{{ old('services_list', $unit->services_list ?? '') }}</textarea>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Instagram
                        Username</label>
                    <input type="text" name="instagram" value="{{ old('instagram', $unit->instagram ?? '') }}"
                        placeholder="username (without @)"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Website URL</label>
                    <input type="url" name="website" value="{{ old('website', $unit->website ?? '') }}"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Brand Color</label>
                    <input type="color" name="color" value="{{ old('color', $unit->color ?? '#E91E8C') }}"
                        class="w-full h-12 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $unit->sort_order ?? 0) }}"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Logo</label>
                @if(isset($unit) && $unit->logo)
                <div class="mb-3"><img src="{{ asset('storage/' . $unit->logo) }}" alt="" class="h-16"></div>@endif
                <input type="file" name="logo" accept="image/*"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-magenta-500 file:text-white">
            </div>

            <div class="flex items-center">
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $unit->is_active ?? true) ? 'checked' : '' }}
                        class="w-5 h-5 rounded bg-gray-50 dark:bg-navy-900 border-gray-300 dark:border-navy-700 text-magenta-500">
                    <span class="ml-3 text-gray-700 dark:text-gray-300">Active</span>
                </label>
            </div>
        </div>

        <div class="mt-6 flex items-center space-x-4">
            <button type="submit"
                class="px-8 py-3 bg-magenta-500 text-white font-semibold rounded-xl hover:bg-magenta-600 transition-colors">{{ isset($unit) ? 'Update' : 'Save' }}
                Unit</button>
            <a href="{{ route('admin.units.index') }}"
                class="px-8 py-3 border border-gray-300 dark:border-navy-600 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-100 dark:hover:bg-navy-800 transition-colors">Cancel</a>
        </div>
    </form>
@endsection