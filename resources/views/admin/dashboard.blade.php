@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white transition-colors">Dashboard</h1>
        <p class="text-gray-500 dark:text-gray-400 transition-colors">Selamat datang di Admin Panel MAGENTA</p>
    </div>

    {{-- Stats Grid --}}
    <div class="grid grid-cols-2 md:grid-cols-5 gap-6 mb-8">
        <div
            class="bg-white dark:bg-navy-800 rounded-2xl p-6 border border-gray-200 dark:border-navy-700 transition-colors shadow-sm dark:shadow-none">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-blue-500/10 rounded-xl flex items-center justify-center">
                    <i data-lucide="briefcase" class="w-6 h-6 text-blue-500"></i>
                </div>
            </div>
            <div class="text-3xl font-bold text-gray-900 dark:text-white transition-colors">{{ $stats['services'] }}</div>
            <div class="text-gray-500 dark:text-gray-400 transition-colors">Services</div>
        </div>

        <div
            class="bg-white dark:bg-navy-800 rounded-2xl p-6 border border-gray-200 dark:border-navy-700 transition-colors shadow-sm dark:shadow-none">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-purple-500/10 rounded-xl flex items-center justify-center">
                    <i data-lucide="building-2" class="w-6 h-6 text-purple-500"></i>
                </div>
            </div>
            <div class="text-3xl font-bold text-gray-900 dark:text-white transition-colors">{{ $stats['units'] }}</div>
            <div class="text-gray-500 dark:text-gray-400 transition-colors">Business Units</div>
        </div>

        <div
            class="bg-white dark:bg-navy-800 rounded-2xl p-6 border border-gray-200 dark:border-navy-700 transition-colors shadow-sm dark:shadow-none">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-magenta-500/10 rounded-xl flex items-center justify-center">
                    <i data-lucide="images" class="w-6 h-6 text-magenta-500"></i>
                </div>
            </div>
            <div class="text-3xl font-bold text-gray-900 dark:text-white transition-colors">{{ $stats['portfolios'] }}</div>
            <div class="text-gray-500 dark:text-gray-400 transition-colors">Portfolio</div>
        </div>

        <div
            class="bg-white dark:bg-navy-800 rounded-2xl p-6 border border-gray-200 dark:border-navy-700 transition-colors shadow-sm dark:shadow-none">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-green-500/10 rounded-xl flex items-center justify-center">
                    <i data-lucide="mail" class="w-6 h-6 text-green-500"></i>
                </div>
                @if($stats['contacts'] > 0)
                    <span class="px-2 py-1 bg-red-500 text-white text-xs font-bold rounded-full">{{ $stats['contacts'] }}</span>
                @endif
            </div>
            <div class="text-3xl font-bold text-gray-900 dark:text-white transition-colors">{{ $stats['total_contacts'] }}
            </div>
            <div class="text-gray-500 dark:text-gray-400 transition-colors">Contacts</div>
        </div>

        <div
            class="bg-white dark:bg-navy-800 rounded-2xl p-6 border border-gray-200 dark:border-navy-700 transition-colors shadow-sm dark:shadow-none">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-red-500/10 rounded-xl flex items-center justify-center">
                    <i data-lucide="video" class="w-6 h-6 text-red-500"></i>
                </div>
                @if($stats['live_events'] > 0)
                    <span class="flex items-center px-2 py-1 bg-green-100 dark:bg-green-500/10 text-green-600 dark:text-green-400 text-xs font-bold rounded-full">
                        <span class="w-2 h-2 bg-green-500 rounded-full mr-1 animate-pulse"></span>
                        {{ $stats['live_events'] }} Live
                    </span>
                @endif
            </div>
            <div class="text-3xl font-bold text-gray-900 dark:text-white transition-colors">{{ $stats['events'] }}</div>
            <div class="text-gray-500 dark:text-gray-400 transition-colors">Events</div>
        </div>
    </div>

    {{-- Live Streaming Preview --}}
    @if($liveEvents->count() > 0)
        <div class="bg-white dark:bg-navy-800 rounded-2xl p-6 border border-gray-200 dark:border-navy-700 transition-colors shadow-sm dark:shadow-none mb-8">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white transition-colors flex items-center">
                    <span class="w-3 h-3 bg-red-500 rounded-full mr-3 animate-pulse"></span>
                    Live Streaming CCTV
                </h3>
                <a href="{{ route('admin.events.index') }}" class="text-magenta-500 hover:text-magenta-400">Lihat Semua</a>
            </div>
            <div class="grid md:grid-cols-2 gap-4">
                @foreach($liveEvents as $event)
                    <div class="bg-gray-50 dark:bg-navy-700 rounded-xl overflow-hidden">
                        @if($event->youtube_video_id)
                            <div class="relative bg-black" style="padding-top: 56.25%;">
                                <iframe src="https://www.youtube.com/embed/{{ $event->youtube_video_id }}" 
                                    class="absolute inset-0 w-full h-full" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                        @endif
                        <div class="p-3 flex items-center justify-between">
                            <span class="font-semibold text-gray-900 dark:text-white text-sm">{{ $event->name }}</span>
                            <span class="inline-flex items-center px-2 py-1 bg-green-100 dark:bg-green-500/10 text-green-700 dark:text-green-400 text-xs font-semibold rounded-full">
                                <span class="w-2 h-2 bg-green-500 rounded-full mr-1 animate-pulse"></span>
                                Live
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    {{-- Quick Actions --}}
    <div class="grid md:grid-cols-2 gap-6 mb-8">
        <div
            class="bg-white dark:bg-navy-800 rounded-2xl p-6 border border-gray-200 dark:border-navy-700 transition-colors shadow-sm dark:shadow-none">
            <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-white transition-colors">Quick Actions</h3>
            <div class="grid grid-cols-2 gap-3">
                <a href="{{ route('admin.portfolios.create') }}"
                    class="flex items-center p-4 bg-gray-50 dark:bg-navy-700 rounded-xl hover:bg-magenta-500/10 hover:text-magenta-500 dark:hover:bg-magenta-500/10 transition-colors text-gray-700 dark:text-gray-300">
                    <i data-lucide="plus" class="w-5 h-5 mr-3"></i>
                    <span>Add Portfolio</span>
                </a>
                <a href="{{ route('admin.news.create') }}"
                    class="flex items-center p-4 bg-gray-50 dark:bg-navy-700 rounded-xl hover:bg-magenta-500/10 hover:text-magenta-500 dark:hover:bg-magenta-500/10 transition-colors text-gray-700 dark:text-gray-300">
                    <i data-lucide="plus" class="w-5 h-5 mr-3"></i>
                    <span>Add News</span>
                </a>
                <a href="{{ route('admin.events.create') }}"
                    class="flex items-center p-4 bg-gray-50 dark:bg-navy-700 rounded-xl hover:bg-magenta-500/10 hover:text-magenta-500 dark:hover:bg-magenta-500/10 transition-colors text-gray-700 dark:text-gray-300">
                    <i data-lucide="plus" class="w-5 h-5 mr-3"></i>
                    <span>Add Event</span>
                </a>
                <a href="{{ route('admin.users.create') }}"
                    class="flex items-center p-4 bg-gray-50 dark:bg-navy-700 rounded-xl hover:bg-magenta-500/10 hover:text-magenta-500 dark:hover:bg-magenta-500/10 transition-colors text-gray-700 dark:text-gray-300">
                    <i data-lucide="user-plus" class="w-5 h-5 mr-3"></i>
                    <span>Add Client</span>
                </a>
            </div>
        </div>

        <div
            class="bg-white dark:bg-navy-800 rounded-2xl p-6 border border-gray-200 dark:border-navy-700 transition-colors shadow-sm dark:shadow-none">
            <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-white transition-colors">Recent Contacts</h3>
            @if($recentContacts->count() > 0)
                <div class="space-y-3">
                    @foreach($recentContacts as $contact)
                        <a href="{{ route('admin.contacts.show', $contact) }}"
                            class="flex items-center justify-between p-3 bg-gray-50 dark:bg-navy-700 rounded-xl hover:bg-gray-100 dark:hover:bg-navy-600 transition-colors">
                            <div class="flex items-center">
                                @if($contact->status === 'new')
                                    <span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>
                                @else
                                    <span class="w-2 h-2 bg-gray-400 dark:bg-gray-500 rounded-full mr-3"></span>
                                @endif
                                <div>
                                    <div class="font-medium text-gray-900 dark:text-white">{{ $contact->name }}</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">{{ Str::limit($contact->subject, 30) }}
                                    </div>
                                </div>
                            </div>
                            <span
                                class="text-xs text-gray-400 dark:text-gray-500">{{ $contact->created_at->diffForHumans() }}</span>
                        </a>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 dark:text-gray-400">Belum ada pesan masuk.</p>
            @endif
        </div>
    </div>

    {{-- Recent Portfolios --}}
    <div
        class="bg-white dark:bg-navy-800 rounded-2xl p-6 border border-gray-200 dark:border-navy-700 transition-colors shadow-sm dark:shadow-none">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white transition-colors">Recent Portfolios</h3>
            <a href="{{ route('admin.portfolios.index') }}" class="text-magenta-500 hover:text-magenta-400">View All</a>
        </div>
        @if($recentPortfolios->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-left text-gray-600 dark:text-gray-400 border-b border-gray-200 dark:border-navy-700">
                            <th class="pb-3 font-semibold">Title</th>
                            <th class="pb-3 font-semibold">Client</th>
                            <th class="pb-3 font-semibold">Status</th>
                            <th class="pb-3 font-semibold">Date</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-900 dark:text-gray-300">
                        @foreach($recentPortfolios as $portfolio)
                            <tr
                                class="border-b border-gray-100 dark:border-navy-700 hover:bg-gray-50 dark:hover:bg-navy-700/50 transition-colors">
                                <td class="py-4 font-medium">{{ $portfolio->title }}</td>
                                <td class="py-4 text-gray-600 dark:text-gray-400">{{ $portfolio->client ?? '-' }}</td>
                                <td class="py-4">
                                    @if($portfolio->is_active)
                                        <span class="px-2 py-1 bg-green-100 dark:bg-green-500/10 text-green-700 dark:text-green-500 text-xs font-semibold rounded-full border border-green-200 dark:border-transparent">Active</span>
                                    @else
                                        <span class="px-2 py-1 bg-gray-100 dark:bg-gray-500/10 text-gray-700 dark:text-gray-500 text-xs font-semibold rounded-full border border-gray-200 dark:border-transparent">Draft</span>
                                    @endif
                                </td>
                                <td class="py-4 text-gray-600 dark:text-gray-400">{{ $portfolio->created_at->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-500 dark:text-gray-400">Belum ada portfolio.</p>
        @endif
    </div>
@endsection