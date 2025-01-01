<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // Define the fillable fields
    protected $fillable = [
        'user_id', 
        'address', 
        'payment_method', 
        'total_amount', 
        'status', 
        'products',
        'points_earned'
    ];

    // Cast the 'products' field to an array, so it's easier to work with
    protected $casts = [
        'products' => 'array',  // Cast the 'products' column to array when accessing it
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'id');
    }

    // Helper method to calculate total amount for the order
    public function calculateTotalAmount()
    {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product['price'] * $product['quantity'];
        }
        return $total;
    }

    // Method to add a product to the order
    public function addProduct($productId, $quantity, $price)
    {
        $this->products[] = [
            'product_id' => $productId,
            'quantity' => $quantity,
            'price' => $price,
        ];

        $this->save();
    }
}
