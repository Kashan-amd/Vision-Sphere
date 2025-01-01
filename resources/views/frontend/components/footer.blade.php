    <!-- Footer -->
    <footer class="main">
        <section class="newsletter mb-15 wow animate__animated animate__fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="position-relative newsletter-inner">
                            <div class="newsletter-content">
                                <h2 class="mb-20">
                                    Stay home & get your Fashion <br />
                                    trends from us!
                                </h2>
                                <p class="mb-45">Start Your Vision Trend with <span class="text-brand">VisionSphere</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative newsletter-inner-1">
                            <div class="newsletter-content">
                                <h3 style="background:white; border-radius:20px; padding:30px;">
                                    Something here also <br />
                                    buy from us, really buy now! <br />
                                    I mean honestly, right now..
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="featured-footer section-padding d-none d-lg-block d-md-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                            <div class="banner-text">
                                <h3 class="icon-box-title text-dark">Follow us!</h3>
                                <div class="mobile-social-icon">
                                    <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-facebook-white.svg') }}" alt="" /></a>
                                    <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-twitter-white.svg') }}" alt="" /></a>
                                    <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-instagram-white.svg') }}" alt="" /></a>
                                    <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-pinterest-white.svg') }}" alt="" /></a>
                                    <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-youtube-white.svg') }}" alt="" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon newsletter-content align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                            <form class="form-subcriber d-flex">
                                <input type="email" placeholder="Your emaill address" />
                                <button class="btn" style="width:auto" type="submit"><i class="fi-rs-paper-plane text-white"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                            <div class="banner-icon">
                                <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-4.svg') }}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Wide assortment</h3>
                                <p>Mega Discounts</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                            <div class="banner-icon">
                                <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-5.svg') }}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Easy returns</h3>
                                <p>Within 30 days</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col">
                        <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                            <div class="logo mb-30">
                                <a href="{{ '/' }}" class="mb-15"><img height="auto" src="{{ asset('frontend/assets/imgs/theme/logo-alt-white.png') }}" alt="logo" /></a>
                                <p class="font-lg text-heading text-white ml-15">something here.. like 3 to 4 lines, like something really interesting or like a really long slogan but have to add something real here...</p>
                            </div>
                            <ul class="contact-infor text-white ml-15 d-none d-lg-block d-md-block">
                                <li><strong><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-location.svg') }}" alt="" /></strong><span>somewhere, abc</span></li>
                                <li><strong><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-contact.svg') }}" alt="" /></strong><span>090078601</span></li>
                                <li><strong><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-email-2.svg') }}" alt="" /></strong><span>visionsphere@support.com</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-link-widget col wow animate__animated animate__fadeInUp d-none d-lg-block d-md-block" data-wow-delay=".3s">
                    </div>
                    <div class="footer-link-widget col wow animate__animated animate__fadeInUp d-none d-lg-block d-md-block" data-wow-delay=".1s">
                        <h4 class="widget-title">How to..</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="#">Choose Eyeglasses</a></li>
                            <li><a href="#">Fill out Prescription</a></li>
                            <li><a href="#">Loyalty points</a></li>
                            <li><a href="#">Order Out</a></li>
                        </ul>
                    </div>
                    <div class="footer-link-widget col wow animate__animated animate__fadeInUp d-none d-lg-block d-md-block" data-wow-delay=".2s">
                        <h4 class="widget-title">Account</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="{{ route('login') }}">Sign In</a></li>
                            <li><a href="{{ route('cart.index') }}">View Cart</a></li>
                            <li><a href="#">My Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="#">Shipping Details</a></li>
                        </ul>
                    </div>
                    <div class="footer-link-widget col wow animate__animated animate__fadeInUp d-none d-lg-block d-md-block" data-wow-delay=".4s">
                    <h4 class="widget-title">Company</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="{{ route('about') }}">About VisionSphere</a></li>
                            <li><a href="{{ route('why.vision.sphere') }}">Why Choose VisionSphere</a></li>
                            <li><a href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
                            <li><a href="{{ route('terms.service') }}">Terms &amp; Conditions</a></li>
                            <li><a href="{{ route('purchase.guide') }}">Purchase Guide</a></li>
                            <li><a href="{{ route('become.vendor') }}">Become a Vendor</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <div class="container-fluid last-footer pb-30 wow" data-wow-delay="0">
            <div class="row align-items-center">
                <div class="col-12 mb-30">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 text-center d-none d-lg-block d-md-block">
                    <p class="font-sm mb-0 text-white">&copy; 2024 <strong class="text-brand text-white">VisionSphere.</strong> All rights reserved</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->
