@extends('layouts.client')

@section('title', 'Event Management')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Event Management</h1>
        <p class="text-gray-500 dark:text-gray-400">Daftar event yang ditugaskan kepada Anda</p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($events as $event)
            <a href="{{ route('client.events.show', $event) }}"
                class="group bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 overflow-hidden shadow-sm dark:shadow-none hover:shadow-lg hover:border-primary-500/50 transition-all">
                {{-- Thumbnail --}}
                <div class="relative bg-dark-900" style="padding-top: 56.25%;">
                    @if($event->youtube_video_id)
                        <img src="https://img.youtube.com/vi/{{ $event->youtube_video_id }}/hqdefault.jpg"
                            alt="{{ $event->name }}"
                            class="absolute inset-0 w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center border border-white/30 group-hover:scale-110 group-hover:bg-red-500 transition-all">
                                <svg class="w-6 h-6 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                    @else
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i data-lucide="video-off" class="w-10 h-10 text-gray-600 opacity-50"></i>
                        </div>
                    @endif
                    {{-- Status Badge --}}
                    <div class="absolute top-3 left-3">
                        @php
                            $badgeBg = match($event->status) {
                                'live' => 'bg-red-500',
                                'preparing' => 'bg-yellow-500',
                                'completed' => 'bg-blue-500',
                                default => 'bg-gray-500',
                            };
                        @endphp
                        <span class="inline-flex items-center px-2.5 py-1 {{ $badgeBg }} text-white text-xs font-bold rounded-lg shadow-lg">
                            @if($event->status === 'live')
                                <span class="w-2 h-2 bg-white rounded-full mr-1.5 animate-pulse"></span>
                            @endif
                            {{ $event->status_label }}
                        </span>
                    </div>
                </div>
                {{-- Info --}}
                <div class="p-5">
                    <h3 class="font-bold text-gray-900 dark:text-white text-lg group-hover:text-primary-500 transition-colors">{{ $event->name }}</h3>
                    @if($event->event_date)
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2 flex items-center">
                            <i data-lucide="calendar" class="w-4 h-4 mr-1.5"></i>
                            {{ $event->event_date->format('d M Y') }}
                        </p>
                    @endif
                    @if($event->description)
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2 line-clamp-2">{{ Str::limit(strip_tags($event->description), 80) }}</p>
                    @endif
                </div>
            </a>
        @empty
            <div class="col-span-full p-12 text-center text-gray-500 dark:text-gray-400 bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700">
                <i data-lucide="calendar-off" class="w-16 h-16 mx-auto mb-4 opacity-50"></i>
                <p class="text-xl font-medium">Belum ada event</p>
                <p class="text-sm mt-1">Anda belum ditugaskan ke event manapun.</p>
            </div>
        @endforelse
    </div>
@endsection
