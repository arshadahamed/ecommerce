<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
        <div class="flex items-center justify-left mt-4">
            <h3 class="m-5">Hint:</h3>

            {{-- Hint for User --}}
            <x-secondary-button class="ms-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <a onclick="fillUserFields()">User</a>
            </x-secondary-button>

            {{-- Hint for Admin --}}
            <x-secondary-button class="ms-3 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                <a onclick="fillAdminFields()">Admin</a>
            </x-secondary-button>

            {{-- Hint for Seller --}}
            <x-secondary-button class="ms-3 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                <a onclick="fillSellerFields()">Seller</a>
            </x-secondary-button>

            <script>
                function fillUserFields() {
                    document.getElementById('email').value = 'user@gmail.com';
                    document.getElementById('password').value = '12345678';
                }

                function fillAdminFields() {
                    document.getElementById('email').value = 'admin@gmail.com';
                    document.getElementById('password').value = '12345678';
                }

                function fillSellerFields() {
                    document.getElementById('email').value = 'seller@gmail.com';
                    document.getElementById('password').value = '12345678';
                }
            </script>
        </div>

    </form>
</x-guest-layout>
