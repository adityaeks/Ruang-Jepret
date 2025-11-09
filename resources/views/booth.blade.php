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
                                            <li><a class="dropdown-item" href="#" data-value="5">5</a></li>
                                            <li><a class="dropdown-item" href="#" data-value="10">10</a></li>
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
                                            <li><a class="dropdown-item" href="#" data-value="10">10s</a></li>
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
                                    <div class="flex items-center justify-center gap-4 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                    <button id="desktop-accept-btn"
                                        class="px-4 py-2 bg-white text-black font-semibold rounded-full transition-all duration-300 transform hover:scale-105 hover:bg-gray-100 flex items-center gap-1.5 shadow-lg border border-gray-300">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Accept
                                    </button>

                                    <button id="desktop-retake-hover-btn"
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
                            <div class="flex items-center justify-center gap-4 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
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

    <!-- Frame Handler JavaScript -->
    <script src="{{ asset('js/frame-handler.js') }}"></script>

    <!-- Camera JavaScript -->
    <script>
        class PhotoBooth {
            constructor() {
                this.video = document.getElementById('camera-preview');
                this.canvas = document.getElementById('photo-canvas');
                this.ctx = this.canvas.getContext('2d');
                this.stream = null;
                this.facingMode = 'user'; // 'user' for front camera, 'environment' for back camera
                this.capturedPhotos = []; // Array untuk menyimpan multiple foto
                this.isCapturing = false; // Flag untuk mencegah multiple capture
                this.isMirrored = false; // Flag untuk mirror effect
                this.previewCanvas = null; // Canvas for template preview (reused for download)

                // Initialize Frame Handler
                this.frameHandler = new FrameHandler();

                this.initializeElements();
                this.bindEvents();
            }

            initializeElements() {
                this.openCameraBtn = document.getElementById('open-camera-btn');
                this.captureBtn = document.getElementById('capture-btn');
                this.switchCameraBtn = document.getElementById('switch-camera-btn');
                this.closeCameraBtn = document.getElementById('close-camera-btn');
                this.downloadBtn = document.getElementById('download-btn');
                this.shareBtn = document.getElementById('share-btn');
                this.retakeBtn = document.getElementById('retake-btn');
                this.photoPreview = document.getElementById('photo-preview');
                this.cameraStatus = document.getElementById('camera-status');
                this.countdown = document.getElementById('countdown');
                this.countdownNumber = document.getElementById('countdown-number');
                this.cameraOverlay = document.getElementById('camera-overlay');
                this.aspectRatioOverlay = document.getElementById('aspect-ratio-overlay');
                this.photoProgress = document.getElementById('photo-progress');
                this.photoRatioBtn = document.getElementById('photo-ratio-btn');
                this.photoCountBtn = document.getElementById('photo-count-btn');
                this.photoDelayBtn = document.getElementById('photo-delay-btn');
                this.photoGallery = document.getElementById('photo-gallery');
                this.downloadAllBtn = document.getElementById('download-all-btn');
                this.mirrorBtn = document.getElementById('mirror-btn');

                // Camera effects elements
                this.flashEffect = document.getElementById('flash-effect');
                this.cameraFlashOverlay = document.getElementById('camera-flash-overlay');
                this.shutterEffect = document.getElementById('shutter-effect');
                this.cameraContainer = this.video.parentElement;

                // Template selection button
                this.selectTemplateBtn = document.getElementById('select-template-btn');
                this.mobileSelectTemplateBtn = document.getElementById('mobile-select-template-btn');

                // Mobile elements
                this.mobilePhotoPreview = document.getElementById('mobile-photo-preview-content');
                this.mobilePhotoGallery = document.getElementById('mobile-photo-gallery');
                this.mobilePhotoCanvas = document.getElementById('mobile-photo-canvas');

                // Initialize dropdown values
                this.photoRatio = '4:3'; // Default to 4:3 since that's what's selected
                this.photoCount = 3; // Default to 3 since that's what's selected
                this.photoDelay = 3; // Default to 3 seconds


                // Set initial gallery aspect ratio
                this.updateGalleryAspectRatio();

                // Set initial aspect ratio overlay
                this.updateAspectRatioOverlay();
            }

            bindEvents() {
                this.openCameraBtn.addEventListener('click', () => this.openCamera());
                this.captureBtn.addEventListener('click', () => this.capturePhoto());
                this.switchCameraBtn.addEventListener('click', () => this.switchCamera());
                this.closeCameraBtn.addEventListener('click', () => this.closeCamera());
                this.mirrorBtn.addEventListener('click', () => this.toggleMirror());

                // Template selection button event bindings
                this.selectTemplateBtn.addEventListener('click', () => this.selectTemplate());
                this.mobileSelectTemplateBtn.addEventListener('click', () => this.selectTemplate());

                // Mobile hover button event bindings
                const mobileAcceptBtn = document.getElementById('mobile-accept-btn');
                const mobileRetakeHoverBtn = document.getElementById('mobile-retake-hover-btn');

                if (mobileAcceptBtn) {
                    mobileAcceptBtn.addEventListener('click', () => this.acceptPhoto());
                }

                if (mobileRetakeHoverBtn) {
                    mobileRetakeHoverBtn.addEventListener('click', () => this.retakePhoto());
                }

                // Desktop hover button event bindings
                const desktopAcceptBtn = document.getElementById('desktop-accept-btn');
                const desktopRetakeHoverBtn = document.getElementById('desktop-retake-hover-btn');

                if (desktopAcceptBtn) {
                    desktopAcceptBtn.addEventListener('click', () => this.acceptPhoto());
                }

                if (desktopRetakeHoverBtn) {
                    desktopRetakeHoverBtn.addEventListener('click', () => this.retakePhoto());
                }

                // Add touch event listeners for mobile hover effect
                this.addTouchEventListeners();

                // Bind dropdown events
                this.bindDropdownEvents();

                // Add resize event listener to handle responsive photo preview
                let resizeTimeout;
                window.addEventListener('resize', () => {
                    // Debounce resize events to prevent excessive calls
                    clearTimeout(resizeTimeout);
                    resizeTimeout = setTimeout(() => {
                        // Only update if photo preview is currently shown
                        if (!this.photoPreview.classList.contains('hidden') || !this.mobilePhotoPreview
                            .classList.contains('hidden')) {
                            // Update visibility without triggering scroll
                            this.updatePhotoPreviewVisibility();
                        }
                    }, 250); // Wait 250ms after resize stops
                });
            }

            bindDropdownEvents() {
                // All dropdown items
                const dropdownItems = document.querySelectorAll('[data-value]');
                dropdownItems.forEach(item => {
                    item.addEventListener('click', (e) => {
                        e.preventDefault();
                        const value = item.getAttribute('data-value');

                        // Check which dropdown this belongs to
                        const dropdown = item.closest('.dropdown');

                        if (dropdown.querySelector('#photo-ratio-btn')) {
                            // Photo ratio dropdown
                            this.photoRatio = value;
                            this.photoRatioBtn.textContent = value;

                            // Update gallery aspect ratio
                            this.updateGalleryAspectRatio();

                            // Update aspect ratio overlay
                            this.updateAspectRatioOverlay();

                            // Update camera if it's open
                            if (this.stream) {
                                this.updateCameraRatio();
                            }
                        } else if (dropdown.querySelector('#photo-count-btn')) {
                            // Photo count dropdown
                            this.photoCount = parseInt(value);
                            this.photoCountBtn.textContent = value;
                        } else if (dropdown.querySelector('#photo-delay-btn')) {
                            // Photo delay dropdown
                            this.photoDelay = parseInt(value);
                            this.photoDelayBtn.textContent = value + 's';
                        }

                        // Update active state
                        item.closest('.dropdown-menu').querySelectorAll('.dropdown-item').forEach(i => i
                            .classList.remove('active'));
                        item.classList.add('active');
                    });
                });
            }

            async openCamera() {
                try {
                    // Get aspect ratio dimensions
                    const [width, height] = this.getAspectRatioDimensions();

                    const constraints = {
                        video: {
                            facingMode: this.facingMode,
                            width: {
                                ideal: width
                            },
                            height: {
                                ideal: height
                            }
                        }
                    };

                    this.stream = await navigator.mediaDevices.getUserMedia(constraints);
                    this.video.srcObject = this.stream;

                    this.updateUI('camera-on');
                } catch (error) {
                    console.error('Error accessing camera:', error);
                }
            }

            async switchCamera() {
                if (this.stream) {
                    this.closeCamera();
                    this.facingMode = this.facingMode === 'user' ? 'environment' : 'user';
                    await this.openCamera();
                }
            }

            closeCamera() {
                if (this.stream) {
                    this.stream.getTracks().forEach(track => track.stop());
                    this.stream = null;
                }
                this.video.srcObject = null;
                this.updateUI('camera-off');
            }

            getAspectRatioDimensions() {
                const baseSize = 1920; // Base width for calculations

                switch (this.photoRatio) {
                    case '1:1':
                        return [baseSize, baseSize];
                    case '4:3':
                        return [baseSize, Math.round(baseSize * 3 / 4)];
                    case '16:9':
                        return [baseSize, Math.round(baseSize * 9 / 16)];
                    default:
                        return [baseSize, Math.round(baseSize * 3 / 4)]; // Default to 4:3
                }
            }

            async updateCameraRatio() {
                if (!this.stream) return;

                try {
                    // Get new aspect ratio dimensions
                    const [width, height] = this.getAspectRatioDimensions();

                    // Stop current stream
                    this.stream.getTracks().forEach(track => track.stop());

                    // Get new stream with updated constraints
                    const constraints = {
                        video: {
                            facingMode: this.facingMode,
                            width: {
                                ideal: width
                            },
                            height: {
                                ideal: height
                            }
                        }
                    };

                    this.stream = await navigator.mediaDevices.getUserMedia(constraints);
                    this.video.srcObject = this.stream;

                    // Update aspect ratio overlay after camera ratio change
                    this.updateAspectRatioOverlay();
                } catch (error) {
                    console.error('Error updating camera ratio:', error);
                }
            }

            updateGalleryAspectRatio() {
                // Remove all aspect ratio classes
                this.photoGallery.classList.remove('aspect-1-1', 'aspect-4-3', 'aspect-16-9');
                this.mobilePhotoGallery.classList.remove('aspect-1-1', 'aspect-4-3', 'aspect-16-9');

                // Add the appropriate class based on selected ratio
                const aspectClass = this.photoRatio.replace(':', '-');
                this.photoGallery.classList.add(`aspect-${aspectClass}`);
                this.mobilePhotoGallery.classList.add(`aspect-${aspectClass}`);
            }

            updateAspectRatioOverlay() {
                if (!this.aspectRatioOverlay) return;

                // Clear existing overlay
                this.aspectRatioOverlay.innerHTML = '';

                // Only show overlay if camera is active
                if (!this.stream) {
                    this.aspectRatioOverlay.classList.add('hidden');
                    return;
                }

                // Show overlay for all ratios
                this.aspectRatioOverlay.classList.remove('hidden');

                // Create overlay based on aspect ratio with small delay to ensure container is rendered
                setTimeout(() => {
                    const overlay = this.createAspectRatioOverlay();
                    this.aspectRatioOverlay.appendChild(overlay);
                }, 100);
            }

            createAspectRatioOverlay() {
                const container = document.createElement('div');
                container.className = 'absolute inset-0 flex items-center justify-center';

                // Get camera container dimensions
                const cameraContainer = this.video.parentElement;
                const containerWidth = cameraContainer.offsetWidth;
                const containerHeight = cameraContainer.offsetHeight;

                // Get video dimensions
                const videoWidth = this.video.videoWidth;
                const videoHeight = this.video.videoHeight;

                // Calculate the actual crop area that will be used in photo capture
                const [targetWidth, targetHeight] = this.getAspectRatioDimensions();
                const targetAspect = targetWidth / targetHeight;
                const videoAspect = videoWidth / videoHeight;

                let cropWidth, cropHeight, cropX, cropY;

                if (videoAspect > targetAspect) {
                    // Video is wider than target, crop sides
                    cropHeight = videoHeight;
                    cropWidth = videoHeight * targetAspect;
                    cropX = (videoWidth - cropWidth) / 2;
                    cropY = 0;
                } else {
                    // Video is taller than target, crop top/bottom
                    cropWidth = videoWidth;
                    cropHeight = videoWidth / targetAspect;
                    cropX = 0;
                    cropY = (videoHeight - cropHeight) / 2;
                }

                // Calculate overlay dimensions to match the crop area
                const scaleX = containerWidth / videoWidth;
                const scaleY = containerHeight / videoHeight;

                const overlayWidth = cropWidth * scaleX;
                const overlayHeight = cropHeight * scaleY;
                const overlayX = cropX * scaleX;
                const overlayY = cropY * scaleY;

                // Create frame border
                const frame = document.createElement('div');
                frame.className = 'absolute border-2 border-white/30';
                frame.style.width = `${overlayWidth}px`;
                frame.style.height = `${overlayHeight}px`;
                frame.style.left = `${overlayX}px`;
                frame.style.top = `${overlayY}px`;
                frame.style.backgroundColor = 'transparent';
                frame.style.zIndex = '2';

                // Add corner indicators
                const corners = this.createCornerIndicators();
                frame.appendChild(corners);

                // Create black overlay areas (4 rectangles around the frame)
                const overlays = [];

                // Top overlay
                if (overlayY > 0) {
                    const topOverlay = document.createElement('div');
                    topOverlay.className = 'absolute bg-black/50';
                    topOverlay.style.left = '0';
                    topOverlay.style.top = '0';
                    topOverlay.style.width = '100%';
                    topOverlay.style.height = `${overlayY}px`;
                    overlays.push(topOverlay);
                }

                // Bottom overlay
                if (overlayY + overlayHeight < containerHeight) {
                    const bottomOverlay = document.createElement('div');
                    bottomOverlay.className = 'absolute bg-black/50';
                    bottomOverlay.style.left = '0';
                    bottomOverlay.style.top = `${overlayY + overlayHeight}px`;
                    bottomOverlay.style.width = '100%';
                    bottomOverlay.style.height = `${containerHeight - (overlayY + overlayHeight)}px`;
                    overlays.push(bottomOverlay);
                }

                // Left overlay
                if (overlayX > 0) {
                    const leftOverlay = document.createElement('div');
                    leftOverlay.className = 'absolute bg-black/50';
                    leftOverlay.style.left = '0';
                    leftOverlay.style.top = `${overlayY}px`;
                    leftOverlay.style.width = `${overlayX}px`;
                    leftOverlay.style.height = `${overlayHeight}px`;
                    overlays.push(leftOverlay);
                }

                // Right overlay
                if (overlayX + overlayWidth < containerWidth) {
                    const rightOverlay = document.createElement('div');
                    rightOverlay.className = 'absolute bg-black/50';
                    rightOverlay.style.left = `${overlayX + overlayWidth}px`;
                    rightOverlay.style.top = `${overlayY}px`;
                    rightOverlay.style.width = `${containerWidth - (overlayX + overlayWidth)}px`;
                    rightOverlay.style.height = `${overlayHeight}px`;
                    overlays.push(rightOverlay);
                }

                // Add all elements to container
                overlays.forEach(overlay => container.appendChild(overlay));
                container.appendChild(frame);

                return container;
            }

            createCornerIndicators() {
                const corners = document.createElement('div');
                corners.className = 'absolute inset-0 pointer-events-none';

                // Create corner indicators
                const positions = [{
                        top: '-2px',
                        left: '-2px',
                        borderTop: '3px solid white',
                        borderLeft: '3px solid white'
                    },
                    {
                        top: '-2px',
                        right: '-2px',
                        borderTop: '3px solid white',
                        borderRight: '3px solid white'
                    },
                    {
                        bottom: '-2px',
                        left: '-2px',
                        borderBottom: '3px solid white',
                        borderLeft: '3px solid white'
                    },
                    {
                        bottom: '-2px',
                        right: '-2px',
                        borderBottom: '3px solid white',
                        borderRight: '3px solid white'
                    }
                ];

                positions.forEach(pos => {
                    const corner = document.createElement('div');
                    corner.className = 'absolute w-6 h-6';
                    Object.assign(corner.style, pos);
                    corners.appendChild(corner);
                });

                return corners;
            }

            async capturePhoto() {
                if (!this.stream || this.isCapturing) return;

                this.isCapturing = true;
                this.capturedPhotos = []; // Reset captured photos

                const photoCount = this.photoCount;
                const delaySeconds = this.photoDelay;

                // Show photo preview immediately for first photo
                this.showPhotoPreview();

                for (let i = 0; i < photoCount; i++) {
                    // Update progress
                    this.photoProgress.textContent = `Foto ${i + 1} dari ${photoCount}`;

                    // Show countdown and wait for it to complete
                    await this.runCountdown();

                    // Trigger camera effects
                    this.triggerCameraEffects();

                    // Capture photo with selected aspect ratio
                    const [targetWidth, targetHeight] = this.getAspectRatioDimensions();
                    const tempCanvas = document.createElement('canvas');
                    tempCanvas.width = targetWidth;
                    tempCanvas.height = targetHeight;
                    const tempCtx = tempCanvas.getContext('2d');

                    // Apply mirror effect if enabled
                    if (this.isMirrored) {
                        tempCtx.scale(-1, 1);
                        tempCtx.translate(-tempCanvas.width, 0);
                    }

                    // Draw video with aspect ratio cropping
                    const videoAspect = this.video.videoWidth / this.video.videoHeight;
                    const targetAspect = targetWidth / targetHeight;

                    let sx, sy, sWidth, sHeight;

                    if (videoAspect > targetAspect) {
                        // Video is wider than target, crop sides
                        sHeight = this.video.videoHeight;
                        sWidth = this.video.videoHeight * targetAspect;
                        sx = (this.video.videoWidth - sWidth) / 2;
                        sy = 0;
                    } else {
                        // Video is taller than target, crop top/bottom
                        sWidth = this.video.videoWidth;
                        sHeight = this.video.videoWidth / targetAspect;
                        sx = 0;
                        sy = (this.video.videoHeight - sHeight) / 2;
                    }

                    tempCtx.drawImage(this.video, sx, sy, sWidth, sHeight, 0, 0, targetWidth, targetHeight);

                    // Add to captured photos array
                    this.capturedPhotos.push(tempCanvas.toDataURL());

                    // Show the captured photo immediately
                    this.showSelectedPhoto(tempCanvas.toDataURL(), i);

                    // Update photo gallery with new photo
                    this.updatePhotoGallery();

                    // Wait a bit before next photo (except for the last one)
                    if (i < photoCount - 1) {
                        await new Promise(resolve => setTimeout(resolve, 1000));
                    }
                }

                // Update template button status after capturing photos
                this.updateTemplateButtonStatus();

                this.isCapturing = false;
            }

            async runCountdown() {
                this.countdown.classList.remove('hidden');
                let count = this.photoDelay; // Use the selected delay value

                // Show the initial count immediately
                this.countdownNumber.textContent = count;
                this.countdownNumber.classList.add('countdown-pop');

                // Wait for the countdown to complete
                for (let i = count - 1; i >= 0; i--) {
                    await new Promise(resolve => setTimeout(resolve, 1000));
                    this.countdownNumber.textContent = i;
                    this.countdownNumber.classList.remove('countdown-pop');
                    // Trigger reflow to restart animation
                    this.countdownNumber.offsetHeight;
                    this.countdownNumber.classList.add('countdown-pop');
                }

                // Show final flash before taking photo
                this.showFinalFlash();

                // Hide countdown after completion
                this.hideCountdown();
            }

            showCountdown() {
                this.countdown.classList.remove('hidden');
                let count = this.photoDelay; // Use the selected delay value

                // Show the initial count immediately
                this.countdownNumber.textContent = count;

                const countdownInterval = setInterval(() => {
                    count--;

                    if (count >= 0) {
                        this.countdownNumber.textContent = count;
                    }

                    if (count < 0) {
                        clearInterval(countdownInterval);
                        this.hideCountdown();
                    }
                }, 1000);
            }

            hideCountdown() {
                this.countdown.classList.add('hidden');
            }

            showFinalFlash() {
                // Show a bright flash before taking the photo
                this.cameraFlashOverlay.classList.remove('hidden');
                this.cameraFlashOverlay.classList.add('flash-active');

                // Remove flash after a short duration
                setTimeout(() => {
                    this.cameraFlashOverlay.classList.remove('flash-active');
                    this.cameraFlashOverlay.classList.add('hidden');
                }, 200);
            }

            triggerCameraEffects() {
                // Camera flash overlay effect - more intense for actual photo capture
                this.cameraFlashOverlay.classList.remove('hidden');
                this.cameraFlashOverlay.classList.add('flash-active');

                // Shutter effect
                this.shutterEffect.classList.remove('hidden');
                this.shutterEffect.classList.add('active');

                // Camera shake effect
                this.cameraContainer.classList.add('camera-shake');

                // Play camera sound effect (optional)
                this.playCameraSound();

                // Remove effects after animation completes
                setTimeout(() => {
                    this.cameraFlashOverlay.classList.remove('flash-active');
                    this.cameraFlashOverlay.classList.add('hidden');
                }, 300);

                setTimeout(() => {
                    this.shutterEffect.classList.remove('active');
                    this.shutterEffect.classList.add('hidden');
                }, 400);

                setTimeout(() => {
                    this.cameraContainer.classList.remove('camera-shake');
                }, 400);
            }

            playCameraSound() {
                try {
                    // Play the shutter.mp3 audio file
                    // Pastikan file shutter.mp3 sudah ditempatkan di folder public/
                    const audio = new Audio('/shutter.mp3');
                    audio.volume = 0.5; // Set volume to 50%
                    audio.play().catch(() => {
                        // Silently fail if audio playback fails
                    });
                } catch (error) {
                    // Silently fail if audio is not supported
                }
            }

            showPhotoPreview() {
                // Show appropriate preview based on screen size
                if (window.innerWidth >= 1024) {
                    // Desktop: show desktop preview, hide mobile preview
                    this.photoPreview.classList.remove('hidden');
                    this.mobilePhotoPreview.classList.add('hidden');

                    // Add has-photo class for hover effect
                    const photoDisplayContainer = this.photoPreview.querySelector('.group');
                    if (photoDisplayContainer) {
                        photoDisplayContainer.classList.add('has-photo');
                    }
                } else {
                    // Mobile: show mobile preview, hide desktop preview
                    this.mobilePhotoPreview.classList.remove('hidden');
                    this.photoPreview.classList.add('hidden');

                    // Add has-photo class for hover effect
                    const mobilePhotoDisplayContainer = this.mobilePhotoPreview.querySelector('.group');
                    if (mobilePhotoDisplayContainer) {
                        mobilePhotoDisplayContainer.classList.add('has-photo');
                    }
                }
            }



            updatePhotoPreviewVisibility() {
                // Update visibility without triggering scroll
                if (window.innerWidth >= 1024) {
                    // Desktop: show desktop preview, hide mobile preview
                    this.photoPreview.classList.remove('hidden');
                    this.mobilePhotoPreview.classList.add('hidden');
                } else {
                    // Mobile: show mobile preview, hide desktop preview
                    this.mobilePhotoPreview.classList.remove('hidden');
                    this.photoPreview.classList.add('hidden');
                }
            }

            updatePhotoGallery() {
                // Update desktop gallery
                this.photoGallery.innerHTML = '';

                // Update mobile gallery
                this.mobilePhotoGallery.innerHTML = '';

                this.capturedPhotos.forEach((photoData, index) => {
                    // Check if this photo has been accepted
                    const hasCheckmark = this.checkIfPhotoHasCheckmark(index);
                    const groupClass = hasCheckmark ? '' : 'group';

                    // Desktop gallery item
                    const photoItem = document.createElement('div');
                    photoItem.className = `relative ${groupClass} cursor-pointer photo-gallery-item`;
                    if (hasCheckmark) {
                        photoItem.classList.add('photo-accepted');
                    }
                    photoItem.innerHTML = `
                <img src="${photoData}" alt="Foto ${index + 1}" class="border border-black/10">
                <div class="photo-hover-overlay absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                    <span class="text-white font-semibold text-xs">Foto ${index + 1}</span>
                </div>
            `;

                    photoItem.addEventListener('click', () => {
                        this.showSelectedPhoto(photoData, index);
                    });

                    this.photoGallery.appendChild(photoItem);

                    // Mobile gallery item
                    const mobilePhotoItem = document.createElement('div');
                    mobilePhotoItem.className = `relative ${groupClass} cursor-pointer photo-gallery-item`;
                    if (hasCheckmark) {
                        mobilePhotoItem.classList.add('photo-accepted');
                    }
                    mobilePhotoItem.innerHTML = `
                <img src="${photoData}" alt="Foto ${index + 1}" class="border border-black/10">
                <div class="photo-hover-overlay absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                    <span class="text-white font-semibold text-xs">Foto ${index + 1}</span>
                </div>
            `;

                    mobilePhotoItem.addEventListener('click', () => {
                        this.showSelectedPhoto(photoData, index);
                    });

                    this.mobilePhotoGallery.appendChild(mobilePhotoItem);

                    // Add checkmark if photo is accepted
                    if (hasCheckmark) {
                        this.addCheckmarkToGalleryItem(photoItem);
                        this.addCheckmarkToGalleryItem(mobilePhotoItem);
                    }
                });

                // Update template button status after gallery update
                this.updateTemplateButtonStatus();
            }

                        updatePhotoGalleryPreservingAccepted() {
                // Store current accepted photos status before updating
                const acceptedPhotos = [];
                this.capturedPhotos.forEach((_, index) => {
                    acceptedPhotos[index] = this.checkIfPhotoHasCheckmark(index);
                });

                // Update gallery normally
                this.updatePhotoGallery();

                // Restore accepted status for all photos that were previously accepted
                acceptedPhotos.forEach((isAccepted, index) => {
                    if (isAccepted) {
                        // Add checkmark back to gallery items
                        const desktopGalleryItems = this.photoGallery.querySelectorAll('.photo-gallery-item');
                        const mobileGalleryItems = this.mobilePhotoGallery.querySelectorAll('.photo-gallery-item');

                        if (desktopGalleryItems[index]) {
                            this.addCheckmarkToGalleryItem(desktopGalleryItems[index]);
                        }
                        if (mobileGalleryItems[index]) {
                            this.addCheckmarkToGalleryItem(mobileGalleryItems[index]);
                        }
                    }
                });

                // Update template button status after gallery update
                this.updateTemplateButtonStatus();
            }

            updateTemplateButtonStatus() {
                // Check if all photos are accepted
                const allAccepted = this.capturedPhotos.length > 0 && this.capturedPhotos.every((_, index) =>
                    this.checkIfPhotoHasCheckmark(index)
                );

                // Update desktop template button
                if (this.selectTemplateBtn) {
                    if (allAccepted) {
                        this.selectTemplateBtn.disabled = false;
                        this.selectTemplateBtn.classList.remove('bg-gray-400');
                        this.selectTemplateBtn.classList.add('bg-black', 'hover:bg-black/90');
                    } else {
                        this.selectTemplateBtn.disabled = true;
                        this.selectTemplateBtn.classList.remove('bg-black', 'hover:bg-black/90');
                        this.selectTemplateBtn.classList.add('bg-gray-400');
                    }
                }

                // Update mobile template button
                if (this.mobileSelectTemplateBtn) {
                    if (allAccepted) {
                        this.mobileSelectTemplateBtn.disabled = false;
                        this.mobileSelectTemplateBtn.classList.remove('bg-gray-400');
                        this.mobileSelectTemplateBtn.classList.add('bg-black', 'hover:bg-black/90');
                    } else {
                        this.mobileSelectTemplateBtn.disabled = true;
                        this.mobileSelectTemplateBtn.classList.remove('bg-black', 'hover:bg-black/90');
                        this.mobileSelectTemplateBtn.classList.add('bg-gray-400');
                    }
                }
            }

                        selectTemplate() {
                // Check if all photos are accepted
                const allAccepted = this.capturedPhotos.length > 0 && this.capturedPhotos.every((_, index) =>
                    this.checkIfPhotoHasCheckmark(index)
                );

                if (!allAccepted) {
                    this.showNotification('Semua foto harus di-accept terlebih dahulu', 'error');
                    return;
                }

                // Show success message
                this.showNotification('Membuka pilihan template...', 'success');

                // Show template selection section
                this.showTemplateSelection();
            }

            showTemplateSelection() {
                // Create template selection section if it doesn't exist
                if (!document.getElementById('template-selection-section')) {
                    this.createTemplateSelectionSection();
                }

                // Show the template section
                const templateSection = document.getElementById('template-selection-section');
                templateSection.classList.remove('hidden');

                // Scroll to template section
                templateSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });

                // Generate templates based on current photo count and ratio
                this.generateTemplates();

                // Show initial message in preview container
                const previewContainer = document.getElementById('template-preview-container');
                const downloadBtn = document.getElementById('download-result-btn');

                previewContainer.innerHTML = `
                    <div class="text-center py-12">
                        <div class="text-gray-500">
                            <svg class="w-16 h-16 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            <p class="text-lg font-semibold mb-2">Pilih Template</p>
                            <p class="text-sm">Klik salah satu template di sebelah kiri untuk melihat preview</p>
                        </div>
                    </div>
                `;

                // Disable download button initially
                downloadBtn.disabled = true;
                downloadBtn.classList.remove('bg-black', 'hover:bg-black/90');
                downloadBtn.classList.add('bg-gray-400');
            }

                        createTemplateSelectionSection() {
                const templateSection = document.createElement('div');
                templateSection.id = 'template-selection-section';
                templateSection.className = 'py-12 bg-gray-50';
                templateSection.innerHTML = `
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="text-center mb-12">
                            <h2 class="text-3xl sm:text-4xl font-bold text-black mb-4">
                                Pilih Template
                            </h2>
                            <p class="text-black/70 text-lg max-w-2xl mx-auto">
                                Template 3 foto vertikal dengan border putih
                            </p>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
                            <!-- Card 1: Template Selection -->
                            <div class="bg-white rounded-2xl shadow-lg p-6 lg:p-8">
                                <h3 class="text-xl font-bold text-black mb-6">Pilih Template</h3>
                                <div id="template-grid" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <!-- Templates will be generated here -->
                                </div>
                            </div>

                            <!-- Card 2: Preview & Download -->
                            <div class="bg-white rounded-2xl shadow-lg p-6 lg:p-8">
                                <h3 class="text-xl font-bold text-black mb-6">Preview Hasil</h3>
                                <div id="template-preview-container" class="mb-6">
                                    <div class="text-center text-gray-500 py-12">
                                        <svg class="w-16 h-16 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                        </svg>
                                        <p class="text-lg font-semibold mb-2">Pilih Template</p>
                                        <p class="text-sm">Klik template di sebelah kiri untuk melihat preview</p>
                                    </div>
                                </div>
                                <button id="download-result-btn"
                                    class="w-full px-6 py-3 bg-gray-400 text-white font-semibold rounded-full transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed"
                                    disabled>
                                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Download Hasil
                                </button>
                            </div>
                        </div>

                        <div class="text-center mt-12">
                            <button id="back-to-photos-btn"
                                class="px-6 py-3 bg-black text-white font-semibold rounded-full hover:bg-black/90 transition-all duration-300 flex items-center gap-2 mx-auto">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Kembali ke Foto
                            </button>
                        </div>
                    </div>
                `;

                // Insert before the back to home section
                const backToHomeSection = document.querySelector('.text-center.py-8');
                backToHomeSection.parentNode.insertBefore(templateSection, backToHomeSection);

                // Add event listener for back button
                document.getElementById('back-to-photos-btn').addEventListener('click', () => {
                    this.hideTemplateSelection();
                });
            }

            generateTemplates() {
                const templateGrid = document.getElementById('template-grid');
                const photoCount = this.capturedPhotos.length;
                const aspectRatio = this.photoRatio;

                // Clear existing templates
                templateGrid.innerHTML = '';

                // Generate different template layouts based on photo count
                const templates = this.getTemplateLayouts(photoCount, aspectRatio);

                if (templates.length === 0) {
                    // Show message when not enough photos
                    templateGrid.innerHTML = `
                        <div class="col-span-full text-center py-12">
                            <div class="text-gray-500">
                                <svg class="w-16 h-16 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="text-lg font-semibold mb-2">Minimal 3 foto diperlukan</p>
                                <p class="text-sm">Template ini membutuhkan setidaknya 3 foto untuk dapat digunakan</p>
                            </div>
                        </div>
                    `;
                } else {
                    templates.forEach((template, index) => {
                        const templateCard = this.createTemplateCard(template, index);
                        templateGrid.appendChild(templateCard);
                    });
                }
            }

            getTemplateLayouts(photoCount, aspectRatio) {
                const templates = [];

                // Template: 3-Photo Vertical (User's Template)
                if (photoCount >= 3) {
                    const template = {
                        name: '3-Photo Vertical',
                        layout: 'custom-vertical',
                        description: 'Contoh Template',
                        frames: [
                            { width: '100%', height: '33.33%', top: '0%', left: '0%' },
                            { width: '100%', height: '33.33%', top: '33.33%', left: '0%' },
                            { width: '100%', height: '33.33%', top: '66.66%', left: '0%' }
                        ]
                    };

                    // Add frame PNG configuration using FrameHandler
                    this.frameHandler.addFrameConfigToTemplate(template, aspectRatio);

                    templates.push(template);
                }

                return templates;
            }



                        createTemplateCard(template, index) {
                const card = document.createElement('div');
                card.className = 'bg-gray-50 rounded-xl border-2 border-gray-200 hover:border-black transition-all duration-300 cursor-pointer template-card p-4';
                card.setAttribute('data-template-index', index);

                card.innerHTML = `
                    <div class="text-center">
                        <div class="mb-3">
                            ${this.generateSimpleTemplatePreview(template)}
                        </div>
                        <h3 class="text-sm font-semibold text-black mb-1">${template.name}</h3>
                        <p class="text-xs text-gray-600">${template.description}</p>
                    </div>
                `;

                // Add click event
                card.addEventListener('click', () => {
                    this.selectTemplateCard(template, index);
                });

                return card;
            }

                                    generateSimpleTemplatePreview(template) {
                // Use FrameHandler for preview generation
                return this.frameHandler.generateSimpleTemplatePreview(template);
            }



            getAspectRatioClass() {
                switch (this.photoRatio) {
                    case '1:1':
                        return 'aspect-square';
                    case '4:3':
                        return 'aspect-[4/3]';
                    case '16:9':
                        return 'aspect-video';
                    default:
                        return 'aspect-[4/3]';
                }
            }

                        selectTemplateCard(template, index) {
                // Add visual feedback
                const allCards = document.querySelectorAll('.template-card');
                allCards.forEach(card => {
                    card.classList.remove('ring-2', 'ring-black', 'bg-black', 'text-white');
                    card.classList.add('bg-gray-50');
                });

                const selectedCard = document.querySelector(`[data-template-index="${index}"]`);
                selectedCard.classList.remove('bg-gray-50');
                selectedCard.classList.add('ring-2', 'ring-black', 'bg-black', 'text-white');

                // Clear previous preview canvas to ensure fresh rendering
                this.previewCanvas = null;

                // Show success message
                this.showNotification(`Template "${template.name}" dipilih!`, 'success');

                // Generate and show preview with actual photos (async)
                this.generateTemplatePreviewWithPhotos(template).catch(error => {
                    console.error('Error generating preview:', error);
                });
            }

            async generateTemplatePreviewWithPhotos(template) {
                const previewContainer = document.getElementById('template-preview-container');
                const downloadBtn = document.getElementById('download-result-btn');

                try {
                    // Show loading state
                    previewContainer.innerHTML = `
                        <div class="text-center text-gray-500 py-12">
                            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-gray-900 mx-auto mb-4"></div>
                            <p class="text-sm">Mempersiapkan preview...</p>
                        </div>
                    `;

                    // Create canvas with the SAME dimensions as download
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');

                    // Set canvas size using FrameHandler (same as download)
                    const [width, height] = this.frameHandler.getCanvasDimensions(template, () => this.getAspectRatioDimensions());

                    canvas.width = width;
                    canvas.height = height;

                    // Draw template with frame PNG using FrameHandler (same logic as download)
                    try {
                        await this.frameHandler.drawTemplateOnCanvasAsync(
                            ctx,
                            template,
                            width,
                            height,
                            this.capturedPhotos,
                            (ctx, src, x, y, w, h) => this.drawImageOnCanvasAsync(ctx, src, x, y, w, h),
                            (ctx, src, x, y, w, h) => this.drawImageContainOnCanvasAsync(ctx, src, x, y, w, h)
                        );
                    } catch (frameError) {
                        console.error('Error drawing frame in preview:', frameError);
                        // If frame fails, show error on canvas
                        ctx.fillStyle = '#f3f4f6';
                        ctx.fillRect(0, 0, width, height);
                        ctx.fillStyle = '#ef4444';
                        ctx.font = '20px Arial';
                        ctx.textAlign = 'center';
                        ctx.fillText('Frame PNG tidak ditemukan', width / 2, height / 2);
                        throw frameError; // Re-throw to trigger error handling
                    }

                    // Store canvas for download (reuse to avoid re-rendering)
                    this.previewCanvas = canvas;

                    // Calculate aspect ratio for preview container
                    const aspectRatio = width / height;

                    // Display canvas as image in preview container
                    // Use max-width to ensure it fits in the container, but maintain aspect ratio
                    previewContainer.innerHTML = `
                        <div class="relative bg-white border-2 border-gray-300 rounded-xl overflow-hidden shadow-lg" style="aspect-ratio: ${aspectRatio}; max-width: 100%;">
                            <img src="${canvas.toDataURL()}" alt="Preview Template" class="w-full h-full object-contain" style="display: block;">
                        </div>
                    `;

                    // Enable download button
                    downloadBtn.disabled = false;
                    downloadBtn.classList.remove('bg-gray-400');
                    downloadBtn.classList.add('bg-black', 'hover:bg-black/90');

                    // Add download functionality - reuse the same canvas
                    downloadBtn.onclick = () => this.downloadTemplateResult(template);
                } catch (error) {
                    console.error('Error generating preview:', error);
                    previewContainer.innerHTML = `
                        <div class="text-center text-red-500 py-12">
                            <p class="text-sm">Gagal memuat preview. Silakan coba lagi.</p>
                        </div>
                    `;
                    downloadBtn.disabled = true;
                    downloadBtn.classList.add('bg-gray-400');
                    downloadBtn.classList.remove('bg-black', 'hover:bg-black/90');
                }
            }

                                    generateTemplateWithPhotos(template) {
                // Use FrameHandler for template HTML generation
                return this.frameHandler.generateTemplateWithPhotos(template, this.capturedPhotos);
            }

            async downloadTemplateResult(template) {
                try {
                    // Show loading message
                    this.showNotification('Menyiapkan template untuk download...', 'info');

                    let canvas;

                    // Reuse preview canvas if available (to ensure exact match with preview)
                    if (this.previewCanvas) {
                        canvas = this.previewCanvas;
                    } else {
                        // If preview canvas doesn't exist, create new one
                        canvas = document.createElement('canvas');
                        const ctx = canvas.getContext('2d');

                        // Set canvas size using FrameHandler
                        const [width, height] = this.frameHandler.getCanvasDimensions(template, () => this.getAspectRatioDimensions());

                        canvas.width = width;
                        canvas.height = height;

                        // Draw template with frame PNG using FrameHandler
                        try {
                            await this.frameHandler.drawTemplateOnCanvasAsync(
                                ctx,
                                template,
                                width,
                                height,
                                this.capturedPhotos,
                                (ctx, src, x, y, w, h) => this.drawImageOnCanvasAsync(ctx, src, x, y, w, h),
                                (ctx, src, x, y, w, h) => this.drawImageContainOnCanvasAsync(ctx, src, x, y, w, h)
                            );
                        } catch (frameError) {
                            console.error('Error drawing frame:', frameError);
                            // If frame fails, show error on canvas
                            ctx.fillStyle = '#f3f4f6';
                            ctx.fillRect(0, 0, width, height);
                            ctx.fillStyle = '#ef4444';
                            ctx.font = '20px Arial';
                            ctx.textAlign = 'center';
                            ctx.fillText('Frame PNG tidak ditemukan', width / 2, height / 2);
                        }
                    }

                    // Download the result
                    const link = document.createElement('a');
                    link.download = `ruangjepret-template-${template.name.toLowerCase().replace(/\s+/g, '-')}-${Date.now()}.png`;
                    link.href = canvas.toDataURL('image/png');
                    link.click();

                    // Show success message
                    this.showNotification('Template berhasil di-download!', 'success');
                } catch (error) {
                    console.error('Error downloading template:', error);
                    this.showNotification('Gagal mengunduh template', 'error');
                }
            }

            // drawTemplateOnCanvasAsync is now handled by FrameHandler
            // This method is kept for backward compatibility but is no longer used

            drawImageOnCanvasAsync(ctx, imageSrc, x, y, width, height) {
                return new Promise((resolve, reject) => {
                    const img = new Image();
                    img.onload = () => {
                        ctx.drawImage(img, x, y, width, height);
                        resolve();
                    };
                    img.onerror = reject;
                    img.src = imageSrc;
                });
            }

            // Draw image preserving aspect ratio (contain) and center it within the box
            drawImageContainOnCanvasAsync(ctx, imageSrc, x, y, boxWidth, boxHeight) {
                return new Promise((resolve, reject) => {
                    const img = new Image();
                    img.onload = () => {
                        const scale = Math.min(boxWidth / img.width, boxHeight / img.height);
                        const drawWidth = Math.floor(img.width * scale);
                        const drawHeight = Math.floor(img.height * scale);
                        const dx = Math.floor(x + (boxWidth - drawWidth) / 2);
                        const dy = Math.floor(y + (boxHeight - drawHeight) / 2);
                        // Draw image directly - will show through transparent areas of frame PNG
                        // Use source-over composite to ensure photo is visible
                        ctx.globalCompositeOperation = 'source-over';
                        ctx.drawImage(img, dx, dy, drawWidth, drawHeight);
                        resolve();
                    };
                    img.onerror = reject;
                    img.src = imageSrc;
                });
            }

            hideTemplateSelection() {
                const templateSection = document.getElementById('template-selection-section');
                if (templateSection) {
                    templateSection.classList.add('hidden');
                }
            }

            showSelectedPhoto(photoData, index) {
                const img = new Image();
                img.onload = () => {
                    // Update desktop canvas
                    this.canvas.width = img.width;
                    this.canvas.height = img.height;
                    this.ctx.drawImage(img, 0, 0);

                    // Update mobile canvas
                    this.mobilePhotoCanvas.width = img.width;
                    this.mobilePhotoCanvas.height = img.height;
                    const mobileCtx = this.mobilePhotoCanvas.getContext('2d');
                    mobileCtx.drawImage(img, 0, 0);

                    // Store current photo index
                    this.currentPhotoIndex = index;

                    // Check if this photo has been accepted
                    const hasCheckmark = this.checkIfPhotoHasCheckmark(index);

                    // Add has-photo class for hover effect (only if not accepted)
                    const photoDisplayContainer = this.photoPreview.querySelector('.group');
                    const mobilePhotoDisplayContainer = this.mobilePhotoPreview.querySelector('.group');

                    if (photoDisplayContainer) {
                        photoDisplayContainer.classList.add('has-photo');
                        const hoverOverlay = photoDisplayContainer.querySelector('.hover-overlay');

                        if (hasCheckmark) {
                            photoDisplayContainer.classList.add('photo-accepted');
                            if (hoverOverlay) {
                                hoverOverlay.style.opacity = '0';
                                hoverOverlay.style.display = 'none';
                                hoverOverlay.style.visibility = 'hidden';
                                hoverOverlay.style.pointerEvents = 'none';
                            }
                        } else {
                            photoDisplayContainer.classList.remove('photo-accepted');
                            if (hoverOverlay) {
                                hoverOverlay.style.display = 'block';
                                hoverOverlay.style.opacity = '0';
                                hoverOverlay.style.visibility = 'visible';
                                hoverOverlay.style.pointerEvents = 'auto';
                            }
                        }
                    }
                    if (mobilePhotoDisplayContainer) {
                        mobilePhotoDisplayContainer.classList.add('has-photo');
                        const hoverOverlay = mobilePhotoDisplayContainer.querySelector('.hover-overlay');

                        if (hasCheckmark) {
                            mobilePhotoDisplayContainer.classList.add('photo-accepted');
                            if (hoverOverlay) {
                                hoverOverlay.style.opacity = '0';
                                hoverOverlay.style.display = 'none';
                                hoverOverlay.style.visibility = 'hidden';
                                hoverOverlay.style.pointerEvents = 'none';
                            }
                        } else {
                            mobilePhotoDisplayContainer.classList.remove('photo-accepted');
                            if (hoverOverlay) {
                                hoverOverlay.style.display = 'block';
                                hoverOverlay.style.opacity = '0';
                                hoverOverlay.style.visibility = 'visible';
                                hoverOverlay.style.pointerEvents = 'auto';
                            }
                        }
                    }

                    // Reset hover overlay styles for current photo
                    if (!hasCheckmark) {
                        const allHoverOverlays = document.querySelectorAll('.hover-overlay');
                        allHoverOverlays.forEach(overlay => {
                            const container = overlay.closest('.group');
                            if (container && !container.classList.contains('photo-accepted')) {
                                overlay.style.display = 'block';
                                overlay.style.opacity = '0';
                                overlay.style.visibility = 'visible';
                                overlay.style.pointerEvents = 'auto';
                            }
                        });
                    }
                };
                img.src = photoData;
            }

            showRetakenPhoto(photoData, index) {
                const img = new Image();
                img.onload = () => {
                    // Update desktop canvas
                    this.canvas.width = img.width;
                    this.canvas.height = img.height;
                    this.ctx.drawImage(img, 0, 0);

                    // Update mobile canvas
                    this.mobilePhotoCanvas.width = img.width;
                    this.mobilePhotoCanvas.height = img.height;
                    const mobileCtx = this.mobilePhotoCanvas.getContext('2d');
                    mobileCtx.drawImage(img, 0, 0);

                    // Store current photo index
                    this.currentPhotoIndex = index;

                    // For retaken photo, it's not accepted yet, so show hover overlay
                    const photoDisplayContainer = this.photoPreview.querySelector('.group');
                    const mobilePhotoDisplayContainer = this.mobilePhotoPreview.querySelector('.group');

                    if (photoDisplayContainer) {
                        photoDisplayContainer.classList.add('has-photo');
                        photoDisplayContainer.classList.remove('photo-accepted');
                        const hoverOverlay = photoDisplayContainer.querySelector('.hover-overlay');
                        if (hoverOverlay) {
                            hoverOverlay.style.display = 'block';
                            hoverOverlay.style.opacity = '0';
                            hoverOverlay.style.visibility = 'visible';
                            hoverOverlay.style.pointerEvents = 'auto';
                        }
                    }
                    if (mobilePhotoDisplayContainer) {
                        mobilePhotoDisplayContainer.classList.add('has-photo');
                        mobilePhotoDisplayContainer.classList.remove('photo-accepted');
                        const hoverOverlay = mobilePhotoDisplayContainer.querySelector('.hover-overlay');
                        if (hoverOverlay) {
                            hoverOverlay.style.display = 'block';
                            hoverOverlay.style.opacity = '0';
                            hoverOverlay.style.visibility = 'visible';
                            hoverOverlay.style.pointerEvents = 'auto';
                        }
                    }
                };
                img.src = photoData;
            }



            hidePhotoPreview() {
                // Hide both previews
                this.photoPreview.classList.add('hidden');
                this.mobilePhotoPreview.classList.add('hidden');

                // Remove has-photo class
                const photoDisplayContainer = this.photoPreview.querySelector('.group');
                const mobilePhotoDisplayContainer = this.mobilePhotoPreview.querySelector('.group');

                if (photoDisplayContainer) {
                    photoDisplayContainer.classList.remove('has-photo');
                }
                if (mobilePhotoDisplayContainer) {
                    mobilePhotoDisplayContainer.classList.remove('has-photo');
                }
            }

            downloadPhoto() {
                const link = document.createElement('a');
                link.download = `ruangjepret-${Date.now()}.png`;

                // Use appropriate canvas based on screen size
                const canvas = window.innerWidth >= 1024 ? this.canvas : this.mobilePhotoCanvas;
                link.href = canvas.toDataURL();
                link.click();
            }

            downloadAllPhotos() {
                if (this.capturedPhotos.length === 0) {
                    return;
                }

                this.capturedPhotos.forEach((photoData, index) => {
                    const link = document.createElement('a');
                    link.download = `ruangjepret-foto-${index + 1}-${Date.now()}.png`;
                    link.href = photoData;
                    link.click();
                });
            }

            async sharePhoto() {
                try {
                    // Use appropriate canvas based on screen size
                    const canvas = window.innerWidth >= 1024 ? this.canvas : this.mobilePhotoCanvas;

                    canvas.toBlob(async (blob) => {
                        const file = new File([blob], 'ruangjepret-photo.png', {
                            type: 'image/png'
                        });

                        if (navigator.share) {
                            await navigator.share({
                                title: 'Foto dari RuangJepret',
                                text: 'Lihat foto yang baru saja saya ambil!',
                                files: [file]
                            });
                        } else {
                            // Fallback: copy to clipboard
                            canvas.toBlob(async (blob) => {
                                try {
                                    await navigator.clipboard.write([
                                        new ClipboardItem({
                                            'image/png': blob
                                        })
                                    ]);
                                } catch (error) {
                                    console.error('Failed to copy to clipboard:', error);
                                }
                            });
                        }
                    });
                } catch (error) {
                    console.error('Failed to share photo:', error);
                }
            }

                                    retakePhoto() {
                // Add animation to the retake button
                const retakeBtn = event.target.closest('button');
                if (retakeBtn) {
                    retakeBtn.classList.add('button-success');
                    setTimeout(() => {
                        retakeBtn.classList.remove('button-success');
                    }, 300);
                }

                // Get current photo index
                const currentPhotoIndex = this.getCurrentPhotoIndex();
                if (currentPhotoIndex === -1) {
                    this.showNotification('Tidak ada foto yang dipilih', 'error');
                    return;
                }

                // Show confirmation message
                this.showNotification('Mengambil foto ulang...', 'info');

                // Remove checkmark from current photo only (don't reset other accepted photos)
                    this.removeCheckmarkFromPhoto(currentPhotoIndex);

                // Remove photo-accepted class from preview containers only for current photo
                const photoDisplayContainer = this.photoPreview.querySelector('.group');
                const mobilePhotoDisplayContainer = this.mobilePhotoPreview.querySelector('.group');

                if (photoDisplayContainer) {
                    photoDisplayContainer.classList.remove('photo-accepted');
                }
                if (mobilePhotoDisplayContainer) {
                    mobilePhotoDisplayContainer.classList.remove('photo-accepted');
                }

                // Restore hover overlays only for current photo
                this.restoreHoverOverlayForCurrentPhoto(currentPhotoIndex);

                // Update template button status
                this.updateTemplateButtonStatus();

                // Take a new photo to replace the current one
                this.retakeSinglePhoto(currentPhotoIndex);
            }

            async retakeSinglePhoto(photoIndex) {
                if (!this.stream || this.isCapturing) {
                    this.showNotification('Kamera tidak tersedia', 'error');
                    return;
                }

                this.isCapturing = true;

                try {
                    // Update progress text for single photo retake
                    this.photoProgress.textContent = `Mengambil ulang foto ${photoIndex + 1}`;

                    // Show countdown for single photo
                    await this.runCountdown();

                    // Trigger camera effects
                    this.triggerCameraEffects();

                    // Capture new photo with selected aspect ratio
                    const [targetWidth, targetHeight] = this.getAspectRatioDimensions();
                    const tempCanvas = document.createElement('canvas');
                    tempCanvas.width = targetWidth;
                    tempCanvas.height = targetHeight;
                    const tempCtx = tempCanvas.getContext('2d');

                    // Apply mirror effect if enabled
                    if (this.isMirrored) {
                        tempCtx.scale(-1, 1);
                        tempCtx.translate(-tempCanvas.width, 0);
                    }

                    // Draw video with aspect ratio cropping
                    const videoAspect = this.video.videoWidth / this.video.videoHeight;
                    const targetAspect = targetWidth / targetHeight;

                    let sx, sy, sWidth, sHeight;

                    if (videoAspect > targetAspect) {
                        // Video is wider than target, crop sides
                        sHeight = this.video.videoHeight;
                        sWidth = this.video.videoHeight * targetAspect;
                        sx = (this.video.videoWidth - sWidth) / 2;
                        sy = 0;
                    } else {
                        // Video is taller than target, crop top/bottom
                        sWidth = this.video.videoWidth;
                        sHeight = this.video.videoWidth / targetAspect;
                        sx = 0;
                        sy = (this.video.videoHeight - sHeight) / 2;
                    }

                    tempCtx.drawImage(this.video, sx, sy, sWidth, sHeight, 0, 0, targetWidth, targetHeight);

                    // Replace the photo at the specified index
                    this.capturedPhotos[photoIndex] = tempCanvas.toDataURL();

                    // Show the new photo immediately (without resetting other accepted photos)
                    this.showRetakenPhoto(tempCanvas.toDataURL(), photoIndex);

                    // Update photo gallery with the new photo (preserving other accepted photos)
                    this.updatePhotoGalleryPreservingAccepted();

                    // Show success message
                    this.showNotification(`Foto ${photoIndex + 1} berhasil diambil ulang!`, 'success');

                } catch (error) {
                    console.error('Error retaking photo:', error);
                    this.showNotification('Gagal mengambil foto ulang', 'error');
                } finally {
                    this.isCapturing = false;
                }
            }

                                    acceptPhoto() {
                // Add success animation to the accept button
                const acceptBtn = event.target.closest('button');
                if (acceptBtn) {
                    acceptBtn.classList.add('button-success');
                    setTimeout(() => {
                        acceptBtn.classList.remove('button-success');
                    }, 300);
                }

                // Get current photo index from canvas
                const currentPhotoIndex = this.getCurrentPhotoIndex();
                if (currentPhotoIndex !== -1) {
                    // Add checkmark to the photo in gallery
                    this.addCheckmarkToPhoto(currentPhotoIndex);
                }

                // Add photo-accepted class to preview containers and hide hover
                const photoDisplayContainer = this.photoPreview.querySelector('.group');
                const mobilePhotoDisplayContainer = this.mobilePhotoPreview.querySelector('.group');

                if (photoDisplayContainer) {
                    photoDisplayContainer.classList.add('photo-accepted');
                }
                if (mobilePhotoDisplayContainer) {
                    mobilePhotoDisplayContainer.classList.add('photo-accepted');
                }

                // Force hide all hover overlays
                this.forceHideHoverOverlay();

                // Update template button status
                this.updateTemplateButtonStatus();

                // Show success message
                this.showNotification('Foto berhasil diterima!', 'success');
            }

            showNotification(message, type = 'info') {
                // Create notification element
                const notification = document.createElement('div');
                notification.className = `fixed top-4 right-4 z-50 px-4 py-2 rounded-lg text-white font-semibold transition-all duration-300 transform translate-x-full ${
            type === 'success' ? 'bg-green-500' :
            type === 'error' ? 'bg-red-500' : 'bg-blue-500'
        }`;
                notification.textContent = message;

                // Add to body
                document.body.appendChild(notification);

                // Animate in
                setTimeout(() => {
                    notification.classList.remove('translate-x-full');
                }, 100);

                // Remove after 3 seconds
                setTimeout(() => {
                    notification.classList.add('translate-x-full');
                    setTimeout(() => {
                        document.body.removeChild(notification);
                    }, 300);
                }, 3000);
            }

            addTouchEventListeners() {
                // Add touch event listeners for mobile hover effect
                const photoDisplayContainers = document.querySelectorAll('.group');

                photoDisplayContainers.forEach(container => {
                    let touchTimeout;

                    container.addEventListener('touchstart', (e) => {
                        // Prevent default to avoid zoom
                        e.preventDefault();

                        // Show overlay immediately on touch
                        const overlay = container.querySelector('.hover-overlay');
                        if (overlay) {
                            overlay.style.opacity = '1';
                            overlay.style.transform = 'scale(1.02)';
                        }

                        // Hide overlay after 5 seconds
                        touchTimeout = setTimeout(() => {
                            if (overlay) {
                                overlay.style.opacity = '0';
                                overlay.style.transform = 'scale(1)';
                            }
                        }, 5000);
                    });

                    container.addEventListener('touchend', (e) => {
                        // Clear timeout if user interacts with buttons
                        clearTimeout(touchTimeout);
                    });

                    // Add click event to hide overlay when clicking outside buttons
                    container.addEventListener('click', (e) => {
                        if (!e.target.closest('button')) {
                            const overlay = container.querySelector('.hover-overlay');
                            if (overlay) {
                                overlay.style.opacity = '0';
                                overlay.style.transform = 'scale(1)';
                            }
                        }
                    });
                });
            }

            getCurrentPhotoIndex() {
                return this.currentPhotoIndex || 0;
            }

            addCheckmarkToPhoto(photoIndex) {
                // Add checkmark to desktop gallery
                const desktopGalleryItems = this.photoGallery.querySelectorAll('.photo-gallery-item');
                if (desktopGalleryItems[photoIndex]) {
                    this.addCheckmarkToGalleryItem(desktopGalleryItems[photoIndex]);
                }

                // Add checkmark to mobile gallery
                const mobileGalleryItems = this.mobilePhotoGallery.querySelectorAll('.photo-gallery-item');
                if (mobileGalleryItems[photoIndex]) {
                    this.addCheckmarkToGalleryItem(mobileGalleryItems[photoIndex]);
                }

                // Force hide hover overlay for current photo preview
                this.forceHideHoverOverlay();
            }

            forceHideHoverOverlay() {
                // Force hide all hover overlays in preview
                const hoverOverlays = document.querySelectorAll('.hover-overlay');
                hoverOverlays.forEach(overlay => {
                    overlay.style.display = 'none';
                    overlay.style.opacity = '0';
                    overlay.style.visibility = 'hidden';
                    overlay.style.pointerEvents = 'none';
                });
            }

            restoreHoverOverlay() {
                // Restore hover overlays for non-accepted photos
                const hoverOverlays = document.querySelectorAll('.hover-overlay');
                hoverOverlays.forEach(overlay => {
                    const container = overlay.closest('.group');
                    if (container && !container.classList.contains('photo-accepted')) {
                        overlay.style.display = 'block';
                        overlay.style.opacity = '0'; // Will be controlled by CSS hover
                        overlay.style.visibility = 'visible';
                        overlay.style.pointerEvents = 'auto';
                    }
                });
            }

            restoreHoverOverlayForCurrentPhoto(photoIndex) {
                // Restore hover overlay only for the specific photo being retaken
                const hoverOverlays = document.querySelectorAll('.hover-overlay');
                hoverOverlays.forEach(overlay => {
                    const container = overlay.closest('.group');
                    if (container && !container.classList.contains('photo-accepted')) {
                        overlay.style.display = 'block';
                        overlay.style.opacity = '0'; // Will be controlled by CSS hover
                        overlay.style.visibility = 'visible';
                        overlay.style.pointerEvents = 'auto';
                    }
                });
            }

            addCheckmarkToGalleryItem(galleryItem) {
                // Remove existing checkmark if any
                const existingCheckmark = galleryItem.querySelector('.photo-checkmark');
                if (existingCheckmark) {
                    existingCheckmark.remove();
                }

                // Create checkmark element
                const checkmark = document.createElement('div');
                checkmark.className = 'photo-checkmark absolute top-1 right-1 bg-green-500 text-white rounded-full w-5 h-5 flex items-center justify-center z-10 shadow-lg';
                checkmark.innerHTML = `
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                `;

                // Add animation class
                checkmark.classList.add('checkmark-animation');

                // Add to gallery item
                galleryItem.appendChild(checkmark);

                // Add photo-accepted class to disable hover
                galleryItem.classList.add('photo-accepted');
                galleryItem.classList.remove('group');

                // Hide hover overlay
                const hoverOverlay = galleryItem.querySelector('.hover-overlay');
                if (hoverOverlay) {
                    hoverOverlay.style.display = 'none';
                    hoverOverlay.style.opacity = '0';
                    hoverOverlay.style.visibility = 'hidden';
                    hoverOverlay.style.pointerEvents = 'none';
                }
            }

            removeAllCheckmarks() {
                // Remove checkmarks from desktop gallery
                const desktopCheckmarks = this.photoGallery.querySelectorAll('.photo-checkmark');
                desktopCheckmarks.forEach(checkmark => checkmark.remove());

                // Remove checkmarks from mobile gallery
                const mobileCheckmarks = this.mobilePhotoGallery.querySelectorAll('.photo-checkmark');
                mobileCheckmarks.forEach(checkmark => checkmark.remove());

                // Re-enable hover effects for all gallery items
                this.enableHoverForAllGalleryItems();
            }

            removeCheckmarkFromPhoto(photoIndex) {
                // Remove checkmark from desktop gallery
                const desktopGalleryItems = this.photoGallery.querySelectorAll('.photo-gallery-item');
                if (desktopGalleryItems[photoIndex]) {
                    const checkmark = desktopGalleryItems[photoIndex].querySelector('.photo-checkmark');
                    if (checkmark) {
                        checkmark.remove();
                    }
                    // Re-enable hover for this specific item
                    const item = desktopGalleryItems[photoIndex];
                    item.classList.remove('photo-accepted');
                    item.classList.add('group');
                    const hoverOverlay = item.querySelector('.hover-overlay');
                    if (hoverOverlay) {
                        hoverOverlay.style.display = 'block';
                        hoverOverlay.style.opacity = '0';
                        hoverOverlay.style.visibility = 'visible';
                        hoverOverlay.style.pointerEvents = 'auto';
                    }
                }

                // Remove checkmark from mobile gallery
                const mobileGalleryItems = this.mobilePhotoGallery.querySelectorAll('.photo-gallery-item');
                if (mobileGalleryItems[photoIndex]) {
                    const checkmark = mobileGalleryItems[photoIndex].querySelector('.photo-checkmark');
                    if (checkmark) {
                        checkmark.remove();
                    }
                    // Re-enable hover for this specific item
                    const item = mobileGalleryItems[photoIndex];
                    item.classList.remove('photo-accepted');
                    item.classList.add('group');
                    const hoverOverlay = item.querySelector('.hover-overlay');
                    if (hoverOverlay) {
                        hoverOverlay.style.display = 'block';
                        hoverOverlay.style.opacity = '0';
                        hoverOverlay.style.visibility = 'visible';
                        hoverOverlay.style.pointerEvents = 'auto';
                    }
                }
            }

            disableHoverForGalleryItem(galleryItem) {
                // Remove group class to disable hover
                galleryItem.classList.remove('group');
                galleryItem.classList.add('no-hover');

                // Hide hover overlay
                const hoverOverlay = galleryItem.querySelector('.photo-hover-overlay');
                if (hoverOverlay) {
                    hoverOverlay.style.display = 'none';
                }
            }

                        enableHoverForAllGalleryItems() {
                // Re-enable hover for all gallery items
                const allGalleryItems = document.querySelectorAll('.photo-gallery-item');
                allGalleryItems.forEach(item => {
                    this.enableHoverForGalleryItem(item);
                });
            }

            enableHoverForGalleryItem(galleryItem) {
                // Re-enable hover for specific gallery item
                galleryItem.classList.remove('no-hover');
                galleryItem.classList.add('group');

                // Show hover overlay
                const hoverOverlay = galleryItem.querySelector('.photo-hover-overlay');
                if (hoverOverlay) {
                    hoverOverlay.style.display = 'block';
                }
            }

            checkIfPhotoHasCheckmark(photoIndex) {
                // Check desktop gallery
                const desktopGalleryItems = this.photoGallery.querySelectorAll('.photo-gallery-item');
                if (desktopGalleryItems[photoIndex]) {
                    const checkmark = desktopGalleryItems[photoIndex].querySelector('.photo-checkmark');
                    if (checkmark) {
                        return true;
                    }
                }

                // Check mobile gallery
                const mobileGalleryItems = this.mobilePhotoGallery.querySelectorAll('.photo-gallery-item');
                if (mobileGalleryItems[photoIndex]) {
                    const checkmark = mobileGalleryItems[photoIndex].querySelector('.photo-checkmark');
                    if (checkmark) {
                        return true;
                    }
                }

                return false;
            }

            updateUI(state) {
                const statusIndicator = this.cameraStatus.querySelector('div');
                const statusText = this.cameraStatus.querySelector('span');

                switch (state) {
                    case 'camera-on':
                        statusIndicator.className = 'w-2 h-2 bg-green-500 rounded-full animate-pulse';
                        statusText.textContent = 'Kamera On';
                        this.openCameraBtn.classList.add('hidden');
                        this.captureBtn.classList.remove('hidden');
                        this.mirrorBtn.classList.remove('hidden');
                        this.switchCameraBtn.classList.remove('hidden');
                        this.closeCameraBtn.classList.remove('hidden');
                        // Hide camera overlay when camera is active
                        this.cameraOverlay.classList.add('hidden');
                        // Show aspect ratio overlay
                        this.updateAspectRatioOverlay();
                        break;
                    case 'camera-off':
                        statusIndicator.className = 'w-2 h-2 bg-red-500 rounded-full animate-pulse';
                        statusText.textContent = 'Kamera Off';
                        this.openCameraBtn.classList.remove('hidden');
                        this.captureBtn.classList.add('hidden');
                        this.mirrorBtn.classList.add('hidden');
                        this.switchCameraBtn.classList.add('hidden');
                        this.closeCameraBtn.classList.add('hidden');
                        // Show camera overlay when camera is inactive
                        this.cameraOverlay.classList.remove('hidden');
                        break;
                }
            }

            toggleMirror() {
                this.isMirrored = !this.isMirrored;

                if (this.isMirrored) {
                    this.video.style.transform = 'scaleX(-1)';
                    this.mirrorBtn.classList.add('bg-black', 'text-white');
                    this.mirrorBtn.classList.remove('bg-white', 'text-black');
                } else {
                    this.video.style.transform = 'scaleX(1)';
                    this.mirrorBtn.classList.remove('bg-black', 'text-white');
                    this.mirrorBtn.classList.add('bg-white', 'text-black');
                }
            }


        }

        // Initialize PhotoBooth when page loads
        document.addEventListener('DOMContentLoaded', () => {
            new PhotoBooth();
        });
    </script>
@endsection

@push('styles')
    <style>
        .btn-outline-dark {
            border-color: rgba(0, 0, 0, 0.2);
            color: rgba(0, 0, 0, 0.8);
            background-color: white;
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        @media (min-width: 640px) {
            .btn-outline-dark {
                font-size: 0.875rem;
                padding: 0.375rem 0.75rem;
            }
        }

        /* Mobile settings layout */
        @media (max-width: 639px) {
            .btn-outline-dark {
                min-width: 3rem;
            }
        }

        .btn-outline-dark:hover {
            background-color: rgba(0, 0, 0, 0.9);
            border-color: rgba(0, 0, 0, 0.9);
            color: white;
        }

        .dropdown-menu {
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .dropdown-item {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            color: rgba(0, 0, 0, 0.8);
        }

        .dropdown-item:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .dropdown-item.active {
            background-color: rgba(0, 0, 0, 0.9);
            color: white;
        }



        /* Camera preview size control */
        .aspect-video {
            max-height: 60vh;
        }

        /* Camera aspect ratio control */
        #camera-preview {
            object-fit: cover;
        }

        /* Aspect ratio overlay styling */
        #aspect-ratio-overlay {
            z-index: 10;
            pointer-events: none;
        }

        #aspect-ratio-overlay .border-white\/30 {
            border-color: rgba(255, 255, 255, 0.5) !important;
        }

        /* Corner indicators */
        #aspect-ratio-overlay .absolute.w-6.h-6 {
            border-width: 3px !important;
        }

        /* Ensure overlay center is properly sized */
        #aspect-ratio-overlay .relative {
            box-sizing: border-box;
            position: relative;
            border: 2px solid rgba(255, 255, 255, 0.5) !important;
        }

        /* Overlay container styling */
        #aspect-ratio-overlay>div {
            position: relative;
            width: 100%;
            height: 100%;
        }

        /* Black overlay background */
        #aspect-ratio-overlay .bg-black\/50 {
            background-color: rgba(0, 0, 0, 0.616) !important;
        }

        /* Camera status badge - ensure it's above overlay */
        #camera-status {
            z-index: 20 !important;
            position: relative;
            background-color: rgba(255, 255, 255, 0.9) !important;
            backdrop-filter: blur(8px);
        }

        @media (max-width: 768px) {
            .aspect-video {
                max-height: 50vh;
            }
        }

        @media (max-width: 480px) {
            .aspect-video {
                max-height: 40vh;
            }
        }

        /* Video mirror effect */
        #camera-preview {
            transform-origin: center;
            transition: transform 0.3s ease;
        }

        /* Responsive layout adjustments */
        @media (min-width: 1024px) {
            .grid-cols-1.lg\:grid-cols-2 {
                grid-template-columns: 1fr 1fr;
            }
        }

        /* Mobile photo preview adjustments */
        @media (max-width: 1023px) {
            #mobile-photo-preview {
                margin-top: 1.5rem;
            }
        }

        /* Ensure canvas maintains aspect ratio */
        #photo-canvas,
        #mobile-photo-canvas {
            max-width: 100%;
            height: auto;
        }

        /* Photo gallery square layout */
        #photo-gallery,
        #mobile-photo-gallery {
            grid-template-columns: repeat(4, 1fr);
        }

        #photo-gallery>div,
        #mobile-photo-gallery>div {
            aspect-ratio: 1;
            position: relative;
        }

        /* Dynamic aspect ratio for gallery items */
        #photo-gallery.aspect-1-1>div,
        #mobile-photo-gallery.aspect-1-1>div {
            aspect-ratio: 1;
        }

        #photo-gallery.aspect-4-3>div,
        #mobile-photo-gallery.aspect-4-3>div {
            aspect-ratio: 4/3;
        }

        #photo-gallery.aspect-16-9>div,
        #mobile-photo-gallery.aspect-16-9>div {
            aspect-ratio: 16/9;
        }

        #photo-gallery img,
        #mobile-photo-gallery img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 0.5rem;
        }

        #photo-gallery .absolute,
        #mobile-photo-gallery .absolute {
            border-radius: 0.5rem;
        }

        /* Responsive gallery sizing */
        @media (min-width: 640px) {
            #photo-gallery {
                max-width: 400px;
                margin: 0 auto;
            }
        }

        @media (max-width: 639px) {
            #mobile-photo-gallery {
                max-width: 320px;
                margin: 0 auto;
            }
        }

        /* Extra small screens */
        @media (max-width: 480px) {
            #mobile-photo-gallery {
                max-width: 280px;
                gap: 0.25rem;
            }
        }

        /* Camera Effects */
        .countdown-circle {
            animation: pulse 1s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.7);
            }

            50% {
                transform: scale(1.05);
                box-shadow: 0 0 0 10px rgba(255, 255, 255, 0);
            }
        }

        /* Flash Effect */
        #flash-effect {
            z-index: 50;
            transition: opacity 0.15s ease-out;
        }

        #flash-effect.flash {
            opacity: 1 !important;
            box-shadow: 0 0 50px rgba(255, 255, 255, 0.8);
        }

        /* Camera Flash Overlay */
        #camera-flash-overlay {
            z-index: 60;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.8));
            backdrop-filter: blur(2px);
        }

        #camera-flash-overlay.flash-active {
            opacity: 1 !important;
            transform: scale(1.02);
            box-shadow:
                0 0 100px rgba(255, 255, 255, 1),
                inset 0 0 50px rgba(255, 255, 255, 0.5);
        }

        /* Shutter Effect */
        #shutter-effect {
            z-index: 40;
        }

        #shutter-effect.active .shutter-top {
            transform: translateY(0) !important;
        }

        #shutter-effect.active .shutter-bottom {
            transform: translateY(0) !important;
        }

        /* Camera Shake Effect */
        @keyframes cameraShake {

            0%,
            100% {
                transform: translateX(0);
            }

            10%,
            30%,
            50%,
            70%,
            90% {
                transform: translateX(-2px);
            }

            20%,
            40%,
            60%,
            80% {
                transform: translateX(2px);
            }
        }

        .camera-shake {
            animation: cameraShake 0.3s ease-in-out;
        }

        /* Countdown Number Animation */
        @keyframes countdownPop {
            0% {
                transform: scale(0.8);
                opacity: 0.5;
            }

            50% {
                transform: scale(1.2);
                opacity: 1;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .countdown-pop {
            animation: countdownPop 0.5s ease-out;
        }

        /* Hover Effect for Photo Display */
        .group:hover .hover-overlay {
            opacity: 1 !important;
            transform: scale(1.02);
        }

        /* Enhanced hover overlay styling */
        .hover-overlay {
            backdrop-filter: blur(2px);
            box-shadow: none;
            border: none;
        }

        /* Button styles for hover overlay */
        .hover-overlay button {
            min-width: 80px;
            font-size: 14px;
            padding: 8px 16px;
            font-weight: 600;
            letter-spacing: 0.3px;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .hover-overlay button:hover {
            transform: scale(1.05) !important;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.4);
        }

        /* Responsive button sizing */
        @media (max-width: 768px) {
            .hover-overlay button {
                min-width: 70px;
                font-size: 13px;
                padding: 6px 12px;
            }
        }

        @media (max-width: 640px) {
            .hover-overlay button {
                min-width: 65px;
                font-size: 12px;
                padding: 5px 10px;
            }

            .hover-overlay {
                gap: 8px;
            }
        }

        @media (max-width: 480px) {
            .hover-overlay button {
                min-width: 60px;
                font-size: 11px;
                padding: 4px 8px;
            }

            .hover-overlay {
                gap: 6px;
            }
        }

        /* Touch device support - show overlay on touch */
        @media (hover: none) and (pointer: coarse) {
            .group:active .hover-overlay {
                opacity: 1 !important;
            }

            /* Show overlay when photo is displayed on mobile */
            .group.has-photo .hover-overlay {
                opacity: 1 !important;
            }

            /* Ensure buttons are visible on mobile */
            .group.has-photo .hover-overlay button {
                opacity: 1;
                transform: scale(1);
            }

            /* Make overlay more visible on touch devices */
            .hover-overlay {
                background-color: rgba(0, 0, 0, 0.1) !important;
            }

            /* Ensure buttons are accessible */
            .hover-overlay button {
                z-index: 10;
                position: relative;
            }

            /* Add subtle animation for better UX */
            .hover-overlay button:hover {
                transform: scale(1.05);
            }

            /* Auto-hide overlay after 5 seconds on touch devices */
            .group.has-photo .hover-overlay {
                animation: autoHideOverlay 5s ease-in-out forwards;
            }

            @keyframes autoHideOverlay {
                0%, 80% {
                    opacity: 1;
                }
                100% {
                    opacity: 0;
                }
            }
        }

        /* General overlay improvements */
        .hover-overlay {
            backdrop-filter: blur(1px);
            border-radius: 16px;
            box-shadow: none;
        }

        /* Button improvements */
        .hover-overlay button {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(0, 0, 0, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Ensure smooth transitions */
        .group {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-overlay {
            transition: opacity 0.3s cubic-bezier(0.4, 0, 0.2, 1),
                        background-color 0.3s cubic-bezier(0.4, 0, 0.2, 1),
                        transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Focus states for accessibility */
        .hover-overlay button:focus {
            outline: 2px solid rgba(0, 0, 0, 0.5);
            outline-offset: 2px;
            transform: scale(1.05);
        }

        /* Loading state for buttons */
        .hover-overlay button:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: scale(0.95);
        }

        /* Enhanced button states */
        .hover-overlay button:active {
            transform: scale(0.95);
        }

        /* Success animation */
        @keyframes buttonSuccess {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        .button-success {
            animation: buttonSuccess 0.3s ease-in-out;
        }

        /* Enhanced button animations */
        @keyframes buttonPulse {
            0%, 100% {
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            }
            50% {
                box-shadow: 0 6px 16px rgba(0, 0, 0, 0.4);
            }
        }

        .hover-overlay button {
            animation: buttonPulse 2s ease-in-out infinite;
        }

        /* Photo display container improvements */
        .group {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
        }

        .group canvas {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .group:hover canvas {
            transform: scale(1.02);
        }

        /* Ensure overlay is always on top */
        .hover-overlay {
            z-index: 50;
        }

        /* Button text improvements */
        .hover-overlay button {
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        /* Icon improvements */
        .hover-overlay button svg {
            filter: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.3));
        }

        /* Photo checkmark styling */
        .photo-checkmark {
            animation: checkmarkAppear 0.5s ease-out;
            position: absolute;
            top: 4px;
            right: 4px;
            z-index: 20;
            pointer-events: none;
        }

        @keyframes checkmarkAppear {
            0% {
                transform: scale(0) rotate(-180deg);
                opacity: 0;
            }
            50% {
                transform: scale(1.1) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: scale(1) rotate(0deg);
                opacity: 1;
            }
        }

        .checkmark-animation {
            animation: checkmarkPulse 2s ease-in-out infinite;
        }

        @keyframes checkmarkPulse {
            0%, 100% {
                transform: scale(1);
                box-shadow: 0 1px 4px rgba(34, 197, 94, 0.4);
            }
            50% {
                transform: scale(1.05);
                box-shadow: 0 2px 6px rgba(34, 197, 94, 0.6);
            }
        }

                /* Responsive checkmark sizing */
        @media (max-width: 640px) {
            .photo-checkmark {
                width: 16px !important;
                height: 16px !important;
                top: 2px !important;
                right: 2px !important;
            }

            .photo-checkmark svg {
                width: 10px !important;
                height: 10px !important;
            }
        }

        @media (max-width: 480px) {
            .photo-checkmark {
                width: 14px !important;
                height: 14px !important;
                top: 1px !important;
                right: 1px !important;
            }

            .photo-checkmark svg {
                width: 8px !important;
                height: 8px !important;
            }
        }

        /* Disable hover for accepted photos */
        .photo-gallery-item.no-hover {
            cursor: default;
        }

        .photo-gallery-item.no-hover:hover {
            transform: none;
        }

        .photo-gallery-item.no-hover .photo-hover-overlay {
            display: none !important;
            opacity: 0 !important;
        }

        /* Ensure checkmark is always visible on accepted photos */
        .photo-gallery-item.no-hover .photo-checkmark {
            opacity: 1 !important;
            visibility: visible !important;
        }

        /* Checkmark positioning and styling */
        .photo-checkmark {
            border: 1px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(2px);
        }

        /* Hover effect for non-accepted photos */
        .group:not(.photo-accepted) .hover-overlay {
            display: block;
            opacity: 0;
            visibility: visible;
            pointer-events: auto;
            transition: opacity 0.3s ease;
        }

        .group:not(.photo-accepted):hover .hover-overlay {
            opacity: 1;
        }

        /* Disable hover for accepted photos */
        .group.photo-accepted .hover-overlay,
        .photo-accepted .hover-overlay {
            display: none !important;
            opacity: 0 !important;
            pointer-events: none !important;
            visibility: hidden !important;
        }

        .group.photo-accepted {
            cursor: default;
        }

        .group.photo-accepted:hover {
            transform: none;
        }

        /* Mobile-specific improvements */
        @media (max-width: 480px) {
            .hover-overlay {
                padding: 6px;
            }

            .hover-overlay button {
                font-size: 10px;
                padding: 4px 8px;
                min-width: 55px;
            }

            .hover-overlay button svg {
                width: 12px;
                height: 12px;
            }
        }

        /* Tablet improvements */
        @media (min-width: 481px) and (max-width: 768px) {
            .hover-overlay button {
                font-size: 12px;
                padding: 6px 10px;
                min-width: 65px;
            }
        }

        /* Desktop improvements */
        @media (min-width: 769px) {
            .hover-overlay button {
                font-size: 13px;
                padding: 8px 14px;
                min-width: 75px;
            }
        }

        /* High DPI displays */
        @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
            .hover-overlay button {
                border-width: 0.5px;
            }
        }

        /* Dark mode support */
        @media (prefers-color-scheme: dark) {
            .hover-overlay {
                background-color: rgba(0, 0, 0, 0.1) !important;
            }
        }

        /* Template Selection Styles */
        #template-selection-section {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        }

        /* Two-card layout styles */
        .template-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .template-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .template-card.ring-2 {
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.8);
        }

        /* Selected template card styling */
        .template-card.bg-black {
            color: white;
        }

        .template-card.bg-black h3,
        .template-card.bg-black p {
            color: white;
        }

        .template-preview {
            background: linear-gradient(45deg, #f1f5f9 25%, transparent 25%),
                        linear-gradient(-45deg, #f1f5f9 25%, transparent 25%),
                        linear-gradient(45deg, transparent 75%, #f1f5f9 75%),
                        linear-gradient(-45deg, transparent 75%, #f1f5f9 75%);
            background-size: 20px 20px;
            background-position: 0 0, 0 10px, 10px -10px, -10px 0px;
        }

        /* Aspect ratio classes for templates */
        .aspect-\[4\/3\] {
            aspect-ratio: 4 / 3;
        }

        .aspect-square {
            aspect-ratio: 1 / 1;
        }

        .aspect-video {
            aspect-ratio: 16 / 9;
        }

        /* Template preview frame styles */
        .template-preview .bg-white {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .template-preview .bg-gray-200 {
            background: linear-gradient(135deg, #e5e7eb 0%, #d1d5db 100%);
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        /* Custom vertical template styles */
        .custom-vertical-template {
            background: white;
            border: 2px solid white;
        }

        .custom-vertical-template .border-b-2 {
            border-bottom-width: 8px;
        }

        /* Responsive template grid */
        @media (max-width: 640px) {
            #template-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
        }

        @media (min-width: 641px) and (max-width: 1024px) {
            #template-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1.5rem;
            }
        }

        @media (min-width: 1025px) {
            #template-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 2rem;
            }
        }

        @media (min-width: 1280px) {
            #template-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        /* Template card animations */
        .template-card {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Stagger animation for template cards */
        .template-card:nth-child(1) { animation-delay: 0.1s; }
        .template-card:nth-child(2) { animation-delay: 0.2s; }
        .template-card:nth-child(3) { animation-delay: 0.3s; }
        .template-card:nth-child(4) { animation-delay: 0.4s; }
        .template-card:nth-child(5) { animation-delay: 0.5s; }

        /* Back button hover effect */
        #back-to-photos-btn:hover {
            transform: translateX(-4px);
        }

        /* Template selection section scroll behavior */
        #template-selection-section {
            scroll-margin-top: 2rem;
        }
    </style>
@endpush

