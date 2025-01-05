@extends('frontend.components.master')

@section('content')

<style>
    .about-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 2rem 1rem;
        max-width: 90%;
        margin: auto;
        perspective: 1000px;
    }
    .about-content {
        padding: 2rem;
        border-radius: 20px;
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
        transform: rotateY(0deg) rotateX(5deg);
        transition: transform 0.3s ease-in-out;
        background: #fff;
        width: 100%;
        max-width: 1000px;
    }
    .about-content:hover {
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
        font-size: 1.75rem;
        font-weight: 700;
        margin-top: 1.5rem;
        color: black;
    }
    p {
        font-size: 1.2rem;
        color: #666;
        line-height: 1.8;
        text-align: justify;
    }
    .testimonial-box {
        background: #f9f9f9;
        padding: 1.5rem;
        border-radius: 8px;
        margin-top: 1rem;
    }
    .testimonial-box p {
        font-style: italic;
    }
    .about-container .about-content {
        text-align: center;
        max-width: 1000px;
    }
    

    /* Responsive styles */
    @media (max-width: 768px) {
        .about-content {
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
    }
</style>

<div class="about-container">
    <div class="about-content">
        
        <h1>About Us</h1>
        <h2>Our Story</h2>
        <p>
            Founded in 2024 in Pakistan, Vision-Sphere started as a Final Year Project, but it was fueled by a bigger ambition: to redefine how people experience eyewear. We shared a vision of making high-quality eyewear accessible and affordable, breaking down the barriers of traditional pricing and exclusivity in the industry. It's a movement that encourages people to embrace their individuality and style with confidence, allowing you to find your perfect frames from the comfort of your home.
        </p>
        
        <h2>Our Commitment</h2>
        <p>
            At Vision-Sphere, we are dedicated to sustainability and ethical practices. We carefully source our materials and work closely with responsible vendors who share our commitment to the environment. We believe in giving back to our community and ensuring that our business practices align with our values.
        </p>
        
        <h2>Innovation & Technology</h2>
        <p>
            Vision-Sphere is at the forefront of integrating technology with eyewear. We are passionate about using innovative solutions to enhance our customers' experience, from our advanced Virtual Try-On feature that allows you to find the perfect fit right from your device to our frame recommendations based on face shape and personal style. We invest in technology not just for convenience, but to make eyewear shopping an exciting, personalized journey.
        </p>
        
        <h2>Our Values</h2>
        <p>
            At Vision-Sphere, we value quality, integrity, and innovation. We strive to provide our customers with products that are not only stylish but also durable and made with the highest standards. We believe in transparency and honesty in all our dealings, and we are committed to continuous improvement and innovation.
        </p>
        
        
        <h2>Customer Feedback</h2>
        <p>
           We are constantly looking to improve and enhance your experience at Vision-Sphere. While we are still growing and perfecting our eyewear shopping journey, we would love to hear from you. Your feedback is invaluable as we work to create a service that exceeds your expectations.
        </p>
        <div  class="testimonial-box">
    <p>"We are gathering feedback from our users to better serve you. Your thoughts on our products and features will shape the future of Vision-Sphere."</p>
    <p>"Stay tuned for real customer reviews once we launch our full suite of eyewear and services. Your voice matters!"</p>
    <p>"Feel free to share your experience with us anytime by reaching out to our support team. We're committed to making eyewear shopping more accessible and enjoyable for everyone."</p>
    </div>

        
        <h2>Join Us on Our Journey</h2>
        <div  class="testimonial-box">
        <p>
            Thank you for being part of the Vision-Sphere family. Our journey is just beginning, and we're excited to have you with us as we grow. Together, let's change the way the world sees eyewear—one stylish, sustainable frame at a time. With your support, we look forward to setting new standards, challenging the norms, and creating a future where everyone can see clearly and live confidently.
        </p>
        </div>
    </div>
</div>
@endsection
@php
    $hideFooter = true;
    $hideFooterOnMobile = true;
@endphp

