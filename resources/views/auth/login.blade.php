<x-guest-layout>
    <x-authentication-card class="bg-[#266867] min-h-screen flex items-center justify-center">
        <x-slot name="logo">
            <img src="/path/to/your-logo.png" alt="Your Logo" class="w-20 h-20 mb-4 mx-auto">
        </x-slot>

        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <x-label for="email" value="{{ __('Email') }}" class="text-gray-700 font-semibold" />
                    <x-input id="email" class="block mt-1 w-full border border-gray-300 rounded-lg p-2" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="mb-4">
                    <x-label for="password" value="{{ __('Password') }}" class="text-gray-700 font-semibold" />
                    <x-input id="password" class="block mt-1 w-full border border-gray-300 rounded-lg p-2" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="flex items-center justify-between mb-4">
                    <label for="remember_me" class="flex items-center text-gray-600 text-sm">
                        <x-checkbox id="remember_me" name="remember" class="text-[#F58800] focus:ring-[#051821]" />
                        <span class="ml-2">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-[#051821] hover:text-[#F58800] underline" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <div class="flex items-center justify-center">
                    <x-button class="w-full bg-[#F58800] hover:bg-[#051821] text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
