@extends('layouts.admin')

@section('title', 'Career')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Career</h1>
            <p class="text-gray-500 dark:text-gray-400">Kelola lowongan pekerjaan</p>
        </div>
        <a href="{{ route('admin.careers.create') }}"
            class="flex items-center px-6 py-3 bg-magenta-500 text-white font-semibold rounded-xl hover:bg-magenta-600 transition-colors">
            <i data-lucide="plus" class="w-5 h-5 mr-2"></i>
            <span>Add Career</span>
        </a>
    </div>

    <div class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 overflow-hidden shadow-sm dark:shadow-none">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-600 dark:text-gray-400 border-b border-gray-200 dark:border-navy-700 bg-gray-50 dark:bg-navy-900">
                        <th class="px-6 py-4">Title</th>
                        <th class="px-6 py-4">Department</th>
                        <th class="px-6 py-4">Location</th>
                        <th class="px-6 py-4">Type</th>
                        <th class="px-6 py-4">Deadline</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($careers as $career)
                        <tr class="border-b border-gray-100 dark:border-navy-700 hover:bg-gray-50 dark:hover:bg-navy-700/50 transition-colors">
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $career->title }}</td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $career->department ?? '-' }}</td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $career->location ?? '-' }}</td>
                            <td class="px-6 py-4"><span
                                    class="px-2 py-1 bg-magenta-500/10 text-magenta-500 dark:text-magenta-400 text-xs rounded-full">{{ ucfirst($career->type) }}</span>
                            </td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $career->deadline?->format('d M Y') ?? '-' }}</td>
                            <td class="px-6 py-4">
                                @if($career->is_active)
                                    <span class="px-2 py-1 bg-green-100 dark:bg-green-500/10 text-green-700 dark:text-green-500 text-xs font-semibold rounded-full">Active</span>
                                @else
                                    <span class="px-2 py-1 bg-gray-100 dark:bg-gray-500/10 text-gray-700 dark:text-gray-500 text-xs font-semibold rounded-full">Draft</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('admin.careers.edit', $career) }}"
                                        class="p-2 bg-gray-100 dark:bg-navy-600 rounded-lg hover:bg-magenta-500/10 hover:text-magenta-500 text-gray-600 dark:text-gray-300 transition-colors">
                                        <i data-lucide="pencil" class="w-4 h-4"></i>
                                    </a>
                                    <form action="{{ route('admin.careers.destroy', $career) }}" method="POST"
                                        onsubmit="return confirm('Yakin?')">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="p-2 bg-gray-100 dark:bg-navy-600 rounded-lg hover:bg-red-500/10 hover:text-red-500 text-gray-600 dark:text-gray-300 transition-colors">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-gray-500">Belum ada lowongan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($careers->hasPages())
        <div class="px-6 py-4 border-t border-gray-200 dark:border-navy-700">{{ $careers->links() }}</div>@endif
    </div>
@endsection