@extends('layouts.client')

@section('title', $event->name)

@section('content')
    <div class="mb-6">
        <div class="flex items-center text-gray-500 dark:text-gray-400 mb-4">
            <a href="{{ route('client.events.index') }}" class="hover:text-primary-500 transition-colors">Event
                Management</a>
            <i data-lucide="chevron-right" class="w-4 h-4 mx-2"></i>
            <span class="text-gray-900 dark:text-white">{{ $event->name }}</span>
        </div>
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $event->name }}</h1>
                @if($event->event_date)
                    <p class="text-gray-500 dark:text-gray-400 mt-1 flex items-center">
                        <i data-lucide="calendar" class="w-4 h-4 mr-2"></i>
                        {{ $event->event_date->format('d F Y') }}
                    </p>
                @endif
            </div>
            @php
                $statusClasses = match ($event->status) {
                    'live' => 'bg-green-100 dark:bg-green-500/10 text-green-700 dark:text-green-400 border-green-200 dark:border-green-500/20',
                    'preparing' => 'bg-yellow-100 dark:bg-yellow-500/10 text-yellow-700 dark:text-yellow-400 border-yellow-200 dark:border-yellow-500/20',
                    'completed' => 'bg-blue-100 dark:bg-blue-500/10 text-blue-700 dark:text-blue-400 border-blue-200 dark:border-blue-500/20',
                    default => 'bg-gray-100 dark:bg-gray-500/10 text-gray-700 dark:text-gray-400 border-gray-200 dark:border-gray-500/20',
                };
            @endphp
            <span class="inline-flex items-center px-4 py-2 text-sm font-semibold rounded-xl border {{ $statusClasses }}">
                @if($event->status === 'live')
                    <span class="w-2.5 h-2.5 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                @endif
                {{ $event->status_label }}
            </span>
        </div>
    </div>

    {{-- Video Player --}}
    <div
        class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 overflow-hidden shadow-sm dark:shadow-none mb-6">
        @if($event->youtube_video_id)
            <div class="relative bg-black" style="padding-top: 56.25%;">
                <iframe src="https://www.youtube.com/embed/{{ $event->youtube_video_id }}?autoplay=0&rel=0"
                    class="absolute inset-0 w-full h-full" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>
        @else
            <div class="flex items-center justify-center py-32 bg-dark-900">
                <div class="text-center text-gray-400">
                    <i data-lucide="video-off" class="w-16 h-16 mx-auto mb-4 opacity-50"></i>
                    <p class="text-lg font-medium">Video belum tersedia</p>
                    <p class="text-sm">Link streaming belum dikonfigurasi untuk event ini.</p>
                </div>
            </div>
        @endif
    </div>

    {{-- Event Details --}}
    @if($event->description)
        <div
            class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 p-6 shadow-sm dark:shadow-none">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-3">Detail Event</h3>
            <div class="text-gray-600 dark:text-gray-400 leading-relaxed">
                {!! nl2br(e($event->description)) !!}
            </div>
        </div>
    @endif
@endsection