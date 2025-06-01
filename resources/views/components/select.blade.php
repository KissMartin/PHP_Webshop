@props(['disabled' => false])

<select @disabled($disabled) {{ $attributes->merge(['class' => 'p-1 border-gray-300 rounded-md shadow-sm bg-gray-800 text-white border border-gray-600']) }}>
    {{ $slot }}
</select>
