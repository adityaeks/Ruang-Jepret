@extends('layouts.app')

@section('title', 'RuangJepret - Digital Photobooth Service')

@section('content')
    <!-- Hero Section -->
    <header
        class="relative min-h-screen flex items-center justify-center overflow-hidden bg-white py-20 pb-32 md:pb-20">
        <div class="circular-dots-bg"></div>
        <div class="text-center z-10 px-4 fade-in w-full">
            <div class="relative inline-block mb-8 md:mb-12">
                <!-- Digital Photobooth Badge -->
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 rounded-full mb-6 md:mb-8 photobooth-badge mt-20">
                    <div class="glow-effect"></div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                    </svg>
                    <span class="text-sm font-medium text-gray-700">Digital
                        Photobooth</span>
                </div>

                <h1
                    class="text-4xl sm:text-6xl md:text-8xl font-black uppercase tracking-tighter bg-clip-text text-transparent bg-gradient-to-r from-black via-black/90 to-black/80">
                    <h1
                        class="text-4xl sm:text-6xl md:text-8xl font-black uppercase tracking-tighter bg-clip-text text-transparent bg-gradient-to-r from-black via-black/90 to-black/80">
                        Ruang Jepret
                    </h1>
                    <div
                        class="absolute -bottom-4 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-black/80 to-transparent">
                    </div>
                    <div
                        class="absolute -bottom-6 left-1/4 right-1/4 h-0.5 bg-gradient-to-r from-transparent via-black/30 to-transparent">
                    </div>
            </div>
            <p class="text-lg sm:text-xl md:text-2xl font-light mb-8 md:mb-12 max-w-2xl mx-auto tracking-wide px-4">
                Kreasikan Momen Istimewa, Bagikan Kebahagiaan di RuangJepret.</p>
            <div class="flex justify-center mb-12 md:mb-16">
                <a href="{{ route('booth') }}"
                    class="px-8 md:px-12 py-3 md:py-4 bg-black text-white font-bold rounded-full text-base md:text-lg uppercase tracking-wider transform transition-all duration-300 hover:scale-[1.02] hover:shadow-xl flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Mulai Jepret
                </a>
            </div>

            <!-- Quick Stats & Features -->
            <div class="max-w-4xl mx-auto px-4">
                <!-- Stats Row -->
                <div class="grid grid-cols-3 gap-2 md:gap-8 mb-8 md:mb-12 max-w-sm sm:max-w-none mx-auto">
                    <div class="text-center group">
                        <div
                            class="bg-white/80 backdrop-blur-sm rounded-lg md:rounded-2xl p-2 md:p-6 border border-black/10 hover:border-black/20 transition-all duration-300 hover:shadow-lg h-full flex flex-col justify-center">
                            <div
                                class="w-6 h-6 md:w-12 md:h-12 bg-black/10 rounded-full flex items-center justify-center mx-auto mb-1 md:mb-4 group-hover:bg-black/20 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 md:h-6 md:w-6 text-black/70"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <h3 class="text-sm md:text-2xl font-bold text-black mb-0.5 md:mb-2">No Ads</h3>
                            <p class="text-black/70 text-xs md:text-sm">Tanpa Iklan
                            </p>
                        </div>
                    </div>

                    <div class="text-center group">
                        <div
                            class="bg-white/80 backdrop-blur-sm rounded-lg md:rounded-2xl p-2 md:p-6 border border-black/10 hover:border-black/20 transition-all duration-300 hover:shadow-lg h-full flex flex-col justify-center">
                            <div
                                class="w-6 h-6 md:w-12 md:h-12 bg-black/10 rounded-full flex items-center justify-center mx-auto mb-1 md:mb-4 group-hover:bg-black/20 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 md:h-6 md:w-6 text-black/70"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <h3 class="text-sm md:text-2xl font-bold text-black mb-0.5 md:mb-2">Real-time</h3>
                            <p class="text-black/70 text-xs md:text-sm">Instant Share
                            </p>
                        </div>
                    </div>

                    <div class="text-center group">
                        <div
                            class="bg-white/80 backdrop-blur-sm rounded-lg md:rounded-2xl p-2 md:p-6 border border-black/10 hover:border-black/20 transition-all duration-300 hover:shadow-lg h-full flex flex-col justify-center">
                            <div
                                class="w-6 h-6 md:w-12 md:h-12 bg-black/10 rounded-full flex items-center justify-center mx-auto mb-1 md:mb-4 group-hover:bg-black/20 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 md:h-6 md:w-6 text-black/70"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-sm md:text-2xl font-bold text-black mb-0.5 md:mb-2">Unlimited</h3>
                            <p class="text-black/70 text-xs md:text-sm">Tanpa Batas
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grid circle effect -->
        <div class="grid-circle"></div>

    </header>

    <!-- Features Section -->
    <section
        class="py-20 bg-gradient-to-br from-gray-50 via-gray-100 to-gray-200 border-t border-black/5 relative overflow-hidden">
        <!-- Background Decorative Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div
                class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-white/30 to-transparent rounded-full blur-3xl">
            </div>
            <div
                class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-tr from-white/20 to-transparent rounded-full blur-3xl">
            </div>
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-white/10 to-transparent rounded-full blur-3xl">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-black mb-4">Why About Us?</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-black/20 to-black/40 mx-auto rounded-full"></div>
            </div>

            <div class="text-center mb-16 max-w-4xl mx-auto">
                <div class="relative">
                    <!-- Decorative quote marks -->
                    <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 text-6xl text-black/10 font-serif">
                        "</div>

                    <p class="text-xl md:text-2xl text-black/90 leading-relaxed mb-8 font-light">
                        Kami menghadirkan <span class="font-semibold text-black">pengalaman
                            fotografi</span> yang sederhana namun powerful. Dengan fokus pada <span
                            class="font-semibold text-black">kemudahan
                            penggunaan</span> dan hasil yang memuaskan, setiap fitur dirancang untuk memberikan kendali
                        penuh kepada pengguna dalam menciptakan momen berharga.
                    </p>

                    <!-- Decorative line -->
                    <div class="w-16 h-0.5 bg-gradient-to-r from-transparent via-black/30 to-transparent mx-auto mb-8">
                    </div>

                    <p class="text-lg text-black/75 leading-relaxed font-light">
                        Dari <span class="font-medium text-black">capture</span> hingga <span
                            class="font-medium text-black">sharing</span>, setiap langkah dioptimalkan untuk memberikan
                        hasil terbaik dengan interface yang <span class="font-medium text-black">intuitif</span> dan
                        <span class="font-medium text-black">modern</span>.
                    </p>

                    <!-- Bottom decorative quote marks -->
                    <div
                        class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 text-6xl text-black/10 font-serif rotate-180">
                        "</div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Beranda -->
                <div class="group relative">
                    <div
                        class="backdrop-blur-xl bg-white/25 rounded-3xl p-8 h-full border border-white/40 hover:border-white/60 transition-all duration-500 hover:shadow-2xl hover:shadow-black/20 hover:bg-white/35 hover:-translate-y-2 relative overflow-hidden">
                        <!-- Card Background Glow -->
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>

                        <div class="relative z-10">
                            <div
                                class="w-14 h-14 bg-gradient-to-br from-black/90 to-black/70 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-all duration-500 shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </div>
                            <h3
                                class="text-xl font-bold mb-4 text-black group-hover:text-black/90 transition-colors duration-300">
                                Beranda</h3>
                            <p
                                class="text-black/85 leading-relaxed text-sm group-hover:text-black/95 transition-colors duration-300">
                                Tampilan hero ringkas dengan tombol "Mulai Jepret" untuk memulai pengalaman fotografi.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Halaman Capture -->
                <div class="group relative">
                    <div
                        class="backdrop-blur-xl bg-white/25 rounded-3xl p-8 h-full border border-white/40 hover:border-white/60 transition-all duration-500 hover:shadow-2xl hover:shadow-black/20 hover:bg-white/35 hover:-translate-y-2 relative overflow-hidden">
                        <!-- Card Background Glow -->
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>

                        <div class="relative z-10">
                            <div
                                class="w-14 h-14 bg-gradient-to-br from-black/90 to-black/70 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-all duration-500 shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <h3
                                class="text-xl font-bold mb-4 text-black group-hover:text-black/90 transition-colors duration-300">
                                Halaman Capture
                            </h3>
                            <p
                                class="text-black/85 leading-relaxed text-sm group-hover:text-black/95 transition-colors duration-300">
                                Akses kamera → preview → tombol "Jepret" untuk mengambil foto dengan mudah.</p>
                        </div>
                    </div>
                </div>

                <!-- Editor Ringan -->
                <div class="group relative">
                    <div
                        class="backdrop-blur-xl bg-white/25 rounded-3xl p-8 h-full border border-white/40 hover:border-white/60 transition-all duration-500 hover:shadow-2xl hover:shadow-black/20 hover:bg-white/35 hover:-translate-y-2 relative overflow-hidden">
                        <!-- Card Background Glow -->
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>

                        <div class="relative z-10">
                            <div
                                class="w-14 h-14 bg-gradient-to-br from-black/90 to-black/70 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-all duration-500 shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                                </svg>
                            </div>
                            <h3
                                class="text-xl font-bold mb-4 text-black group-hover:text-black/90 transition-colors duration-300">
                                Editor Ringan
                            </h3>
                            <p
                                class="text-black/85 leading-relaxed text-sm group-hover:text-black/95 transition-colors duration-300">
                                Crop, filter, frame + tombol "Simpan" / "Cetak" / "Share" untuk hasil optimal.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Galeri Pengguna -->
                <div class="group relative">
                    <div
                        class="backdrop-blur-xl bg-white/25 rounded-3xl p-8 h-full border border-white/40 hover:border-white/60 transition-all duration-500 hover:shadow-2xl hover:shadow-black/20 hover:bg-white/35 hover:-translate-y-2 relative overflow-hidden">
                        <!-- Card Background Glow -->
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>

                        <div class="relative z-10">
                            <div
                                class="w-14 h-14 bg-gradient-to-br from-black/90 to-black/70 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-all duration-500 shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <h3
                                class="text-xl font-bold mb-4 text-black group-hover:text-black/90 transition-colors duration-300">
                                Galeri Pengguna
                            </h3>
                            <p
                                class="text-black/85 leading-relaxed text-sm group-hover:text-black/95 transition-colors duration-300">
                                List hasil jepretan, opsi download & cetak untuk mengelola foto dengan mudah.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section
        class="py-20 bg-gradient-to-br from-gray-50 via-white to-gray-100 border-t border-black/5 relative overflow-hidden">
        <!-- Background decorative elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div
                class="absolute top-20 left-10 w-32 h-32 bg-gradient-to-br from-black/5 to-transparent rounded-full blur-2xl">
            </div>
            <div
                class="absolute bottom-20 right-10 w-40 h-40 bg-gradient-to-tl from-black/3 to-transparent rounded-full blur-3xl">
            </div>
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-black/2 to-transparent rounded-full blur-3xl">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <div class="text-center mb-16 relative">
                <!-- Decorative elements -->
                <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-8">
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 bg-black rounded-full animate-pulse"></div>
                        <div class="w-1 h-1 bg-black/60 rounded-full animate-pulse delay-100"></div>
                        <div class="w-2 h-2 bg-black rounded-full animate-pulse delay-200"></div>
                    </div>
                </div>

                <h2 class="text-4xl md:text-5xl font-bold text-black mb-4 relative">
                    <span class="relative z-10">Our Gallery</span>
                    <div class="absolute -top-2 -left-2 w-4 h-4 bg-black/20 rounded-full blur-sm"></div>
                    <div class="absolute -bottom-2 -right-2 w-3 h-3 bg-black/30 rounded-full blur-sm"></div>
                </h2>

                <div class="w-24 h-1 bg-gradient-to-r from-black/40 to-black/60 mx-auto rounded-full mb-4 relative">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-transparent via-white/50 to-transparent rounded-full animate-pulse">
                    </div>
                </div>

                <p class="text-lg text-black/70 max-w-2xl mx-auto leading-relaxed">
                    Koleksi momen berharga yang telah diabadikan melalui
                    <span class="font-semibold text-black">RuangJepret</span>. Setiap foto menceritakan kisah unik dan
                    kenangan yang tak terlupakan.
                </p>

                <!-- Bottom decorative line -->
                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-8">
                    <div class="flex items-center gap-1">
                        <div class="w-8 h-0.5 bg-gradient-to-r from-transparent to-black/40"></div>
                        <div class="w-1 h-1 bg-black/60 rounded-full"></div>
                        <div class="w-8 h-0.5 bg-gradient-to-l from-transparent to-black/40"></div>
                    </div>
                </div>
            </div>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Gallery Item 1 -->
                <div class="group gallery-item">
                    <div
                        class="card-container relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                        <!-- Decorative corner elements -->
                        <div
                            class="absolute top-0 left-0 w-8 h-8 border-l-2 border-t-2 border-black/30 rounded-tl-2xl z-10">
                        </div>
                        <div
                            class="absolute bottom-0 right-0 w-8 h-8 border-r-2 border-b-2 border-black/30 rounded-br-2xl z-10">
                        </div>

                        <div class="aspect-[3/4] overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1513364776144-60967b0f800f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&h=800&q=80"
                                alt="Gallery photo"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-out">
                        </div>

                        <!-- Overlay -->
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500">
                            <div class="overlay-content absolute bottom-0 left-0 right-0 p-6">
                                <h3 class="text-white font-bold text-xl mb-2">Wedding Memories
                                </h3>
                                <p class="text-white/90 text-sm mb-4 leading-relaxed">Momen sakral pernikahan yang
                                    diabadikan dengan sempurna melalui lensa RuangJepret
                                </p>
                            </div>
                        </div>

                        <!-- Corner accent -->
                        <div
                            class="corner-accent absolute top-4 right-4 w-3 h-3 bg-white rounded-full opacity-0 group-hover:opacity-100 transition-all duration-500 transform scale-0 group-hover:scale-100">
                        </div>

                        <!-- Floating elements -->
                        <div
                            class="absolute top-6 left-6 w-2 h-2 bg-white/60 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-700 delay-200">
                        </div>
                        <div
                            class="absolute top-8 left-8 w-1 h-1 bg-white/80 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-700 delay-300">
                        </div>
                    </div>
                </div>

                <!-- Gallery Item 2 -->
                <div class="group gallery-item">
                    <div
                        class="card-container relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                        <!-- Decorative corner elements -->
                        <div
                            class="absolute top-0 left-0 w-8 h-8 border-l-2 border-t-2 border-black/30 rounded-tl-2xl z-10">
                        </div>
                        <div
                            class="absolute bottom-0 right-0 w-8 h-8 border-r-2 border-b-2 border-black/30 rounded-br-2xl z-10">
                        </div>

                        <div class="aspect-[3/4] overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1546435770-a3e426bf472b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&h=900&q=80"
                                alt="Gallery photo"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-out">
                        </div>

                        <!-- Overlay -->
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500">
                            <div class="overlay-content absolute bottom-0 left-0 right-0 p-6">
                                <h3 class="text-white font-bold text-xl mb-2">Corporate Events
                                </h3>
                                <p class="text-white/90 text-sm mb-4 leading-relaxed">Suasana profesional yang tetap
                                    hangat dan berkesan untuk acara perusahaan</p>

                            </div>
                        </div>

                        <!-- Corner accent -->
                        <div
                            class="corner-accent absolute top-4 right-4 w-3 h-3 bg-white rounded-full opacity-0 group-hover:opacity-100 transition-all duration-500 transform scale-0 group-hover:scale-100">
                        </div>

                        <!-- Floating elements -->
                        <div
                            class="absolute top-6 left-6 w-2 h-2 bg-white/60 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-700 delay-200">
                        </div>
                        <div
                            class="absolute top-8 left-8 w-1 h-1 bg-white/80 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-700 delay-300">
                        </div>
                    </div>
                </div>

                <!-- Gallery Item 3 -->
                <div class="group gallery-item">
                    <div
                        class="relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                        <div class="aspect-[3/4] overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1503342217507-ae4f4176f062?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&h=700&q=80"
                                alt="Gallery photo"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-out">
                        </div>
                        <!-- Overlay -->
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500">
                            <div
                                class="absolute bottom-0 left-0 right-0 p-6 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                <h3 class="text-white font-semibold text-lg mb-2">Birthday Celebrations
                                </h3>
                                <p class="text-white/80 text-sm mb-4">Kebahagiaan yang terekam dalam setiap senyuman
                                </p>

                            </div>
                        </div>
                        <!-- Corner accent -->
                        <div
                            class="absolute top-4 right-4 w-3 h-3 bg-white rounded-full opacity-0 group-hover:opacity-100 transition-all duration-500 transform scale-0 group-hover:scale-100">
                        </div>
                    </div>
                </div>

                <!-- Gallery Item 4 -->
                <div class="group gallery-item">
                    <div
                        class="relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                        <div class="aspect-[3/4] overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1516483638687-065f038d1f1c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&h=800&q=80"
                                alt="Gallery photo"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-out">
                        </div>
                        <!-- Overlay -->
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500">
                            <div
                                class="absolute bottom-0 left-0 right-0 p-6 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                <h3 class="text-white font-semibold text-lg mb-2">Graduation Day
                                </h3>
                                <p class="text-white/80 text-sm mb-4">Prestasi dan kebanggaan yang patut dirayakan
                                </p>

                            </div>
                        </div>
                        <!-- Corner accent -->
                        <div
                            class="absolute top-4 right-4 w-3 h-3 bg-white rounded-full opacity-0 group-hover:opacity-100 transition-all duration-500 transform scale-0 group-hover:scale-100">
                        </div>
                    </div>
                </div>

                <!-- Gallery Item 5 -->
                <div class="group gallery-item">
                    <div
                        class="relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                        <div class="aspect-[3/4] overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&h=900&q=80"
                                alt="Gallery photo"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-out">
                        </div>
                        <!-- Overlay -->
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500">
                            <div
                                class="absolute bottom-0 left-0 right-0 p-6 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                <h3 class="text-white font-semibold text-lg mb-2">Family Reunion
                                </h3>
                                <p class="text-white/80 text-sm mb-4">Kebersamaan keluarga yang hangat dan penuh cinta
                                </p>
                            </div>
                        </div>
                        <!-- Corner accent -->
                        <div
                            class="absolute top-4 right-4 w-3 h-3 bg-accent rounded-full opacity-0 group-hover:opacity-100 transition-all duration-500 transform scale-0 group-hover:scale-100">
                        </div>
                    </div>
                </div>

                <!-- Gallery Item 6 -->
                <div class="group gallery-item">
                    <div
                        class="relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                        <div class="aspect-[3/4] overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&h=700&q=80"
                                alt="Gallery photo"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-out">
                        </div>
                        <!-- Overlay -->
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500">
                            <div
                                class="absolute bottom-0 left-0 right-0 p-6 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                <h3 class="text-white font-semibold text-lg mb-2">Portrait Session
                                </h3>
                                <p class="text-white/80 text-sm mb-4">Keindahan yang terungkap dalam setiap pose</p>
                            </div>
                        </div>
                        <!-- Corner accent -->
                        <div
                            class="absolute top-4 right-4 w-3 h-3 bg-white rounded-full opacity-0 group-hover:opacity-100 transition-all duration-500 transform scale-0 group-hover:scale-100">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="text-center mt-16">
                <div class="bg-white/60 backdrop-blur-sm rounded-3xl p-8 border border-black/10 max-w-2xl mx-auto">
                    <h3 class="text-2xl font-bold text-black mb-4">Siap untuk Menciptakan Momen Berharga?</h3>
                    <p class="text-black/70 mb-6">Bergabunglah dengan ribuan pengguna yang telah mempercayai
                        RuangJepret untuk mengabadikan momen-momen istimewa mereka.</p>
                    <a href="{{ route('booth') }}"
                        class="px-8 py-3 bg-black text-white font-semibold rounded-full hover:bg-black/90 transition-colors flex items-center gap-2 mx-auto inline-flex">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Mulai Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
