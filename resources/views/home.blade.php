@extends('userside.layouts.app')

@section('title', 'home')

@section('content')

    <div class="welcome-container">
        <div class="container">
            <div class="welcome-card">
                <!-- Logo & Heading -->
                <div class="text-center mb-5">
                    <div class="logo">
                        <i class="fas fa-store"></i>
                    </div>
                    <h1 class="display-4 fw-bold mb-3">Welcome to ShopEasy</h1>
                    <p class="lead text-muted mb-4">
                        Your one-stop destination for all shopping needs. Quality products, best prices.
                    </p>
                </div>
                
                <!-- Features -->
                <div class="row mb-5">
                    <div class="col-md-4 mb-4">
                        <div class="feature-box">
                            <div class="feature-icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <h4>Easy Shopping</h4>
                            <p class="text-muted">Browse and shop from thousands of products with ease.</p>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-4">
                        <div class="feature-box">
                            <div class="feature-icon">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <h4>Fast Delivery</h4>
                            <p class="text-muted">Get your products delivered quickly to your doorstep.</p>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-4">
                        <div class="feature-box">
                            <div class="feature-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <h4>Secure Payment</h4>
                            <p class="text-muted">Safe and secure payment options for all transactions.</p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
@endsection