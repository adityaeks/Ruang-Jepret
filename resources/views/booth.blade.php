@extends('layouts.app')

@section('title', 'Booth - RuangJepret')

@section('content')
    <div class="min-h-screen bg-white relative overflow-hidden mt-20">
        <!-- Background Effects -->
        <div class="absolute inset-0">
            <div class="circular-dots-bg"></div>
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-black/5 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-black/3 rounded-full blur-3xl"></div>
        </div>

        <!-- Main Content -->
        <div class="relative z-10 min-h-screen flex flex-col">
            <!-- Header -->
            <div class="text-center py-4 md:py-8 px-4">
                <h1 class="text-2xl sm:text-4xl md:text-6xl font-bold text-black mb-2 md:mb-4">
                    <span class="bg-gradient-to-r from-black via-black/90 to-black/80 bg-clip-text text-transparent">
                        Photo Booth
                    </span>
                </h1>
                <p class="text-black/70 text-sm sm:text-lg max-w-2xl mx-auto">
                    Siap untuk mengabadikan momen berharga? Mari mulai sesi foto Anda!
                </p>
            </div>

            <!-- Camera Section -->
            <div class="flex-1 flex items-center justify-center px-2 sm:px-4">
                <div class="w-full max-w-6xl">

                    <!-- Main Layout Container -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">

                        <!-- Camera Container -->
                        <div
                            class="relative bg-white/80 backdrop-blur-sm rounded-2xl sm:rounded-3xl border border-black/10 p-4 sm:p-6 shadow-lg lg:col-span-2">

                            <!-- Camera Settings -->
                            <div class="flex flex-row gap-2 sm:gap-4 justify-center items-center mb-4 sm:mb-6">
                                <!-- Rasio Foto -->
                                <div class="flex items-center gap-1 sm:gap-2">
                                    <label
                                        class="text-xs sm:text-sm font-medium text-black/80 whitespace-nowrap">Rasio:</label>
                                    <div class="dropdown">
                                        <button class="btn btn-outline-dark dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false" id="photo-ratio-btn">
                                            4:3
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item active" href="#" data-value="4:3">4:3</a></li>
                                            <li><a class="dropdown-item" href="#" data-value="1:1">1:1</a></li>
                                            <li><a class="dropdown-item" href="#" data-value="16:9">16:9</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Jumlah Foto -->
                                <div class="flex items-center gap-1 sm:gap-2">
                                    <label class="text-xs sm:text-sm font-medium text-black/80 whitespace-nowrap">Jumlah
                                        Foto:</label>
                                    <div class="dropdown">
                                        <button class="btn btn-outline-dark dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false" id="photo-count-btn">
                                            3
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-value="1">1</a></li>
                                            <li><a class="dropdown-item active" href="#" data-value="3">3</a></li>
                                            <li><a class="dropdown-item" href="#" data-value="4">4</a></li>
                                            {{-- <li><a class="dropdown-item" href="#" data-value="5">5</a></li> --}}
                                            {{-- <li><a class="dropdown-item" href="#" data-value="10">10</a></li> --}}
                                        </ul>
                                    </div>
                                </div>

                                <!-- Delay Foto -->
                                <div class="flex items-center gap-1 sm:gap-2">
                                    <label
                                        class="text-xs sm:text-sm font-medium text-black/80 whitespace-nowrap">Delay:</label>
                                    <div class="dropdown">
                                        <button class="btn btn-outline-dark dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false" id="photo-delay-btn">
                                            3s
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-value="1">1s</a></li>
                                            <li><a class="dropdown-item" href="#" data-value="2">2s</a></li>
                                            <li><a class="dropdown-item active" href="#" data-value="3">3s</a></li>
                                            <li><a class="dropdown-item" href="#" data-value="5">5s</a></li>
                                            {{-- <li><a class="dropdown-item" href="#" data-value="10">10s</a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>


                            <!-- Camera Preview -->
                            <div
                                class="relative aspect-video bg-gray-100 rounded-xl sm:rounded-2xl overflow-hidden mb-4 sm:mb-6 border border-black/10 max-w-2xl mx-auto">
                                <video id="camera-preview" class="w-full h-full object-cover" autoplay playsinline muted>
                                </video>

                                <!-- Camera Overlay -->
                                <div id="camera-overlay" class="absolute inset-0 flex items-center justify-center">
                                    <div class="text-center text-black/60">
                                        <svg class="w-8 h-8 sm:w-12 sm:h-12 mx-auto mb-2 sm:mb-3 opacity-50" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <p class="text-sm sm:text-base">Kamera belum aktif</p>
                                        <p class="text-xs">Klik "Buka Kamera" untuk memulai</p>
                                    </div>
                                </div>

                                <!-- Aspect Ratio Overlay -->
                                <div id="aspect-ratio-overlay" class="absolute inset-0 pointer-events-none hidden">
                                    <!-- Overlay akan di-generate secara dinamis -->
                                </div>

                                <!-- Camera Status Indicator -->
                                <div class="absolute top-2 sm:top-4 right-2 sm:right-4">
                                    <div id="camera-status"
                                        class="flex items-center gap-1 sm:gap-2 bg-white/80 backdrop-blur-sm rounded-full px-2 sm:px-3 py-1 border border-black/10">
                                        <div class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-red-500 rounded-full animate-pulse"></div>
                                        <span class="text-black text-xs sm:text-sm">Kamera Off</span>
                                    </div>
                                </div>

                                <!-- Capture Countdown -->
                                <div id="countdown" class="absolute inset-0 flex items-center justify-center hidden">
                                    <div class="text-center">
                                        <div
                                            class="text-4xl sm:text-6xl font-bold text-white bg-black/80 rounded-full w-16 h-16 sm:w-24 sm:h-24 flex items-center justify-center mb-2 sm:mb-3 countdown-circle">
                                            <span id="countdown-number">3</span>
                                        </div>
                                        <div
                                            class="text-white bg-black/60 rounded-full px-2 sm:px-3 py-1 sm:py-1.5 text-xs sm:text-sm">
                                            <span id="photo-progress">Foto 1 dari 3</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Flash Effect -->
                                <div id="flash-effect"
                                    class="absolute inset-0 bg-white opacity-0 pointer-events-none transition-opacity duration-200 hidden">
                                </div>

                                <!-- Camera Flash Overlay -->
                                <div id="camera-flash-overlay"
                                    class="absolute inset-0 bg-white opacity-0 pointer-events-none transition-all duration-300 hidden z-50">
                                </div>

                                <!-- Shutter Effect -->
                                <div id="shutter-effect" class="absolute inset-0 pointer-events-none hidden">
                                    <div
                                        class="shutter-top absolute top-0 left-0 w-full h-1/2 bg-black transform -translate-y-full transition-transform duration-300">
                                    </div>
                                    <div
                                        class="shutter-bottom absolute bottom-0 left-0 w-full h-1/2 bg-black transform translate-y-full transition-transform duration-300">
                                    </div>
                                </div>
                            </div>

                            <!-- Camera Controls -->
                            <div class="grid grid-cols-2 sm:flex sm:flex-wrap gap-2 sm:gap-3 justify-center">
                                <!-- Open Camera Button -->
                                <button id="open-camera-btn"
                                    class="col-span-2 sm:col-span-1 px-4 sm:px-6 py-2.5 sm:py-3 bg-black text-white font-semibold rounded-full transition-all duration-300 transform hover:scale-105 hover:bg-black/90 flex items-center justify-center gap-2 text-xs sm:text-sm">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    Buka Kamera
                                </button>

                                <!-- Capture Button -->
                                <button id="capture-btn"
                                    class="col-span-2 sm:col-span-1 px-4 sm:px-6 py-2.5 sm:py-3 bg-black text-white font-semibold rounded-full transition-all duration-300 transform hover:scale-105 hover:bg-black/90 flex items-center justify-center gap-2 text-xs sm:text-sm hidden">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Jepret Foto
                                </button>

                                <!-- Mirror Button -->
                                <button id="mirror-btn"
                                    class="px-3 sm:px-4 py-2.5 sm:py-3 bg-white border border-black text-black font-semibold rounded-full transition-all duration-300 transform hover:scale-105 hover:bg-black hover:text-white flex items-center justify-center gap-1 sm:gap-2 text-xs sm:text-sm hidden">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    Mirror
                                </button>

                                <!-- Switch Camera Button -->
                                <button id="switch-camera-btn"
                                    class="px-3 sm:px-4 py-2.5 sm:py-3 bg-white border border-black text-black font-semibold rounded-full transition-all duration-300 transform hover:scale-105 hover:bg-black hover:text-white flex items-center justify-center gap-1 sm:gap-2 text-xs sm:text-sm hidden">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                        </path>
                                    </svg>
                                    Ganti
                                </button>

                                <!-- Close Camera Button -->
                                <button id="close-camera-btn"
                                    class="px-3 sm:px-4 py-2.5 sm:py-3 bg-white border border-black text-black font-semibold rounded-full transition-all duration-300 transform hover:scale-105 hover:bg-black hover:text-white flex items-center justify-center gap-1 sm:gap-2 text-xs sm:text-sm hidden">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Tutup
                                </button>
                            </div>
                        </div>

                        <!-- Captured Photo Preview -->
                        <div id="photo-preview"
                            class="hidden lg:block bg-white/80 backdrop-blur-sm rounded-2xl sm:rounded-3xl border border-black/10 p-4 sm:p-6 shadow-lg">
                            <h3 class="text-xl sm:text-2xl font-bold text-black mb-4 sm:mb-6 text-center">Hasil Foto</h3>

                            <!-- Photo Gallery -->
                            <div id="photo-gallery" class="grid grid-cols-4 gap-2 sm:gap-3 mb-4">
                                <!-- Photos will be dynamically added here -->
                            </div>

                            <!-- Photo Display -->
                            <div class="mb-4 relative group">
                                <canvas id="photo-canvas" class="w-full rounded-xl border border-black/10"></canvas>

                                <!-- Hover Overlay with Action Buttons -->
                                <div
                                    class="absolute inset-0 bg-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 rounded-xl flex items-center justify-center hover-overlay">
                                    <div
                                        class="flex items-center justify-center gap-4 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                        <button id="desktop-accept-btn"
                                            class="px-4 py-2 bg-white text-black font-semibold rounded-full transition-all duration-300 transform hover:scale-105 hover:bg-gray-100 flex items-center gap-1.5 shadow-lg border border-gray-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            Accept
                                        </button>

                                        <button id="desktop-retake-hover-btn"
                                            class="px-4 py-2 bg-black text-white font-semibold rounded-full transition-all duration-300 transform hover:scale-105 hover:bg-gray-800 flex items-center gap-1.5 shadow-lg">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                                </path>
                                            </svg>
                                            Ulang
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Template Selection Button -->
                            <div class="flex justify-center">
                                <button id="select-template-btn"
                                    class="px-6 sm:px-8 py-3 sm:py-4 bg-gray-400 text-white font-semibold rounded-full transition-all duration-300 transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100 flex items-center justify-center gap-2 text-sm sm:text-base"
                                    disabled>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                        </path>
                                    </svg>
                                    Pilih Template
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Photo Preview (shown only on mobile) -->
            <div id="mobile-photo-preview" class="lg:hidden mt-6">
                <div id="mobile-photo-preview-content"
                    class="hidden bg-white/80 backdrop-blur-sm rounded-2xl sm:rounded-3xl border border-black/10 p-4 sm:p-6 shadow-lg">
                    <h3 class="text-xl sm:text-2xl font-bold text-black mb-4 sm:mb-6 text-center">Hasil Foto</h3>

                    <!-- Mobile Photo Gallery -->
                    <div id="mobile-photo-gallery" class="grid grid-cols-4 gap-2 sm:gap-3 mb-4">
                        <!-- Photos will be dynamically added here -->
                    </div>

                    <!-- Mobile Photo Display -->
                    <div class="mb-4 relative group">
                        <canvas id="mobile-photo-canvas" class="w-full rounded-xl border border-black/10"></canvas>

                        <!-- Hover Overlay with Action Buttons -->
                        <div
                            class="absolute inset-0 bg-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 rounded-xl flex items-center justify-center hover-overlay">
                            <div
                                class="flex items-center justify-center gap-4 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                <button id="mobile-accept-btn"
                                    class="px-4 py-2 bg-white text-black font-semibold rounded-full transition-all duration-300 transform hover:scale-105 hover:bg-gray-100 flex items-center gap-1.5 shadow-lg border border-gray-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Accept
                                </button>

                                <button id="mobile-retake-hover-btn"
                                    class="px-4 py-2 bg-black text-white font-semibold rounded-full transition-all duration-300 transform hover:scale-105 hover:bg-gray-800 flex items-center gap-1.5 shadow-lg">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                        </path>
                                    </svg>
                                    Ulang
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile Template Selection Button -->
                    <div class="flex justify-center">
                        <button id="mobile-select-template-btn"
                            class="px-6 sm:px-8 py-3 sm:py-4 bg-gray-400 text-white font-semibold rounded-full transition-all duration-300 transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100 flex items-center justify-center gap-2 text-sm sm:text-base"
                            disabled>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                </path>
                            </svg>
                            Pilih Template
                        </button>
                    </div>
                </div>
            </div>

            <!-- Back to Home -->
            <div class="text-center py-8">
                <a href="/"
                    class="inline-flex items-center gap-3 px-6 py-3 bg-black text-white rounded-full hover:bg-black/90 transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/frame-handler.js') }}"
        onerror="console.error('Failed to load frame-handler.js'); window.FrameHandler = undefined;"></script>

    {{-- Setting kamera dan frame --}}
    <script src="{{ asset('js/booth.js') }}"
        onerror="console.error('Failed to load frame-handler.js'); window.FrameHandler = undefined;"></script>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/booth.css') }}">
@endpush
