@props([
    'method' => 'GET',
    'action' => route('products'),
    'inputName' => 'search',
    'inputValue' => null, // Default to null, allowing for dynamic input value assignment of the search input
    'id' => 'searchbar',
])

<form 
    action="{{ $action }}" 
    method="{{ strtoupper($method) }}" 
    class="bg-gray-800 rounded-4xl flex space-x-2 text-lg w-full p-1.5"
>
    @if (strtoupper($method) === 'POST')
        @csrf
    @endif

    <input 
        id="{{ $id }}" 
        name="{{ $inputName }}" 
        class="rounded-l-4xl text-lg pl-5 w-full focus:outline-none focus:border-transparent" 
        type="text" 
        placeholder="Search for your favourite items!" 
        value="{{ $inputValue ?? request($inputName) }}" 
        autocomplete="off"
    >

    <x-defaults.primary-button-rounded class="w-3/12">
        <i class="fa fa-search mr-1 mb-0.5" aria-hidden="true"></i> Search
    </x-defaults.primary-button-rounded>
    {{-- <button type="submit" class="py-2 px-5 bg-amber-700 rounded-full hover:text-gray-300 font-semibold w-3/12">
        
    </button> --}}
</form>