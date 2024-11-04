<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Models\User;
use App\Models\Review;
use App\Models\WishList;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $data = $this->getUserData();
        return view('frontend.index', $data);
    }

    public function vtonIndex()
    {
        return view('frontend.layouts.vton');
    }

    public function getSKU($productId)
    {
        $product = Product::findOrFail($productId);
        return response()->json(['sku' => $product ? $product->product_code : null]);
    }

    // Shared user data method
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

    
    public function search(Request $request)
    {
        $query = $request->input('search');

        if (!$query) {
            return response()->json([]);
        }

        $products = Product::where('product_name', 'LIKE', "%{$query}%")
                            ->orWhere('product_slug', 'LIKE', "%{$query}%")
                            ->limit(10)
                            ->get(['id', 'product_name', 'product_slug', 'product_thambnail']);
        // Return the results as JSON
        return response()->json($products);
    }

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
        $data = $this->getUserData();
        // review data
        $reviews = Review::where('product_id', $id)->get();
       // Merge product data with wishlist data and return the view
        return view('frontend.product.product_details', array_merge($data, compact('product', 'product_size', 'product_color', 'relatedProducts', 'reviews')));
    }

    // Show products based on category
    public function CategoryProduct($id)
    {
        $products = Product::where('category_id', $id)->latest()->get();
        $productCount = $products->count();
        // Get user wishlist data
        $data = $this->getUserData();
        // Get user wishlist data
        return view('frontend.product.category_product', array_merge($data, compact('products', 'productCount')));
    }

    // Show products based on subcategory
    public function SubCategoryProduct($id)
    {
        $products = Product::where('subcategory_id', $id)->latest()->get();
        $productCount = $products->count();
        // Get user wishlist data
        $data = $this->getUserData();
         
        // Merge subcategory data with wishlist data and return the view
        return view('frontend.product.subcategory_product', array_merge($data, compact('products', 'productCount')));
    }

    // Show products based on brand
    public function BrandProduct($id)
    {
        $products = Product::where('brand_id', $id)->latest()->get();
        $productCount = $products->count();

        // Get user wishlist data
        $data = $this->getUserData();

        // Merge brand data with wishlist data and return the view
        return view('frontend.product.brand_product', array_merge($data, compact('products', 'productCount')));
    }

     // Frontend All Vendor Information
    public function AllVendor(Request $request)
    {
        $query = $request->input('search');
        $vendors = User::where('role', 'vendor');

        if ($query) {
            $vendors->where(function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')
                    ->orWhere('id', 'like', '%' . $query . '%');
            });
        }

        $vendors = $vendors->get();
        $data = $this->getUserData();

        if ($vendors->isEmpty()) {
            return redirect()->route('all.vendors', $data)->with('message', 'Your search was not found!');
        }

        return view('frontend.vendor.all_vendors', $data, ['vendors' => $vendors]);
    }

    public function VendorDetails($id)
    {
        $vendor = User::findOrFail($id);
        $products = Product::where('vendor_id', $id)->latest()->get();
        $productCount = $products->count();
        $data = $this->getUserData();

        return view('frontend.vendor.vendor_details', $data, compact('vendor', 'products', 'productCount'));
    }

    // End Method
    public function getProductsByShape($shape)
    {
        $products = Product::where('product_shape', 'LIKE', "%$shape%")->get();
        $productCount = $products->count();

         // Get all unique shapes and their respective counts
        $shapesWithCounts = Product::select('product_shape', Product::raw('COUNT(*) as products_count'))
            ->groupBy('product_shape')
            ->get();
        $data = $this->getUserData();

        return view('frontend.product.products_by_shape', $data, compact('products', 'shape', 'productCount', 'shapesWithCounts'));
    }

    public function getProductsByMaterial($material)
    {
        $products = Product::where('product_material', 'LIKE', "%$material%")->get();
        $productCount = $products->count();
        // Get all unique shapes and their respective counts
        $materialsWithCounts = Product::select('product_material', Product::raw('COUNT(*) as products_count'))
            ->groupBy('product_material')
            ->get();
        $data = $this->getUserData();

        return view('frontend.product.products_by_material', $data, compact('products', 'material', 'productCount', 'materialsWithCounts'));
    }

    public function getProductsBySize($size)
    {
        $products = Product::where('product_size', 'LIKE', "%$size%")->get();
        $productCount = $products->count();
        // Get all unique shapes and their respective counts
        $sizesWithCounts = Product::select('product_size', Product::raw('COUNT(*) as products_count'))
            ->groupBy('product_size')
            ->get();
        $data = $this->getUserData();

        return view('frontend.product.products_by_size', $data, compact('products', 'size', 'productCount', 'sizesWithCounts'));
    }

     // Static pages methods
     public function privacyPolicy()
     {
        $data = $this->getUserData();
        return view('static.privacy_policy', $data);
     }
 
     public function about()
     {
        $data = $this->getUserData();
        return view('static.about', $data);
     }
 
     public function termsOfService()
     {
        $data = $this->getUserData();
        return view('static.terms_of_service', $data);
     }
 
     public function purchaseGuide()
     {
        $data = $this->getUserData();
        return view('static.purchase_guide', $data);
     }
 
     public function whyVisionSphere()
     {
        $data = $this->getUserData();
        return view('static.why_vs', $data);
     }
 
     public function contact()
     {
        $data = $this->getUserData();
        return view('static.contact', $data);
     }
 
}
