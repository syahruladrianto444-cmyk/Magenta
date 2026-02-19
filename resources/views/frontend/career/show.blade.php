@extends('layouts.app')

@section('title', $career->meta_title ?? $career->title . ' - Career MAGENTA')

@section('content')
    <section class="relative pt-32 pb-20 dark:bg-dark-950 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up">
                <a href="{{ route('career.index') }}"
                    class="inline-flex items-center dark:text-dark-400 text-dark-500 hover:text-primary-500 mb-6 transition-colors">
                    <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                    <span>Kembali ke Karir</span>
                </a>
                <h1 class="text-4xl md:text-5xl font-bold dark:text-white text-dark-900 mb-4">{{ $career->title }}</h1>
                <div class="flex flex-wrap gap-3 mb-6">
                    @if($career->department)<span
                    class="px-4 py-2 dark:bg-dark-800 bg-gray-200 rounded-full dark:text-dark-300 text-dark-600">{{ $career->department }}</span>@endif
                    @if($career->location)<span
                        class="px-4 py-2 dark:bg-dark-800 bg-gray-200 rounded-full dark:text-dark-300 text-dark-600"><i
                    data-lucide="map-pin" class="w-4 h-4 inline mr-1"></i>{{ $career->location }}</span>@endif
                    <span
                        class="px-4 py-2 bg-primary-500/20 rounded-full text-primary-500">{{ ucfirst($career->type) }}</span>
                </div>
                @if($career->deadline)
                    <p class="dark:text-dark-400 text-dark-500"><i data-lucide="calendar"
                            class="w-4 h-4 inline mr-2"></i>Deadline: {{ $career->deadline->format('d F Y') }}</p>
                @endif
            </div>
        </div>
    </section>

    <section class="py-24 dark:bg-dark-900 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-12">
                <div class="lg:col-span-2 space-y-12" data-aos="fade-right">
                    <div>
                        <h2 class="text-2xl font-bold dark:text-white text-dark-900 mb-6">Deskripsi Pekerjaan</h2>
                        <div class="prose prose-lg dark:prose-invert dark:text-dark-300 text-dark-600">
                            {!! $career->description !!}</div>
                    </div>
                    @if($career->requirements)
                        <div>
                            <h2 class="text-2xl font-bold dark:text-white text-dark-900 mb-6">Persyaratan</h2>
                            <ul class="space-y-3">
                                @foreach($career->requirements_array as $req)
                                    <li class="flex items-start">
                                        <i data-lucide="check-circle"
                                            class="w-5 h-5 text-primary-500 mr-3 mt-0.5 flex-shrink-0"></i>
                                        <span class="dark:text-dark-300 text-dark-600">{{ $req }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if($career->benefits)
                        <div>
                            <h2 class="text-2xl font-bold dark:text-white text-dark-900 mb-6">Benefit</h2>
                            <ul class="space-y-3">
                                @foreach($career->benefits_array as $benefit)
                                    <li class="flex items-start">
                                        <i data-lucide="gift" class="w-5 h-5 text-primary-500 mr-3 mt-0.5 flex-shrink-0"></i>
                                        <span class="dark:text-dark-300 text-dark-600">{{ $benefit }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="lg:col-span-1" data-aos="fade-left">
                    <div
                        class="dark:bg-dark-800 bg-gray-50 rounded-2xl p-8 dark:border-dark-700 border-gray-200 border sticky top-28 shadow-sm">
                        <h3 class="text-xl font-bold dark:text-white text-dark-900 mb-6">Tertarik?</h3>
                        <p class="dark:text-dark-400 text-dark-600 mb-6">Kirimkan CV dan portofolio Anda ke email kami.</p>
                        <a href="mailto:career@magenta.co.id?subject=Lamaran: {{ $career->title }}"
                            class="block w-full py-4 bg-gradient-primary text-white text-center font-semibold rounded-full hover:shadow-lg hover:shadow-primary-500/30 transition-all">
                            Lamar Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection