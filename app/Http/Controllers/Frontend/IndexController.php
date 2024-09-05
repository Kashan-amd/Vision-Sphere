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
    public function wishListCount()
    {
        $user = Auth::user();
        $userId = $user->id;
        $wishList_count = WishList::where('user_id', $userId)->count();

        $wishlistItems = $user->wishlist()->with('product')->get();

        return compact('wishList_count', 'wishlistItems');
    }
    
    public function index()
    {
        if(Auth::user()){
            $data = $this->wishListCount();
            return view('frontend.index', $data);
        }
        else{
            return view('frontend.index');
        }
    }

    public function ProductDetails($id, $slug)
    {
        $product = Product::findOrFail($id);

        $color = $product->product_color;
        $product_color = explode(',', $color);

        $size = $product->product_size;
        $product_size = explode(',', $size);

        $cat_id = $product->category_id;
        $relatedProducts = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->limit(4)->get();

        $data = $this->wishListCount();

        return view('frontend.product.product_details', $data, compact('product', 'product_size', 'product_color', 'relatedProducts'));
    }

    public function CategoryProduct($id)
    {
        $products = Product::where('category_id', $id)->latest()->get();
        $productCount = $products->count();
        $data = $this->wishListCount();
        return view('frontend.product.category_product', $data, compact('products', 'productCount'));
    }

    public function SubCategoryProduct($id)
    {
        $products = Product::where('subcategory_id', $id)->latest()->get();
        $productCount = $products->count();
        $data = $this->wishListCount();
        return view('frontend.product.subcategory_product', $data, compact('products', 'productCount'));
    }

    public function BrandProduct($id)
    {
        $products = Product::where('brand_id', $id)->latest()->get();
        $productCount = $products->count();
        $data = $this->wishListCount();
        return view('frontend.product.brand_product', $data, compact('products', 'productCount'));
    }
}
