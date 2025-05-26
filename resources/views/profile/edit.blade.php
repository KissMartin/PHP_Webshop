@extends("layouts.layout")

@section("content")

<div class="mt-20 max-w-7xl mx-auto">
    <div class="py-12 space-y-10">
        <div class="max-w-xl mx-auto bg-white shadow p-8 rounded-lg text-black">
            @include('profile.partials.update-profile-information-form')
        </div>
        <div class="max-w-xl mx-auto bg-white shadow p-8 rounded-lg text-black">
            @include('profile.partials.update-password-form')
        </div>
        <div class="max-w-xl mx-auto bg-white shadow p-8 rounded-lg text-black">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>

@endsection