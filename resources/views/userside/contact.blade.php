@extends('userside.layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="container py-4">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="mb-3">Contact Us</h1>
            <p class="text-muted">Get in touch with us. We're here to help!</p>
        </div>
    </div>
    
    <!-- Success Message -->
    @if(session('success'))
    <div class="row mb-4">
        <div class="col-12">
            <div class="alert alert-success">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
            </div>
        </div>
    </div>
    @endif
    
    <div class="row">
        <!-- Contact Form -->
        <div class="col-md-7 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Send us a Message</h5>
                    
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" 
                                   required placeholder="Enter your name">
                        </div>
                        
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" 
                                   required placeholder="Enter your email">
                        </div>
                        
                        <!-- Message -->
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" 
                                      rows="5" required placeholder="Enter your message"></textarea>
                        </div>
                        
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane me-2"></i> Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Contact Information -->
        <div class="col-md-5 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Contact Information</h5>
                    
                    <div class="contact-info mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="contact-icon me-3">
                                <i class="fas fa-map-marker-alt text-primary"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Our Address</h6>
                                <p class="text-muted mb-0">123 Street, City, Country</p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center mb-3">
                            <div class="contact-icon me-3">
                                <i class="fas fa-phone text-primary"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Phone Number</h6>
                                <p class="text-muted mb-0">+1 234 567 8900</p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center mb-3">
                            <div class="contact-icon me-3">
                                <i class="fas fa-envelope text-primary"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Email Address</h6>
                                <p class="text-muted mb-0">support@shopeasy.com</p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center">
                            <div class="contact-icon me-3">
                                <i class="fas fa-clock text-primary"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Working Hours</h6>
                                <p class="text-muted mb-0">Mon - Fri: 9AM - 6PM</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Social Links -->
                    <div class="mt-4">
                        <h6 class="mb-3">Follow Us</h6>
                        <div class="social-links">
                            <a href="#" class="text-primary me-3">
                                <i class="fab fa-facebook fa-lg"></i>
                            </a>
                            <a href="#" class="text-primary me-3">
                                <i class="fab fa-twitter fa-lg"></i>
                            </a>
                            <a href="#" class="text-primary me-3">
                                <i class="fab fa-instagram fa-lg"></i>
                            </a>
                            <a href="#" class="text-primary">
                                <i class="fab fa-linkedin fa-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .contact-icon {
        width: 40px;
        height: 40px;
        background-color: rgba(67, 97, 238, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .card {
        border-radius: 10px;
        border: none;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .card-body {
        padding: 30px;
    }
    
    .form-control {
        border: 1px solid #dee2e6;
        border-radius: 8px;
        padding: 10px 15px;
    }
    
    .form-control:focus {
        border-color: #4361ee;
        box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
    }
    
    .btn-primary {
        padding: 10px 30px;
        border-radius: 8px;
        font-weight: 500;
    }
    
    .social-links a {
        transition: all 0.3s;
    }
    
    .social-links a:hover {
        transform: translateY(-3px);
    }
</style>
@endsection