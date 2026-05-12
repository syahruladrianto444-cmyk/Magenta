{{-- Main Footer Component --}}
<footer class="dark:bg-dark-950 bg-gray-900 border-t dark:border-dark-800 border-gray-800">
    {{-- Main Footer --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-12">
            {{-- Brand Column --}}
            <div class="lg:col-span-1">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 mb-6">
                    <img src="{{ asset('images/Magenta Logo Alternate Terang.png') }}" alt="MAGENTA Logo"
                        class="h-12 w-auto">
                </a>
                <p class="text-gray-400 mb-6 leading-relaxed">
                    PT Magenta Jaya Makmur — A strategic partner ecosystem creating impactful events, immersive experiences, corporate engagement, and modern architectural spaces across Indonesia.
                </p>
                <div class="flex space-x-3">
                    <a href="https://instagram.com/magenta8787" target="_blank"
                        class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center text-gray-400 hover:bg-primary-500 hover:text-white transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="2" y="2" width="20" height="20" rx="5"/>
                        <circle cx="12" cy="12" r="4"/>
                        </svg>
                    </a>
                    <a href="https://wa.me/{{ $globalCtas['whatsapp_general'] ?? '6281821878787' }}" target="_blank"
                        class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center text-gray-400 hover:bg-green-600 hover:text-white transition-all">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
                        </svg>
                    </a>
                    <a href="mailto:magentajayamakmur@gmail.com"
                        class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center text-gray-400 hover:bg-primary-500 hover:text-white transition-all">
                        <i data-lucide="mail" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div>
                <h4 class="text-white font-semibold mb-6">Quick Links</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('about') }}"
                            class="text-gray-400 hover:text-primary-500 transition-colors">About Us</a></li>
                    <li><a href="{{ route('services.index') }}"
                            class="text-gray-400 hover:text-primary-500 transition-colors">Services</a></li>
                    <li><a href="{{ route('portfolio.index') }}"
                            class="text-gray-400 hover:text-primary-500 transition-colors">Portfolio</a></li>
                    <li><a href="{{ route('news.index') }}"
                            class="text-gray-400 hover:text-primary-500 transition-colors">News & Insight</a></li>
                    <li><a href="{{ route('career.index') }}"
                            class="text-gray-400 hover:text-primary-500 transition-colors">Career</a></li>
                    <li><a href="{{ route('partners') }}"
                            class="text-gray-400 hover:text-primary-500 transition-colors">Partners</a></li>
                    <li><a href="{{ route('contact') }}"
                            class="text-gray-400 hover:text-primary-500 transition-colors">Contact</a></li>
                </ul>
            </div>

            {{-- Business Units --}}
            <div>
                <h4 class="text-white font-semibold mb-6">Business Units</h4>
                <ul class="space-y-3">
                    @php $footerUnits = \App\Models\BusinessUnit::active()->ordered()->get(); @endphp
                    @foreach($footerUnits as $unit)
                        <li>
                            <a href="{{ route('units.show', $unit) }}"
                                class="flex items-center text-gray-400 hover:text-primary-500 transition-colors">
                                <span class="w-2 h-2 rounded-full mr-2"
                                    style="background-color: {{ $unit->color ?? '#DC2626' }}"></span>
                                {{ $unit->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Contact Info --}}
            <div>
                <h4 class="text-white font-semibold mb-6">Contact Info</h4>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <i data-lucide="map-pin" class="w-5 h-5 text-primary-500 mr-3 mt-0.5 flex-shrink-0"></i>
                        <a 
                            href="https://maps.app.goo.gl/6ZCsxAZaLjXaPsZS8" 
                            target="_blank"
                            class="text-gray-400 hover:text-white"
                            >
                            Jl. Ciliwung I No.12, Sidosari, Sidomulyo, Kec. Ungaran Tim., Kabupaten Semarang, Jawa Tengah 50514
                        </a>
                    </li>
                    <li class="flex items-center">
                        <i data-lucide="phone" class="w-5 h-5 text-primary-500 mr-3 flex-shrink-0"></i>
                        <a href="tel:+6281821878787" class="text-gray-400 hover:text-white">0818 218 787 87</a>
                    </li>
                    <li class="flex items-center">
                        <i data-lucide="mail" class="w-5 h-5 text-primary-500 mr-3 flex-shrink-0"></i>
                        <a href="mailto:magentajayamakmur@gmail.com"
                            class="text-gray-400 hover:text-white">magentajayamakmur@gmail.com</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Copyright Bar --}}
    <div class="border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-500 text-sm">
                    &copy; {{ date('Y') }} PT Magenta Jaya Makmur. All rights reserved.
                </p>
                <div class="flex items-center space-x-6 mt-4 md:mt-0">
                    <a href="{{ route('partners') }}"
                        class="text-gray-500 hover:text-primary-500 text-sm transition-colors">Partners</a>
                    <a href="{{ route('contact') }}"
                        class="text-gray-500 hover:text-primary-500 text-sm transition-colors">Contact</a>
                </div>
            </div>
        </div>
    </div>
</footer>