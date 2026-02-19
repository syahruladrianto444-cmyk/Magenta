@extends('layouts.client')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Dashboard</h1>
        <p class="text-gray-500 dark:text-gray-400">Selamat datang, {{ auth()->user()->name }}</p>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white dark:bg-navy-800 rounded-2xl p-6 border border-gray-200 dark:border-navy-700 shadow-sm dark:shadow-none">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-green-500/10 rounded-xl flex items-center justify-center">
                    <i data-lucide="radio" class="w-6 h-6 text-green-500"></i>
                </div>
                @if($liveEvents->count() > 0)
                    <span class="flex items-center px-2 py-1 bg-green-100 dark:bg-green-500/10 text-green-600 dark:text-green-400 text-xs font-bold rounded-full">
                        <span class="w-2 h-2 bg-green-500 rounded-full mr-1 animate-pulse"></span>
                        LIVE
                    </span>
                @endif
            </div>
            <div class="text-3xl font-bold text-gray-900 dark:text-white">{{ $liveEvents->count() }}</div>
            <div class="text-gray-500 dark:text-gray-400">Event Live</div>
        </div>

        <div class="bg-white dark:bg-navy-800 rounded-2xl p-6 border border-gray-200 dark:border-navy-700 shadow-sm dark:shadow-none">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-yellow-500/10 rounded-xl flex items-center justify-center">
                    <i data-lucide="clock" class="w-6 h-6 text-yellow-500"></i>
                </div>
            </div>
            <div class="text-3xl font-bold text-gray-900 dark:text-white">{{ $preparingEvents->count() }}</div>
            <div class="text-gray-500 dark:text-gray-400">Event Persiapan</div>
        </div>

        <div class="bg-white dark:bg-navy-800 rounded-2xl p-6 border border-gray-200 dark:border-navy-700 shadow-sm dark:shadow-none">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-blue-500/10 rounded-xl flex items-center justify-center">
                    <i data-lucide="check-circle" class="w-6 h-6 text-blue-500"></i>
                </div>
            </div>
            <div class="text-3xl font-bold text-gray-900 dark:text-white">{{ $completedEvents->count() }}</div>
            <div class="text-gray-500 dark:text-gray-400">Event Selesai</div>
        </div>
    </div>

    {{-- Live Streams --}}
    @if($liveEvents->count() > 0)
        <div class="mb-8">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                <span class="w-3 h-3 bg-red-500 rounded-full mr-3 animate-pulse"></span>
                Live Streaming
            </h2>
            <div class="grid md:grid-cols-2 gap-6">
                @foreach($liveEvents as $event)
                    <a href="{{ route('client.events.show', $event) }}"
                        class="group bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 overflow-hidden shadow-sm dark:shadow-none hover:shadow-lg transition-all">
                        <div class="relative bg-black" style="padding-top: 56.25%;">
                            @if($event->youtube_video_id)
                                <img src="https://img.youtube.com/vi/{{ $event->youtube_video_id }}/hqdefault.jpg"
                                    alt="{{ $event->name }}"
                                    class="absolute inset-0 w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-16 h-16 bg-red-500 rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                        <svg class="w-7 h-7 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="absolute top-3 left-3">
                                    <span class="inline-flex items-center px-2 py-1 bg-red-500 text-white text-xs font-bold rounded-lg">
                                        <span class="w-2 h-2 bg-white rounded-full mr-1 animate-pulse"></span>
                                        LIVE
                                    </span>
                                </div>
                            @else
                                <div class="absolute inset-0 flex items-center justify-center text-gray-500">
                                    <i data-lucide="video-off" class="w-12 h-12 opacity-50"></i>
                                </div>
                            @endif
                        </div>
                        <div class="p-5">
                            <h3 class="font-bold text-gray-900 dark:text-white text-lg">{{ $event->name }}</h3>
                            @if($event->event_date)
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                    <i data-lucide="calendar" class="w-4 h-4 inline mr-1"></i>
                                    {{ $event->event_date->format('d M Y') }}
                                </p>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    {{-- All Events --}}
    <div>
        <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Semua Event</h2>
        <div class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 overflow-hidden shadow-sm dark:shadow-none">
            @forelse($events as $event)
                <a href="{{ route('client.events.show', $event) }}"
                    class="flex items-center justify-between p-5 {{ !$loop->last ? 'border-b border-gray-100 dark:border-navy-700' : '' }} hover:bg-gray-50 dark:hover:bg-navy-700/50 transition-colors">
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center mr-4
                            {{ $event->status === 'live' ? 'bg-green-500/10' : ($event->status === 'preparing' ? 'bg-yellow-500/10' : 'bg-blue-500/10') }}">
                            <i data-lucide="{{ $event->status === 'live' ? 'radio' : ($event->status === 'preparing' ? 'clock' : 'check-circle') }}"
                                class="w-5 h-5 {{ $event->status === 'live' ? 'text-green-500' : ($event->status === 'preparing' ? 'text-yellow-500' : 'text-blue-500') }}"></i>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900 dark:text-white">{{ $event->name }}</div>
                            @if($event->event_date)
                                <div class="text-sm text-gray-500 dark:text-gray-400">{{ $event->event_date->format('d M Y') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        @php
                            $badgeClasses = match($event->status) {
                                'live' => 'bg-green-100 dark:bg-green-500/10 text-green-700 dark:text-green-400',
                                'preparing' => 'bg-yellow-100 dark:bg-yellow-500/10 text-yellow-700 dark:text-yellow-400',
                                'completed' => 'bg-blue-100 dark:bg-blue-500/10 text-blue-700 dark:text-blue-400',
                                default => 'bg-gray-100 dark:bg-gray-500/10 text-gray-700 dark:text-gray-400',
                            };
                        @endphp
                        <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full {{ $badgeClasses }}">
                            @if($event->status === 'live')
                                <span class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                            @endif
                            {{ $event->status_label }}
                        </span>
                        <i data-lucide="chevron-right" class="w-5 h-5 text-gray-400"></i>
                    </div>
                </a>
            @empty
                <div class="p-12 text-center text-gray-500 dark:text-gray-400">
                    <i data-lucide="calendar-off" class="w-12 h-12 mx-auto mb-4 opacity-50"></i>
                    <p class="text-lg font-medium">Belum ada event</p>
                    <p class="text-sm">Anda belum ditugaskan ke event manapun.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
