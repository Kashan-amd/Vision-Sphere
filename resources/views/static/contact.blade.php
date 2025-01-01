@extends('frontend.components.master')

@section('content')
 <style>
        .contact-content h1,
        .contact-content h2 {
            color: #333;
        }
        .contact-content p,
        .contact-content ul {
            color: #666;
        }
        .contact-content ul {
            list-style-type: none;
            padding: 0;
        }
        .contact-content ul li {
            margin-bottom: 0.5rem;
        }
        .contact-content a {
            color: #007bff;
            font-weight: 600;
        }
        .btn-primary {
            border: none;
            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.1);
            font-weight: 600;
        }
        .btn:hover {
            background-color: #00c1ff;
        }
    </style>
    <div class="container" style="min-height: 80vh; padding: 3rem 2rem;">
        <div class="contact-content p-4 rounded shadow row">
            
            <div class="col-lg-6 p-4">
                <h1 class="mb-4" style="font-size: 2.5rem; font-weight: 700;">
                    Contact Us
                </h1>

                <h2 class="mb-2 mt-4" style="font-size: 1.75rem; font-weight: 600;">Get in Touch</h2>
                <p style="line-height: 1.8;">
                    We would love to hear from you! <br>If you have any questions, comments, or concerns, <br>please feel free to reach out to us.
                </p>

                <h2 class="mb-2 mt-4" style="font-size: 1.75rem; font-weight: 600;">Our Contact Information</h2>
                <ul>
                    <li>
                        <strong>Email:</strong> <a href="mailto:support@visionsphere.com">support@visionsphere.com</a>
                    </li>
                    <li>
                        <strong>Phone:</strong> <a href="tel:+123456789">090078601 Telephone!!</a>
                    </li>
                    <li>
                        <strong>Address:</strong> 123 Vision St, Eyewear City, Pakistan
                    </li>
                </ul>

                <h2 class="mb-2 mt-4" style="font-size: 1.75rem; font-weight: 600;">Business Hours</h2>
                <p>
                    Our team is available to assist you during the following hours:
                </p>
                <ul>
                    <li>Monday - Friday: 9:00 AM - 5:00 PM</li>
                    <li>Saturday: 10:00 AM - 4:00 PM</li>
                    <li>Sunday: Closed</li>
                </ul>
            </div>

            <div class="col-lg-6 p-4 shadow rounded">
                <h2 class="mb-4" style="font-weight: 600;">Shoot us a Message!</h2>
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="message" name="message" placeholder="Your Message" style="height: 250px; width: 100%; resize: vertical;"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Send Message 💌</button>
                </form>
            </div>

        </div>
    </div>
@endsection
@php
    $hideFooter = true;
    $hideFooterOnMobile = true;
@endphp
