@extends('layouts.app')

@section('title', 'Contact - MAGENTA')

@section('content')
    <section class="relative pt-32 pb-20 dark:bg-dark-950 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl" data-aos="fade-right">
                <div
                    class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6">
                    Get In Touch
                </div>
                <h1 class="text-5xl md:text-6xl font-bold dark:text-white text-dark-900 mb-6">Hubungi <span
                        class="text-gradient">Kami</span></h1>
                <p class="text-xl dark:text-dark-300 text-dark-600">Kami siap membantu mewujudkan proyek Anda.</p>
            </div>
        </div>
    </section>

    <section class="py-24 dark:bg-dark-900 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16">
                <div data-aos="fade-right">
                    <h2 class="text-3xl font-bold dark:text-white text-dark-900 mb-8">Kirim Pesan</h2>

                    @if(session('success'))
                        <div class="bg-green-500/10 border border-green-500/20 rounded-xl p-6 mb-8">
                            <div class="flex items-center">
                                <i data-lucide="check-circle" class="w-6 h-6 text-green-500 mr-3"></i>
                                <span class="text-green-600 dark:text-green-400">{{ session('success') }}</span>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium dark:text-dark-300 text-dark-700 mb-2">Nama Lengkap
                                    *</label>
                                <input type="text" name="name" value="{{ old('name') }}" required
                                    class="w-full px-4 py-3 dark:bg-dark-800 bg-gray-50 dark:border-dark-700 border-gray-300 border rounded-xl dark:text-white text-dark-900 dark:placeholder-dark-500 placeholder-dark-400 focus:border-primary-500 focus:ring-1 focus:ring-primary-500 outline-none transition-colors"
                                    placeholder="Nama Anda">
                                @error('name')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium dark:text-dark-300 text-dark-700 mb-2">Email
                                    *</label>
                                <input type="email" name="email" value="{{ old('email') }}" required
                                    class="w-full px-4 py-3 dark:bg-dark-800 bg-gray-50 dark:border-dark-700 border-gray-300 border rounded-xl dark:text-white text-dark-900 dark:placeholder-dark-500 placeholder-dark-400 focus:border-primary-500 focus:ring-1 focus:ring-primary-500 outline-none transition-colors"
                                    placeholder="email@company.com">
                                @error('email')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium dark:text-dark-300 text-dark-700 mb-2">No.
                                    Telepon</label>
                                <input type="tel" name="phone" value="{{ old('phone') }}"
                                    class="w-full px-4 py-3 dark:bg-dark-800 bg-gray-50 dark:border-dark-700 border-gray-300 border rounded-xl dark:text-white text-dark-900 dark:placeholder-dark-500 placeholder-dark-400 focus:border-primary-500 focus:ring-1 focus:ring-primary-500 outline-none transition-colors"
                                    placeholder="08xxx">
                            </div>
                            <div>
                                <label
                                    class="block text-sm font-medium dark:text-dark-300 text-dark-700 mb-2">Perusahaan</label>
                                <input type="text" name="company" value="{{ old('company') }}"
                                    class="w-full px-4 py-3 dark:bg-dark-800 bg-gray-50 dark:border-dark-700 border-gray-300 border rounded-xl dark:text-white text-dark-900 dark:placeholder-dark-500 placeholder-dark-400 focus:border-primary-500 focus:ring-1 focus:ring-primary-500 outline-none transition-colors"
                                    placeholder="Nama Perusahaan">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium dark:text-dark-300 text-dark-700 mb-2">Subjek *</label>
                            <input type="text" name="subject" value="{{ old('subject') }}" required
                                class="w-full px-4 py-3 dark:bg-dark-800 bg-gray-50 dark:border-dark-700 border-gray-300 border rounded-xl dark:text-white text-dark-900 dark:placeholder-dark-500 placeholder-dark-400 focus:border-primary-500 focus:ring-1 focus:ring-primary-500 outline-none transition-colors"
                                placeholder="Topik pesan Anda">
                            @error('subject')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium dark:text-dark-300 text-dark-700 mb-2">Pesan *</label>
                            <textarea name="message" rows="5" required
                                class="w-full px-4 py-3 dark:bg-dark-800 bg-gray-50 dark:border-dark-700 border-gray-300 border rounded-xl dark:text-white text-dark-900 dark:placeholder-dark-500 placeholder-dark-400 focus:border-primary-500 focus:ring-1 focus:ring-primary-500 outline-none transition-colors resize-none"
                                placeholder="Ceritakan kebutuhan Anda...">{{ old('message') }}</textarea>
                            @error('message')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                        </div>
                        <button type="submit"
                            class="w-full py-4 bg-gradient-primary text-white font-semibold rounded-xl hover:shadow-lg hover:shadow-primary-500/30 transition-all">
                            Kirim Pesan
                        </button>
                    </form>
                </div>

                <div data-aos="fade-left">
                    <h2 class="text-3xl font-bold dark:text-white text-dark-900 mb-8">Informasi Kontak</h2>
                    <div class="space-y-6 mb-12">
                        <div
                            class="flex items-start space-x-4 p-6 dark:bg-dark-800 bg-gray-50 rounded-xl dark:border-dark-700 border-gray-200 border">
                            <div
                                class="w-12 h-12 bg-primary-500/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i data-lucide="map-pin" class="w-6 h-6 text-primary-500"></i>
                            </div>
                            <div>
                                <h4 class="dark:text-white text-dark-900 font-semibold mb-1">Alamat</h4>
                                <p class="dark:text-dark-400 text-dark-600">Semarang, Jawa Tengah, Indonesia</p>
                            </div>
                        </div>
                        <div
                            class="flex items-start space-x-4 p-6 dark:bg-dark-800 bg-gray-50 rounded-xl dark:border-dark-700 border-gray-200 border">
                            <div
                                class="w-12 h-12 bg-primary-500/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i data-lucide="phone" class="w-6 h-6 text-primary-500"></i>
                            </div>
                            <div>
                                <h4 class="dark:text-white text-dark-900 font-semibold mb-1">Telepon</h4>
                                <a href="tel:+6281821878787"
                                    class="dark:text-dark-400 text-dark-600 hover:text-primary-500 transition-colors">0818
                                    218 787 87</a>
                            </div>
                        </div>
                        <div
                            class="flex items-start space-x-4 p-6 dark:bg-dark-800 bg-gray-50 rounded-xl dark:border-dark-700 border-gray-200 border">
                            <div
                                class="w-12 h-12 bg-primary-500/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i data-lucide="mail" class="w-6 h-6 text-primary-500"></i>
                            </div>
                            <div>
                                <h4 class="dark:text-white text-dark-900 font-semibold mb-1">Email</h4>
                                <a href="mailto:info@magenta.co.id"
                                    class="dark:text-dark-400 text-dark-600 hover:text-primary-500 transition-colors">info@magenta.co.id</a>
                            </div>
                        </div>
                    </div>

                    <a href="https://wa.me/6281821878787" target="_blank"
                        class="flex items-center justify-center space-x-3 w-full py-4 bg-green-600 text-white font-semibold rounded-xl hover:bg-green-700 transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
                        </svg>
                        <span>Chat via WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection