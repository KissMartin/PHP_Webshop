@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-md text-gray-300 cursor-pointer']) }}>
    {{ $value ?? $slot }}
</label>
