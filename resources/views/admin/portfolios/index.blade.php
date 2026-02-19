@extends('layouts.admin')

@section('title', 'Portfolio')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Portfolio</h1>
            <p class="text-gray-500 dark:text-gray-400">Kelola portfolio proyek</p>
        </div>
        <a href="{{ route('admin.portfolios.create') }}"
            class="flex items-center px-6 py-3 bg-magenta-500 text-white font-semibold rounded-xl hover:bg-magenta-600 transition-colors">
            <i data-lucide="plus" class="w-5 h-5 mr-2"></i>
            <span>Add Portfolio</span>
        </a>
    </div>

    <div class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 overflow-hidden shadow-sm dark:shadow-none">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-600 dark:text-gray-400 border-b border-gray-200 dark:border-navy-700 bg-gray-50 dark:bg-navy-900">
                        <th class="px-6 py-4">Title</th>
                        <th class="px-6 py-4">Unit</th>
                        <th class="px-6 py-4">Client</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Featured</th>
                        <th class="px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($portfolios as $portfolio)
                        <tr class="border-b border-gray-100 dark:border-navy-700 hover:bg-gray-50 dark:hover:bg-navy-700/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    @if($portfolio->featured_image)
                                        <img src="{{ asset('storage/' . $portfolio->featured_image) }}" alt=""
                                            class="w-12 h-12 rounded-lg object-cover mr-3">
                                    @else
                                        <div class="w-12 h-12 bg-gray-100 dark:bg-navy-600 rounded-lg mr-3 flex items-center justify-center">
                                            <i data-lucide="image" class="w-5 h-5 text-gray-400 dark:text-gray-500"></i>
                                        </div>
                                    @endif
                                    <span class="font-medium text-gray-900 dark:text-white">{{ $portfolio->title }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $portfolio->businessUnit->name ?? '-' }}</td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $portfolio->client ?? '-' }}</td>
                            <td class="px-6 py-4">
                                @if($portfolio->is_active)
                                    <span class="px-2 py-1 bg-green-100 dark:bg-green-500/10 text-green-700 dark:text-green-500 text-xs font-semibold rounded-full">Active</span>
                                @else
                                    <span class="px-2 py-1 bg-gray-100 dark:bg-gray-500/10 text-gray-700 dark:text-gray-500 text-xs font-semibold rounded-full">Draft</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($portfolio->is_featured)
                                    <i data-lucide="star" class="w-5 h-5 text-yellow-500"></i>
                                @else
                                    <i data-lucide="star" class="w-5 h-5 text-gray-300 dark:text-gray-600"></i>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('admin.portfolios.edit', $portfolio) }}"
                                        class="p-2 bg-gray-100 dark:bg-navy-600 rounded-lg hover:bg-magenta-500/10 hover:text-magenta-500 text-gray-600 dark:text-gray-300 transition-colors">
                                        <i data-lucide="pencil" class="w-4 h-4"></i>
                                    </a>
                                    <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus?')">
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
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">Belum ada portfolio.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($portfolios->hasPages())
            <div class="px-6 py-4 border-t border-gray-200 dark:border-navy-700">
                {{ $portfolios->links() }}
            </div>
        @endif
    </div>
@endsection