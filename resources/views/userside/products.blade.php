@extends('userside.layouts.app')

@section('title', 'Products')

@section('content')
<div class="container py-4">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="mb-3">Our Products</h1>
            <p class="text-muted">Browse our collection of quality products</p>
        </div>
    </div>
    
    <!-- Products Grid -->
    <div class="row">
        @foreach($products as $product)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card product-card h-100">
                <!-- Product Image -->
                <div class="card-img-top text-center py-3 bg-light">
                    <img src="{{ $product['image'] }}" 
                         alt="{{ $product['name'] }}" 
                         class="img-fluid" 
                         style="max-height: 180px;">
                </div>
                
                <!-- Product Details -->
                <div class="card-body">
                    <h5 class="card-title">{{ $product['name'] }}</h5>
                    <p class="text-muted mb-3">{{ $product['description'] }}</p>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="text-primary mb-0">${{ number_format($product['price'], 2) }}</h4>
                        <span class="badge bg-success">In Stock</span>
                    </div>
                </div>
                
                <!-- Actions -->
                <div class="card-footer bg-white border-0 pt-0">
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary">
                            <i class="fas fa-shopping-cart me-2"></i> Add to Cart
                        </button>
                        <button class="btn btn-outline-primary">
                            <i class="fas fa-heart me-2"></i> Add to Wishlist
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .product-card {
        border: 1px solid #eaeaea;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    
    .card-img-top {
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .card-body {
        padding: 20px;
    }
    
    .card-footer {
        padding: 0 20px 20px 20px;
    }
    
    .badge {
        font-size: 0.9rem;
        padding: 6px 12px;
    }
</style>
@endsection