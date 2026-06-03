<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'RuangJepret') }} - Login</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body { font-family: 'Inter', sans-serif; }
            .login-bg {
                background: linear-gradient(135deg, #0a0a0a, #1a1a2e);
                position: relative;
                overflow: hidden;
            }
            .login-bg::before {
                content: '';
                position: absolute;
                width: 600px; height: 600px;
                background: radial-gradient(circle, rgba(124, 58, 237, 0.12) 0%, transparent 70%);
                top: -200px; left: -200px;
                border-radius: 50%;
            }
            .login-bg::after {
                content: '';
                position: absolute;
                width: 500px; height: 500px;
                background: radial-gradient(circle, rgba(37, 99, 235, 0.1) 0%, transparent 70%);
                bottom: -150px; right: -150px;
                border-radius: 50%;
            }
            .glass-card {
                background: rgba(255, 255, 255, 0.03);
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                border: 1px solid rgba(255, 255, 255, 0.05);
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            }
            
            .brand-logo {
                background: linear-gradient(135deg, #fff, #aaa);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
        </style>
    </head>
    <body class="font-sans antialiased login-bg text-gray-100 min-h-screen flex items-center justify-center p-4">
        
        <div class="w-full max-w-md relative z-10">
            <!-- Logo -->
            <div class="text-center mb-8">
                <a href="/" class="inline-flex flex-col items-center gap-3 group transition-transform hover:scale-105">
                    <div class="w-16 h-16 rounded-2xl flex items-center justify-center shadow-lg transition-transform" style="background:linear-gradient(135deg,#111,#333); border: 1px solid rgba(255,255,255,0.1)">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                            <circle cx="8.5" cy="8.5" r="1.5"/>
                            <polyline points="21 15 16 10 5 21"/>
                        </svg>
                    </div>
                    <h1 class="text-3xl font-extrabold brand-logo tracking-tight">RuangJepret</h1>
                </a>
            </div>

            <!-- Card -->
            <div class="glass-card rounded-3xl p-8 sm:p-10 w-full overflow-hidden relative">
                <!-- Highlight line -->
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-purple-500 via-blue-500 to-emerald-500"></div>
                
                {{ $slot }}
            </div>
            
            <p class="text-center text-gray-500 text-sm mt-8">
                &copy; {{ date('Y') }} RuangJepret. All rights reserved.
            </p>
        </div>
    </body>
</html>
