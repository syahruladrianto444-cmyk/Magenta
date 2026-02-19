@extends('layouts.admin')

@section('title', isset($career) ? 'Edit Career' : 'Add Career')

@section('content')
    <div class="mb-8">
        <a href="{{ route('admin.careers.index') }}"
            class="inline-flex items-center text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white mb-4">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i><span>Kembali</span>
        </a>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ isset($career) ? 'Edit Career' : 'Add Career' }}
        </h1>
    </div>

    <form action="{{ isset($career) ? route('admin.careers.update', $career) : route('admin.careers.store') }}"
        method="POST" class="max-w-3xl">
        @csrf
        @if(isset($career)) @method('PUT') @endif

        <div
            class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 p-8 space-y-6 shadow-sm dark:shadow-none">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Job Title *</label>
                <input type="text" name="title" value="{{ old('title', $career->title ?? '') }}" required
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Department</label>
                    <input type="text" name="department" value="{{ old('department', $career->department ?? '') }}"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Location</label>
                    <input type="text" name="location" value="{{ old('location', $career->location ?? '') }}"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Type *</label>
                    <select name="type" required
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
                        <option value="full-time" {{ old('type', $career->type ?? '') == 'full-time' ? 'selected' : '' }}>
                            Full-time</option>
                        <option value="part-time" {{ old('type', $career->type ?? '') == 'part-time' ? 'selected' : '' }}>
                            Part-time</option>
                        <option value="contract" {{ old('type', $career->type ?? '') == 'contract' ? 'selected' : '' }}>
                            Contract</option>
                        <option value="internship" {{ old('type', $career->type ?? '') == 'internship' ? 'selected' : '' }}>
                            Internship</option>
                        <option value="freelance" {{ old('type', $career->type ?? '') == 'freelance' ? 'selected' : '' }}>
                            Freelance</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                <textarea name="description" rows="5"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">{{ old('description', $career->description ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Requirements (one per
                    line)</label>
                <textarea name="requirements" rows="5"
                    placeholder="Pengalaman minimal 2 tahun&#10;Menguasai PHP dan Laravel&#10;..."
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">{{ old('requirements', $career->requirements ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Benefits (one per
                    line)</label>
                <textarea name="benefits" rows="4" placeholder="Gaji kompetitif&#10;BPJS Kesehatan&#10;..."
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">{{ old('benefits', $career->benefits ?? '') }}</textarea>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Deadline</label>
                    <input type="date" name="deadline"
                        value="{{ old('deadline', isset($career) ? $career->deadline?->format('Y-m-d') : '') }}"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
                </div>
                <div class="flex items-center pt-8">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $career->is_active ?? true) ? 'checked' : '' }}
                            class="w-5 h-5 rounded bg-gray-50 dark:bg-navy-900 border-gray-300 dark:border-navy-700 text-magenta-500">
                        <span class="ml-3 text-gray-700 dark:text-gray-300">Active</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center space-x-4">
            <button type="submit"
                class="px-8 py-3 bg-magenta-500 text-white font-semibold rounded-xl hover:bg-magenta-600 transition-colors">{{ isset($career) ? 'Update' : 'Save' }}
                Career</button>
            <a href="{{ route('admin.careers.index') }}"
                class="px-8 py-3 border border-gray-300 dark:border-navy-600 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-100 dark:hover:bg-navy-800 transition-colors">Cancel</a>
        </div>
    </form>
@endsection