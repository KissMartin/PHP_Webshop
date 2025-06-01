<x-guest-layout>
    <div class="text-center text-4xl font-bold mb-5">
        Register                    
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="hidden" name="redirect" value="{{ request('redirect') }}">

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="preferred_currency" :value="__('Preferred Currency')" />
            <x-select id="preferred_currency" name="preferred_currency" class="w-full">
                @foreach ($currencies as $currency)
                    <option value="{{ $currency }}" @if(old('preferred_currency', 'usd') == $currency) selected @endif>
                        {{ strtoupper($currency) }}
                    </option>
                @endforeach
            </x-select>            
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <a class="underline text-sm text-blue-600 hover:text-blue-900 rounded-md outline-none focus:text-gray-400" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Create an account') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
