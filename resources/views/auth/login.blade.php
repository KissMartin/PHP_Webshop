<x-guest-layout>
    <div class="text-center text-4xl font-bold mb-5">
        Login
    </div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="hidden" name="redirect" value="{{ request('redirect') }}">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-end justify-between mt-4">
            <div>
                <x-defaults.checkbox id="remember_me" name="remember" />
                <x-input-label for="remember_me" class="inline-flex items-center" :value="__('Remember me')" />
                <br>
                @if (Route::has('password.request'))
                    <x-defaults.link-normal href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </x-defaults.link-normal>   
                @endif
                <br>
                <x-defaults.link-normal href="{{ route('register') }}">
                    {{ __("Don't have an account yet?") }}
                </x-defaults.link-normal>
                {{-- <a class="underline text-sm text-blue-600 hover:text-blue-900 rounded-md outline-none focus:text-gray-400" href="{{ route('register') }}">
                    {{ __("Don't have an account yet?") }}
                </a> --}}
            </div>

            <x-primary-button class="ms-3">
                {{ __('Sign in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
