<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\WishList;
use Illuminate\Support\Facades\DB;
// use App\Models\Order;
use Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $data = $this->getUserData();
        return view('frontend.checkout.index', $data);
    }

    public function success()
    {
        $data = $this->getUserData();
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->latest()->first();
    
        // Parse order products from JSON to array
        $orderProducts = json_decode($order->products, true);
    
        // Fetch product details for each product in the order
        $productDetails = [];
        foreach ($orderProducts as $key) {
            $product = Product::find($key['product_id']);
            if ($product) {
                $productDetails[] = [
                    'name' => $product->product_name,
                    'quantity' => $key['quantity'],
                    'price' => $key['price'],
                    'image' => $product->product_thambnail,
                ];
            } else {
                $productDetails[] = [
                    'name' => 'Product not found',
                    'quantity' => $key['quantity'],
                    'price' => $key['price'],
                    'image' => null,
                ];
            }
        }
    
        // Pass data to the view
        return view('frontend.checkout.success', $data, compact('order', 'productDetails'));
    }
    


    public function getUserData()
    {
        $wishList_count = 0;
        $wishlistItems = collect();  // Empty collection if the user is not authenticated
        
        $cartItem_count = 0;
        $cartItems = collect();  // Empty collection if the user is not authenticated
        
        if (Auth::check()) { 
            $user = Auth::user();
            // Fetch cart items and wishlist items only once
            $cartItems = $user->cart()->with('product')->get();
            $cartItem_count = $cartItems->count();  // Count cart items from the fetched collection
            
            $wishList_count = WishList::where('user_id', $user->id)->count(); 
            $wishlistItems = $user->wishlist()->with('product')->get();
        }

        return compact('wishList_count', 'wishlistItems', 'cartItem_count', 'cartItems');
    }


    public function processCheckout(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'payment_method' => 'required|string',
            'redeem_points' => 'nullable|boolean', // Handle points redemption
        ]);
    
        // Calculate total amount and prepare products array
        $totalAmount = 0;
        $products = [];
        foreach (Cart::where('user_id', Auth::id())->get() as $cartItem) {
            // Use discounted price if available, otherwise selling price
            $finalPrice = $cartItem->product->selling_price - ($cartItem->product->discount_price ?? 0);
            $amount = $finalPrice * $cartItem->quantity;
            $totalAmount += $amount;
            $products[] = [
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->selling_price,
            ];
        }
    
        // Check if the user wants to redeem points
        $user = Auth::user();
        $redeemPoints = $request->has('redeem_points') && $user->loyalty_points > 0 ? $user->loyalty_points : 0;
        $discount = $redeemPoints * 2; // 2 PKR discount per point
        $discount = min($discount, $totalAmount);  // Max discount = totalAmount
    
        // Apply discount to the total amount
        $totalAmount -= $discount;
       
        $earnedPoints = floor($totalAmount / 100);
        // dd($totalAmount);
        // Create the order
        $order = Order::create([
            'user_id' => Auth::id(),
            'address' => $validated['address'],
            'payment_method' => $validated['payment_method'],
            'total_amount' => $totalAmount,
            'status' => 'pending',
            'products' => json_encode($products), // Store products as JSON
            'points_earned' => $earnedPoints, // Points earned based on final price after discount
        ]);
        // Update user's loyalty points in the database
        $user->loyalty_points += $earnedPoints;
        $user->save();
        // Deduct redeemed points from user's loyalty points
        if ($redeemPoints > 0) {
            $user->loyalty_points -= $redeemPoints;
            $user->save();
        }
    
        // Clear the cart after order
        Cart::where('user_id', Auth::id())->delete();
    
        // Redirect to a success page
        return redirect()->route('checkout.success');
    }
    

    // Helper function to calculate the total amount
    private function calculateTotalAmount($userId)
    {
        $cartItems = Cart::where('user_id', $userId)->get();
        return $cartItems->sum(function ($item) {
            $discountedPrice = $item->product->selling_price - ($item->product->discount_price ?? 0);
            return $discountedPrice * $item->quantity;
        });
    }
}
