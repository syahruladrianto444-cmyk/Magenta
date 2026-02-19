@extends('layouts.admin')

@section('title', 'Partners')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Partners & Clients</h1>
            <p class="text-gray-500 dark:text-gray-400">Kelola partner dan klien</p>
        </div>
        <a href="{{ route('admin.partners.create') }}"
            class="flex items-center px-6 py-3 bg-magenta-500 text-white font-semibold rounded-xl hover:bg-magenta-600 transition-colors">
            <i data-lucide="plus" class="w-5 h-5 mr-2"></i>
            <span>Add Partner</span>
        </a>
    </div>

    <div class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 overflow-hidden shadow-sm dark:shadow-none">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-600 dark:text-gray-400 border-b border-gray-200 dark:border-navy-700 bg-gray-50 dark:bg-navy-900">
                        <th class="px-6 py-4">Logo</th>
                        <th class="px-6 py-4">Name</th>
                        <th class="px-6 py-4">Type</th>
                        <th class="px-6 py-4">Website</th>
                        <th class="px-6 py-4">Order</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($partners as $partner)
                        <tr class="border-b border-gray-100 dark:border-navy-700 hover:bg-gray-50 dark:hover:bg-navy-700/50 transition-colors">
                            <td class="px-6 py-4">
                                @if($partner->logo)
                                    <img src="{{ asset('storage/' . $partner->logo) }}" alt="" class="h-10 w-auto">
                                @else
                                    <div class="w-10 h-10 bg-gray-100 dark:bg-navy-600 rounded-lg flex items-center justify-center">
                                        <span class="text-sm font-bold text-gray-500 dark:text-gray-400">{{ substr($partner->name, 0, 2) }}</span>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $partner->name }}</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2 py-1 bg-{{ $partner->type == 'client' ? 'blue' : ($partner->type == 'partner' ? 'purple' : 'green') }}-500/10 text-{{ $partner->type == 'client' ? 'blue' : ($partner->type == 'partner' ? 'purple' : 'green') }}-500 text-xs rounded-full">{{ ucfirst($partner->type) }}</span>
                            </td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-400">
                                {{ $partner->website ? Str::limit($partner->website, 30) : '-' }}</td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $partner->sort_order }}</td>
                            <td class="px-6 py-4">
                                @if($partner->is_active)
                                    <span class="px-2 py-1 bg-green-100 dark:bg-green-500/10 text-green-700 dark:text-green-500 text-xs font-semibold rounded-full">Active</span>
                                @else
                                    <span class="px-2 py-1 bg-gray-100 dark:bg-gray-500/10 text-gray-700 dark:text-gray-500 text-xs font-semibold rounded-full">Draft</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('admin.partners.edit', $partner) }}"
                                        class="p-2 bg-gray-100 dark:bg-navy-600 rounded-lg hover:bg-magenta-500/10 hover:text-magenta-500 text-gray-600 dark:text-gray-300 transition-colors">
                                        <i data-lucide="pencil" class="w-4 h-4"></i>
                                    </a>
                                    <form action="{{ route('admin.partners.destroy', $partner) }}" method="POST"
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
                            <td colspan="7" class="px-6 py-12 text-center text-gray-500">Belum ada partner.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($partners->hasPages())
        <div class="px-6 py-4 border-t border-gray-200 dark:border-navy-700">{{ $partners->links() }}</div>@endif
    </div>
@endsection