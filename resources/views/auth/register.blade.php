<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            {{-- <x-authentication-card-logo /> --}}
            <img src="{{ asset('image/logo.webp') }}" alt="Logo" style="width: 150px;">
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('ชื่อ - นามสกุล') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="username" value="{{ __('Username') }}" />
                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="branch" value="{{ __('สาขา') }}" />
                <select id="branch" class="block mt-1 w-full" name="branch" required style="border-radius: 8px;">
                    <option value="">{{ __('กรุณาเลือกสาขา (สำนักงาน)') }}</option>
                    <option value="ปัตตานี" {{ old('branch') == 'ปัตตานี' ? 'selected' : '' }}>ปัตตานี</option>
                    <option value="สงขลา" {{ old('branch') == 'สงขลา' ? 'selected' : '' }}>สงขลา</option>
                    <option value="กระบี่" {{ old('branch') == 'กระบี่' ? 'selected' : '' }}>กระบี่</option>
                    <option value="ตรัง" {{ old('branch') == 'ตรัง' ? 'selected' : '' }}>ตรัง</option>
                    <option value="พังงา" {{ old('branch') == 'พังงา' ? 'selected' : '' }}>พังงา</option>
                    <option value="ภูเก็ต" {{ old('branch') == 'ภูเก็ต' ? 'selected' : '' }}>ภูเก็ต</option>
                    <option value="สุราษฎร์ธานี" {{ old('branch') == 'สุราษฎร์ธานี' ? 'selected' : '' }}>สุราษฎร์ธานี</option>
                    <option value="พัทลุง" {{ old('branch') == 'พัทลุง' ? 'selected' : '' }}>พัทลุง</option>
                    <option value="ชุมพร" {{ old('branch') == 'ชุมพร' ? 'selected' : '' }}>ชุมพร</option>
                    <option value="นครศรีธรรมราช" {{ old('branch') == 'นครศรีธรรมราช' ? 'selected' : '' }}>นครศรีธรรมราช</option>
                    <option value="สตูล" {{ old('branch') == 'สตูล' ? 'selected' : '' }}>สตูล</option>
                    <option value="ยะลา" {{ old('branch') == 'ยะลา' ? 'selected' : '' }}>ยะลา</option>
                    <option value="นราธิวาส" {{ old('branch') == 'นราธิวาส' ? 'selected' : '' }}>นราธิวาส</option>
                </select>
            </div>


            <div class="mt-4">
                <x-label for="type" value="{{ __('รูปแบบ') }}" />
                <select id="type" class="block mt-1 w-full" name="type" required style="border-radius: 8px;">
                    <option value="">{{ __('กรุณาเลือกรูปแบบ') }}</option>
                    <option value="admin" {{ old('type') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="AUDIT" {{ old('type') == 'AUDIT' ? 'selected' : '' }}>AUDIT</option>
                    <option value="manager" {{ old('type') == 'manager' ? 'selected' : '' }}>Manager</option>
                    <option value="staff" {{ old('type') == 'staff' ? 'selected' : '' }}>Staff</option>
                    <option value="master" {{ old('type') == 'master' ? 'selected' : '' }}>Master</option>
                    {{-- <option value="user" {{ old('type') == 'user' ? 'selected' : '' }}>User</option> --}}
                </select>
            </div>


            <div class="mt-4">
                <x-label for="position" value="{{ __('ตำแหน่ง') }}" />
                <select id="position" class="block mt-1 w-full" name="position" required style="border-radius: 8px;">
                    <option value="">{{ __('กรุณาเลือกตำแหน่ง') }}</option>
                    <option value="admin" {{ old('position') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="audit" {{ old('position') == 'audit' ? 'selected' : '' }}>AUDIT</option>
                    <option value="manager" {{ old('position') == 'manager' ? 'selected' : '' }}>Manager</option>
                    <option value="staff" {{ old('position') == 'staff' ? 'selected' : '' }}>Staff</option>
                    <option value="master" {{ old('position') == 'master' ? 'selected' : '' }}>Master</option>
                    {{-- <option value="user" {{ old('position') == 'user' ? 'selected' : '' }}>User</option> --}}
                </select>
            </div>


            <div class="mt-4">
                <x-label for="stastus" value="{{ __('สถานะ') }}" />
                <select id="stastus" class="block mt-1 w-full" name="stastus" required style="border-radius: 8px;">
                    <option value="">{{ __('กรุณาเลือกสถานะ') }}</option>
                    <option value="yes" {{ old('stastus') == 'yes' ? 'selected' : '' }}>Yes</option>
                    <option value="no" {{ old('stastus') == 'no' ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('รหัสผ่าน') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('ยืนยันรหัสผ่าน') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>



            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
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
