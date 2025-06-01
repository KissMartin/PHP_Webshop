@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'px-4 py-2 rounded-md shadow-sm bg-gray-800 text-white border border-gray-600']) }}>
