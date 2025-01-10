<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 
        'address', 
        'payment_method', 
        'total_amount', 
        'status', 
        'points_earned'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id')
                    ->withPivot('quantity', 'price');
    }    

    // Helper method to calculate total amount for the order
    public function calculateTotalAmount()
    {
        $total = 0;
        foreach ($this->products as $product) {
            // Access quantity and price from the pivot data
            $total += $product->pivot->price * $product->pivot->quantity;
        }
        return $total;
    }
    

    // Method to add a product to the order
    public function addProduct($productId, $quantity, $price)
    {
        // Attach the product with its quantity and price in the pivot table
        $this->products()->attach($productId, [
            'quantity' => $quantity,
            'price' => $price,
        ]);
    
        $this->save(); // Save the order after attaching the product
    }
    
}
