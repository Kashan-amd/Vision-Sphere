<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    public function BecomeVendor()
    {
        return view('vendor.become_vendor');
    }

    public function VendorRegister(Request $request) {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::insert([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'vendor_join_year' => $request->vendor_join_year,
            'password' => Hash::make($request->password),
            'role' => 'vendor',
            'status' => 'inactive',
        ]);

          $notification = array(
            'message' => 'Vendor Registered Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('vendor.dashboard')->with($notification);

    }// End Mehtod
    
    public function VendorDashboard()
    {
        $vendorId = auth()->user()->id;
        $vendorProducts = Product::where('vendor_id', $vendorId)->pluck('id');

         // Get the count of orders for the vendor
        $orderCount = Order::whereHas('products', function($query) use ($vendorId) {
            $query->where('vendor_id', $vendorId);
        })->count();
        
        // Get the total number of products for the vendor
        $productCount = Product::where('vendor_id', $vendorId)->count();
        
        // Get the total number of customers
        $customerCount = User::where('role', 'user')->count();
        
        // Get the total number of reviews for the vendor's products
        $reviewCount = Review::whereHas('product', function($query) use ($vendorId) {
            $query->where('vendor_id', $vendorId);
        })->count(); 
    
        // Fetch total sales for the vendor over time (monthly)
        $salesData = Order::join('order_product', 'orders.id', '=', 'order_product.order_id')
        ->join('products', 'order_product.product_id', '=', 'products.id')
        ->where('products.vendor_id', $vendorId)
        ->selectRaw('SUM(orders.total_amount) as total_sales, MONTH(orders.created_at) as month, YEAR(orders.created_at) as year')
        ->groupBy('year', 'month')
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->get();
    
        $totalSales = $salesData->pluck('total_sales');
        // dd($salesData);

        // Fetch product performance (units sold for the vendor's products)
        $productPerformance = Product::where('vendor_id', $vendorId)
            ->withCount('orders') // assuming 'orders' is the relationship for order items
            ->get();
            
        // dd($productPerformance);

        // Fetch product category distribution (number of products per category)
        $categoryDistribution = Product::where('vendor_id', $vendorId)
        ->join('categories', 'products.category_id', '=', 'categories.id') // Join with categories table
        ->selectRaw('categories.name as category, COUNT(*) as count') // Select the category name from categories table
        ->groupBy('categories.name') // Group by category name
        ->get();

        // Get the top 5 customers who reviewed the vendor's products
        $topCustomers = User::whereHas('reviews', function ($query) use ($vendorProducts) {
            $query->whereIn('product_id', $vendorProducts);
        })
        ->withAvg('reviews', 'rating') // Get average rating for reviews
        ->orderByDesc('reviews_avg_rating')
        ->limit(5)
        ->get();

    
        return view('vendor.vendor_dashboard', compact(
            'vendorProducts', 'orderCount', 'productCount', 'customerCount', 'reviewCount', 'salesData', 'totalSales', 'productPerformance', 'categoryDistribution', 'topCustomers'
        ));
    }
    
    

    public function VendorLogin()
    {
        return view('vendor.vendor_login');
    }

    public function VendorLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function VendorProfile()
    {
        $id = Auth::user()->id;
        $vendordata = User::find($id);
        return view('vendor.vendor_profile', compact('id', 'vendordata'));
    }

    public function VendorProfileUpdate(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->vendor_join_year = $request->vendor_join_year;
        $data->vendor_short_info = $request->vendor_short_info;

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            // Delete old image if exists
            if ($data->photo && file_exists(public_path('upload/user/vendor/' . $data->photo))) {
                unlink(public_path('upload/user/vendor/' . $data->photo));
            }

            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();

            // Generate a unique filename with username and current timestamp
            $username = Auth::user()->name; // Assuming 'name' is the username field
            $currentTime = time();
            $filename = $username . '_' . $id . '_' . $currentTime . '.' . $extension;
            $file->move(public_path('upload/user/vendor'), $filename);
            $data->photo = $filename;
        }

        $data->save();

        $notification = array(
            'alert-type' =>'success',
            'message' => 'Vendor Info Updated Successfully!'
        );
        return redirect('/vendor/profile')->with($notification);
    }

    public function VendorChangePassword()
    {
        return view('vendor.vendor_change_password');
    }

    public function VendorPasswordUpdate(Request $request)
    {
        // Validation
        $request->validate([
            'old_password' => ['required'],
            'new_password' => ['required','string','min:8', 'confirmed'],
        ]);

        // Match Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with("error", "Old Password Doesn't Match!!!");
        }

        // Update Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password Updated Successfully");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
