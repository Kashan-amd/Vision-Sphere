<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    // Main index method
    public function index()
    {
        $data = $this->getUserWishlistData();
        return view('frontend.index', $data); // Returning view with the wish list data
    }

    // Helper method to count wishlist items
    public function getUserWishlistData()
    {
        $wishList_count = 0;
        $wishlistItems = collect(); // Empty collection if the user is not authenticated
        
        if (Auth::check()) { // Check if the user is logged in
            $user = Auth::user();
            $wishList_count = WishList::where('user_id', $user->id)->count(); // Count the user's wish list items
            $wishlistItems = $user->wishlist()->with('product')->get(); // Get wish list items with related products
        }

        return compact('wishList_count', 'wishlistItems');
    }

    // Product details method
    public function ProductDetails($id, $slug)
    {
        $product = Product::findOrFail($id);

        // Prepare color and size arrays
        $product_color = explode(',', $product->product_color);
        $product_size = explode(',', $product->product_size);

        // Get related products based on category
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $id)
            ->orderBy('id', 'DESC')
            ->limit(4)
            ->get();

        // Get user wishlist data
        $data = $this->getUserWishlistData();
        
        // Merge product data with wishlist data and return the view
        return view('frontend.product.product_details', array_merge($data, compact('product', 'product_size', 'product_color', 'relatedProducts')));
    }

    // Show products based on category
    public function CategoryProduct($id)
    {
        $products = Product::where('category_id', $id)->latest()->get();
        $productCount = $products->count();
        
        // Get user wishlist data
        $data = $this->getUserWishlistData();
        
        // Merge category data with wishlist data and return the view
        return view('frontend.product.category_product', array_merge($data, compact('products', 'productCount')));
    }

    // Show products based on subcategory
    public function SubCategoryProduct($id)
    {
        $products = Product::where('subcategory_id', $id)->latest()->get();
        $productCount = $products->count();
        
        // Get user wishlist data
        $data = $this->getUserWishlistData();
        
        // Merge subcategory data with wishlist data and return the view
        return view('frontend.product.subcategory_product', array_merge($data, compact('products', 'productCount')));
    }

    // Show products based on brand
    public function BrandProduct($id)
    {
        $products = Product::where('brand_id', $id)->latest()->get();
        $productCount = $products->count();
        
        // Get user wishlist data
        $data = $this->getUserWishlistData();
        
        // Merge brand data with wishlist data and return the view
        return view('frontend.product.brand_product', array_merge($data, compact('products', 'productCount')));
    }
}