@component('mail::message')
# Order Receipt

Hello {{ $user->name }},

Thank you for your purchase! Here is a summary of your order placed on {{ $order->created_at->format('F j, Y') }}.

**Order ID:** {{ $order->id }}

@component('mail::table')
| Product       | Quantity | Price      |
| ------------- | -------- | ---------- |
@foreach ($order->items as $item)
| {{ $item->product->name ?? 'Product #'.$item->product_id }} | {{ $item->quantity }} | ${{ number_format($item->price_at_pruchase, 2) }} |
@endforeach
@endcomponent

**Total:** ${{ number_format($order->total_price, 2) }}

Thanks for shopping with us!

Regards,  
{{ config('app.name') }}
@endcomponent
