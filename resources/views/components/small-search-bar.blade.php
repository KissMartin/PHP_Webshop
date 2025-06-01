@props(['route', 'placeholder', 'value', 'name'])


<form method="GET" action="{{ $route }}" class="mb-10 max-w-md mx-auto">
    <input 
        type="text" 
        name="{{ $name }}" 
        value="{{ $value }}" 
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge(['class' => 'w-full rounded-full px-5 py-2 bg-gray-800 text-white border border-gray-600 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500']) }}
        autocomplete="off"
    >
</form>

