@extends('layouts.admin')

@section('title', 'Presentation Decks')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Presentation Decks</h1>
            <p class="mt-1 text-gray-500 dark:text-gray-400">Kelola company profile & presentation deck.</p>
        </div>
        <a href="{{ route('admin.decks.create') }}"
            class="inline-flex items-center px-6 py-3 bg-primary-500 text-white font-semibold rounded-xl hover:bg-primary-600 transition-colors">
            <i data-lucide="plus" class="w-5 h-5 mr-2"></i>Add Deck
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 px-4 py-3 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 overflow-hidden shadow-sm">
        <table class="w-full">
            <thead class="bg-gray-50 dark:bg-navy-900 border-b border-gray-200 dark:border-navy-700">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Deck</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Unit</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Category</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Status</th>
                    <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-navy-700">
                @forelse($decks as $deck)
                    <tr class="hover:bg-gray-50 dark:hover:bg-navy-900/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-4">
                                @if($deck->thumbnail_image)
                                    <img src="{{ asset('storage/' . $deck->thumbnail_image) }}" alt="{{ $deck->title }}"
                                        class="w-16 h-12 object-cover rounded-lg border border-gray-200 dark:border-navy-700">
                                @else
                                    <div class="w-16 h-12 bg-gray-100 dark:bg-navy-700 rounded-lg flex items-center justify-center">
                                        <i data-lucide="file-text" class="w-5 h-5 text-gray-400"></i>
                                    </div>
                                @endif
                                <div>
                                    <div class="font-semibold text-gray-900 dark:text-white">{{ $deck->title }}</div>
                                    @if($deck->is_featured)
                                        <span class="inline-block px-2 py-0.5 bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-400 text-xs rounded-full">Featured</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">{{ $deck->business_unit ?? '-' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">{{ $deck->category ?? '-' }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs font-medium rounded-full {{ $deck->is_active ? 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400' : 'bg-gray-100 dark:bg-gray-800 text-gray-500' }}">
                                {{ $deck->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end space-x-2">
                                <a href="{{ route('admin.decks.edit', $deck) }}"
                                    class="p-2 text-gray-400 hover:text-magenta-500 transition-colors">
                                    <i data-lucide="edit-3" class="w-4 h-4"></i>
                                </a>
                                <form action="{{ route('admin.decks.destroy', $deck) }}" method="POST"
                                    onsubmit="return confirm('Hapus deck ini?')">
                                    @csrf @method('DELETE')
                                    <button class="p-2 text-gray-400 hover:text-red-500 transition-colors">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
                            Belum ada presentation deck.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if($decks->hasPages())
            <div class="px-6 py-4 border-t border-gray-200 dark:border-navy-700">{{ $decks->links() }}</div>
        @endif
    </div>
@endsection
