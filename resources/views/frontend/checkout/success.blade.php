@extends('frontend.components.master')

@section('content')
<style>
    .checkout-success {
        max-width: 100%;
        margin: 0 auto;
        padding: 2rem;
        background: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .checkout-success h2 {
        color: #28a745;
        font-weight: bold;
    }

    .checkout-success p {
        font-size: 0.9rem;
        color: #555;
    }

    .order-details, .customer-details {
        background: #fff;
        padding: 1.5rem;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
    }

    .list-group-item {
        border: none;
        padding: 1rem;
        margin-bottom: 0.5rem;
        background: #f7f7f7;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .list-group-item:hover {
        background: #e9ecef;
    }

    .product-details img {
        border-radius: 8px;
    }

    @media (max-width: 768px) {
        .order-details, .customer-details {
            margin-bottom: 2rem;
            margin-right: 0; /* Remove margin on smaller screens */
        }
    }
</style>

<div class="shadow checkout-success">
    <p class="shadow p-2 rounded hover-up">🎉 Congratulations! You earned <strong>{{ $order->points_earned }}</strong> loyalty points on this order.</p>
    
    <div class="row mt-4 text-center flex">
        <!-- Order Summary -->
        <div class="col-md-7 col-lg-7 col-12 order-details mr-4" style="">
            <h3 class="text-center mb-10">Order Summary</h3>
            <ul class="list-group">
                <li class="list-group-item">
                    <strong>Order ID: </strong> {{ $order->id ?? 'N/A' }}
                </li>
                <li class="list-group-item">
                    <strong>Date: </strong> {{ $order->created_at->format('F d, Y') ?? 'N/A' }}
                </li>
            </ul>
            <h4 class="mt-4 mb-10">Products</h4>
            <div class="row">
                @foreach ($productDetails as $product)
                <div class="col-md-6">
                    <div class="list-group-item d-flex justify-content-center">
                        
                        <div class="product-details ml-3">
                            @if ($product['image'])
                                <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" class="img-fluid" style="width: auto; height: 50px; object-fit: cover;">
                            @endif
                            <br>
                            <strong>{{ $product['name'] }}</strong> x {{ $product['quantity'] }} 
                            <br>
                            <span>PKR {{ $product['price'] }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <li class="list-group-item">
                Total Amount: <strong>PKR {{ number_format($order->total_amount, 2) ?? 'N/A' }}</strong> 
            </li>
        </div>

        <!-- Billing Information -->
        <div class="col-md-5 col-lg-5 col-12 customer-details" style="">
            <h3 class="text-center mb-10">Billing Information</h3>
            <ul class="list-group">
                <li class="list-group-item">
                    <strong>Name:</strong> {{ $order->user->name ?? 'N/A' }}
                </li>
                <li class="list-group-item">
                    <strong>Email:</strong> {{ $order->user->email ?? 'N/A' }}
                </li>
                <li class="list-group-item">
                    <strong>Phone:</strong> {{ $order->user->phone ?? 'N/A' }}
                </li>
                <li class="list-group-item">
                    <strong>Payment Method:</strong> {{ $order->payment_method ?? 'N/A' }}
                </li>
                <li class="list-group-item">
                    <strong>Address:</strong> {{ $order->address ?? 'N/A' }}
                </li>
            </ul>
        </div>
    </div>
    <div class="text-center mt-25 mb-25">
        <h2>Thank You for Your Purchase!</h2>
        <p>Your order has been successfully placed. A confirmation email has been sent to you.</p>
    </div>
    <div class="text-center mt-20">
        <a href="{{ route('home') }}" class="btn btn-primary">Continue Shopping</a>
    </div>
</div>
@endsection

@php
    $hideFooter = true;
    $hidePreloader = true;
@endphp
