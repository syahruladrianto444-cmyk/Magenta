@extends('layouts.admin')

@section('title', 'Event Management')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Event Management</h1>
            <p class="text-gray-500 dark:text-gray-400">Kelola event dan live streaming CCTV</p>
        </div>
        <a href="{{ route('admin.events.create') }}"
            class="inline-flex items-center px-5 py-3 bg-primary-500 hover:bg-primary-600 text-white font-semibold rounded-xl transition-colors shadow-lg shadow-primary-500/25">
            <i data-lucide="plus" class="w-5 h-5 mr-2"></i>
            Create Event
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 dark:bg-green-500/10 border border-green-200 dark:border-green-500/20 text-green-700 dark:text-green-400 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    {{-- Events Table --}}
    <div class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 overflow-hidden shadow-sm dark:shadow-none">
        <div class="overflow-x-auto">
            <table class="w-full" id="events-table">
                <thead>
                    <tr class="text-left bg-gray-50 dark:bg-navy-900 border-b border-gray-200 dark:border-navy-700">
                        <th class="px-6 py-4 font-semibold text-gray-600 dark:text-gray-400 text-sm uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 dark:text-gray-400 text-sm uppercase tracking-wider">Dibuat</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 dark:text-gray-400 text-sm uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 dark:text-gray-400 text-sm uppercase tracking-wider">Link CCTV Client</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 dark:text-gray-400 text-sm uppercase tracking-wider">Kirim WA</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 dark:text-gray-400 text-sm uppercase tracking-wider text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($events as $event)
                        <tr class="border-b border-gray-100 dark:border-navy-700 hover:bg-gray-50 dark:hover:bg-navy-700/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-semibold text-gray-900 dark:text-white">{{ $event->name }}</div>
                                @if($event->event_date)
                                    <div class="text-sm text-gray-500 dark:text-gray-400">{{ $event->event_date->format('d M Y') }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-400">
                                {{ $event->creator->name ?? 'admin' }}
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $statusClasses = match($event->status) {
                                        'preparing' => 'bg-yellow-100 dark:bg-yellow-500/10 text-yellow-700 dark:text-yellow-400 border-yellow-200 dark:border-yellow-500/20',
                                        'live' => 'bg-green-100 dark:bg-green-500/10 text-green-700 dark:text-green-400 border-green-200 dark:border-green-500/20',
                                        'completed' => 'bg-blue-100 dark:bg-blue-500/10 text-blue-700 dark:text-blue-400 border-blue-200 dark:border-blue-500/20',
                                        default => 'bg-gray-100 dark:bg-gray-500/10 text-gray-700 dark:text-gray-400 border-gray-200 dark:border-gray-500/20',
                                    };
                                @endphp
                                <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full border {{ $statusClasses }}">
                                    @if($event->status === 'live')
                                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                                    @endif
                                    {{ $event->status_label }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @if($event->youtube_video_id)
                                    <button onclick="openStreamModal('{{ $event->youtube_video_id }}', '{{ addslashes($event->name) }}')"
                                        class="inline-flex items-center px-4 py-2 bg-dark-900 dark:bg-white text-white dark:text-dark-900 font-semibold rounded-lg hover:bg-dark-800 dark:hover:bg-gray-200 transition-colors text-sm">
                                        <svg class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814z"/>
                                            <path d="M9.545 15.568V8.432L15.818 12l-6.273 3.568z" fill="{{ 'white' }}"/>
                                        </svg>
                                        Link
                                    </button>
                                @else
                                    <span class="text-gray-400 dark:text-gray-500 text-sm italic">Belum ada link</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($event->youtube_video_id)
                                    @php
                                        $cctvLink = url('/client/events/' . $event->id);
                                        $waMessage = urlencode("🎥 *CCTV Monitoring - {$event->name}*\n\n📹 Silakan akses link berikut untuk monitoring CCTV event:\n{$cctvLink}\n\n🔐 Gunakan akun yang telah diberikan untuk login.\n\n_MAGENTA Event Management_");
                                    @endphp
                                    <a href="https://wa.me/?text={{ $waMessage }}" target="_blank"
                                        class="inline-flex items-center px-4 py-2 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition-colors text-sm">
                                        <svg class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                        </svg>
                                        Kirim Link CCTV
                                    </a>
                                @else
                                    <span class="text-gray-400 dark:text-gray-500 text-sm italic">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.events.edit', $event) }}"
                                        class="p-2 bg-blue-500/10 text-blue-500 rounded-lg hover:bg-blue-500/20 transition-colors">
                                        <i data-lucide="pencil" class="w-4 h-4"></i>
                                    </a>
                                    <form action="{{ route('admin.events.destroy', $event) }}" method="POST"
                                        onsubmit="return confirm('Hapus event ini?')">
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
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
                                <i data-lucide="calendar-off" class="w-12 h-12 mx-auto mb-4 opacity-50"></i>
                                <p class="text-lg font-medium">Belum ada event</p>
                                <p class="text-sm">Klik tombol "Create Event" untuk menambahkan event baru.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Stream Modal --}}
    <div id="streamModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/80 backdrop-blur-sm">
        <div class="relative w-full max-w-5xl mx-4">
            <div class="bg-white dark:bg-dark-900 rounded-2xl overflow-hidden shadow-2xl border border-gray-200 dark:border-dark-700">
                {{-- Modal Header --}}
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200 dark:border-dark-700">
                    <div class="flex items-center">
                        <span class="w-3 h-3 bg-red-500 rounded-full mr-3 animate-pulse"></span>
                        <h3 id="streamModalTitle" class="text-lg font-bold text-gray-900 dark:text-white">Live Streaming</h3>
                    </div>
                    <button onclick="closeStreamModal()"
                        class="p-2 text-gray-400 hover:text-gray-600 dark:hover:text-white transition-colors rounded-lg hover:bg-gray-100 dark:hover:bg-dark-800">
                        <i data-lucide="x" class="w-5 h-5"></i>
                    </button>
                </div>
                {{-- Video Container --}}
                <div class="relative bg-black" style="padding-top: 56.25%;">
                    <iframe id="streamIframe" class="absolute inset-0 w-full h-full" src="" title="YouTube Live Stream"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openStreamModal(videoId, eventName) {
            const modal = document.getElementById('streamModal');
            const iframe = document.getElementById('streamIframe');
            const title = document.getElementById('streamModalTitle');

            iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
            title.textContent = `Live Streaming - ${eventName}`;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeStreamModal() {
            const modal = document.getElementById('streamModal');
            const iframe = document.getElementById('streamIframe');

            iframe.src = '';
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }

        // Close modal on Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeStreamModal();
        });

        // Close modal on backdrop click
        document.getElementById('streamModal').addEventListener('click', function(e) {
            if (e.target === this) closeStreamModal();
        });
    </script>
@endsection
