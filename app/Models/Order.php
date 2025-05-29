<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'status', 'total_price'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function currentStatus()
    {
        if ($this->status === 'cancelled') {
            return 'cancelled';
        }

        $created = Carbon::parse($this->created_at);
        $now = now();

        if ($this->status === 'pending' && $now->diffInMinutes($created) >= 5) {
            return 'paid';
        }

        if ($this->status === 'paid' && $now->diffInMinutes($created) >= 20) {
            return 'shipped';
        }

        return $this->status;
    }

    public static function updateStatuses()
    {
        $now = now();

        static::where('status', 'pending')
            ->where('created_at', '<=', (clone $now)->subSeconds(10))
            ->update(['status' => 'paid']);

        static::where('status', 'paid')
            ->where('created_at', '<=', (clone $now)->subSeconds(50))
            ->update(['status' => 'shipped']);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items')
                    ->withPivot(['quantity', 'price_at_purchase'])
                    ->withTimestamps();
    }

}
