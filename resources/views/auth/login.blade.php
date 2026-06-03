<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-6">
        <h2 class="text-2xl font-bold text-white mb-2">Selamat Datang Kembali</h2>
        <p class="text-gray-400 text-sm">Silakan login untuk masuk ke dasbor admin.</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block font-medium text-sm text-gray-300 mb-1">{{ __('Email') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                class="block w-full rounded-xl bg-black/20 border border-white/10 text-white focus:border-purple-500 focus:ring focus:ring-purple-500/20 shadow-sm transition-colors py-2.5 px-4">
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex justify-between items-center mb-1">
                <label for="password" class="block font-medium text-sm text-gray-300">{{ __('Password') }}</label>
                @if (Route::has('password.request'))
                    <a class="text-xs text-purple-400 hover:text-purple-300 transition-colors" href="{{ route('password.request') }}">
                        {{ __('Lupa password?') }}
                    </a>
                @endif
            </div>
            <input id="password" type="password" name="password" required autocomplete="current-password" 
                class="block w-full rounded-xl bg-black/20 border border-white/10 text-white focus:border-purple-500 focus:ring focus:ring-purple-500/20 shadow-sm transition-colors py-2.5 px-4">
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <input id="remember_me" type="checkbox" name="remember" 
                    class="rounded bg-black/20 border-white/20 text-purple-600 shadow-sm focus:ring-purple-500/30 w-4 h-4 cursor-pointer">
                <span class="ms-2 text-sm text-gray-400 group-hover:text-gray-300 transition-colors">{{ __('Ingat saya') }}</span>
            </label>
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full inline-flex justify-center items-center px-4 py-3 bg-gradient-to-r from-purple-600 to-blue-600 border border-transparent rounded-xl font-semibold text-white uppercase tracking-widest hover:from-purple-500 hover:to-blue-500 active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-gray-900 transition-all shadow-lg shadow-purple-500/30">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</x-guest-layout>
