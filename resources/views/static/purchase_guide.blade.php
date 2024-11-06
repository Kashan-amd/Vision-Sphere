@extends('frontend.components.master')

@section('content')
<div class="container" style="min-height: 80vh; padding: 2rem 1rem;">
    <div class="purchase-guide-content" style="margin: 0 20px;"> <!-- Adjusted margins -->
        
        <h1 style="font-size: 3rem; font-weight: 800; text-align: center; margin: 3rem 0 1rem 0;">
            Purchase Guide
        </h1>

        <p style="text-align: left;">
            Welcome to the Vision-Sphere Purchase Guide! This guide will help you through the process of selecting and purchasing eyewear from our website and mobile application. Follow these simple steps to ensure a smooth shopping experience.
        </p>

        <h2 style="font-size: 1.5rem; font-weight: 600; margin-top: 2rem;">1. Browsing Products</h2>
        <p style="text-align: left;">
            To browse our collection of eyewear brands, visit the <strong>Shop by</strong> section from the homepage. You can filter products by category, brand, price range, and more to find exactly what you're looking for.
        </p>

        <h2 style="font-size: 1.5rem; font-weight: 600; margin-top: 2rem;">2. Selecting Eyewear</h2>
        <p style="text-align: left;">
            Once you find a product you're interested in, click on the product image or title to view more details. Here, you can see images, descriptions, specifications, and customer reviews. Make sure to select your preferred options (like color and size) before adding to your cart.
        </p>

        <h2 style="font-size: 1.5rem; font-weight: 600; margin-top: 2rem;">3. Virtual Try-On Feature</h2>
        <p style="text-align: left;">
            Vision-Sphere offers an innovative <strong>Virtual Try-On (VTON)</strong> feature that allows you to see how eyewear will look on you before making a purchase. To use this feature:
        </p>
        <ul style="text-align: left; padding-left: 1.5rem;">
            <li>Choose the <strong>Virtual Try-On</strong> option available on the product page.</li>
            <li>Allow access to your camera so the feature can capture your facial measurements.</li>
            <li>Once activated, the application will overlay the selected eyewear on your face in real-time, helping you find the perfect fit.</li>
        </ul>

        <h2 style="font-size: 1.5rem; font-weight: 600; margin-top: 2rem;">4. Adding to Cart</h2>
        <p style="text-align: left;">
            After selecting your eyewear, whether through traditional browsing or using the VTON feature, click the <strong>Add to Cart</strong> button. A confirmation message will appear, and you can choose to continue shopping or proceed to checkout.
        </p>

        <h2 style="font-size: 1.5rem; font-weight: 600; margin-top: 2rem;">5. Reviewing Your Cart</h2>
        <p style="text-align: left;">
            To review the items in your cart, click on the cart icon in the top right corner of the page. Here, you can update quantities, remove items, or apply discount codes before proceeding to checkout.
        </p>

        <h2 style="font-size: 1.5rem; font-weight: 600; margin-top: 2rem;">6. Checking Out</h2>
        <p style="text-align: left;">
            When you're ready to complete your purchase, click the <strong>Checkout</strong> button. You'll be prompted to log in or create an account if you haven't already. 
        </p>
        <p style="text-align: left;">
            Fill in your shipping details, select a payment method, and review your order summary. Make sure all information is accurate before proceeding.
        </p>

        <h2 style="font-size: 1.5rem; font-weight: 600; margin-top: 2rem;">7. Completing Your Purchase</h2>
        <p style="text-align: left;">
            After confirming your order details, click the <strong>Complete Purchase</strong> button. You will receive an order confirmation email with your purchase details and estimated delivery time.
        </p>

        <h2 style="font-size: 1.5rem; font-weight: 600; margin-top: 2rem;">8. Need Help?</h2>
        <p style="text-align: left;">
            If you encounter any issues or have questions during your purchase, our customer support team is here to help! Contact us at <strong>visionsphere@gmail.com</strong> or visit our <strong>Contact Us</strong> page.
        </p>

        <h2 style="font-size: 1.5rem; font-weight: 600; margin-top: 2rem;">Happy Shopping!</h2>
        <p style="text-align: left;">
            Thank you for choosing Vision-Sphere for your eyewear needs. We hope you enjoy your shopping experience!
        </p>

    </div>
</div>
@endsection
