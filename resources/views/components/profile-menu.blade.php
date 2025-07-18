<x-dropdown width="48">
    <x-slot name="trigger">
        <button class="cursor-pointer inline-flex items-center text-lg px-3 border border-transparent leading-4 font-medium rounded-md hover:text-gray-400 focus:outline-none transition ease-in-out duration-150">
            <div><i class="fa fa-user"></i> {{ Auth::user()->name }}</div>
            <i class="fa fa-angle-down ml-1"></i>
        </button>
    </x-slot>

    <x-slot name="content">
        @admin
            <x-dropdown-link :href="route('admin.dashboard')">
                {{ __('Dashboard') }}
            </x-dropdown-link>
            <x-dropdown-link :href="route('admin.users')">
                {{ __('List Users') }}
            </x-dropdown-link>
            <x-dropdown-link :href="route('admin.products')">
                {{ __('List Products') }}
            </x-dropdown-link>
            <x-dropdown-link :href="route('admin.orders')">
                {{ __('List All Orders') }}
            </x-dropdown-link>
        @else
            {{-- <x-dropdown-link :href="route('profile.profile')"> --}}
            <x-dropdown-link :href="route('profile.public', Auth::user()->id)">
                {{ __('Profile') }}
            </x-dropdown-link>
            <x-dropdown-link :href="route('profile.orders')">
                {{ __('My Orders') }}
            </x-dropdown-link>
            <x-dropdown-link :href="route('profile.products')">
                {{ __('My Products') }}
            </x-dropdown-link>
        @endadmin

        <x-dropdown-link :href="route('profile.edit')">
            {{ __('Settings') }}
        </x-dropdown-link>

        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault(); this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>
    </x-slot>
</x-dropdown>