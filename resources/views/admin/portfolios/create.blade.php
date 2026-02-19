@extends('layouts.admin')

@section('title', 'Add Portfolio')

@section('content')
    <div class="mb-8">
        <a href="{{ route('admin.portfolios.index') }}"
            class="inline-flex items-center text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white mb-4">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
            <span>Kembali</span>
        </a>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Add Portfolio</h1>
    </div>

    <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data" class="max-w-4xl">
        @csrf

        <div
            class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 p-8 space-y-6 shadow-sm dark:shadow-none">
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title *</label>
                    <input type="text" name="title" value="{{ old('title') }}" required
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 focus:ring-1 focus:ring-magenta-500 outline-none">
                    @error('title')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Client</label>
                    <input type="text" name="client" value="{{ old('client') }}"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 focus:ring-1 focus:ring-magenta-500 outline-none">
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Business Unit</label>
                    <select name="business_unit_id"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 focus:ring-1 focus:ring-magenta-500 outline-none">
                        <option value="">-- Select Unit --</option>
                        @foreach($units as $unit)
                            <option value="{{ $unit->id }}" {{ old('business_unit_id') == $unit->id ? 'selected' : '' }}>
                                {{ $unit->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Service</label>
                    <select name="service_id"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 focus:ring-1 focus:ring-magenta-500 outline-none">
                        <option value="">-- Select Service --</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                {{ $service->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Project Date</label>
                    <input type="date" name="project_date" value="{{ old('project_date') }}"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 focus:ring-1 focus:ring-magenta-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Location</label>
                    <input type="text" name="location" value="{{ old('location') }}"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 focus:ring-1 focus:ring-magenta-500 outline-none">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                <textarea name="description" rows="6"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 focus:ring-1 focus:ring-magenta-500 outline-none">{{ old('description') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Featured Image</label>
                <input type="file" name="featured_image" accept="image/*"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-magenta-500 file:text-white">
            </div>

            <div class="flex items-center space-x-6">
                <label class="flex items-center">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                        class="w-5 h-5 rounded bg-gray-50 dark:bg-navy-900 border-gray-300 dark:border-navy-700 text-magenta-500 focus:ring-magenta-500">
                    <span class="ml-3 text-gray-700 dark:text-gray-300">Featured</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                        class="w-5 h-5 rounded bg-gray-50 dark:bg-navy-900 border-gray-300 dark:border-navy-700 text-magenta-500 focus:ring-magenta-500">
                    <span class="ml-3 text-gray-700 dark:text-gray-300">Active</span>
                </label>
            </div>
        </div>

        <div class="mt-6 flex items-center space-x-4">
            <button type="submit"
                class="px-8 py-3 bg-magenta-500 text-white font-semibold rounded-xl hover:bg-magenta-600 transition-colors">
                Save Portfolio
            </button>
            <a href="{{ route('admin.portfolios.index') }}"
                class="px-8 py-3 border border-gray-300 dark:border-navy-600 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-100 dark:hover:bg-navy-800 transition-colors">
                Cancel
            </a>
        </div>
    </form>
@endsection