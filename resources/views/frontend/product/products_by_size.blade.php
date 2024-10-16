@extends('frontend.components.master')
@section('content')
<div class="page-header mt-30 mb-50">
    <div class="container">
        <div class="archive-header">
            <div class="row align-items-center">
                <div class="col-xl-6">
                        <h2>{{ $size }} Frames</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mb-30">
    <div class="row flex-row-reverse">
        <div class="col-lg-4-5">
            <div class="shop-product-fillter">
                <div class="totall-product">
                    @if ($productCount > 0)
                    <p>We found <strong class="text-brand">{{ $productCount ?? '0' }}</strong> items for you!</p>
                    @else
                    <h3 class="text-danger mb-3">No Items Found</h3>
                    <p>We did not find any items for you!</p>
                    @endif
                </div>
            </div>
            <div class="row product-grid">

                @foreach ($products as $product)
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="{{ url('/product-details/'.$product->id.'/'.$product->product_slug) }}">
                                    <img class="default-img" src="{{ asset($product->product_thambnail) }}" alt=""/>
                                    @if ($product->multiImages->count() > 1)
                                        <img class="hover-img" src="{{ asset($product->multiImages->skip(1)->first()->photo_name) }}" alt="" />
                                    @endif
                                </a>
                            </div>
                            <div class="product-action-1 d-lg-block d-md-block d-none">
                                <a aria-label="Add To Wishlist" class="action-btn" href="{{ route('wishlist.add', $product->id) }}"><i class="fi-rs-heart"></i></a>
                                <!-- <a aria-label="Compare" class="action-btn" href="#"><i class="fi-rs-shuffle"></i></a> -->
                                <!-- Add a unique identifier to each quick view button -->
                                <a aria-label="Quick view" class="action-btn quick-view-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal{{ $product->id }}"><i class="fi-rs-eye"></i></a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                @php
                                    $amount = $product->selling_price - $product->discount_price;
                                    $discount = 100 - (($amount / $product->selling_price) * 100);
                                @endphp

                                @if ($product->discount_price == NULL)
                                    <span class="new">New</span>
                                @else
                                    <span class="hot">Save {{ round($discount) }} %</span>
                                @endif
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="product-category">
                                <a href="#">{{ $product->category->name }}</a>
                            </div>
                            <h2><a href="{{ url('/product-details/'.$product->id.'/'.$product->product_slug) }}">{{ $product->product_name }}</a></h2>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: {{round($product->reviews->average('rating'), 1)}}%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> ({{round($product->reviews->average('rating') / 20, 1)}})</span>
                            </div>
                            <div>
                                <span class="font-small text-muted">By <a href="{{ route('vendor.details',$product->vendor->id) }}">{{ $product->vendor->name ?? 'Owner' }}</a></span>
                            </div>
                            <div class="product-card-bottom">
                                @if($product->discount_price == NULL)
                                    <div class="product-price">
                                        <span>PKR {{ $product->selling_price }}</span>
                                    </div>
                                @else
                                    <div class="product-price">
                                        <span>PKR {{ $amount }}</span>
                                        <span class="old-price">PKR {{ $product->selling_price }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="add-cart">
                            <form method="POST" action="{{ route('cart.add') }}" class="add-to-cart-form">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="name" value="{{ $product->product_name }}">
                                <input type="hidden" name="price" value="{{ $product->selling_price }}">
                                <input type="hidden" name="quantity" value="1" min="1" required>
                                <button style="width:100%" class="button button-add-to-cart mt-10"><i class="fi-rs-shopping-cart mr-5"></i>Add</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Quick view modal for each product -->
                <div class="modal fade custom-modal" id="quickViewModal{{ $product->id }}" tabindex="-1" aria-labelledby="quickViewModal{{ $product->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                        <div class="detail-gallery">
                                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                            <!-- MAIN SLIDES -->
                                            <div class="product-image-slider">
                                                @foreach($product->multiImages as $image)
                                                <figure class="border-radius-10">
                                                    <img src="{{ asset($image->photo_name) }}" alt="product image" />
                                                </figure>
                                                @endforeach
                                            </div>
                                            <!-- THUMBNAILS -->
                                            <div class="slider-nav-thumbnails">
                                                @foreach($product->multiImages as $image)
                                                <div><img src="{{ asset($image->photo_name) }}" alt="product image" /></div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- End Gallery -->
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="detail-info pr-30 pl-30">
                                            <span class="stock-status out-stock">
                                                @php
                                                    $amount = $product->selling_price - $product->discount_price;
                                                    $discount = 100 - (($amount / $product->selling_price) * 100);
                                                @endphp

                                                @if ($product->discount_price == NULL)
                                                    @if ($product->hot_deals == 1)Hot
                                                    @elseif ($product->featured == 1)Featured
                                                    @elseif ($product->special_offer == 1)Special
                                                    @elseif ($product->special_deals == 1)Special Deals
                                                    @else
                                                    @endif
                                                @else
                                                    <span class="hot">Save {{ round($discount) }} %</span>
                                                @endif
                                            </span>
                                            <h3 class="title-detail"><a href="{{ url('/product-details/'.$product->id.'/'.$product->product_slug) }}" class="text-heading">{{ $product->product_name }}</a></h3>
                                            <div class="product-detail-rating">
                                                <div class="product-rate-cover text-end">
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: {{round($product->reviews->average('rating'), 1)}}%"></div>
                                                    </div>
                                                    <span class="font-small ml-5 text-muted"> ({{$product->reviews->count()}} reviews)</span>
                                                </div>
                                            </div>
                                            
                                            @php
                                                $product_size = explode(',', $product->product_size);
                                                $product_color = explode(',', $product->product_color);
                                            @endphp
                                            @if(!empty($product->product_size))
                                                <div class="attr-detail attr-size mb-30">
                                                    <strong class="mr-10" style="width:50px;">Size : </strong>
                                                    <select class="form-control unicase-form-control" id="sizeSelect">
                                                        <option selected disabled>--Choose Size--</option>
                                                        @foreach($product_size as $size)
                                                            <option value="{{ $size }}">{{ ucwords($size) }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endif

                                            @if(!empty($product->product_color))
                                                <div class="attr-detail attr-color mb-30">
                                                    <strong class="mr-10" style="width:50px;">Color: </strong>
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
                                                            <span class="old-price font-md ml-15">PKR {{ $product->selling_price }} </span>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="detail-extralink mb-30">
                                                <div class="detail-qty border radius">
                                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                                    <input type="text" name="quantity" class="qty-val" value="1" min="1">
                                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                                </div>
                                                <div class="product-extra-link2">
                                                    <form method="POST" action="{{ route('cart.add') }}" class="add-to-cart-form">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        <input type="hidden" name="name" value="{{ $product->product_name }}">
                                                        <input type="hidden" name="price" value="{{ $product->selling_price }}">
                                                        <input type="hidden" name="quantity" value="1" min="1" required>
                                                        <button class="button button-add-to-cart"><i class="fi-rs-shopping-cart mr-5"></i>Add</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="font-xs">
                                                <ul>
                                                    <li class="mb-5">Vendor: <span class="text-brand"><a href="{{ route('vendor.details',$product->vendor->id) }}"> {{ $product->vendor->name }}</a></span></li>
                                                    @if ($product->created_at)
                                                        <li class="mb-5">Created: <span class="text-brand">{{ $product->created_at->format('F j, Y') }}</span></li>
                                                    @endif
                                                    @if ($product->updated_at && $product->created_at != $product->updated_at)
                                                        <li class="mb-5">Last Updated: <span class="text-brand">{{ $product->updated_at->format('F j, Y') }}</span></li>
                                                    @endif
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

            </div>

        </div>
        <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
            <div class="sidebar-widget widget-category-2 mb-30">
                <h5 class="section-title style-1 mb-30">Sizes</h5>
                <ul>
                    @foreach ($sizesWithCounts as $sizeData)
                        <li>
                            <a href="{{ route('products.by.size', ['size' => $sizeData->product_size]) }}">
                                {{ $sizeData->product_size }} ({{ $sizeData->products_count }})
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- Product sidebar Widget -->
            <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                <h5 class="section-title style-1 mb-30">New products</h5>

                @php
                    $newproducts = App\Models\Product::latest()->take(5)->get();
                @endphp

                @foreach ($newproducts as $product)
                <div class="single-post clearfix">
                    <div class="image">
                    <img src="{{ asset($product->product_thambnail) }}" alt="{{ $product->product_name }}" onError="this.onerror=null; this.src='path/to/default-image.jpg';">
                    </div>
                    <div class="content pt-10">
                    <h6><a href="{{ url('/product-details/'.$product->id.'/'.$product->product_slug) }}">{{ $product->product_name }}</a></h6>
                    <p class="price mb-0 mt-5">PKR {{ $product->selling_price }}</p>
                    <div class="product-rate">
                        <div class="product-rating" style="width: {{ round($product->reviews->average('rating'), 1) }}%"> </div>
                    </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="banner-img wow fadeIn mb-lg-0 animated d-lg-block d-none">
                <img src="{{ asset('frontend/assets/imgs/banner/banner-18.png') }}" alt="" />
                <div class="banner-text">
                    <h6>
                        Use your <span class="text-brand">Loyalty Points </span>
                        to get more Discounts!!
                    </h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
