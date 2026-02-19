@extends('layouts.admin')

@section('title', 'User Management')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">User Management</h1>
            <p class="text-gray-500 dark:text-gray-400">Kelola akun client / PIC event</p>
        </div>
        <a href="{{ route('admin.users.create') }}"
            class="inline-flex items-center px-5 py-3 bg-primary-500 hover:bg-primary-600 text-white font-semibold rounded-xl transition-colors shadow-lg shadow-primary-500/25">
            <i data-lucide="user-plus" class="w-5 h-5 mr-2"></i>
            Tambah Client
        </a>
    </div>

    @if(session('success'))
        <div
            class="mb-6 p-4 bg-green-100 dark:bg-green-500/10 border border-green-200 dark:border-green-500/20 text-green-700 dark:text-green-400 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <div
        class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 overflow-hidden shadow-sm dark:shadow-none">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left bg-gray-50 dark:bg-navy-900 border-b border-gray-200 dark:border-navy-700">
                        <th
                            class="px-6 py-4 font-semibold text-gray-600 dark:text-gray-400 text-sm uppercase tracking-wider">
                            Nama</th>
                        <th
                            class="px-6 py-4 font-semibold text-gray-600 dark:text-gray-400 text-sm uppercase tracking-wider">
                            Email</th>
                        <th
                            class="px-6 py-4 font-semibold text-gray-600 dark:text-gray-400 text-sm uppercase tracking-wider">
                            Events</th>
                        <th
                            class="px-6 py-4 font-semibold text-gray-600 dark:text-gray-400 text-sm uppercase tracking-wider">
                            Dibuat</th>
                        <th
                            class="px-6 py-4 font-semibold text-gray-600 dark:text-gray-400 text-sm uppercase tracking-wider text-right">
                            Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr
                            class="border-b border-gray-100 dark:border-navy-700 hover:bg-gray-50 dark:hover:bg-navy-700/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 bg-primary-500/10 text-primary-500 rounded-full flex items-center justify-center font-bold mr-3">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <span class="font-semibold text-gray-900 dark:text-white">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 dark:bg-blue-500/10 text-blue-700 dark:text-blue-400 border border-blue-200 dark:border-blue-500/20">
                                    {{ $user->events_count }} event{{ $user->events_count !== 1 ? 's' : '' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-400 text-sm">
                                {{ $user->created_at->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.users.edit', $user) }}"
                                        class="p-2 bg-blue-500/10 text-blue-500 rounded-lg hover:bg-blue-500/20 transition-colors">
                                        <i data-lucide="pencil" class="w-4 h-4"></i>
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                        onsubmit="return confirm('Hapus client ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 bg-red-500/10 text-red-500 rounded-lg hover:bg-red-500/20 transition-colors">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
                                <i data-lucide="users" class="w-12 h-12 mx-auto mb-4 opacity-50"></i>
                                <p class="text-lg font-medium">Belum ada client</p>
                                <p class="text-sm">Klik "Tambah Client" untuk membuat akun client baru.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection