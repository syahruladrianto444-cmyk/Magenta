@extends('layouts.app')

@section('title', 'Our Works - Magenta87 Group')

@section('content')
    <section class="relative pt-32 pb-20 dark:bg-dark-950 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl" data-aos="fade-right">
                <div
                    class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6">
                    Case Studies
                </div>
                <h1 class="text-5xl md:text-6xl font-bold dark:text-white text-dark-900 mb-6">Our <span
                        class="text-gradient">Works</span></h1>
                <p class="text-xl dark:text-dark-300 text-dark-600">Case studies showcasing experiences, engagement, and impact across our projects.
                </p>
            </div>
        </div>
    </section>

    <section class="py-12 dark:bg-dark-900 bg-white border-b dark:border-dark-800 border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('portfolio.index') }}"
                    class="px-4 py-2 rounded-full text-sm font-medium transition-colors {{ !request('unit') && !request('service') ? 'bg-primary-500 text-white' : 'dark:bg-dark-800 bg-gray-100 dark:text-dark-300 text-dark-600 hover:text-primary-500' }}">Semua</a>
                @foreach($units as $unit)
                    <a href="{{ route('portfolio.index', ['unit' => $unit->slug]) }}"
                        class="px-4 py-2 rounded-full text-sm font-medium transition-colors {{ request('unit') == $unit->slug ? 'bg-primary-500 text-white' : 'dark:bg-dark-800 bg-gray-100 dark:text-dark-300 text-dark-600 hover:text-primary-500' }}">{{ $unit->name }}</a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-24 dark:bg-dark-950 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($portfolios->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($portfolios as $index => $portfolio)
                        <a href="{{ route('portfolio.show', $portfolio) }}"
                            class="group relative aspect-[4/3] dark:bg-dark-800 bg-white rounded-2xl overflow-hidden card-hover shadow-sm"
                            data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                            @if($portfolio->featured_image)
                                <img src="{{ asset('storage/' . $portfolio->featured_image) }}" alt="{{ $portfolio->title }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div
                                    class="w-full h-full bg-gradient-to-br from-primary-500/20 to-primary-500/5 flex items-center justify-center">
                                    <i data-lucide="image" class="w-12 h-12 dark:text-dark-600 text-dark-400"></i>
                                </div>
                            @endif
                            <div
                                class="absolute inset-0 bg-gradient-to-t dark:from-dark-900 from-dark-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                            </div>
                            <div
                                class="absolute bottom-0 left-0 right-0 p-6 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all">
                                @if($portfolio->businessUnit)
                                    <span
                                        class="inline-block px-3 py-1 bg-primary-500/20 text-primary-400 text-xs rounded-full mb-2">{{ $portfolio->businessUnit->name }}</span>
                                @endif
                                <h3 class="text-xl font-bold text-white">{{ $portfolio->title }}</h3>
                                @if($portfolio->client)
                                    <p class="text-dark-300">{{ $portfolio->client }}</p>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="mt-12">{{ $portfolios->links() }}</div>
            @else
                <div class="text-center py-20">
                    <i data-lucide="folder-open" class="w-16 h-16 dark:text-dark-600 text-dark-400 mx-auto mb-4"></i>
                    <h3 class="text-xl dark:text-white text-dark-900 mb-2">Belum Ada Portfolio</h3>
                    <p class="dark:text-dark-400 text-dark-600">Portfolio akan segera ditambahkan.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- ============================================== --}}
    {{-- PRESENTATION DECKS SECTION --}}
    {{-- ============================================== --}}
    @if($decks->count() > 0)
    <section class="py-24 dark:bg-dark-900 bg-white" x-data="presentationDecks()" x-cloak>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Section Header --}}
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="inline-flex items-center px-4 py-2 bg-primary-500/10 rounded-full text-primary-500 text-sm font-medium mb-6">
                    <i data-lucide="book-open" class="w-4 h-4 mr-2"></i>
                    Corporate Profiles
                </div>
                <h2 class="text-4xl md:text-5xl font-bold dark:text-white text-dark-900 mb-6">
                    Company Profile & <span class="text-gradient">Presentation Deck</span>
                </h2>
                <p class="text-lg dark:text-dark-300 text-dark-600 max-w-2xl mx-auto">
                    Explore our company profiles and strategic presentation decks across all business units.
                </p>
            </div>

            {{-- Filter Tabs --}}
            <div class="flex flex-wrap justify-center gap-3 mb-12" data-aos="fade-up" data-aos-delay="100">
                <button @click="activeFilter = 'all'"
                    :class="activeFilter === 'all' ? 'bg-primary-500 text-white' : 'dark:bg-dark-800 bg-gray-100 dark:text-dark-300 text-dark-600 hover:text-primary-500'"
                    class="px-4 py-2 rounded-full text-sm font-medium transition-colors">Semua</button>
                @php $unitFilters = $decks->pluck('business_unit')->filter()->unique(); @endphp
                @foreach($unitFilters as $unitFilter)
                <button @click="activeFilter = '{{ $unitFilter }}'"
                    :class="activeFilter === '{{ $unitFilter }}' ? 'bg-primary-500 text-white' : 'dark:bg-dark-800 bg-gray-100 dark:text-dark-300 text-dark-600 hover:text-primary-500'"
                    class="px-4 py-2 rounded-full text-sm font-medium transition-colors">{{ $unitFilter }}</button>
                @endforeach
            </div>

            {{-- Deck Cards Grid --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($decks as $index => $deck)
                <div x-show="activeFilter === 'all' || activeFilter === '{{ $deck->business_unit }}'"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform scale-95"
                     x-transition:enter-end="opacity-100 transform scale-100"
                     class="group relative dark:bg-dark-800 bg-gray-50 rounded-2xl overflow-hidden border border-gray-200 dark:border-dark-700 hover:border-primary-500/50 transition-all duration-500 card-hover shadow-sm"
                     data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                    
                    {{-- Thumbnail --}}
                    <div class="relative aspect-[16/10] overflow-hidden">
                        @if($deck->thumbnail_image)
                            <img src="{{ asset('storage/' . $deck->thumbnail_image) }}" alt="{{ $deck->title }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @else
                            <div class="w-full h-full bg-gradient-to-br dark:from-dark-700 dark:to-dark-900 from-gray-200 to-gray-300 flex items-center justify-center">
                                <i data-lucide="book-open" class="w-12 h-12 dark:text-dark-500 text-dark-400"></i>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        {{-- Business Unit Badge --}}
                        @if($deck->business_unit)
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-primary-500/90 text-white text-xs font-semibold rounded-full backdrop-blur-sm">{{ $deck->business_unit }}</span>
                        </div>
                        @endif

                        {{-- Featured Badge --}}
                        @if($deck->is_featured)
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 bg-yellow-500/90 text-white text-xs font-semibold rounded-full backdrop-blur-sm flex items-center">
                                <i data-lucide="star" class="w-3 h-3 mr-1 fill-current"></i>Featured
                            </span>
                        </div>
                        @endif
                    </div>

                    {{-- Card Content --}}
                    <div class="p-6">
                        @if($deck->category)
                            <span class="text-xs font-medium text-primary-500 uppercase tracking-wider">{{ $deck->category }}</span>
                        @endif
                        <h3 class="text-lg font-bold dark:text-white text-dark-900 mt-1 mb-2 group-hover:text-primary-500 transition-colors">{{ $deck->title }}</h3>
                        @if($deck->short_description)
                            <p class="text-sm dark:text-dark-400 text-dark-600 leading-relaxed mb-4 line-clamp-2">{{ $deck->short_description }}</p>
                        @endif
                        
                        @if($deck->pdf_file)
                        <button @click="openFlipbook('{{ asset('storage/' . $deck->pdf_file) }}', '{{ addslashes($deck->title) }}')"
                            class="inline-flex items-center text-primary-500 font-medium text-sm hover:text-primary-400 transition-colors group/btn">
                            <i data-lucide="book-open" class="w-4 h-4 mr-2"></i>
                            <span>View Presentation</span>
                            <i data-lucide="arrow-right" class="w-4 h-4 ml-1 group-hover/btn:translate-x-1 transition-transform"></i>
                        </button>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- ============================================== --}}
        {{-- FLIPBOOK MODAL --}}
        {{-- ============================================== --}}
        <div x-show="modalOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-[9999]" style="display:none;"
             @keydown.escape.window="closeViewer()"
             @keydown.left.window="prevPage()"
             @keydown.right.window="nextPage()"
             @keydown.f.window="toggleFullscreen()">
            
            {{-- Full dark background --}}
            <div class="absolute inset-0 bg-black"></div>
            
            {{-- Modal Layout --}}
            <div class="relative z-10 w-full h-full flex flex-col" id="flipbookModal">
                
                {{-- Top Bar --}}
                <div class="flex items-center justify-between px-4 md:px-8 py-3 flex-shrink-0 bg-black/60 backdrop-blur-sm border-b border-white/5"
                     x-show="showControls" x-transition>
                    <div class="min-w-0 flex-1 mr-4">
                        <h3 class="text-white font-semibold text-base md:text-lg truncate" x-text="currentTitle"></h3>
                        <p class="text-white/40 text-xs md:text-sm" x-text="'Halaman ' + currentPage + ' dari ' + totalPages"></p>
                    </div>
                    <div class="flex items-center space-x-1.5 flex-shrink-0">
                        {{-- Download --}}
                        <a :href="currentPdf" :download="currentTitle + '.pdf'" 
                           class="flex items-center px-3 py-2 bg-white/10 hover:bg-white/20 rounded-lg text-white transition-colors text-sm">
                            <i data-lucide="download" class="w-4 h-4 mr-1.5"></i>
                            <span class="hidden sm:inline">Download</span>
                        </a>
                        {{-- Fullscreen --}}
                        <button @click="toggleFullscreen()" 
                                class="p-2 bg-white/10 hover:bg-white/20 rounded-lg text-white transition-colors" title="Fullscreen (F)">
                            <i data-lucide="maximize" class="w-4 h-4" x-show="!isFullscreen"></i>
                            <i data-lucide="minimize" class="w-4 h-4" x-show="isFullscreen" style="display:none;"></i>
                        </button>
                        {{-- Close --}}
                        <button @click="closeViewer()" class="p-2 bg-white/10 hover:bg-red-500/80 rounded-lg text-white transition-colors">
                            <i data-lucide="x" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>

                {{-- Canvas Viewer --}}
                <div class="relative flex-1 flex items-center justify-center overflow-hidden"
                     id="flipbookContainer"
                     @click="showControls = !showControls"
                     @touchstart="touchStartX = $event.touches[0].clientX"
                     @touchend="handleSwipe($event)">
                    
                    {{-- Loading --}}
                    <div x-show="isLoading" class="absolute inset-0 flex items-center justify-center z-30">
                        <div class="text-center">
                            <div class="w-12 h-12 border-3 border-primary-500 border-t-transparent rounded-full animate-spin mx-auto mb-3"></div>
                            <p class="text-white/60 text-sm">Memuat halaman...</p>
                        </div>
                    </div>

                    {{-- Page turn container --}}
                    <div id="flipStage" class="flip-stage" style="perspective: 2000px;">
                        {{-- Bottom layer: shows new page --}}
                        <div id="pageBottom" class="flip-page-layer">
                            <canvas id="canvasBottom"></canvas>
                        </div>
                        {{-- Top layer: flips to reveal bottom --}}
                        <div id="pageTop" class="flip-page-layer">
                            <canvas id="canvasTop"></canvas>
                            {{-- Shadow overlay on the flipping page --}}
                            <div id="flipShadow" class="flip-shadow"></div>
                        </div>
                    </div>

                    {{-- Left nav hover zone --}}
                    <div class="absolute left-0 top-0 w-1/4 h-full cursor-pointer z-10 group" 
                         @click.stop="prevPage()">
                        <div class="absolute left-3 md:left-6 top-1/2 -translate-y-1/2 p-2.5 md:p-3 bg-black/40 backdrop-blur rounded-full opacity-0 group-hover:opacity-100 transition-all duration-200">
                            <i data-lucide="chevron-left" class="w-5 h-5 md:w-6 md:h-6 text-white"></i>
                        </div>
                    </div>

                    {{-- Right nav hover zone --}}
                    <div class="absolute right-0 top-0 w-1/4 h-full cursor-pointer z-10 group" 
                         @click.stop="nextPage()">
                        <div class="absolute right-3 md:right-6 top-1/2 -translate-y-1/2 p-2.5 md:p-3 bg-black/40 backdrop-blur rounded-full opacity-0 group-hover:opacity-100 transition-all duration-200">
                            <i data-lucide="chevron-right" class="w-5 h-5 md:w-6 md:h-6 text-white"></i>
                        </div>
                    </div>
                </div>

                {{-- Bottom Bar --}}
                <div class="flex items-center justify-center px-4 py-2.5 flex-shrink-0 bg-black/60 backdrop-blur-sm border-t border-white/5"
                     x-show="showControls" x-transition>
                    <button @click="prevPage()" :disabled="currentPage <= 1"
                        class="p-2 bg-white/10 hover:bg-white/20 disabled:opacity-20 disabled:cursor-not-allowed rounded-lg text-white transition-all">
                        <i data-lucide="chevron-left" class="w-4 h-4"></i>
                    </button>
                    
                    <div class="flex items-center space-x-1 mx-3 max-w-xs overflow-x-auto px-1">
                        <template x-for="page in totalPages" :key="page">
                            <button @click="goToPage(page)"
                                :class="currentPage === page ? 'bg-primary-500 w-6 h-1.5' : 'bg-white/20 w-1.5 h-1.5 hover:bg-white/40'"
                                class="rounded-full transition-all duration-300 flex-shrink-0"></button>
                        </template>
                    </div>

                    <button @click="nextPage()" :disabled="currentPage >= totalPages"
                        class="p-2 bg-white/10 hover:bg-white/20 disabled:opacity-20 disabled:cursor-not-allowed rounded-lg text-white transition-all">
                        <i data-lucide="chevron-right" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection

@push('styles')
<style>
    .flip-stage {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
    }
    .flip-page-layer {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
    }
    .flip-page-layer canvas {
        max-width: 95%;
        max-height: 95%;
        border-radius: 3px;
        box-shadow: 0 4px 30px rgba(0,0,0,0.4), 0 1px 4px rgba(0,0,0,0.2);
    }
    .flip-shadow {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        pointer-events: none;
        opacity: 0;
        transition: opacity 0.1s;
    }
    /* Page turn animation - next page (turn from right edge) */
    @keyframes pageTurnNext {
        0% {
            transform: rotateY(0deg);
        }
        100% {
            transform: rotateY(-180deg);
        }
    }
    /* Page turn animation - prev page (turn from left edge) */
    @keyframes pageTurnPrev {
        0% {
            transform: rotateY(0deg);
        }
        100% {
            transform: rotateY(180deg);
        }
    }
    .flip-next {
        animation: pageTurnNext 0.6s cubic-bezier(0.4, 0.0, 0.2, 1) forwards;
        transform-origin: left center;
        transform-style: preserve-3d;
    }
    .flip-prev {
        animation: pageTurnPrev 0.6s cubic-bezier(0.4, 0.0, 0.2, 1) forwards;
        transform-origin: right center;
        transform-style: preserve-3d;
    }
    .flip-next .flip-shadow,
    .flip-prev .flip-shadow {
        background: linear-gradient(90deg, transparent 30%, rgba(0,0,0,0.15) 100%);
        animation: shadowFade 0.6s ease forwards;
    }
    @keyframes shadowFade {
        0% { opacity: 0; }
        30% { opacity: 1; }
        80% { opacity: 1; }
        100% { opacity: 0; }
    }
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>
<script>
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.worker.min.js';

    function presentationDecks() {
        return {
            activeFilter: 'all',
            modalOpen: false,
            currentPdf: '',
            currentTitle: '',
            currentPage: 1,
            totalPages: 0,
            isLoading: false,
            pdfDoc: null,
            rendering: false,
            touchStartX: 0,
            showControls: true,
            isFullscreen: false,

            openFlipbook(pdfUrl, title) {
                this.currentTitle = title;
                this.currentPdf = pdfUrl;
                this.currentPage = 1;
                this.totalPages = 0;
                this.isLoading = true;
                this.rendering = false;
                this.pdfDoc = null;
                this.showControls = true;
                this.modalOpen = true;
                document.body.style.overflow = 'hidden';

                var self = this;
                setTimeout(function() { self.loadPdf(pdfUrl); }, 150);
            },

            closeViewer() {
                if (this.isFullscreen) this.exitFullscreen();
                this.modalOpen = false;
                this.pdfDoc = null;
                this.rendering = false;
                this.currentPdf = '';
                document.body.style.overflow = '';
            },

            toggleFullscreen() {
                var el = document.getElementById('flipbookModal');
                if (!this.isFullscreen) {
                    if (el.requestFullscreen) el.requestFullscreen();
                    else if (el.webkitRequestFullscreen) el.webkitRequestFullscreen();
                    this.isFullscreen = true;
                } else {
                    this.exitFullscreen();
                }
                var self = this;
                setTimeout(function() { 
                    if (self.pdfDoc && !self.rendering) self.renderPage(self.currentPage); 
                }, 300);
            },

            exitFullscreen() {
                if (document.exitFullscreen) document.exitFullscreen();
                else if (document.webkitExitFullscreen) document.webkitExitFullscreen();
                this.isFullscreen = false;
            },

            loadPdf(url) {
                var self = this;
                pdfjsLib.getDocument(url).promise.then(function(pdf) {
                    self.pdfDoc = pdf;
                    self.totalPages = pdf.numPages;
                    self.renderPage(1);
                }, function(err) {
                    console.error('PDF load error:', err);
                    self.isLoading = false;
                });
            },

            // Render a PDF page onto a specific canvas
            renderToCanvas(pageNum, canvas, callback) {
                var self = this;
                this.pdfDoc.getPage(pageNum).then(function(page) {
                    var ctx = canvas.getContext('2d');
                    var container = document.getElementById('flipbookContainer');
                    var maxH = container.clientHeight - 20;
                    var maxW = container.clientWidth - 20;

                    var viewport = page.getViewport({ scale: 1 });
                    var ratio = viewport.width / viewport.height;
                    var dpr = window.devicePixelRatio || 1;
                    var displayH, displayW;

                    if (maxH * ratio <= maxW) {
                        displayH = maxH; displayW = maxH * ratio;
                    } else {
                        displayW = maxW; displayH = maxW / ratio;
                    }

                    canvas.style.width = displayW + 'px';
                    canvas.style.height = displayH + 'px';
                    canvas.width = Math.floor(displayW * dpr);
                    canvas.height = Math.floor(displayH * dpr);

                    var scale = (displayW * dpr) / viewport.width;
                    page.render({ canvasContext: ctx, viewport: page.getViewport({ scale: scale }) })
                        .promise.then(callback, function(err) {
                            console.error('Render err:', err);
                            if (callback) callback();
                        });
                }, function(err) {
                    console.error('getPage err:', err);
                    if (callback) callback();
                });
            },

            renderPage(pageNum, direction) {
                if (!this.pdfDoc || this.rendering) return;
                this.rendering = true;
                var self = this;

                var canvasTop = document.getElementById('canvasTop');
                var canvasBottom = document.getElementById('canvasBottom');
                var pageTopEl = document.getElementById('pageTop');

                if (!direction) {
                    // First load - render directly to top canvas, no animation
                    this.renderToCanvas(pageNum, canvasTop, function() {
                        pageTopEl.className = 'flip-page-layer';
                        pageTopEl.style.transform = '';
                        self.currentPage = pageNum;
                        self.isLoading = false;
                        self.rendering = false;
                        setTimeout(function() { lucide.createIcons(); }, 50);
                    });
                    return;
                }

                // Step 1: Render new page onto bottom canvas (hidden behind top)
                this.renderToCanvas(pageNum, canvasBottom, function() {

                    // Step 2: Make sure top canvas shows current page, then animate it away
                    pageTopEl.className = 'flip-page-layer';
                    pageTopEl.style.transform = '';

                    // Force reflow
                    pageTopEl.offsetHeight;

                    // Step 3: Start flip animation
                    pageTopEl.className = 'flip-page-layer ' + (direction === 'next' ? 'flip-next' : 'flip-prev');

                    // Step 4: When animation ends, swap content
                    setTimeout(function() {
                        // Copy bottom canvas content to top canvas
                        var ctxTop = canvasTop.getContext('2d');
                        canvasTop.width = canvasBottom.width;
                        canvasTop.height = canvasBottom.height;
                        canvasTop.style.width = canvasBottom.style.width;
                        canvasTop.style.height = canvasBottom.style.height;
                        ctxTop.drawImage(canvasBottom, 0, 0);

                        // Reset top layer
                        pageTopEl.className = 'flip-page-layer';
                        pageTopEl.style.transform = '';

                        self.currentPage = pageNum;
                        self.rendering = false;

                        setTimeout(function() { lucide.createIcons(); }, 50);
                    }, 620); // Match animation duration (600ms + buffer)
                });
            },

            prevPage() {
                if (this.currentPage > 1 && !this.rendering) this.renderPage(this.currentPage - 1, 'prev');
            },
            nextPage() {
                if (this.currentPage < this.totalPages && !this.rendering) this.renderPage(this.currentPage + 1, 'next');
            },
            goToPage(page) {
                if (page >= 1 && page <= this.totalPages && page !== this.currentPage && !this.rendering) {
                    this.renderPage(page, page > this.currentPage ? 'next' : 'prev');
                }
            },
            handleSwipe(event) {
                var diff = this.touchStartX - event.changedTouches[0].clientX;
                if (Math.abs(diff) > 50) {
                    if (diff > 0) this.nextPage(); else this.prevPage();
                }
            }
        };
    }
</script>
@endpush
