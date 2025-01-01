<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\WishList;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        
        $data = $this->getUserData();
        //dd($data);
        return view('frontend.cart.index', $data);
    }

    public function getUserData()
    {
        $wishList_count = 0;
        $wishlistItems = collect(); // Empty collection if the user is not authenticated
        
        $cartItem_count = 0;
        $cartItems = collect(); // Empty collection if the user is not authenticated
        
        if (Auth::check()) { 
            $user = Auth::user();
            $cartItem_count = Cart::where('user_id', $user->id)->count(); 
            $cartItems = $user->cart()->with('product')->get();

            $wishList_count = WishList::where('user_id', $user->id)->count(); 
            $wishlistItems = $user->wishlist()->with('product')->get();
        }

        return compact('wishList_count', 'wishlistItems', 'cartItem_count', 'cartItems');
    }

    public function add(Request $request)
    {
        $user = Auth::user();
        
        // Validate the input
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);
    
        // Check if the product already exists in the user's cart
        $cartItem = $user->cart()->where('product_id', $request->product_id)->first();
    
        if ($cartItem) {
            // Product exists, so just update the quantity
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
            return redirect()->back()->with('message', 'Product quantity updated in your Cart!');
        } else {
            // Create a new cart item if the product doesn't exist
            $user->cart()->create([
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
            return redirect()->back()->with('message', 'Product Added to Cart!');
        }
    }    
    

    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::where('user_id', Auth::id())
                        ->where('product_id', $request->product_id)
                        ->first();

        if ($cartItem) {
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
        }

        return response()->json(['success' => true]);
    }

    public function updateQuantity(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);
    
        $cartItem = Cart::where('user_id', auth()->id())
            ->where('product_id', $validated['product_id'])
            ->first();
    
        if (!$cartItem) {
            return response()->json(['success' => false, 'message' => 'Cart item not found!'], 404);
        }
    
        $cartItem->quantity = $validated['quantity'];
        $cartItem->save();
    
        // Calculate total price for all cart items and this has some issuess...
        // $totalPrice = Cart::where('user_id', auth()->id())
        //     ->join('products', 'cart.product_id', '=', 'products.id')
        //     ->sum(DB::raw('cart.quantity * products.selling_price'));
    
        return response()->json(['success' => true]);
    }
    


    public function remove(Request $request)
    {
        $cartItem = Cart::where('user_id', Auth::id())
                        ->where('product_id', $request->product_id)
                        ->first();

        if ($cartItem) {
            $cartItem->delete(); // Remove product from cart
        }

        return response()->json(['success' => true]);
    }
}
