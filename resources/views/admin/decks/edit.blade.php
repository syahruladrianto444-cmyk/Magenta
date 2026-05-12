@extends('layouts.admin')

@section('title', 'Edit Presentation Deck')

@section('content')
    <div class="mb-8">
        <a href="{{ route('admin.decks.index') }}"
            class="inline-flex items-center text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white mb-4">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i><span>Kembali</span>
        </a>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Edit Presentation Deck</h1>
    </div>

    <form action="{{ route('admin.decks.update', $deck) }}" method="POST" enctype="multipart/form-data" class="max-w-3xl">
        @csrf @method('PUT')

        <div class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 p-8 space-y-6 shadow-sm dark:shadow-none">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title *</label>
                <input type="text" name="title" value="{{ old('title', $deck->title) }}" required
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
                @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Business Unit</label>
                    <select name="business_unit"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
                        <option value="">-- Select Unit --</option>
                        @foreach(['M87', 'BTC', '87 Studio', 'Gajah Contractor'] as $unit)
                            <option value="{{ $unit }}" {{ old('business_unit', $deck->business_unit) == $unit ? 'selected' : '' }}>{{ $unit }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category</label>
                    <select name="category"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
                        <option value="">-- Select Category --</option>
                        @foreach(['Government', 'Brand Activation', 'Corporate Event', 'Team Building', 'Architecture', 'Company Profile', 'Proposal Deck', 'Media Kit'] as $cat)
                            <option value="{{ $cat }}" {{ old('category', $deck->category) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Short Description</label>
                <textarea name="short_description" rows="3"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">{{ old('short_description', $deck->short_description) }}</textarea>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Thumbnail Image</label>
                    @if($deck->thumbnail_image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $deck->thumbnail_image) }}" alt="Thumbnail"
                                class="w-32 h-24 object-cover rounded-lg border border-gray-200 dark:border-navy-700">
                        </div>
                    @endif
                    <input type="file" name="thumbnail_image" accept="image/*"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white">
                    <p class="mt-1 text-xs text-gray-500">Biarkan kosong jika tidak ingin mengubah.</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">PDF File</label>
                    @if($deck->pdf_file)
                        <div class="mb-3">
                            <a href="{{ asset('storage/' . $deck->pdf_file) }}" target="_blank"
                                class="inline-flex items-center text-primary-500 text-sm hover:underline">
                                <i data-lucide="file-text" class="w-4 h-4 mr-1"></i>Lihat PDF saat ini
                            </a>
                        </div>
                    @endif
                    <input type="file" name="pdf_file" accept=".pdf"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white">
                    <p class="mt-1 text-xs text-gray-500">Biarkan kosong jika tidak ingin mengubah.</p>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $deck->sort_order) }}"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
                </div>
                <div class="flex items-center pt-8">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $deck->is_featured) ? 'checked' : '' }}
                            class="w-5 h-5 rounded bg-gray-50 dark:bg-navy-900 border-gray-300 dark:border-navy-700 text-magenta-500">
                        <span class="ml-3 text-gray-700 dark:text-gray-300">Featured</span>
                    </label>
                </div>
                <div class="flex items-center pt-8">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $deck->is_active) ? 'checked' : '' }}
                            class="w-5 h-5 rounded bg-gray-50 dark:bg-navy-900 border-gray-300 dark:border-navy-700 text-magenta-500">
                        <span class="ml-3 text-gray-700 dark:text-gray-300">Active</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center space-x-4">
            <button type="submit"
                class="px-8 py-3 bg-magenta-500 text-white font-semibold rounded-xl hover:bg-magenta-600 transition-colors">Update Deck</button>
            <a href="{{ route('admin.decks.index') }}"
                class="px-8 py-3 border border-gray-300 dark:border-navy-600 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-100 dark:hover:bg-navy-800 transition-colors">Cancel</a>
        </div>
    </form>
@endsection
