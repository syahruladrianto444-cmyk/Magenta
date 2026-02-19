@extends('layouts.admin')

@section('title', 'Contacts')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Contact Messages</h1>
        <p class="text-gray-500 dark:text-gray-400">Kelola pesan masuk dari website</p>
    </div>

    <div
        class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 overflow-hidden shadow-sm dark:shadow-none">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr
                        class="text-left text-gray-600 dark:text-gray-400 border-b border-gray-200 dark:border-navy-700 bg-gray-50 dark:bg-navy-900">
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Name</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">Subject</th>
                        <th class="px-6 py-4">Date</th>
                        <th class="px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $contact)
                        <tr
                            class="border-b border-gray-100 dark:border-navy-700 hover:bg-gray-50 dark:hover:bg-navy-700/50 transition-colors {{ $contact->status === 'new' ? 'bg-magenta-500/5' : '' }}">
                            <td class="px-6 py-4">
                                @if($contact->status === 'new')
                                    <span class="w-3 h-3 bg-red-500 rounded-full inline-block"></span>
                                @else
                                    <span class="w-3 h-3 bg-gray-400 dark:bg-gray-500 rounded-full inline-block"></span>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $contact->name }}</td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $contact->email }}</td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ Str::limit($contact->subject, 40) }}</td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-400">
                                {{ $contact->created_at->format('d M Y H:i') }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('admin.contacts.show', $contact) }}"
                                        class="p-2 bg-gray-100 dark:bg-navy-600 rounded-lg hover:bg-magenta-500/10 hover:text-magenta-500 text-gray-600 dark:text-gray-300 transition-colors">
                                        <i data-lucide="eye" class="w-4 h-4"></i>
                                    </a>
                                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST"
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
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">Belum ada pesan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($contacts->hasPages())
        <div class="px-6 py-4 border-t border-gray-200 dark:border-navy-700">{{ $contacts->links() }}</div>@endif
    </div>
@endsection