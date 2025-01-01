@extends('frontend.components.master')

@section('content')
<div class="container" style="min-height: 80vh; padding: 2rem 1rem; display: flex; flex-direction: column; align-items: center;">
    <div class="about-content" style="max-width: 1000px; padding: 2rem; text-align: center; background: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 10px;">
        
        <!-- Centered main heading -->
        <h1 style="font-size: 3rem; font-weight: 800; color: #333; margin-bottom: 2rem;">
            About Us
        </h1>
        <div style="width: 80px; height: 4px; margin: 0.5rem auto 2rem auto;"></div>
        
        <h2 style="font-size: 1.75rem; font-weight: 700; margin-top: 1.5rem;">Our Story</h2>
        <p style="line-height: 1.8; color: #666; text-align: justify;">
            Founded in 2024 in Pakistan, Vision-Sphere started as a Final Year Project, but it was fueled by a bigger ambition: to redefine how people experience eyewear. We shared a vision of making high-quality eyewear accessible and affordable, breaking down the barriers of traditional pricing and exclusivity in the industry. It's a movement that encourages people to embrace their individuality and style with confidence, allowing you to find your perfect frames from the comfort of your home.
        </p>
        
        <h2 style="font-size: 1.75rem; font-weight: 700; margin-top: 1.5rem;">Our Commitment</h2>
        <p style="line-height: 1.8; color: #666; text-align: justify;">
            At Vision-Sphere, we are dedicated to sustainability and ethical practices. We carefully source our materials and work closely with responsible vendors who share our commitment to the environment. We believe in giving back to our community and ensuring that our business practices align with our values.
        </p>
        
        <h2 style="font-size: 1.75rem; font-weight: 700; margin-top: 1.5rem;">Innovation & Technology</h2>
        <p style="line-height: 1.8; color: #666; text-align: justify;">
            Vision-Sphere is at the forefront of integrating technology with eyewear. We are passionate about using innovative solutions to enhance our customers' experience, from our advanced Virtual Try-On feature that allows you to find the perfect fit right from your device to our frame recommendations based on face shape and personal style. We invest in technology not just for convenience, but to make eyewear shopping an exciting, personalized journey.
        </p>
        
        <h2 style="font-size: 1.75rem; font-weight: 700; margin-top: 1.5rem;">Our Values</h2>
        <p style="line-height: 1.8; color: #666; text-align: justify;">
            At Vision-Sphere, we value quality, integrity, and innovation. We strive to provide our customers with products that are not only stylish but also durable and made with the highest standards. We believe in transparency and honesty in all our dealings, and we are committed to continuous improvement and innovation.
        </p>
        
        <h2 style="font-size: 1.75rem; font-weight: 700; margin-top: 1.5rem;">Customer Reviews</h2>
        <p style="line-height: 1.8; color: #666; text-align: justify;">
            Our customers are at the heart of everything we do. Here’s what they have to say about their experience with Vision-Sphere:
        </p>
        <div style="background: #f9f9f9; padding: 1.5rem; border-radius: 8px; margin-top: 1rem;">
            <p style="font-style: italic;">"Vision-Sphere offers the best eyewear shopping experience I’ve ever had. Their virtual try-on feature is a game-changer!"</p>
            <p style="font-style: italic;">"I love the sustainable practices and the quality of the frames. Highly recommend!"</p>
            <p style="font-style: italic;">"The customer service at Vision-Sphere is top-notch. They really care about their customers."</p>
        </div>
        
        <h2 style="font-size: 1.75rem; font-weight: 700; margin-top: 1.5rem;">Join Us on Our Journey</h2>
        <p style="line-height: 1.8; color: #666; text-align: justify;">
            Thank you for being part of the Vision-Sphere family. Our journey is just beginning, and we're excited to have you with us as we grow. Together, let's change the way the world sees eyewear—one stylish, sustainable frame at a time. With your support, we look forward to setting new standards, challenging the norms, and creating a future where everyone can see clearly and live confidently.
        </p>
    </div>
</div>


@endsection
