@extends('layouts.admin')

@section('title', 'Tambah Client')

@section('content')
    <div class="mb-8">
        <div class="flex items-center text-gray-500 dark:text-gray-400 mb-2">
            <a href="{{ route('admin.users.index') }}" class="hover:text-primary-500 transition-colors">User Management</a>
            <i data-lucide="chevron-right" class="w-4 h-4 mx-2"></i>
            <span class="text-gray-900 dark:text-white">Tambah Client</span>
        </div>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Tambah Client Baru</h1>
    </div>

    <div
        class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 shadow-sm dark:shadow-none p-8 max-w-2xl">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Nama <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors"
                        placeholder="Nama client...">
                    @error('name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Email <span
                            class="text-red-500">*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors"
                        placeholder="email@example.com">
                    @error('email') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Password <span
                            class="text-red-500">*</span></label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors"
                        placeholder="Minimal 6 karakter">
                    @error('password') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Konfirmasi Password
                        <span class="text-red-500">*</span></label>
                    <input type="password" name="password_confirmation" required
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors"
                        placeholder="Ulangi password">
                </div>
            </div>

            <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-200 dark:border-navy-700">
                <a href="{{ route('admin.users.index') }}"
                    class="px-6 py-3 bg-gray-100 dark:bg-navy-700 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-200 dark:hover:bg-navy-600 transition-colors">
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-3 bg-primary-500 hover:bg-primary-600 text-white font-semibold rounded-xl transition-colors shadow-lg shadow-primary-500/25">
                    Simpan Client
                </button>
            </div>
        </form>
    </div>
@endsection