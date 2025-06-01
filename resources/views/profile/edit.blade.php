@extends("layouts.layout")

@section("content")

<div class="mt-20 max-w-7xl mx-auto">
    <div class="py-12 space-y-10">
        <x-defaults.backdrop class="max-w-xl mx-auto p-8">
            @include('profile.partials.update-profile-information-form')
        </x-defaults.backdrop>
        <x-defaults.backdrop class="max-w-xl mx-auto p-8">
            @include('profile.partials.update-password-form')
        </x-defaults.backdrop>
        <x-defaults.backdrop class="max-w-xl mx-auto p-8">
            @include('profile.partials.delete-user-form')
        </x-defaults.backdrop>
    </div>
</div>

@endsection