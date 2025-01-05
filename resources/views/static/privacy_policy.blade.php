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
    .privacy-policy-content {
        padding: 2rem;
        border-radius: 20px;
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
        transform: rotateY(0deg) rotateX(5deg);
        transition: transform 0.3s ease-in-out;
    }
    .privacy-policy-content:hover {
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
    p, ul {
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
        background:rgb(244, 245, 245);
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
        background:rgb(245, 245, 245);
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
        .privacy-policy-content, .contact, .outro, .virtual-tryon, .step {
            width: 100%;
            padding: 1rem;
        }
        h1 {
            font-size: 2rem;
        }
        h2 {
            font-size: 1.5rem;
        }
        p, ul {
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
    <div class="privacy-policy-content">
        
        <h1>Privacy Policy</h1>
        
        <p>
            At Vision-Sphere, we respect your privacy and are committed to protecting your personal information. This Privacy Policy explains what information we collect, how we use it, and the choices you have. This Policy applies to Vision-Sphere’s mobile application and website (collectively, the “Services”).
        </p>
        
        <h2>1. Information We Collect</h2>
        <p>
            We collect different types of information for our business purposes
        </p>
        
        <ul>
            <li>We collect information that you provide directly to us, such as:
                <ul>
                    <li><strong>Account Information:</strong> Name, email address, and password when creating an account.</li>
                    <li><strong>Transaction Information:</strong> When you purchase through our Services, we collect billing and shipping details.</li>
                    <li><strong>User-Generated Content:</strong> Information you provide in feedback or other interactive features.</li>
                </ul>
            </li>
            <li><strong>Information from Third Parties:</strong> We may receive information from partners or affiliates to improve our Services, including demographic information and information from linked social media or third-party accounts.</li>
            <li><strong>Automatically Collected Information:</strong> We collect certain information about your use of our Services automatically, including:
                <ul>
                    <li><strong>Device and Usage Information:</strong> IP address, device type, and usage details.</li>
                    <li><strong>Cookies and Similar Technologies:</strong> To enhance your experience, we may collect information through cookies and similar tracking technologies.</li>
                </ul>
            </li>
        </ul>

        <div class="step">
        <img class="hover-up" src="{{ asset('icons/user-alt.png') }}" alt="">
            <div class="text">
                <h2>Account Information</h2>
                <p>We collect your name, email address, and password when you create an account.</p>
            </div>
        </div>

        <h2>2. How We Use Your Information</h2>
        <p>
            We use the information we collect to:
        </p>
        
        <ul>
            <li>Provide, maintain, and improve our Services.</li>
            <li>Process transactions and send updates related to your purchases.</li>
            <li>Communicate with you in case of any inconvenience.</li>
            <li>Protect against fraud, unauthorized activities, and other harmful actions.</li>
        </ul>
        
        <h2>3. Sharing of Information</h2>
        <p>
            We may share your information with:
        </p>
        
        <ul>
            <li><strong>Service Providers:</strong> For business support, such as payment processing.</li>
            <li><strong>Compliance with Laws:</strong> If required by law, to respond to legal requests or government investigations.</li>
        </ul>

        <h2>4. Facial Scans and Images</h2>
        <p>
            For certain online and app features, we may ask your permission for a facial scan or other images of you. For example, when using the Virtual Try-On in our App and Website, we use the technology with your camera to look at and measure multiple data points on your face. We use that information to place AR optical and sunglasses frames on your face in a realistic position and scale. We can also guide you to the best adjustment frames based on your facial data points. 
        </p>
        <p>
            We do not store any of these scans or measurements, and we only collect and use that data while you are using the Virtual Try-On feature. We do not share these scans or measurements with any third parties.
        </p>
        
        <div class="virtual-tryon">
            <div class="instructions">
                <h2>Virtual Try-On Instructions</h2>
                <p>To use this feature, allow the app to access your camera and follow the on-screen instructions to scan your face.</p>
            </div>
            <img class="hover-up" src="{{ asset('icons/key-alt.png') }}" alt="">
        </div>

        <h2>5. Data Security</h2>
        <p>
            We take reasonable measures to protect your information. However, no security system is impenetrable, and we cannot guarantee the complete security of your data.
        </p>
        
        <h2>6. Children’s Privacy</h2>
        <p>
            Our Services are not intended for individuals under 18, as payment transactions are also involved. We do not knowingly collect information from children.
        </p>
        
        <h2>7. Your Choices</h2>
        <ul>
            <li><strong>Access and Update:</strong> You may access or update your information within your account settings.</li>
            <li><strong>Account Deletion:</strong> To delete your account, contact us at <strong>support@visionsphere.com</strong>. Once deleted, we may retain certain information for legal or business purposes.</li>
        </ul>
        
        <ul>
            <li><strong>Right to Know:</strong> Request information about our data collection, use, and sharing practices.</li>
            <li><strong>Right to Delete:</strong> Request deletion of your personal information.</li>
            <li><strong>Right to Opt-Out:</strong> Opt-out of the sale of personal information, if applicable.</li>
        </ul>
        
        <p>
            To exercise these rights, please contact us at <strong>support@visionsphere.com</strong>.
        </p>
        
        <h2>8. Updates to this Privacy Policy</h2>
        <p>
            We may update this Policy from time to time. Any changes will be posted on this page and will reflect the latest revision.
        </p>
        <div class="step">
        <img class="hover-up" src="{{ asset('icons/bubble.png') }}" alt="">
            <div class="text">
                <h2>Contact Us</h2>
                <p>If you have questions regarding this Policy, contact us at <strong>support@visionsphere.com</strong>.</p>         </div>
        </div>
        
    </div>
</div>

@endsection
@php
    $hideFooter = true;
@endphp
