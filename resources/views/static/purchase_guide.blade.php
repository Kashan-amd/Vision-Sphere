@extends('frontend.components.master')

@section('content')

<style>
    .guide-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 2rem 1rem;
        max-width: 90%;
        margin: auto;
        perspective: 1000px;
    }
    .purchase-guide-content {
        padding: 2rem;
        border-radius: 20px;
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
        transform: rotateY(0deg) rotateX(5deg);
        transition: transform 0.3s ease-in-out;
    }
    .purchase-guide-content:hover {
        transform: rotateY(0deg) rotateX(0deg);
    }
    h1 {
        font-size: 3rem;
        font-weight: 800;
        text-align: center;
        margin: 3rem 0 1rem 0;
        color: black !important;
    }
    h2 {
        font-size: 2rem;
        font-weight: 600;
        margin-top: 2rem;
        color: black;
    }
    p {
        font-size: 1.2rem;
        color: #333;
        line-height: 1.6;
    }
    ul {
        padding-left: 1.5rem;
    }
    .step {
        display: flex;
        align-items: center;
        margin: 2rem 0;
        transform: perspective(1000px);
    }
    .step img {
        width: 200px;
        height: 200px;
        border-radius: 15px;
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
        margin-right: 2rem;
        transform: rotateY(-10deg);
    }
    .step .text {
        flex-grow: 1;
        transform: rotateY(10deg);
    }
    .virtual-tryon {
        display: flex;
        justify-content: space-around;
        align-items: center;
        padding: 2rem 2rem 4rem 2rem;
        background: #00c1ff;
        color: #ffffff;
        border-radius: 20px;
        margin: 2rem 0;
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
    }
    .virtual-tryon .instructions {
        flex-grow: 1;
    }
    .virtual-tryon img {
        width: 200px;
        height: 200px;
        border-radius: 10%;
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
    }
    .contact {
        background: #00c1ff;
        color: #ffffff;
        padding: 1rem 1rem 2rem 1rem;
        border-radius: 20px;
        text-align: center;
        margin: 2rem 0;
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
    }
    .outro {
        padding: 1rem;
        text-align: center;
        margin: 2rem 0;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        .purchase-guide-content, .contact, .outro, .virtual-tryon, .step {
            width: 100%;
            padding: 1rem;
        }
        h1 {
            font-size: 2rem;
        }
        h2 {
            font-size: 1.5rem;
        }
        p {
            font-size: 1rem;
        }
        .step {
            flex-direction: column;
            align-items: center;
        }
        .step img {
            margin: 0 0 1rem 0;
        }
        .virtual-tryon {
            flex-direction: column;
        }
        .virtual-tryon img {
            margin-top: 1rem;
        }
    }
</style>

<div class="guide-container">
    <div class="purchase-guide-content">
        
        <h1>Purchase Guide</h1>

        <p>
            Welcome to the Vision-Sphere Purchase Guide! This guide will help you through the process of selecting and purchasing eyewear from our website and mobile application. Follow these simple steps to ensure a smooth shopping experience.
        </p>

        <div class="step">
            <img class="hover-up" src="{{ asset('icons/glass.png') }}" alt="">
            <div class="text">
                <h2>1. Browsing Products</h2>
                <p>
                    To browse our collection of eyewear brands, visit the <strong>Shop by</strong> section from the homepage. You can filter products by category, brand, price range, and more to find exactly what you're looking for.
                <br>
                    Once you find a product you're interested in, click on the product image or title to view more details. Here, you can see images, descriptions, specifications, and customer reviews. Make sure to select your preferred options (like color and size) before adding to your cart.
                </p>
            </div>
        </div>

        <div class="virtual-tryon">
            <div class="instructions">
                <h2>2. Virtual Try-On Feature</h2>
                <p>
                    Vision-Sphere offers an innovative <strong>Virtual Try-On (VTON)</strong> feature that allows you to see how eyewear will look on you before making a purchase. To use this feature:
                </p>
                <ul>
                    <li>- Choose the <strong>Virtual Try-On</strong> option available on the product page.</li>
                    <li>- Allow access to your camera so the feature can capture your facial measurements.</li>
                    <li>- Once activated, the application will overlay the selected eyewear on your face in real-time, helping you find the perfect fit.</li>
                </ul>
            </div>
            <img class="hover-up" src="{{ asset('icons/fire.png') }}" alt="">
        </div>

        <div class="step">
            <img class="hover-up" src="{{ asset('icons/plus.png') }}" alt="">
            <div class="text">
                <h2>3. Adding to Cart</h2>
                <p>
                    After selecting your eyewear, whether through traditional browsing or using the VTON feature, click the <strong>Add to Cart</strong> button. A confirmation message will appear, and you can choose to continue shopping or proceed to checkout.
                </p>
            </div>
        </div>

        <div class="step">
            <img class="hover-up" src="{{ asset('icons/bag-alt.png') }}" alt="">
            <div class="text">
                <h2>4. Reviewing Your Cart</h2>
                <p>
                    To review the items in your cart, click on the cart icon in the top right corner of the page. Here, you can update quantities, remove items, or apply discount codes before proceeding to checkout.
                </p>
            </div>
        </div>

        <div class="step">
            <img class="hover-up" src="{{ asset('icons/tick.png') }}" alt="">
            <div class="text">
                <h2>5. Checking Out</h2>
                <p>
                    When you're ready to complete your purchase, click the <strong>Checkout</strong> button. You'll be prompted to log in or create an account if you haven't already.
                </p>
                <p>
                    Fill in your shipping details, select a payment method, and review your order summary. Make sure all information is accurate before proceeding.
                </p>
            </div>
        </div>

        <div class="step">
            <img class="hover-up" src="{{ asset('icons/thumbs-up.png') }}" alt="">
            <div class="text">
                <h2>6. Completing Your Purchase</h2>
                <p>
                    After confirming your order details, click the <strong>Complete Purchase</strong> button. You will receive an order confirmation email with your purchase details and estimated delivery time.
                </p>
            </div>
        </div>

        <div class="contact">
            <h2>7. Need Help?</h2>
            <p>
                If you encounter any issues or have questions during your purchase, our customer support team is here to help! Contact us at <strong>support@visionsphere.com</strong> or visit our <strong>Contact Us</strong> page.
            </p>
        </div>

    </div>
</div>
<div class="guide-container">
    <div class="outro">
        <p>
            Thank you for choosing Vision-Sphere for your eyewear needs. We hope you enjoy your shopping experience!
        </p>
        <h1 class="hover-up">🥳</h1>
        <h2>Happy Shopping!</h2>
    </div>
</div>




@endsection
@php
    $hideFooter = true;
@endphp