@extends('layouts.admin')

@section('title', 'Business Units')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Business Units</h1>
            <p class="text-gray-500 dark:text-gray-400">Kelola unit bisnis perusahaan</p>
        </div>
        <a href="{{ route('admin.units.create') }}"
            class="flex items-center px-6 py-3 bg-magenta-500 text-white font-semibold rounded-xl hover:bg-magenta-600 transition-colors">
            <i data-lucide="plus" class="w-5 h-5 mr-2"></i>
            <span>Add Unit</span>
        </a>
    </div>

    <div class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 overflow-hidden shadow-sm dark:shadow-none">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-600 dark:text-gray-400 border-b border-gray-200 dark:border-navy-700 bg-gray-50 dark:bg-navy-900">
                        <th class="px-6 py-4">Name</th>
                        <th class="px-6 py-4">Tagline</th>
                        <th class="px-6 py-4">Instagram</th>
                        <th class="px-6 py-4">Color</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($units as $unit)
                        <tr class="border-b border-gray-100 dark:border-navy-700 hover:bg-gray-50 dark:hover:bg-navy-700/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-lg flex items-center justify-center mr-3"
                                        style="background-color: {{ $unit->color ?? '#E91E8C' }}20">
                                        <span class="font-bold"
                                            style="color: {{ $unit->color ?? '#E91E8C' }}">{{ substr($unit->name, 0, 2) }}</span>
                                    </div>
                                    <span class="font-medium text-gray-900 dark:text-white">{{ $unit->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ Str::limit($unit->tagline, 30) }}</td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $unit->instagram ? '@' . $unit->instagram : '-' }}</td>
                            <td class="px-6 py-4">
                                <div class="w-6 h-6 rounded-full" style="background-color: {{ $unit->color ?? '#E91E8C' }}">
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if($unit->is_active)
                                    <span class="px-2 py-1 bg-green-100 dark:bg-green-500/10 text-green-700 dark:text-green-500 text-xs font-semibold rounded-full">Active</span>
                                @else
                                    <span class="px-2 py-1 bg-gray-100 dark:bg-gray-500/10 text-gray-700 dark:text-gray-500 text-xs font-semibold rounded-full">Draft</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('admin.units.edit', $unit) }}"
                                        class="p-2 bg-gray-100 dark:bg-navy-600 rounded-lg hover:bg-magenta-500/10 hover:text-magenta-500 text-gray-600 dark:text-gray-300 transition-colors">
                                        <i data-lucide="pencil" class="w-4 h-4"></i>
                                    </a>
                                    <form action="{{ route('admin.units.destroy', $unit) }}" method="POST"
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
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">Belum ada unit bisnis.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($units->hasPages())
        <div class="px-6 py-4 border-t border-gray-200 dark:border-navy-700">{{ $units->links() }}</div>@endif
    </div>
@endsection