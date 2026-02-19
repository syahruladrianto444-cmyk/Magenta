@extends('layouts.admin')

@section('title', 'View Contact')

@section('content')
    <div class="mb-8">
        <a href="{{ route('admin.contacts.index') }}"
            class="inline-flex items-center text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white mb-4">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i><span>Kembali</span>
        </a>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Contact Detail</h1>
    </div>

    <div class="max-w-3xl">
        <div
            class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 p-8 shadow-sm dark:shadow-none">
            <div class="grid md:grid-cols-2 gap-6 mb-8">
                <div>
                    <label class="block text-sm text-gray-500 mb-1">Name</label>
                    <div class="text-lg font-medium text-gray-900 dark:text-white">{{ $contact->name }}</div>
                </div>
                <div>
                    <label class="block text-sm text-gray-500 mb-1">Email</label>
                    <a href="mailto:{{ $contact->email }}"
                        class="text-lg text-magenta-400 hover:text-magenta-300">{{ $contact->email }}</a>
                </div>
                <div>
                    <label class="block text-sm text-gray-500 mb-1">Phone</label>
                    <div class="text-lg text-gray-900 dark:text-white">{{ $contact->phone ?? '-' }}</div>
                </div>
                <div>
                    <label class="block text-sm text-gray-500 mb-1">Company</label>
                    <div class="text-lg text-gray-900 dark:text-white">{{ $contact->company ?? '-' }}</div>
                </div>
            </div>

            <div class="mb-8">
                <label class="block text-sm text-gray-500 mb-1">Subject</label>
                <div class="text-lg font-medium text-gray-900 dark:text-white">{{ $contact->subject }}</div>
            </div>

            <div class="mb-8">
                <label class="block text-sm text-gray-500 mb-1">Message</label>
                <div
                    class="text-lg bg-gray-50 dark:bg-navy-900 p-6 rounded-xl whitespace-pre-wrap text-gray-900 dark:text-white">
                    {{ $contact->message }}</div>
            </div>

            <div class="flex items-center justify-between pt-6 border-t border-gray-200 dark:border-navy-700">
                <div class="text-sm text-gray-500">
                    Received: {{ $contact->created_at->format('d F Y, H:i') }}
                </div>
                <div class="flex items-center space-x-4">
                    <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}"
                        class="px-6 py-3 bg-magenta-500 text-white font-semibold rounded-xl hover:bg-magenta-600 transition-colors">
                        <i data-lucide="reply" class="w-4 h-4 inline mr-2"></i>Reply
                    </a>
                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST"
                        onsubmit="return confirm('Yakin?')">
                        @csrf @method('DELETE')
                        <button type="submit"
                            class="px-6 py-3 bg-red-500/10 text-red-500 font-semibold rounded-xl hover:bg-red-500 hover:text-white transition-colors">
                            <i data-lucide="trash-2" class="w-4 h-4 inline mr-2"></i>Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection