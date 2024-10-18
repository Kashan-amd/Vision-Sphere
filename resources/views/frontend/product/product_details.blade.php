@extends('frontend\components\master')
@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ '/' }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> <a href="{{ route('category.products', ['id' => $product->category->id, 'slug' => $product->category->slug])}}">{{ $product->category->name }}</a> <span></span><a href="{{ route('subcategory.products', ['id' => $product->subcategory->id, 'slug' => $product->subcategory->slug])}}">{{ $product->subcategory->name }}</a>
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <div class="product-detail accordion-detail">
                    <div class="row mb-50 mt-30">
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
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="row detail-info pr-30 pl-30">
                                <div class="col-9">
                                    @if ($product->product_qty > 0)
                                        <span class="stock-status in-stock">In Stock</span>
                                    @else
                                        <span class="stock-status out-stock">Out of Stock</span>
                                    @endif
                                </div>
                                <div class="col-3">
                                    <a href="#" class="btn btn-sm tryon-btn" data-bs-toggle="modal" data-bs-target="#vtonModal">Try On</a>
                                </div>
                                
                                <h2 class="title-detail">{{ $product->product_name }}</h2>
                                <div class="product-detail-rating">
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: {{ round($reviews->average('rating'), 1) }}%"></div>
                                        </div>
                                        <!-- gotta make reviews dynamic -->
                                        <span class="font-small ml-5 text-muted"> ({{ $reviews->count() }} reviews)</span>
                                    </div>
                                </div>

                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">

                                        @php
                                            $amount = $product->selling_price - $product->discount_price;
                                            $discount = 100 - (($amount / $product->selling_price) * 100);
                                        @endphp

                                        <span class="current-price text-brand">PKR {{ $amount }}</span>
                                        @if ($discount > 0)
                                            <span>
                                                <span class="save-price font-md color3 ml-15">{{ round($discount) }}% Off</span>
                                                <span class="old-price font-md ml-15">PKR {{ $product->selling_price }} </span>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="short-desc mb-30">
                                    <p class="font-lg">{{ $product->short_descp }}</p>
                                </div>
                                @if(!empty($product->product_size))
                                    <div class="attr-detail attr-size mb-30">
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
                                        <select class="form-control unicase-form-control" id="colorSelect">
                                            <option selected disabled>--Choose Color--</option>
                                            @foreach($product_color as $color)
                                                <option value="{{ $color }}">{{ ucwords($color) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

                                <div class="detail-extralink mb-50">
                                    <div class="detail-qty border radius">
                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <input type="number" name="quantity" class="qty-val" value="1" min="1" max="{{ $product->product_qty ?? 1 }}">
                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div>

                                    <div class="product-extra-link2">
                                        <form method="POST" action="{{ route('cart.add') }}" class="add-to-cart-form">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="name" value="{{ $product->product_name }}">
                                            <input type="hidden" name="price" value="{{ $product->selling_price }}">
                                            <input type="hidden" name="quantity" value="1" min="1" required>
                                            <button class="button action-btn button-add-to-cart"><i class="fi-rs-shopping-cart mr-5"></i>Add to Cart</button>
                                        </form>
                                    </div>
                                    <div class="product-extra-link2">
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="{{ route('wishlist.add', $product->id) }}"><i class="fi-rs-heart"></i></a>
                                    </div>
                                </div>
                                @if($product->vendor_id == NULL)
                                    <h6> Sold By <a href="#"> <span class="text-danger"> Owner </span> </a></h6>
                                @else
                                    <h6> Sold By <a href="{{ route('vendor.details',$product->vendor->id) }}"> <span class="text-danger"> {{ $product['vendor']['name'] }} </span></a></h6>
                                @endif
                                <hr>

                                <div class="font-xs">
                                    <ul class="mr-50 float-start">
                                        <li class="mb-5">Category: <span class="text-brand"><a href="{{ route('category.products', ['id' => $product->category->id, 'slug' => $product->category->slug])}}">{{ $product['category']['name'] }}</a></span></li>
                                        @if ($product->created_at)
                                            <li class="mb-5">Created: <span class="text-brand">{{ $product->created_at->format('M j.Y') }}</span></li>
                                        @endif
                                        @if ($product->updated_at && $product->created_at != $product->updated_at)
                                            <li class="mb-5">Last Updated: <span class="text-brand">{{ $product->updated_at->format('M j.Y') }}</span></li>
                                        @endif
                                    </ul>
                                    <ul class="float-start">
                                        <li>SubCategory: <span class="text-brand"><a href="{{ route('subcategory.products', ['id' => $product->subcategory->id, 'slug' => $product->subcategory->slug])}}">{{ $product['subcategory']['name'] }}</a> </span></li>
                                        <li class="mb-5">Product Code: <a href="#">{{ $product->product_code }}</a></li>
                                        @php
                                            $tags = explode(',', $product->product_tags ?? '');
                                        @endphp

                                        @if (!empty($product->tags))
                                            <li class="mb-5">Tags:
                                                @foreach ($tags as $index => $tag)
                                                    <a href="#" rel="tag">{{ ucfirst(trim($tag)) }}</a>@if ($index < count($tags) - 1),@endif
                                                @endforeach
                                            </li>
                                        @endif
                                        <li>Stock:<span class="in-stock text-brand ml-5">{{ $product->product_qty }} Items In Stock</span></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                    <div class="product-info col-lg-12 col-md-12 col-12 col-sm-6 text-center shadow mb-20">
                        <div class="reviews-info hover-up p-20">
                            <h1>{{ round($reviews->average('rating') / 20, 2) }}</h1>
                            <div class="product-rate d-inline-block">
                                <div class="product-rating" style="width: {{ round($reviews->average('rating'), 1) }}%"></div>
                            </div>
                            <h5>Reviews from customers ({{ $reviews->count() }})</h5>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="tab-style3">
                            <ul class="nav nav-tabs text-uppercase">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Additional info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews ({{ $reviews->count() }})</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab entry-main-content">
                                <div class="tab-pane fade show active" id="Description">
                                    <div class="">
                                        {!! $product->long_descp !!}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Additional-info">
                                    <table class="font-md">
                                        <tbody>
                                            <tr class="handle-height-ground-to-handle">
                                                <th>Brand</th>
                                                <td>
                                                    <p>{{ $product['brand']['name'] }}</p>
                                                </td>
                                            </tr>
                                            <tr class="stand-up">
                                                <th>SKU</th>
                                                <td>
                                                    <p>{{ $product['product_code'] }}</p>
                                                </td>
                                            </tr>
                                            <tr class="folded-wo-wheels">
                                                <th>Shape</th>
                                                <td>
                                                    <p>{{ $product['product_shape'] }}</p>
                                                </td>
                                            </tr>
                                            <tr class="folded-w-wheels">
                                                <th>Size</th>
                                                <td>
                                                    <p>{{ $product['product_size'] }}</p>
                                                </td>
                                            </tr>
                                            <tr class="door-pass-through">
                                                <th>Material</th>
                                                <td>
                                                    <p>{{ $product['product_material'] }}</p>
                                                </td>
                                            </tr>
                                            <tr class="frame">
                                                <th>Weight</th>
                                                <td>
                                                    <p>{{ $product['product_weight'] }}</p>
                                                </td>
                                            </tr>
                                            <tr class="weight-wo-wheels">
                                                <th>RX Range</th>
                                                <td>
                                                    <p>-20.00~+12.00 </p>
                                                </td>
                                            </tr>
                                            <tr class="weight-capacity">
                                                <th>PD Range</th>
                                                <td>
                                                    <p>54~78</p>
                                                </td>
                                            </tr>
                                            <tr class="width">
                                                <th>Progressive</th>
                                                <td>
                                                    <p>Yes</p>
                                                </td>
                                            </tr>
                                            <tr class="handle-height-ground-to-handle">
                                                <th>Spring Hing</th>
                                                <td>
                                                    <p>Yes</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="Reviews">
                                    <!--Comments-->
                                    @if($reviews->count() < 1)
                                        <p>such emptinesss..🥲</p>
                                    @else
                                        <div class="comments-area">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <h4 class="mb-30">Customer Comments</h4>
                                                    <div class="comment-list">
                                                    @foreach($reviews as $reviewData)
                                                        <div class="single-comment shadow justify-content-between d-flex mb-30">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb align-items-start">
                                                                    <a href="#" class="font-heading text-brand">{{ $reviewData->user->name }}</a>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="d-flex justify-content-between mb-10">
                                                                        
                                                                        <div class="product-rate d-inline-block">
                                                                            <div class="product-rating" style="width: {{ $reviewData->rating }}%"></div>
                                                                        </div>
                                                                    </div>
                                                                    <p class="mb-10">{{ $reviewData->comment }}</p>
                                                                    <span class="font-xs text-muted">{{ $reviewData->created_at->format('Y-m-d') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="d-flex mb-30">
                                                        <div class="product-rate d-inline-block mr-15">
                                                            <div class="product-rating" style="width: {{ round($reviews->average('rating'), 1) }}%"></div>
                                                        </div>
                                                        <h6>{{ round($reviews->average('rating') / 20, 1) }} out of 5</h6>
                                                    </div>
                                                    @php
                                                        $totalReviews = $reviews->count();  // Total number of reviews
                                                        
                                                        $star5 = $product->reviews->where('rating', 5 * 20)->count();  // Count of 5-star reviews
                                                        $star4 = $product->reviews->where('rating', 4 * 20)->count();  // Count of 4-star reviews
                                                        $star3 = $product->reviews->where('rating', 3 * 20)->count();  // Count of 3-star reviews
                                                        $star2 = $product->reviews->where('rating', 2 * 20)->count();  // Count of 2-star reviews
                                                        $star1 = $product->reviews->where('rating', 1 * 20)->count();  // Count of 1-star reviews

                                                        $percent5 = $totalReviews > 0 ? round(($star5 / $totalReviews) * 100) : 0;
                                                        $percent4 = $totalReviews > 0 ? round(($star4 / $totalReviews) * 100) : 0;
                                                        $percent3 = $totalReviews > 0 ? round(($star3 / $totalReviews) * 100) : 0;
                                                        $percent2 = $totalReviews > 0 ? round(($star2 / $totalReviews) * 100) : 0;
                                                        $percent1 = $totalReviews > 0 ? round(($star1 / $totalReviews) * 100) : 0;
                                                    @endphp
                                                    <div class="progress">
                                                        <span>5 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: {{ $percent5 }}%" aria-valuenow="{{ $percent5 }}" aria-valuemin="0" aria-valuemax="100">{{ $percent5 }}%</div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>4 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: {{ $percent4 }}%" aria-valuenow="{{ $percent4 }}" aria-valuemin="0" aria-valuemax="100">{{ $percent4 }}%</div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>3 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: {{ $percent3 }}%" aria-valuenow="{{ $percent3 }}" aria-valuemin="0" aria-valuemax="100">{{ $percent3 }}%</div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>2 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: {{ $percent2 }}%" aria-valuenow="{{ $percent2 }}" aria-valuemin="0" aria-valuemax="100">{{ $percent2 }}%</div>
                                                    </div>
                                                    <div class="progress mb-30">
                                                        <span>1 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: {{ $percent1 }}%" aria-valuenow="{{ $percent1 }}" aria-valuemin="0" aria-valuemax="100">{{ $percent1 }}%</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <!--comment form-->
                                    <div class="comment-form">
                                        <h4 class="mb-0">Add a review</h4>
                                        @if(auth()->check())
                                            <div class="row">
                                                <div class="col-lg-8 col-md-12">
                                                <form class="form-contact comment_form" action="{{ route('product.review', $product->id) }}" method="POST" id="commentForm">
                                                    @csrf
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="rating"></label>
                                                            <div class="rating">
                                                                <input type="radio" id="star5" name="rating" value="5" />
                                                                <label for="star5" title="5 stars">&#9733;</label>
                                                                <input type="radio" id="star4" name="rating" value="4" />
                                                                <label for="star4" title="4 stars">&#9733;</label>
                                                                <input type="radio" id="star3" name="rating" value="3" />
                                                                <label for="star3" title="3 stars">&#9733;</label>
                                                                <input type="radio" id="star2" name="rating" value="2" />
                                                                <label for="star2" title="2 stars">&#9733;</label>
                                                                <input type="radio" id="star1" name="rating" value="1" />
                                                                <label for="star1" title="1 star">&#9733;</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="comment" id="comment" rows="4" placeholder="Write your review here"></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <button type="submit" class="button button-contactForm">Submit Review</button>
                                                        </div>
                                                    </div>
                                                </form>

                                                </div>
                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-lg-8 col-md-12">
                                                    <p>Please login to add a review</p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($relatedProducts->count() > 0)
                    <div class="row mt-60">
                        <div class="col-12">
                            <h2 class="section-title style-1 mb-30">Related products</h2>
                        </div>
                        <div class="col-12">
                            <div class="row related-products">

                                @foreach($relatedProducts as $product)
                                <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                    <div class="product-cart-wrap hover-up">
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
                                                <a aria-label="Quick view" class="action-btn quick-view-btn" data-bs-toggle="modal" data-bs-target="#quickViewModalView{{ $product->id }}"><i class="fi-rs-eye"></i></a>
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
                                                <a href="{{ route('category.products', ['id' => $product->category->id, 'slug' => $product->category->slug]) }}">{{ $product->category->name }}</a>
                                            </div>
                                            <h2><a href="{{ url('/product-details/'.$product->id.'/'.$product->product_slug) }}">{{ $product->product_name }}</a></h2>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: {{ round($product->reviews->average('rating'), 1) }}%"></div>
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
                                                        <span>${{ $amount }}</span>
                                                        <span class="old-price">PKR {{ $product->selling_price }}</span>
                                                    </div>
                                                @endif
                                                <div class="add-cart">
                                                    <form method="POST" action="{{ route('cart.add') }}" class="add-to-cart-form">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        <input type="hidden" name="name" value="{{ $product->product_name }}">
                                                        <input type="hidden" name="price" value="{{ $product->selling_price }}">
                                                        <input type="hidden" name="quantity" value="1" min="1" required>
                                                        <button class="add"><i class="fi-rs-shopping-cart mr-5"></i>Add</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Quick view modal for each product -->
                                <div class="modal fade custom-modal" id="quickViewModalView{{ $product->id }}" tabindex="-1" aria-labelledby="quickViewModalView{{ $product->id }}" aria-hidden="true">
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
                                                                    <span class="current-price text-brand">${{ $amount }}</span>
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
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <div id="vtonModal" class="modal fade custom-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen" style="height:90%"> <!-- Use fullscreen modal -->
            <div class="modal-content">
                <button type="button" class="btn-close" id="exit" data-bs-dismiss="modal" aria-label="Close" style="position: absolute; top: 10px; right: 10px; z-index: 1050"></button>
                <div class="modal-body" style="padding: 0; height: 100vh;"> <!-- Remove padding for full-size widget -->
                    @include('frontend.layouts.vton') 
                </div>
            </div>
        </div>
    </div>


    <script>
        // Wait for the modal to be fully shown before initializing the Jeeliz widget
        document.getElementById('vtonModal').addEventListener('shown.bs.modal', function () {
            console.log('Modal is fully shown, initializing Jeeliz VTO widget');
            main();  // Call the main function to initialize the Jeeliz widget
        });

        document.getElementById('exit').addEventListener('click', function() {
            // Stop or destroy the VTO instance if necessary
            JEELIZVTOWIDGET.destroy();
        });
    </script>


@endsection