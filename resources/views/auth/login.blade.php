<x-guest-layout>
    <x-authentication-card>
        {{-- <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot> --}}

        <x-slot name="logo">
            <img src="{{ asset('image/logo.webp') }}" alt="Logo" style="width: 150px;">
        </x-slot>


        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div> --}}

            <div>
                <x-label for="email_or_username" value="{{ __('Email or Username') }}" />
                <x-input id="email_or_username" class="block mt-1 w-full" type="text" name="login" :value="old('login')" required autofocus autocomplete="Email or username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>


            {{-- <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div> --}}


            <div class="flex justify-between items-center mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>

                <a href="{{ route('register') }}" class="text-blue-500 hover:underline">
                    {{ __('สมัครสมาชิก') }}
                </a>
            </div>



            {{-- <div class="d-flex align-items-center mt-4">
                <!-- Remember me checkbox -->
                <div class="d-flex align-items-center me-auto">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </div>

                <!-- Register link -->
                @if (Route::has('register'))
                    <a
                        href="{{ route('register') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] ms-auto"
                    >
                        Register
                    </a>
                @endif

            </div> --}}




            <div class="flex items-center justify-end mt-5">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>


            </div>
        </form>

        <style>
            body {
                background: linear-gradient(to bottom right, red, orange, yellow);
            }
        </style>
    </x-authentication-card>
</x-guest-layout>


