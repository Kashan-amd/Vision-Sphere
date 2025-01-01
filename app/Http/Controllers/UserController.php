<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WishList;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getUserData()
    {
        $wishList_count = 0;
        $wishlistItems = collect(); // Empty collection if the user is not authenticated
    
        $cartItem_count = 0;
        $cartItems = collect(); // Empty collection if the user is not authenticated
    
        $orders = collect(); // Variable to hold all orders
    
        if (Auth::check()) {
            $user = Auth::user();
            
            // Fetch cart details
            $cartItem_count = Cart::where('user_id', $user->id)->count();
            $cartItems = $user->cart()->with('product')->get();
    
            // Fetch wishlist details
            $wishList_count = WishList::where('user_id', $user->id)->count();
            $wishlistItems = $user->wishlist()->with('product')->get();
    
            // Fetch all orders
            $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        }
    
        return compact(
            'wishList_count',
            'wishlistItems',
            'cartItem_count',
            'cartItems',
            'orders'
        );
    }
    
    
    public function UserDashboard()
    {
        $id = Auth::user()->id;
        $userdata = User::find($id);
        $data = $this->getUserData();
        return view('user.user_dashboard', $data, compact('id', 'userdata'));
    }
    

    public function UserProfileUpdate(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            // Delete old image if exists
            if ($data->photo && file_exists(public_path('upload/user/user/' . $data->photo))) {
                unlink(public_path('upload/user/user/' . $data->photo));
            }

            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();

            // Generate a unique filename with username and current timestamp
            $username = Auth::user()->name; // Assuming 'name' is the username field
            $currentTime = time();
            $filename = $username . '_' . $id . '_' . $currentTime . '.' . $extension;
            $file->move(public_path('upload/user/user'), $filename);
            $data->photo = $filename;
        }

        $data->save();

        $notification = array(
            'alert-type' =>'success',
            'message' => 'Profile Updated Successfully!'
        );
        return redirect()->back()->with($notification);
    }

    public function UserPasswordUpdate(Request $request)
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

        $notification = array(
            'alert-type' =>'success',
            'message' => 'Profile Updated Successfully!'
        );

        return back()->with($notification, "status", "Password Updated Successfully");
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
