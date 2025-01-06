<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    /**
    * The attributes that should be set to their default values.
    *
    * @var array<string, mixed>
    */
   protected $attributes = 
   [
       'loyalty_points' => 0, // Set default loyalty points to 0
   ];
    public function products()
    {
        return $this->hasMany(Product::class, 'vendor_id');
    }

    public function wishlist()
    {
        return $this->hasMany(WishList::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}
