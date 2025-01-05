@extends('frontend.components.master')

@section('content')

<style>
    .terms-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 2rem 1rem;
        max-width: 90%;
        margin: auto;
        perspective: 1000px;
    }
    .terms-content {
        padding: 2rem;
        border-radius: 20px;
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
        transform: rotateY(0deg) rotateX(5deg);
        transition: transform 0.3s ease-in-out;
        background: #fff;
        width: 100%;
        max-width: 1000px;
    }
    .terms-content:hover {
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
    
    /* Responsive styles */
    @media (max-width: 768px) {
        .terms-content {
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

<div class="terms-container">
    <div class="terms-content">
        
        <h1>Terms & Conditions</h1>

        <h2>1. Acceptance of Terms</h2>
        <p>
            By accessing or using our Services, you agree to be bound by these Terms, as well as our Privacy Policy. If you do not agree to these Terms, please do not use our Services.
        </p>
        
        <h2>2. Eligibility</h2>
        <p>
            You must be at least 18 years old to use our Services. By using the Services, you represent and warrant that you are of legal age and have the right, authority, and capacity to enter into these Terms.
        </p>
        
        <h2>3. Account Registration</h2>
        <p>
            To access certain features of our Services, you may need to register for an account. You agree to provide accurate, complete information and to keep it updated. You are responsible for maintaining the security of your account and are fully responsible for all activities that occur under your account.
        </p>
        
        <h2>4. Use of Services</h2>
        <p>
            You agree to use our Services only for lawful purposes and in accordance with these Terms. Prohibited uses include, but are not limited to:
        </p>
        
        <ul style="text-align: left; padding-left: 1.5rem;">
            <li>Engaging in any unlawful or fraudulent activity.</li>
            <li>Infringing upon the intellectual property rights of Vision-Sphere or others.</li>
            <li>Interfering with or disrupting the security or operation of our Services.</li>
        </ul>
        
        <h2>5. Intellectual Property</h2>
        <p>
            Vision-Sphere and its licensors retain all rights, title, and interest in the content, design, and functionality of our Services. You may not use, copy, or distribute any content without our written consent.
        </p>
        
        <h2>6. Limitation of Liability</h2>
        <p>
            To the fullest extent permitted by law, Vision-Sphere shall not be liable for any direct, indirect, incidental, special, or consequential damages resulting from the use or inability to use our Services, even if we have been advised of the possibility of such damages.
        </p>
        
        <h2>7. Termination</h2>
        <p>
            We reserve the right to suspend or terminate your access to our Services at our discretion, without notice, if you violate any part of these Terms.
        </p>
        
        <h2>8. Governing Law</h2>
        <p>
            These Terms shall be governed by the laws of Pakistan, without regard to its conflict of law principles. Any legal action or proceeding related to your access to or use of the Services will be instituted in the appropriate courts in Pakistan.
        </p>
        
        <h2>9. Changes to These Terms</h2>
        <p>
            We may update these Terms from time to time. Any changes will be posted on this page, and your continued use of the Services after such changes constitutes acceptance of the updated Terms.
        </p>
    
    </div>
</div>

@endsection

@php
    $hideFooter = true;
    $hideFooterOnMobile = true;
@endphp
