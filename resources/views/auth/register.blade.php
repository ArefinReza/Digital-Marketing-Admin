<x-guest-layout>
    <x-authentication-card class="bg-[#266867] min-h-screen flex items-center justify-center">
        <x-slot name="logo">
            <img src="/path/to/your-logo.png" alt="Your Logo" class="w-20 h-20 mb-4 mx-auto">
        </x-slot>

        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <x-label for="name" value="{{ __('Name') }}" class="text-gray-700 font-semibold" />
                    <x-input id="name" class="block mt-1 w-full border border-gray-300 rounded-lg p-2" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mb-4">
                    <x-label for="email" value="{{ __('Email') }}" class="text-gray-700 font-semibold" />
                    <x-input id="email" class="block mt-1 w-full border border-gray-300 rounded-lg p-2" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <div class="mb-4">
                    <x-label for="password" value="{{ __('Password') }}" class="text-gray-700 font-semibold" />
                    <x-input id="password" class="block mt-1 w-full border border-gray-300 rounded-lg p-2" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mb-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-gray-700 font-semibold" />
                    <x-input id="password_confirmation" class="block mt-1 w-full border border-gray-300 rounded-lg p-2" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mb-4">
                        <x-label for="terms" class="flex items-center">
                            <x-checkbox name="terms" id="terms" class="text-[#F58800] focus:ring-[#051821]" required />
                            <span class="ml-2 text-gray-700">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-[#051821] hover:text-[#F58800]">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-[#051821] hover:text-[#F58800]">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </span>
                        </x-label>
                    </div>
                @endif

                <div class="flex items-center justify-between">
                    <a class="underline text-sm text-[#051821] hover:text-[#F58800]" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="bg-[#F58800] hover:bg-[#051821] text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
