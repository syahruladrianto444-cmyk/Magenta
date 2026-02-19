@extends('layouts.admin')

@section('title', 'Tambah Event')

@section('content')
    <div class="mb-8">
        <div class="flex items-center text-gray-500 dark:text-gray-400 mb-2">
            <a href="{{ route('admin.events.index') }}" class="hover:text-primary-500 transition-colors">Event Management</a>
            <i data-lucide="chevron-right" class="w-4 h-4 mx-2"></i>
            <span class="text-gray-900 dark:text-white">Tambah Event</span>
        </div>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Tambah Event Baru</h1>
    </div>

    <div class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 shadow-sm dark:shadow-none p-8">
        <form action="{{ route('admin.events.store') }}" method="POST"
            x-data="{ videoId: '', showPreview: false }"
            x-effect="showPreview = videoId.length > 0">
            @csrf

            <div class="grid md:grid-cols-2 gap-6">
                {{-- Event Name --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Nama Event <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors"
                        placeholder="Nama event...">
                    @error('name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- Status --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Status <span class="text-red-500">*</span></label>
                    <select name="status"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors">
                        <option value="preparing" {{ old('status') === 'preparing' ? 'selected' : '' }}>🔧 Persiapan</option>
                        <option value="live" {{ old('status') === 'live' ? 'selected' : '' }}>🔴 Live</option>
                        <option value="completed" {{ old('status') === 'completed' ? 'selected' : '' }}>✅ Selesai</option>
                    </select>
                    @error('status') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- Event Date --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Tanggal Event</label>
                    <input type="date" name="event_date" value="{{ old('event_date') }}"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors">
                    @error('event_date') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- PIC / Client --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Assign Client / PIC</label>
                    <select name="client_ids[]" multiple
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors"
                        style="min-height: 48px;">
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}" {{ in_array($client->id, old('client_ids', [])) ? 'selected' : '' }}>
                                {{ $client->name }} ({{ $client->email }})
                            </option>
                        @endforeach
                    </select>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Tahan Ctrl/Cmd untuk memilih lebih dari satu</p>
                    @error('client_ids') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- YouTube Video ID --}}
            <div class="mt-6">
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">YouTube Video ID</label>
                <input type="text" name="youtube_video_id" value="{{ old('youtube_video_id') }}"
                    x-model="videoId"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors"
                    placeholder="Contoh: SK_7toXT1Bc">
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Masukkan ID video dari URL YouTube (bagian setelah v=)</p>
                @error('youtube_video_id') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror

                {{-- YouTube Preview --}}
                <div x-show="showPreview" x-transition class="mt-4">
                    <p class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Preview:</p>
                    <div class="relative bg-black rounded-xl overflow-hidden shadow-lg max-w-lg" style="padding-top: 28.125%;">
                        <iframe :src="`https://www.youtube.com/embed/${videoId}`"
                            class="absolute inset-0 w-full h-full" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            {{-- Description --}}
            <div class="mt-6">
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Deskripsi</label>
                <textarea name="description" rows="4"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors"
                    placeholder="Deskripsi event...">{{ old('description') }}</textarea>
                @error('description') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            {{-- Actions --}}
            <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-200 dark:border-navy-700">
                <a href="{{ route('admin.events.index') }}"
                    class="px-6 py-3 bg-gray-100 dark:bg-navy-700 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-200 dark:hover:bg-navy-600 transition-colors">
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-3 bg-primary-500 hover:bg-primary-600 text-white font-semibold rounded-xl transition-colors shadow-lg shadow-primary-500/25">
                    Simpan Event
                </button>
            </div>
        </form>
    </div>
@endsection
