@extends('layouts.layout')

@section('content')

<?php 
if ($user == null) {
    $user = auth()->user();
}
?>

<div class="container mx-auto p-4 mt-96">
    <h1 class="text-3xl font-bold mb-4">{{ $user->name }}'s Profile</h1>

    <div class="bg-gray-800 p-6 rounded-lg shadow-md">
        <p class="text-lg text-gray-400">Email: {{ $user->email }}</p>
        <p class="text-lg text-gray-400">Joined: {{ $user->created_at->format('F j, Y') }}</p>
    </div>
</div>
@endsection
