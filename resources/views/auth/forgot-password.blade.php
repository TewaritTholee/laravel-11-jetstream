<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            {{-- <x-authentication-card-logo /> --}}
            <img src="{{ asset('image/logo.webp') }}" alt="Logo" style="width: 150px;">
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{-- {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }} --}}
            {{ __('ลืมรหัสผ่าน? ไม่มีปัญหา. เพียงแจ้งให้เราทราบที่อยู่อีเมลของคุณ แล้วเราจะส่งลิงก์รีเซ็ตรหัสผ่านให้คุณทางอีเมล ซึ่งคุณสามารถเลือกรหัสผ่านใหม่ได้') }}
        </div>

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
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
