<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{

    public function addToWishlist($productId)
    {
        $user = Auth::user();
        $product_id = Product::findorFail($productId);
        
        $product_id = $product_id->id;
        if($user->wishlist()->where('product_id', $product_id)->exists()) {
            return redirect()->back()->with('message', 'Product already in your wishlist!');
        }

        //dd($product_id);
        $user->wishlist()->create(['product_id' => $product_id]);

        return redirect()->back()->with('message', 'Product added to your wishlist!');
    }

    public function removeFromWishlist($productId)
    {
        $user = Auth::user();

        $wishlistItem = $user->wishlist()->where('product_id', $productId)->first();

        if($wishlistItem) {
            $wishlistItem->delete();
            return redirect()->back()->with('message', 'Product removed from your wishlist!');
        }

        return redirect()->back()->with('message', 'Product not found in your wishlist!');
    }

    public function viewWishlist()
    {
        $user - Auth::user();
        $wishlistItems = $user->wishlist()->with('product')->get();

        return view('wishlist.index', compact('wishlistItems'));
    }
}
