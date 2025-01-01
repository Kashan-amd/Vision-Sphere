@extends('frontend.components.master')

@section('content')
    <div class="shadow" style="border:0px solid grey; padding:0 0 2rem 0; margin:0 1rem 1rem 1rem; border-radius: 20px">

        <div class="checkout-page">
            <div class="page-header mt-30 mb-50" style="height:5rem">
                <div class="archive-header">
                    <div class="row align-items-center">
                        <div class="col-xl-6">
                            <h1 class="mb-15">Checkout</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row flex-row justify-content-center" style="--bs-gutter-x:0; flex-wrap:wrap !important;">
                <!-- Left Column: User Info & Billing -->
                <div class="card shadow m-2 mt-50 p-5 col-lg-6 col-md-8 col-12">
                    <form class="row" action="{{ route('checkout.process') }}" method="POST">
                        @csrf

                        <!-- User Information Section -->
                        <div class="col-12 user-info">
                            <h3 class="mb-20">Your Information</h3>
                            <div class="form-group">
                                <input type="text" readonly name="name" id="name" placeholder="Enter your full name"
                                    required value="{{ old('name', Auth::user()->name) }}" class="form-control">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="email" readonly name="email" id="email" placeholder="Enter your email" required
                                    value="{{ old('email', Auth::user()->email) }}" class="form-control">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="text" readonly name="phone" id="phone" placeholder="Enter your phone number"
                                    required value="{{ old('phone', Auth::user()->phone) }}" class="form-control">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Billing Address Section -->
                        <div class="col-12 billing-address">
                            <h3 class="mb-20">Billing Address</h3>
                            <textarea name="address" placeholder="Enter your address" required
                                class="form-control">{{ old('address', Auth::user()->address) }}</textarea>
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Payment Method Section -->
                        <div class="mt-20 payment-method">
                            <h3 class="mb-10">Payment Method</h3>
                            <select class="form-select" name="payment_method" required>
                                <option value="cash_on_delivery" selected>Cash on Delivery</option>
                                <option value="jazz_cash">JazzCash</option>
                                <option value="bank_transfer">Bank Transfer</option>
                            </select>
                            @error('payment_method')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        @if (Auth::check())
                            <div class="loyalty-points form-check shadow hover-up mb-30 mt-20">
                                @if(Auth::user()->loyalty_points > 0)
                                    <p>You have <strong>{{ Auth::user()->loyalty_points }}</strong> loyalty points.</p>
                                    <p>You can redeem <strong>{{ floor(Auth::user()->loyalty_points *2 ) }}</strong> PKR on this order for <strong>{{ Auth::user()->loyalty_points }}</strong> points.</p>
                                    <label class="form-check-label ml-30" for="flexCheckDefault">
                                        Use loyalty points for discount
                                        <input class="form-check-input" type="checkbox" name="redeem_points" value="1" id="flexCheckDefault">
                                    </label>
                                @else
                                    <p class="p-2">You don't have loyalty points! 🥺</p>
                                @endif
                            </div>
                        @endif

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100">Place Order</button>
                    </form>
                </div>

                <!-- Right Column: Order Summary -->
                <div class="card shadow m-2 mt-50 p-5 col-lg-5 col-md-8 col-12">
                    <div class="order-summary">
                        <h3 class="mb-20">Order Summary</h3>
                        <ul class="row">
                            @php
                                $totalAmount = 0;
                            @endphp

                            @foreach ($cartItems as $item)
                                @php
                                    $sellingPrice = $item->product->selling_price;
                                    $discountPrice = $item->product->discount_price ?? 0;
                                    $amount = $sellingPrice - $discountPrice;
                                    $totalAmount += $amount * $item->quantity;
                                    $discount = $discountPrice > 0 ? 100 - ($amount / $sellingPrice) * 100 : 0;
                                    $productImage = $item->product->image_url;
                                    $productColor = $item->color ?? 'Default';
                                    $productSize = $item->size ?? 'Default';
                                @endphp

                                <li class="col-md-4 col-lg-4 col-12 mb-4">
                                    <div class="card">
                                        <img src="{{ asset($item->product->product_thambnail) }}" alt="{{ $item->product->product_name }}" class="card-img-top" style="height: 80px; object-fit: cover;">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->product->product_name }} - (x{{ $item->quantity }})</h5>
                                            <p class="card-text">Color: {{ $productColor }}</p>
                                            <p class="card-text">Size: {{ $productSize }}</p>
                                            <p class="card-text"><strong>PKR {{ $amount * $item->quantity }}</strong></p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                            <li class="col-12">
                                <div class="total-amount">
                                    <h4><strong>Total: PKR {{ $totalAmount }}</strong></h4>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@php
    $hideFooter = true;
    $hidePreloader = true;
@endphp
