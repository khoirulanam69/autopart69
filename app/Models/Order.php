<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name', 'status', 'total_price'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity')->withTimestamps();
    }

    public function getTotalPrice()
    {
        $total = 0;

        foreach ($this->products as $product) {
            $total += $product->pivot->quantity * $product->sell;
        }

        return $total;
    }
}
