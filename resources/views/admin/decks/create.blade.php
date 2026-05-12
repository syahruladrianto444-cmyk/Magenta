@extends('layouts.admin')

@section('title', 'Add Presentation Deck')

@section('content')
    <div class="mb-8">
        <a href="{{ route('admin.decks.index') }}"
            class="inline-flex items-center text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white mb-4">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i><span>Kembali</span>
        </a>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Add Presentation Deck</h1>
    </div>

    <form action="{{ route('admin.decks.store') }}" method="POST" enctype="multipart/form-data" class="max-w-3xl">
        @csrf

        <div class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 p-8 space-y-6 shadow-sm dark:shadow-none">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title *</label>
                <input type="text" name="title" value="{{ old('title') }}" required
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
                @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Business Unit</label>
                    <select name="business_unit"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
                        <option value="">-- Select Unit --</option>
                        <option value="M87" {{ old('business_unit') == 'M87' ? 'selected' : '' }}>M87</option>
                        <option value="BTC" {{ old('business_unit') == 'BTC' ? 'selected' : '' }}>BTC</option>
                        <option value="87 Studio" {{ old('business_unit') == '87 Studio' ? 'selected' : '' }}>87 Studio</option>
                        <option value="Gajah Contractor" {{ old('business_unit') == 'Gajah Contractor' ? 'selected' : '' }}>Gajah Contractor</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category</label>
                    <select name="category"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
                        <option value="">-- Select Category --</option>
                        <option value="Government" {{ old('category') == 'Government' ? 'selected' : '' }}>Government</option>
                        <option value="Brand Activation" {{ old('category') == 'Brand Activation' ? 'selected' : '' }}>Brand Activation</option>
                        <option value="Corporate Event" {{ old('category') == 'Corporate Event' ? 'selected' : '' }}>Corporate Event</option>
                        <option value="Team Building" {{ old('category') == 'Team Building' ? 'selected' : '' }}>Team Building</option>
                        <option value="Architecture" {{ old('category') == 'Architecture' ? 'selected' : '' }}>Architecture</option>
                        <option value="Company Profile" {{ old('category') == 'Company Profile' ? 'selected' : '' }}>Company Profile</option>
                        <option value="Proposal Deck" {{ old('category') == 'Proposal Deck' ? 'selected' : '' }}>Proposal Deck</option>
                        <option value="Media Kit" {{ old('category') == 'Media Kit' ? 'selected' : '' }}>Media Kit</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Short Description</label>
                <textarea name="short_description" rows="3"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">{{ old('short_description') }}</textarea>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Thumbnail Image</label>
                    <input type="file" name="thumbnail_image" accept="image/*"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white">
                    <p class="mt-1 text-xs text-gray-500">JPG, PNG. Max 5MB.</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">PDF File *</label>
                    <input type="file" name="pdf_file" accept=".pdf"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white">
                    <p class="mt-1 text-xs text-gray-500">PDF only. Max 50MB.</p>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
                </div>
                <div class="flex items-center pt-8">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                            class="w-5 h-5 rounded bg-gray-50 dark:bg-navy-900 border-gray-300 dark:border-navy-700 text-magenta-500">
                        <span class="ml-3 text-gray-700 dark:text-gray-300">Featured</span>
                    </label>
                </div>
                <div class="flex items-center pt-8">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                            class="w-5 h-5 rounded bg-gray-50 dark:bg-navy-900 border-gray-300 dark:border-navy-700 text-magenta-500">
                        <span class="ml-3 text-gray-700 dark:text-gray-300">Active</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center space-x-4">
            <button type="submit"
                class="px-8 py-3 bg-magenta-500 text-white font-semibold rounded-xl hover:bg-magenta-600 transition-colors">Save Deck</button>
            <a href="{{ route('admin.decks.index') }}"
                class="px-8 py-3 border border-gray-300 dark:border-navy-600 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-100 dark:hover:bg-navy-800 transition-colors">Cancel</a>
        </div>
    </form>
@endsection
