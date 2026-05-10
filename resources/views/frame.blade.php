@extends('layouts.app')

@section('title', 'Frame Templates - RuangJepret')

@section('content')
    <div class="relative min-h-screen overflow-hidden bg-gradient-to-br from-gray-50 via-white to-gray-100 pt-32 pb-20">
        <!-- Background Decorative Elements -->
        <div class="circular-dots-bg"></div>
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-40 -right-40 w-96 h-96 bg-gradient-to-br from-black/5 to-transparent rounded-full blur-3xl"></div>
            <div class="absolute top-1/4 -left-40 w-80 h-80 bg-gradient-to-tr from-black/5 to-transparent rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-gradient-to-r from-black/2 to-transparent rounded-full blur-3xl"></div>
        </div>
        <div class="grid-circle"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Header -->
            <div class="text-center mb-16 relative">
                <!-- Decorative elements -->
                <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-8">
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 bg-black rounded-full animate-pulse"></div>
                        <div class="w-1 h-1 bg-black/60 rounded-full animate-pulse delay-100"></div>
                        <div class="w-2 h-2 bg-black rounded-full animate-pulse delay-200"></div>
                    </div>
                </div>

                <h1 class="text-4xl md:text-6xl font-black uppercase tracking-tighter bg-clip-text text-transparent bg-gradient-to-r from-black via-black/90 to-black/80 mb-4 mt-4">
                    Pilih Frame Favoritmu
                </h1>
                
                <div class="w-24 h-1 bg-gradient-to-r from-black/40 to-black/60 mx-auto rounded-full mb-6 relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/50 to-transparent rounded-full animate-pulse"></div>
                </div>

                <p class="max-w-2xl text-lg text-black/70 mx-auto font-light">
                    Koleksi frame eksklusif untuk menyempurnakan momen terbaikmu bersama RuangJepret.
                </p>
            </div>

            @if ($frames->count() > 0)
                @php
                    $categories = $frames->pluck('category')->filter()->unique();
                    $ratios = $frames->pluck('rasio')->filter()->unique();
                    $qtyPhotos = $frames->pluck('qty_photo')->filter()->unique()->sort();
                @endphp

                <!-- Filter Bar -->
                <div class="mb-12 bg-white/70 backdrop-blur-xl p-3 sm:p-4 rounded-3xl shadow-lg shadow-black/5 border border-black/10 flex flex-col lg:flex-row gap-4 items-stretch lg:items-center justify-between">
                    <!-- Search -->
                    <div class="relative flex-1 group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400 group-focus-within:text-black transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <input type="text" id="searchInput" placeholder="Cari nama frame..."
                            class="w-full pl-11 pr-4 py-3 bg-white/50 border border-gray-200 rounded-2xl text-sm font-medium focus:ring-2 focus:ring-black/20 focus:border-black outline-none transition-all placeholder-gray-400">
                    </div>
                    
                    <!-- Filters -->
                    <div class="flex flex-wrap sm:flex-nowrap gap-3">
                        <select id="filterCategory" class="flex-1 sm:flex-none px-4 py-3 bg-white/50 border border-gray-200 rounded-2xl text-sm font-medium focus:ring-2 focus:ring-black/20 focus:border-black outline-none cursor-pointer transition-all text-gray-700">
                            <option value="">Semua Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ strtolower($category) }}">{{ ucfirst($category) }}</option>
                            @endforeach
                        </select>
                        <select id="filterRasio" class="flex-1 sm:flex-none px-4 py-3 bg-white/50 border border-gray-200 rounded-2xl text-sm font-medium focus:ring-2 focus:ring-black/20 focus:border-black outline-none cursor-pointer transition-all text-gray-700">
                            <option value="">Semua Rasio</option>
                            @foreach($ratios as $rasio)
                                <option value="{{ $rasio }}">{{ $rasio }}</option>
                            @endforeach
                        </select>
                        <select id="filterQty" class="flex-1 sm:flex-none px-4 py-3 bg-white/50 border border-gray-200 rounded-2xl text-sm font-medium focus:ring-2 focus:ring-black/20 focus:border-black outline-none cursor-pointer transition-all text-gray-700">
                            <option value="">Semua Foto</option>
                            @foreach($qtyPhotos as $qty)
                                <option value="{{ $qty }}">{{ $qty }} foto</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Frame Grid -->
                <div id="frameGrid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                    @foreach ($frames as $index => $frame)
                        @php
                            $displayName = $frame->name;
                            $isPremium = strtolower($frame->category) === 'premium';
                        @endphp
                        <div
                            class="frame-card group relative bg-white/80 backdrop-blur-sm rounded-3xl border border-black/5 hover:border-black/20 shadow-sm hover:shadow-xl hover:shadow-black/5 transition-all duration-500 cursor-pointer overflow-hidden transform hover:-translate-y-2 flex flex-col"
                            data-name="{{ strtolower($displayName) }}"
                            data-category="{{ strtolower($frame->category) }}"
                            data-rasio="{{ $frame->rasio }}"
                            data-qty="{{ $frame->qty_photo }}"
                        >
                            <!-- Premium Badge -->
                            @if($isPremium)
                                <div class="absolute top-4 right-4 z-20 bg-gradient-to-br from-black to-gray-800 text-white px-2.5 py-1 rounded-full text-[10px] font-bold tracking-wider flex items-center gap-1.5 shadow-lg shadow-black/20">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                    </svg>
                                    PRO
                                </div>
                            @endif

                            <!-- Image Container -->
                            <div class="relative w-full flex-1 flex items-center justify-center p-6 pt-8 pb-4" style="height: 280px;">
                                <!-- Decorative subtle bg -->
                                <div class="absolute inset-0 bg-gradient-to-b from-gray-50/50 to-transparent"></div>
                                
                                <img src="{{ asset('frames/' . $frame->image) }}" alt="{{ $displayName }}"
                                    class="relative z-10 max-h-full max-w-full object-contain transition-transform duration-700 ease-out group-hover:scale-105 drop-shadow-xl"
                                    loading="lazy">

                                <!-- Hover Overlay -->
                                <div class="absolute inset-0 bg-black/40 backdrop-blur-[2px] flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-500 z-20">
                                    <span class="bg-white text-black font-bold text-xs py-2.5 px-6 rounded-full transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500 shadow-xl">
                                        Lihat Detail
                                    </span>
                                </div>
                            </div>

                            <!-- Card Info -->
                            <div class="px-5 pb-5 pt-3 bg-white z-10 relative">
                                <h3 class="text-base font-bold text-black mb-2">{{ $displayName }}</h3>
                                <div class="flex flex-wrap items-center gap-2">
                                    <span class="text-[10px] text-gray-600 bg-gray-100/80 border border-gray-200/50 px-2.5 py-1 rounded-lg font-semibold tracking-wide">{{ $frame->rasio }}</span>
                                    <span class="text-[10px] text-gray-600 bg-gray-100/80 border border-gray-200/50 px-2.5 py-1 rounded-lg font-semibold tracking-wide">{{ $frame->qty_photo }} Photos</span>
                                    @if(!$isPremium)
                                        <span class="text-[10px] text-emerald-700 bg-emerald-50 border border-emerald-100 px-2.5 py-1 rounded-lg font-bold tracking-wide">FREE</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-24 bg-white/60 backdrop-blur-xl rounded-3xl border border-black/5 max-w-2xl mx-auto shadow-sm">
                    <div class="mx-auto w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-6 shadow-inner">
                        <svg class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-black mb-2">Belum Ada Frame</h3>
                    <p class="text-black/60 max-w-md mx-auto">Koleksi frame akan segera hadir. Tunggu update terbaru dari kami.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal Preview -->
    <div id="previewModal" class="fixed inset-0 z-[100] hidden">
        <div class="absolute inset-0 bg-black/80 backdrop-blur-md transition-opacity duration-300 opacity-0" id="modalBackdrop"></div>

        <div class="absolute inset-0 flex items-center justify-center p-4 sm:p-8" id="modalContent">
            <button onclick="closePreview()"
                class="absolute top-5 right-5 text-white/60 hover:text-white transition-colors hover:bg-white/10 rounded-full p-2.5 z-50">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <div class="relative w-full max-w-4xl transform scale-95 opacity-0 transition-all duration-300" id="modalInner">
                <div class="flex flex-col md:flex-row items-center gap-10 bg-white/5 p-6 sm:p-10 rounded-3xl border border-white/10 backdrop-blur-xl">
                    <!-- Preview Image -->
                    <div class="w-full md:w-1/2 flex justify-center items-center">
                        <img id="previewImage" src="" alt="Preview"
                            class="max-h-[55vh] md:max-h-[65vh] w-auto object-contain drop-shadow-2xl">
                    </div>

                    <!-- Info -->
                    <div class="w-full md:w-1/2 flex flex-col items-center md:items-start text-center md:text-left">
                        <span id="previewCategory" class="inline-block px-3 py-1 bg-white/10 text-white/70 text-xs font-semibold rounded-full mb-4 uppercase tracking-wider"></span>
                        <h3 id="previewTitle" class="text-2xl sm:text-3xl font-bold mb-3 text-white"></h3>
                        <p class="text-white/50 mb-8 text-sm leading-relaxed">
                            Template ini tersedia untuk sesi photobooth Anda. Desain elegan yang akan membuat foto-foto Anda semakin berkesan.
                        </p>

                        <a id="previewUseBtn" href="/booth"
                            class="inline-flex items-center gap-2 px-6 py-3 font-semibold text-sm text-black bg-white rounded-full transition-all hover:scale-105 hover:shadow-[0_0_30px_rgba(255,255,255,0.3)]">
                            Gunakan Frame Ini
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function openPreview(src, title, category, event) {
            if (event) event.preventDefault();

            const modal = document.getElementById('previewModal');
            const backdrop = document.getElementById('modalBackdrop');
            const inner = document.getElementById('modalInner');

            document.getElementById('previewImage').src = src;
            document.getElementById('previewTitle').textContent = title;
            document.getElementById('previewCategory').textContent = category || 'Template';

            modal.classList.remove('hidden');
            void modal.offsetWidth;

            backdrop.classList.remove('opacity-0');
            backdrop.classList.add('opacity-100');
            inner.classList.remove('scale-95', 'opacity-0');
            inner.classList.add('scale-100', 'opacity-100');

            document.body.style.overflow = 'hidden';
        }

        function closePreview() {
            const backdrop = document.getElementById('modalBackdrop');
            const inner = document.getElementById('modalInner');

            backdrop.classList.remove('opacity-100');
            backdrop.classList.add('opacity-0');
            inner.classList.remove('scale-100', 'opacity-100');
            inner.classList.add('scale-95', 'opacity-0');

            setTimeout(() => {
                document.getElementById('previewModal').classList.add('hidden');
                document.body.style.overflow = '';
            }, 300);
        }

        document.addEventListener('DOMContentLoaded', () => {
            // Card click → open modal
            const cards = document.querySelectorAll('.frame-card');
            cards.forEach(card => {
                card.addEventListener('click', (e) => {
                    const img = card.querySelector('img');
                    const title = card.querySelector('h3').textContent.trim();
                    const category = card.getAttribute('data-category');
                    openPreview(img.src, title, category, e);
                });
            });

            // Close on backdrop
            document.getElementById('modalContent').addEventListener('click', (e) => {
                if (e.target === document.getElementById('modalContent')) {
                    closePreview();
                }
            });

            // Close on Escape
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !document.getElementById('previewModal').classList.contains('hidden')) {
                    closePreview();
                }
            });

            // === Filtering ===
            const searchInput = document.getElementById('searchInput');
            const filterCategory = document.getElementById('filterCategory');
            const filterRasio = document.getElementById('filterRasio');
            const filterQty = document.getElementById('filterQty');
            const frameCards = document.querySelectorAll('.frame-card');
            const frameGrid = document.getElementById('frameGrid');

            function filterFrames() {
                if (!searchInput) return;

                const searchTerm = searchInput.value.toLowerCase();
                const categoryVal = filterCategory.value;
                const rasioVal = filterRasio.value;
                const qtyVal = filterQty.value;

                let visibleCount = 0;

                frameCards.forEach(card => {
                    const name = card.getAttribute('data-name') || '';
                    const category = card.getAttribute('data-category') || '';
                    const rasio = card.getAttribute('data-rasio') || '';
                    const qty = card.getAttribute('data-qty') || '';

                    const match =
                        name.includes(searchTerm) &&
                        (categoryVal === '' || category === categoryVal) &&
                        (rasioVal === '' || rasio === rasioVal) &&
                        (qtyVal === '' || qty === qtyVal);

                    card.style.display = match ? '' : 'none';
                    if (match) visibleCount++;
                });

                let emptyState = document.getElementById('filterEmptyState');
                if (visibleCount === 0) {
                    if (!emptyState) {
                        emptyState = document.createElement('div');
                        emptyState.id = 'filterEmptyState';
                        emptyState.className = 'col-span-full text-center py-16';
                        emptyState.innerHTML = `
                            <div class="mx-auto w-14 h-14 bg-gray-100 rounded-2xl flex items-center justify-center mb-3">
                                <svg class="h-7 w-7 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-gray-900">Tidak ada frame yang cocok</p>
                            <p class="text-xs text-gray-400 mt-1">Coba ubah filter pencarian Anda</p>
                        `;
                        if (frameGrid) frameGrid.appendChild(emptyState);
                    }
                    emptyState.style.display = 'block';
                } else if (emptyState) {
                    emptyState.style.display = 'none';
                }
            }

            if (searchInput) {
                searchInput.addEventListener('input', filterFrames);
                filterCategory.addEventListener('change', filterFrames);
                filterRasio.addEventListener('change', filterFrames);
                filterQty.addEventListener('change', filterFrames);
            }
        });
    </script>
@endpush
