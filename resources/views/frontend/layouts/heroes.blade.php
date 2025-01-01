
<!-- <div class="mobile-promotion" style="background-color:#67b1ce;margin:0 0 -20px 0;">
    <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>1 Month</strong> left</span>
</div> -->
<section class="home-slider position-relative mb-1 mt-15">

    <div class="container">
        <div class="home-slide-cover mt-10">
            <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">

                @php
                    $sliders = App\Models\Slider::all();
                @endphp

                @if ($sliders->isEmpty())
                    <div class="single-hero-slider single-animation-wrap" style="background-image: url({{ asset('frontend/assets/imgs/slider/slider.jpg') }})">
                        
                        <div class="slider-content ">
                            <h1 class="display-2 mb-40">
                                Elevate<br />
                                Your Look!
                            </h1>
                            <p class="mb-65" style="color:#2f4d63">Save up to 50% on your first order</p>
                        </div>
                    </div>
                @else
                    @foreach ($sliders as $slider)
                        @php
                            // Splitting the title into words
                            $words = explode(' ', $slider->title);
                            // Getting the first three words
                            $firstThreeWords = implode(' ', array_slice($words, 0, 3));
                            // Getting the rest of the title
                            $restOfTitle = implode(' ', array_slice($words, 3));
                        @endphp

                        <div class="single-hero-slider single-animation-wrap" style="background-image: url({{ asset('upload/sliders/'.$slider->image) }}); height:600px">
                            <div class="slider-content">
                                <h1 class="display-2 mb-40">
                                    {{ $firstThreeWords }}<br />
                                    {{ $restOfTitle }}
                                </h1>
                                <h6 class="mb-65">{{ $slider->short_title }}</h6>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
            <div class="slider-arrow hero-slider-1-arrow"></div>
        </div>

        <div class="mobile-promotion  mt-2" style="border-radius: 5px;">
        <div class="row text-center">
            <div class="col-4">
                <span class="promotion-title"><strong>Loyalty Points</strong></span>
                <p class="promotion-detail">Collect em' All!</p>
            </div>
            <div class="col-4">
                <span class="promotion-title"><strong>Wide Assortment</strong></span>
                <p class="promotion-detail">Mega Discounts!</p>
            </div>
            <div class="col-4">
                <span class="promotion-title"><strong>Return</strong></span>
                <p class="promotion-detail">Within 30 days!</p>
            </div>
        </div>
    </div>
    <div class="mobile-promotion  mt-2 shadow" style="border-radius: 5px;">
        <div class="row">
            <img height="100rem" width="100%" style="object-fit: cover;" src="{{ asset('frontend/assets/imgs/banner/banner.jpg') }}" alt="">
        </div>
    </div>
    </div>

</section>
<!--End hero slider-->


