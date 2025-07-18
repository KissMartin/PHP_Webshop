@use('App\Http\Controllers\CurrencyController')

@props(['price'])

<span {{ $attributes->merge(['class' => '']) }}>
    {{ CurrencyController::CalculatePriceInCurrency($price, auth()->user()->preferred_currency ?? 'usd') }} 
    <span class="text-sm">{{ strtoupper(auth()->user()->preferred_currency ?? 'usd') }}</span>
</span>
