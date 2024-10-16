@extends('frontend.components.master')

@section('content')

<div class="shadow" style="border:0px solid grey; padding:0 0 2rem 0; margin:0 1rem 1rem 1rem; border-radius: 20px">
    <div class="page-header mt-30 mb-50" style="height:5rem">
        <div class="archive-header">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <h1 class="mb-15">Cart <i class="">🛒</i></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row flex-row justify-content-center" style="--bs-gutter-x:0; flex-wrap:nowrap !important;">
        <div class="col-lg-6 col-md-6 col-10" style="padding:0">
            <div class="shop-product-fillter mt-40">
                <div class="total-product">
                    @if (count($cartItems) > 0)
                        <p>We Got <strong class="text-brand">{{ count($cartItems) }}</strong> items for you!</p>
                    @else
                        <h3 class="text-danger mb-3">No Items in cart..<span>Add something!</span></h3>
                    @endif
                </div>
            </div>
            <div class="row product-grid justify-content-center">
                @foreach ($cartItems as $item)
                    <div class="col-lg-4 col-md-6 col-6" >
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap" aria-label="Quick view" data-bs-toggle="modal" data-bs-target="#quickViewModal{{ $item->product->id }}">
                                <div class="product-img product-img-zoom">
                                    <img class="default-img" src="{{ asset($item->product->product_thambnail) }}" alt=""/>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <h2>{{ $item->product->product_name }}</h2>
                                <div class="product-price">
                                    @php
                                        $amount = $item->product->selling_price - $item->product->discount_price;
                                        $discount = 100 - (($amount / $item->product->selling_price) * 100);
                                    @endphp
                                    <span class="current-price text-brand">PKR {{ $amount }}</span>
                                    @if ($discount > 0)
                                        <span>  
                                            <span class="old-price font-md ml-15">PKR {{ $item->product->selling_price }} </span>
                                        </span>
                                    @endif
                                </div>
                                <div class="product-content-price">
                                    <span class="text-silent">Quantity: {{ $item->quantity }}</span>
                                </div>
                                <div class="row justify-content-around mt-10">
                                    <div class="col-lg-6 col-md-6 col-6 detail-qty border radius">
                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <input type="num" name="quantity" class="qty-val" value="{{ $item->quantity }}" min="1" max="{{ $item->product->product_qty ?? 1 }}">
                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12 col-12">
                                <button style="width:100%" class="remove-item btn btn-sm" data-id="{{ $item->product_id }}">Remove</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

             <!-- quick view modal -->
            @foreach ($cartItems as $item)
             <div class="modal fade custom-modal" id="quickViewModal{{ $item->product->id }}" tabindex="-1" aria-labelledby="quickViewModal{{ $item->product->id }}" aria-hidden="true">
                <div class="modal-dialog" style="width:90%; height:85%">
                    <div class="modal-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                    <div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                            @foreach($item->product->multiImages as $image)
                                            <figure class="border-radius-10">
                                                <img src="{{ asset($image->photo_name) }}" alt="product image" />
                                            </figure>
                                            @endforeach
                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails">
                                            @foreach($item->product->multiImages as $image)
                                            <div><img src="{{ asset($image->photo_name) }}" alt="product image" /></div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info pr-30 pl-30">
                                        <span class="stock-status out-stock">

                                            @if ($item->product->discount_price == NULL)
                                                @if ($item->product->hot_deals == 1)Hot
                                                @elseif ($item->product->featured == 1)Featured
                                                @elseif ($item->product->special_offer == 1)Special
                                                @elseif ($item->product->special_deals == 1)Special Deals
                                                @else
                                                @endif
                                            @else
                                                <span class="hot">Save {{ round($discount) }} %</span>
                                            @endif
                                        </span>
                                        <h3 class="title-detail">{{ $item->product->product_name }}</h3>
                                        <div class="product-detail-rating">
                                            <div class="product-rate-cover text-end">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: {{round($item->product->reviews->average('rating'), 1)}}%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> ({{ $item->product->reviews->count() }} reviews)</span>
                                            </div>
                                        </div>

                                        @php
                                            $product_size = explode(',', $item->product->product_size);
                                            $product_color = explode(',', $item->product->product_color);
                                        @endphp
                                        @if(!empty($item->product->product_size))
                                            <div class="attr-detail attr-size mb-30">
                                                <select class="form-control unicase-form-control" id="sizeSelect">
                                                    <option selected disabled>--Choose Size--</option>
                                                    @foreach($product_size as $size)
                                                        <option value="{{ $size }}">{{ ucwords($size) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif

                                        @if(!empty($item->product->product_color))
                                            <div class="attr-detail attr-color mb-30">
                                                <select class="form-control unicase-form-control" id="colorSelect">
                                                    <option selected disabled>--Choose Color--</option>
                                                    @foreach($product_color as $color)
                                                        <option value="{{ $color }}">{{ ucwords($color) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif

                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                <span style="font-size:2rem" class="current-price text-brand">PKR {{ $amount }}</span>
                                                @if ($discount > 0)
                                                    <span>
                                                        <span class="save-price font-md color3 ml-15">{{ round($discount) }}% Off</span>
                                                        <span class="old-price font-md ml-15">PKR {{ $item->product->selling_price }} </span>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="font-xs">
                                            <ul>
                                                <li class="mb-5">Vendor: <span class="text-brand"><a href="{{ route('vendor.details',$item->product->vendor->id) }}">{{ $item->product->vendor->name }}</a></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <hr>
            <div class="row ml-5">
                <div class="col-lg-10 col-md-9 col-8 p-0">
                    </span style="font-size: 10px">Total:</span><h5>PKR {{ $cartItems->sum(function($item) { return $item->product->selling_price - $item->product->discount_price * $item->quantity; }) }}</h5>
                </div>
                
                <div class="col-lg-2 col-md-3 col-4 p-0">
                    <button class="btn btn-sm btn-outline-primary">Checkout</button>
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