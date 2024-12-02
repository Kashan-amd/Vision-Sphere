    <!-- Header  -->
    <header class="header-area header-style-1 header-height-2">
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info">
                            <ul>
                                <li><a href="{{ route('cart.index') }}">My Cart</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="track_order.html">Order Tracking</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-4">
                        <div class="text-center">
                            <div id="news-flash" class="d-inline-block">
                                <ul>
                                    <li>100% Secure delivery without contacting the courier</li>
                                    <li>Supper Value Deals - Save more with Loyalty Points</li>
                                    <li>Trendy 25 silver frames, save up 35% off today</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info header-info-right">
                            <ul>
                                <li>
                                    <a class="language-dropdown-active" href="#">English <i class="fi-rs-angle-small-down"></i></a>
                                    <ul class="language-dropdown">
                                        <li>
                                            <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/flag-fr.png') }}" alt="" />Français</a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/flag-dt.png') }}" alt="" />Deutsch</a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/flag-ru.png') }}" alt="" />Pусский</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="header-action-icon-2">
                                        @if(auth()->check())
                                            @if(auth()->user()->role === 'user')
                                                <a href="{{ route('user.dashboard') }}"><span class="lable ml-0">Account</span></a>
                                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('user.dashboard') }}"><i class="fi fi-rs-user mr-10"></i>My Account</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('user.dashboard') }}"><i class="fi fi-rs-location-alt mr-10"></i>Order Tracking</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('user.dashboard') }}"><i class="fi fi-rs-label mr-10"></i>My Voucher</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-wishlist.html"><i class="fi fi-rs-heart mr-10"></i>My Wishlist</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('user.dashboard') }}"><i class="fi fi-rs-settings-sliders mr-10"></i>Setting</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('logout') }}"><i class="fi fi-rs-sign-out mr-10"></i>Sign out</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            @elseif(auth()->user()->role === 'admin')
                                                <a href="{{ route('admin.dashboard') }}"><span class="lable ml-0">Account</span></a>
                                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('admin.dashboard') }}"><i class="fi fi-rs-user mr-10"></i>Admin Dashboard</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('logout') }}"><i class="fi fi-rs-sign-out mr-10"></i>Sign out</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            @elseif(auth()->user()->role === 'vendor')
                                                <a href="{{ route('vendor.dashboard') }}"><span class="lable ml-0">Account</span></a>
                                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('vendor.dashboard') }}"><i class="fi fi-rs-user mr-10"></i>Vendor Dashboard</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('logout') }}"><i class="fi fi-rs-sign-out mr-10"></i>Sign out</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            @endif
                                        @else
                                            <a href="{{ route('login') }}"><span class="lable ml-0">Login</span></a>
                                            <span class="lable" style="margin-left: 2px; margin-right: 2px;"> | </span>
                                            <a href="{{ route('register') }}"><span class="lable ml-0">Register</span></a>
                                        @endif
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="header-middle ptb-20 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap d-flex justify-content-between">
                    <!-- Standard Navbar Search -->
                    <div class="search-form">
                        {{-- <input type="text" id="nav-product-search" name="search" placeholder="Search..." autocomplete="off" /> --}}
                        <button class="btn btn-outline-secondary" id="open-full-search">Search here..</button>
                    </div>
        
                    <!-- Full-screen overlay search -->
                    <div class="search-overlay" id="search-overlay">
                        <span class="close-search" id="close-search"><p class="hover-up">close</p></span>
                        <div class="search-form row">
                            <input type="text" id="product-search" name="search" placeholder="Search your way through..." autocomplete="on" />
                            <div id="search-results" class="main-search-results-container"></div>

                            <div class="suggestions-container card shadow rounded mt-20">
                                <h5>Popular Searches</h5>
                                <div class="popular-tags">
                                    <p>Loading suggestions...</p>
                                </div>
                                
                            
                                <div class="product-grid">
                                    @php
                                        $products = App\Models\Product::inRandomOrder()->take(5)->get();
                                    @endphp
                                    @foreach ($products as $product)
                                        <div class="product-card">
                                            <img src="{{ asset($product->product_thambnail) }}" alt="Glasses 1">
                                            <p class="name"><span class="current"> {{ $product->product_name }} </span></p>
                                            <p class="price"><span class="current">PKR {{ $product->selling_price }} </span></p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            
                        </div>
                    </div>
        
                    <!-- Logo and Actions -->
                    <div class="header-center">
                        <div class="logo">
                            <a href="{{ '/' }}"><img height="40rem" src="{{ asset('frontend/assets/imgs/theme/logo-alt.png') }}" alt="logo" /></a>
                        </div>
                    </div>
        
                    <div class="header-action-right">
                        <!-- Wishlist & Cart Components -->
                        <div class="header-action-right">
                            <div class="header-action-2" style="margin:0 3rem">
    
                                <div class="header-action-icon-2">
                                    <a href="#">
                                        <img class="svgInject" alt="VisionSphere" src="{{ asset('frontend/assets/imgs/theme/icons/icon-heart.svg') }}" />
    
                                        @if(Auth()->user())
                                            <span class="pro-count blue">{{ $wishList_count }} </span>
                                        @else
                                            <span class="pro-count blue"> 0 </span>
                                        @endif
    
                                    </a>
                                    <a href="#"><span class="lable"></span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
    
                                        @if(Auth()->user())
                                            @if($wishList_count < 1)
                                                <p>Such Emptiness!! 🥲</p>
                                                <p>Add your Wishes!</p>
                                            @else
                                                <ul>
                                                @foreach($wishlistItems as $item)
                                                <li>
                                                    <div class="shopping-cart-img">
                                                        <a href="{{ url('/product-details/'.$item->product->id.'/'.$item->product->product_slug) }}"><img alt="VisionSphere" src="{{ asset($item->product->product_thambnail) }}" /></a>
                                                    </div>
                                                    <div class="shopping-cart-title">
                                                        <h4><a href="{{ url('/product-details/'.$item->product->id.'/'.$item->product->product_slug) }}">{{ $item->product->product_name }}</a></h4>
                                                        <h4><span>PKR </span>{{ $item->product->selling_price }}</h4>
                                                    </div>
                                                    <div class="shopping-cart-delete" style="height:0.5rem;width:0.5rem;">
                                                    <form action="{{ route('wishlist.remove', $item->product->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        {{-- <button type="submit" class="btn btn-sm"><i class="fi-rs-cross-small"></i></button> --}}
                                                        <button type="submit" class="btn btn-sm hover-up" data-id="{{ $item->product_id }}" style="background-color:#00ccff00;border:none;"><i class="fi-rs-cross-small"></i></button>
                                                    </form>
                                                    </div>
                                                </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                        @else
                                        <ul>
                                            <li>Such Emptiness!! 🥲
                                                <br>
                                                Login to view your wishlist..
                                            </li>
                                        </ul>
                                        @endif
    
                                    </div>
                                </div>
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="#">
                                        <img alt="VisionSphere" src="{{ asset('frontend/assets/imgs/theme/icons/icon-cart.svg') }}" />
    
                                        @if(Auth()->user())
                                            <span class="pro-count blue">{{ $cartItem_count }} </span>
                                        @else
                                            <span class="pro-count blue"> 0 </span>
                                        @endif
                                    </a>
                                    <a href="shop-cart.html"><span class="lable"></span></a>
                                    <!-- add dynamic cart -->
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <ul>
                                        @if(Auth()->user())
                                            @if($cartItem_count < 1)
                                                <p>Also Empty!! 🥲</p>
                                                <p>Add to your cart...</p>
                                            @else
                                                @foreach($cartItems as $item)
                                                    <li>
                                                        <div class="shopping-cart-img">
                                                            <img alt="VisionSphere" src="{{ asset($item->product->product_thambnail) }}" />
                                                        </div>
                                                        <div class="shopping-cart-title">
                                                            <h4>{{ $item->product->product_name }}</h4>
    
                                                            @php
                                                                $amount = $item->product->selling_price - $item->product->discount_price;
                                                                $discount = 100 - (($amount / $item->product->selling_price) * 100);
                                                            @endphp
                                                            <h4 class="current-price text-brand">PKR {{ $amount }} <span class="fw-light" style="font-size:0.8rem">| qty: {{ $item->quantity }}</span></h4>
                                                        </div>
                                                        <div class="shopping-cart-delete" style="Position:fixed;height:0.5rem;width:0.5rem;">
                                                            <button class="remove-item hover-up" data-id="{{ $item->product_id }}" style="background-color:#00ccff00;border:none;"><i class="fi-rs-cross-small"></i></button>
                                                        </div>
                                                    </li>
                                                    {{-- <hr> --}}
                                                @endforeach
                                            </ul>
                                            <div class="shopping-cart-footer">
                                                <div class="shopping-cart-total">
                                                    <h4>Total <span>PKR {{ $cartItems->sum(function($item) { return $item->product->selling_price - $item->product->discount_price * $item->quantity; }) }}</span></h4>
                                                </div>
                                            </div>
                                            @endif
                                        @else
                                            <ul>
                                                <li>Also Empty!! 🥲
                                                    <br>
                                                    Login to view your Cart..
                                                </li>
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        


        <div class="header-bottom header-bottom-bg-color sticky-bar shadow">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="header-nav d-none d-lg-flex">

                    {{-- Start Category --}}
                    @php
                        $categories = App\Models\Category::all();
                        $categoriesChunked = $categories->chunk(ceil($categories->count() / 2)); // Chunk into 2 parts
                    @endphp

                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categories-button-active" href="#">
                            <span class="fi-rs-apps" style="padding: 0.7rem 0"></span>
                            <i class="fi-rs-angle-down"></i>
                        </a>
                        <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                            @if ($categories->isEmpty())
                                <p>No categories found.</p>
                            @else
                                <div class="d-flex categori-dropdown-inner" style="min-width:300px">
                                    <ul>
                                        @foreach ($categoriesChunked->first() as $data)
                                            <li>
                                                <a href="{{ route('category.products', ['id' => $data->id, 'slug' => $data->slug]) }}">
                                                    <img src="{{ asset('upload/categories/'.$data->image) }}" alt="">{{ $data->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @if ($categoriesChunked->count() > 1)
                                        <ul class="end">
                                            @foreach ($categoriesChunked[1] as $data)
                                                <li>
                                                    <a href="{{ route('category.products', ['id' => $data->id, 'slug' => $data->slug]) }}">
                                                        <img src="{{ asset('upload/categories/'.$data->image) }}" alt="">{{ $data->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                    {{-- End Category --}}



                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                            <nav>
                                <ul>

                                    <li>
                                        <a class="active" href="{{ '/' }}">Home</a>

                                    </li>

                                    {{-- Shop --}}
                                    <li>
                                        @php
                                            $shops = App\Models\User::where('role', 'vendor')->get();
                                        @endphp

                                        <a href="{{ route('all.vendors') }}">Vendors <i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            @if ($shops->isEmpty())
                                                <li><a href="#">No shops found</a></li>
                                            @else
                                                @foreach ($shops as $shop)
                                                    <li><a href="{{ route('vendor.details', $shop->id) }}">{{ $shop->name }}</a></li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </li>
                                    {{-- End Shop --}}

                                    {{-- Brand --}}
                                    <li class="position-static">
                                        @php
                                            $brands = App\Models\Brand::all();
                                        @endphp
                                        <a href="#">Brands <i class="fi-rs-angle-down"></i></a>
                                        <ul class="mega-menu">
                                            @if ($brands->isEmpty())
                                                <li><a href="#">No brands found</a></li>
                                            @else
                                                @foreach ($brands as $brand)
                                                <li class="sub-mega-menu">
                                                    <div class="brand-container text-center">
                                                    <a href="{{ route('brand.products', ['id' => $brand->id, 'slug' => $brand->slug]) }}"><img height="40rem" src="{{ asset('upload/brands/'.$brand->image) }}" alt="{{ $brand->name }}" /></a>
                                                        <hr>
                                                        <a href="{{ route('brand.products', ['id' => $brand->id, 'slug' => $brand->slug]) }}">{{ $brand->name }}</a>
                                                    </div>
                                                </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </li>
                                    {{-- End Brand --}}

                                    {{-- SubCategory --}}
                                    @if($categories->isNotEmpty())
                                        <li class="position-static">
                                            <a href="#">Shop by <i class="fi-rs-angle-down"></i></a>
                                            <ul class="mega-menu ">


                                                <li class="sub-mega-menu sub-mega-menu-width-31" style="margin:1.5rem 2rem 1rem 0">
                                                    <div class="menu-banner-wrap shadow hover-up">
                                                        <a href="#"><img src="{{ asset('frontend/assets/imgs/banner/banner-menu.png') }}" alt="VisionSphere" /></a>
                                                        <div class="menu-banner-content">
                                                            <h4>Hot deals</h4>
                                                            <h3>
                                                                Don't miss<br />
                                                                New Products
                                                            </h3>
                                                            <div class="menu-banner-price">
                                                                <span class="new-price text-success">Save upto 20%</span>
                                                            </div>
                                                            <div class="menu-banner-btn">
                                                                <a href="#">Shop now</a>
                                                            </div>
                                                        </div>
                                                        <div class="menu-banner-discount">
                                                            <h3>
                                                                <span>20%</span>
                                                                off
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="sub-mega-menu sub-mega-menu-width-21" style="margin:2rem 5rem 0 0">
                                                    <a class="menu-title" href="#">By Material</a>
                                                    <ul>
                                                        @php
                                                            $productMaterials = App\Models\Product::select('product_material')
                                                                                    ->distinct()
                                                                                    ->whereNotNull('product_material')
                                                                                    ->get();
                                                        @endphp
                                                        @foreach ($productMaterials as $material)
                                                            @php
                                                                $materialArray = explode(',', $material->product_material);
                                                            @endphp

                                                            @foreach ($materialArray as $singleMaterial)
                                                                @php
                                                                    $trimmedMaterial = trim($singleMaterial);
                                                                @endphp

                                                                @if (!empty($trimmedMaterial))
                                                                    <li class="sub-mega-menu sub-mega-menu-width-21">
                                                                        <ul>
                                                                            <!-- Create a link for the unique material -->
                                                                            <li>
                                                                                <a href="{{ route('products.by.material', ['material' => $trimmedMaterial]) }}">
                                                                                    {{ $trimmedMaterial }}
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                <li class="sub-mega-menu sub-mega-menu-width-21" style="margin:2rem 5rem 0 0">
                                                    <a class="menu-title" href="#">By Shape</a>
                                                    <ul>
                                                        @php
                                                            // Retrieve distinct product shapes and store them uniquely in an array
                                                            $productShapes = App\Models\Product::select('product_shape')
                                                                                    ->distinct()
                                                                                    ->whereNotNull('product_shape')
                                                                                    ->get();

                                                            $uniqueShapes = [];
                                                        @endphp

                                                        @foreach ($productShapes as $product)
                                                            @php
                                                                // Split shapes by commas if a product has multiple shapes
                                                                $shapesArray = explode(',', $product->product_shape);
                                                            @endphp

                                                            @foreach ($shapesArray as $shape)
                                                                @php
                                                                    $trimmedShape = trim($shape);
                                                                @endphp

                                                                <!-- Check if the shape is unique, and add it to the array if it's not already there -->
                                                                @if (!in_array($trimmedShape, $uniqueShapes) && !empty($trimmedShape))
                                                                    @php
                                                                        $uniqueShapes[] = $trimmedShape;
                                                                    @endphp

                                                                    <li class="sub-mega-menu sub-mega-menu-width-21">
                                                                        <ul>
                                                                            <!-- Create a link for the unique shape -->
                                                                            <li>
                                                                                <a href="{{ route('products.by.shape', ['shape' => $trimmedShape]) }}">
                                                                                    {{ $trimmedShape }}
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                <li class="sub-mega-menu sub-mega-menu-width-21" style="margin:2rem 5rem 0 0">
                                                    <a class="menu-title" href="#">By Size</a>
                                                    <ul>
                                                        @php
                                                            // Retrieve distinct product sizes and store them uniquely in an array
                                                            $productSizes = App\Models\Product::select('product_size')
                                                                                    ->distinct()
                                                                                    ->whereNotNull('product_size')
                                                                                    ->get();

                                                            $uniqueSizes = []; // Array to hold unique sizes
                                                        @endphp

                                                        @foreach ($productSizes as $product)
                                                            @php
                                                                // Split sizes by commas if a product has multiple sizes
                                                                $sizesArray = explode(',', $product->product_size);
                                                            @endphp

                                                            @foreach ($sizesArray as $size)
                                                                @php
                                                                    $trimmedSize = trim($size); // Remove extra spaces
                                                                @endphp

                                                                <!-- Check if the size is unique, and add it to the array if it's not already there -->
                                                                @if (!in_array($trimmedSize, $uniqueSizes) && !empty($trimmedSize))
                                                                    @php
                                                                        $uniqueSizes[] = $trimmedSize;
                                                                    @endphp

                                                                    <li class="sub-mega-menu sub-mega-menu-width-21">
                                                                        <ul>
                                                                            <!-- Create a link for the unique size -->
                                                                            <li>
                                                                                <a href="{{ route('products.by.size', ['size' => $trimmedSize]) }}">
                                                                                    {{ $trimmedSize }}
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    @endif
                                    {{-- End SubCategory --}}

                                    <li>
                                        <a href="#">Misc <i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('purchase.guide') }}">Purchase Guide</a></li>
                                            <li><a href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
                                            <li><a href="{{ route('terms.service') }}">Terms of Service</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="{{ route('about') }}">About</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact') }}">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- for mobile screens -->
                    <div id="header-action-icon-2" class="header-action-icon-2 d-block d-lg-none">
                        <div class="burger-icon burger-icon-white">
                            <span class="burger-icon-top"></span>
                            <span class="burger-icon-mid"></span>
                            <span class="burger-icon-bottom"></span>
                        </div>
                    </div>
                    <div class="d-block d-lg-none">
                        <a style="margin: 0 0 0 0rem" href="{{ '/' }}"><img height="25rem" src="{{ asset('frontend/assets/imgs/theme/logo-alt.png') }}" alt="logo" /></a>
                    </div>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="##">
                                    <img class="svgInject" alt="VisionSphere" src="{{ asset('frontend/assets/imgs/theme/icons/icon-heart.svg') }}" />

                                    @if(Auth()->user())
                                        <span class="pro-count blue">{{ $wishList_count }} </span>
                                    @else
                                        <span class="pro-count blue"> 0 </span>
                                    @endif

                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">

                                        @if(Auth()->user())
                                            @if($wishList_count < 1)
                                                <p>such emptiness!! 🥲</p>
                                                <p>Add your Wishes!</p>
                                            @else
                                                <ul>
                                                @foreach($wishlistItems as $item)
                                                    <li>
                                                        <div class="shopping-cart-img">
                                                            <a href=""><img alt="VisionSphere" src="{{ asset($item->product->product_thambnail) }}" /></a>
                                                        </div>
                                                        <div class="shopping-cart-title">
                                                            <h4><a href="#">{{ $item->product->product_name }}</a></h4>
                                                            <h4><span>PKR </span>{{ $item->product->selling_price }}</h4>
                                                        </div>
                                                        <div class="shopping-cart-delete">
                                                        <form action="{{ route('wishlist.remove', $item->product->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm"><i class="fi-rs-cross-small"></i></button>
                                                        </form>
                                                        </div>
                                                    </li>
                                                @endforeach
                                                </ul>
                                            @endif
                                        @else
                                            <ul>
                                                <li>Sign in to see your wishlist!!</li>
                                            </ul>
                                        @endif

                                </div>
                            </div>
                            <!-- <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="#">
                                    <img alt="VisionSphere" src="{{ asset('frontend/assets/imgs/theme/icons/icon-cart.svg') }}" />
                                    <span class="pro-count white">2</span>
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="#"><img alt="VisionSphere" src="{{ asset('frontend/assets/imgs/shop/thumbnail-3.jpg') }}" /></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="#">Luca 19F</a></h4>
                                                <h3><span>1 × </span>PKR 800.00</h3>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span>PKR 800.00</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="shop-cart.html">View cart</a>
                                            <a href="shop-checkout.html">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
   <!-- End Header  -->

    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top justify-content-end">
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button style="background-color:#00cdff" class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <!-- Always visible btn... -->
                <div class="mb-20">
                    <button type="button" class="btn btn-outline-dark" id="main-product-search">Searching for something...</button>
                </div>

                <!-- Search Overlay -->
                <div class="mobile-search-overlay">
                    <div class="mobile-search-overlay-header">
                        <input type="text" id="mobile-product-search" class="mobile-search-input" name="search" placeholder="Search Here..." autocomplete="off" />
                        <button class="close-search-btn">close</button>
                    </div>

                    <!-- Search results container -->
                    <div id="mobile-search-results" class="mobile-search-results">
                        <!-- Search result items will be inserted here -->
                    </div>
                    <div class="suggestions-container card shadow rounded mt-20">
                        <h5>Popular Searches</h5>
                        <div class="popular-tags">
                            <p>Loading suggestions...</p>
                        </div>
                    </div>
                </div>

                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li class="menu-item-has-children">
                                <a href="{{ '/' }}">Home</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Brands</a>
                                <ul class="dropdown">
                                    @if ($brands->isEmpty())
                                        <li><a href="#">No brands found</a></li>
                                    @else
                                        @foreach ($brands as $brand)
                                        <li>
                                            <a href="{{ route('brand.products', ['id' => $brand->id, 'slug' => $brand->slug]) }}">{{ $brand->name }}</a>
                                        </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                            <a href="#">Categories</a>
                                <ul class="dropdown">
                                    <li>
                                        @foreach ($categories as $category)
                                            <a href="{{ route('category.products', ['id' => $category->id, 'slug' => $category->slug]) }}">{{ $category->name }}</a><br>
                                        @endforeach
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Shop By</a>
                                <ul class="dropdown">
                                    <li class="menu-item-has-children">
                                        <a href="#">Frame Material</a>
                                        <ul class="dropdown">
                                            <li>
                                                @php
                                                    $productMaterials = App\Models\Product::select('product_material')
                                                                            ->distinct()
                                                                            ->whereNotNull('product_material')
                                                                            ->get();
                                                @endphp
                                                @foreach ($productMaterials as $material)
                                                    @php
                                                        $materialArray = explode(',', $material->product_material);
                                                    @endphp

                                                    @foreach ($materialArray as $singleMaterial)
                                                        @php
                                                            $trimmedMaterial = trim($singleMaterial);
                                                        @endphp

                                                        @if (!empty($trimmedMaterial))
                                                            <a href="{{ route('products.by.material', ['material' => $trimmedMaterial]) }}">
                                                                {{ $trimmedMaterial }}
                                                            </a><br>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Frame Shape</a>
                                        <ul class="dropdown">
                                            <li>
                                                @php
                                                    $productShapes = App\Models\Product::select('product_shape')
                                                                            ->distinct()
                                                                            ->whereNotNull('product_shape')
                                                                            ->get();

                                                    $uniqueShapes = [];
                                                @endphp
                                                @foreach ($productShapes as $product)
                                                    @php
                                                        // Split shapes by commas if a product has multiple shapes
                                                        $shapesArray = explode(',', $product->product_shape);
                                                    @endphp

                                                    @foreach ($shapesArray as $shape)
                                                        @php
                                                            $trimmedShape = trim($shape);
                                                        @endphp

                                                        <!-- Check if the shape is unique, and add it to the array if it's not already there -->
                                                        @if (!in_array($trimmedShape, $uniqueShapes) && !empty($trimmedShape))
                                                            @php
                                                                $uniqueShapes[] = $trimmedShape;
                                                            @endphp
                                                            <a href="{{ route('products.by.shape', ['shape' => $trimmedShape]) }}">
                                                                {{ $trimmedShape }}
                                                            </a><br>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Frame Size</a>
                                        <ul class="dropdown">
                                            <li>
                                                @php
                                                    // Retrieve distinct product sizes and store them uniquely in an array
                                                    $productSizes = App\Models\Product::select('product_size')
                                                                            ->distinct()
                                                                            ->whereNotNull('product_size')
                                                                            ->get();

                                                    $uniqueSizes = []; // Array to hold unique sizes
                                                @endphp

                                                @foreach ($productSizes as $product)
                                                    @php
                                                        // Split sizes by commas if a product has multiple sizes
                                                        $sizesArray = explode(',', $product->product_size);
                                                    @endphp

                                                    @foreach ($sizesArray as $size)
                                                        @php
                                                            $trimmedSize = trim($size); // Remove extra spaces
                                                        @endphp

                                                        <!-- Check if the size is unique, and add it to the array if it's not already there -->
                                                        @if (!in_array($trimmedSize, $uniqueSizes) && !empty($trimmedSize))
                                                            @php
                                                                $uniqueSizes[] = $trimmedSize;
                                                            @endphp
                                                                <a href="{{ route('products.by.size', ['size' => $trimmedSize]) }}">
                                                                    {{ $trimmedSize }}
                                                                </a><br>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="page-purchase-guide.html">Purchase Guide</a></li>
                            <li class="menu-item-has-children">
                                <a href="#">Misc</a>
                                <ul class="dropdown">
                                    <li><a href="page-about.html">About Us</a></li>
                                    <li><a href="page-contact.html">Contact</a></li>
                                    <li><a href="page-privacy-policy.html">Privacy Policy</a></li>
                                    <li><a href="page-terms.html">Terms of Service</a></li>
                                </ul>
                            </li>
                            <!-- <li class="menu-item-has-children">
                                <a href="#">Language</a>
                                <ul class="dropdown">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </li> -->
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap">
                    <div class="single-mobile-header-info-wrap">
                    @if(auth()->check())
                        @if(auth()->user()->role === 'user')
                            <a href="{{ route('user.dashboard') }}"><i class="lable ml-0">Account</i></a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                <ul>
                                    <li>
                                        <a href="{{ route('user.dashboard') }}"><i class="fi fi-rs-user mr-10"></i>My Account</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.dashboard') }}"><i class="fi fi-rs-location-alt mr-10"></i>Order Tracking</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.dashboard') }}"><i class="fi fi-rs-label mr-10"></i>My Points</a>
                                    </li>
                                    <li>
                                        <a href="shop-wishlist.html"><i class="fi fi-rs-heart mr-10"></i>My Wishlist</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.dashboard') }}"><i class="fi fi-rs-settings-sliders mr-10"></i>Setting</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"><i class="fi fi-rs-sign-out mr-10"></i>Sign out</a>
                                    </li>
                                </ul>
                            </div>
                        @elseif(auth()->user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}">
                                <img class="svgInject" alt="VisionSphere" src="{{ asset('frontend/assets/imgs/theme/icons/icon-user.svg') }}" />
                            </a>
                            <a href="{{ route('admin.dashboard') }}"><span class="lable ml-0">Account</span></a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                <ul>
                                    <li>
                                        <a href="{{ route('admin.dashboard') }}"><i class="fi fi-rs-user mr-10"></i>Admin Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"><i class="fi fi-rs-sign-out mr-10"></i>Sign out</a>
                                    </li>
                                </ul>
                            </div>
                        @elseif(auth()->user()->role === 'vendor')
                            <a href="{{ route('vendor.dashboard') }}">
                                <img class="svgInject" alt="VisionSphere" src="{{ asset('frontend/assets/imgs/theme/icons/icon-user.svg') }}" />
                            </a>
                            <a href="{{ route('vendor.dashboard') }}"><span class="lable ml-0">Account</span></a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                <ul>
                                    <li>
                                        <a href="{{ route('vendor.dashboard') }}"><i class="fi fi-rs-user mr-10"></i>Vendor Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"><i class="fi fi-rs-sign-out mr-10"></i>Sign out</a>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    @else
                        <a href="{{ route('login') }}">
                            <img class="svgInject" alt="VisionSphere" src="{{ asset('frontend/assets/imgs/theme/icons/icon-user.svg') }}" />
                        </a>
                        <a href="{{ route('login') }}"><span class="lable ml-0">Login</span></a>
                        <span class="lable" style="margin-left: 2px; margin-right: 2px;"> | </span>
                        <a href="{{ route('register') }}"><span class="lable ml-0">Register</span></a>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--End header-->
