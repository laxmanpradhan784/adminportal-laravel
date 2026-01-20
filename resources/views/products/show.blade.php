@extends('layouts.app')

@section('title', 'Product Details')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <i class="fas fa-box"></i> Product Details
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning me-2">
            <i class="fas fa-edit"></i> Edit
        </a>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Products
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <h5 class="text-muted mb-3">Product Information</h5>
                        <table class="table table-borderless">
                            <tr>
                                <th width="40%">ID:</th>
                                <td><strong>#{{ $product->id }}</strong></td>
                            </tr>
                            <tr>
                                <th>Name:</th>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <th>Description:</th>
                                <td>{{ $product->description ?: 'No description' }}</td>
                            </tr>
                            <tr>
                                <th>Price:</th>
                                <td>
                                    <span class="badge bg-success fs-6">${{ number_format($product->price, 2) }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Quantity:</th>
                                <td>
                                    @if($product->quantity > 10)
                                        <span class="badge bg-success">{{ $product->quantity }} units in stock</span>
                                    @elseif($product->quantity > 0)
                                        <span class="badge bg-warning">{{ $product->quantity }} units left</span>
                                    @else
                                        <span class="badge bg-danger">Out of stock</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>
                                    @if($product->status)
                                        <span class="badge bg-success">
                                            <i class="fas fa-check-circle"></i> Active
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            <i class="fas fa-times-circle"></i> Inactive
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="col-md-6 mb-4">
                        <h5 class="text-muted mb-3">Timestamps</h5>
                        <table class="table table-borderless">
                            <tr>
                                <th width="50%">Created At:</th>
                                <td>{{ $product->created_at->format('F d, Y h:i A') }}</td>
                            </tr>
                            <tr>
                                <th>Updated At:</th>
                                <td>{{ $product->updated_at->format('F d, Y h:i A') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                @if($product->image)
                <div class="mt-4">
                    <h5 class="text-muted mb-3">Product Image</h5>
                    <div class="text-center">
                        <div class="position-relative d-inline-block">
                            <img src="{{ Storage::url($product->image) }}" 
                                 alt="{{ $product->name }}"
                                 class="img-fluid rounded shadow" 
                                 style="max-height: 400px;">
                            <a href="{{ Storage::url($product->image) }}" 
                               target="_blank"
                               class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-25 text-white text-decoration-none">
                                <div class="bg-dark bg-opacity-75 p-3 rounded">
                                    <i class="fas fa-expand me-2"></i> View Full Size
                                </div>
                            </a>
                        </div>
                        <div class="mt-3">
                            <a href="{{ Storage::url($product->image) }}" 
                               target="_blank" 
                               class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-external-link-alt"></i> Open Image in New Tab
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 mt-4 mt-lg-0">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0"><i class="fas fa-cogs"></i> Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit Product
                    </a>
                    
                    <form action="{{ route('products.destroy', $product) }}" 
                          method="POST" 
                          class="d-grid"
                          onsubmit="return confirm('Are you sure you want to delete this product? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Delete Product
                        </button>
                    </form>
                    
                    <a href="{{ route('products.create') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i> Create New Product
                    </a>
                    
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-list"></i> View All Products
                    </a>
                </div>
            </div>
        </div>
        
        <div class="card shadow-sm mt-3">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-chart-line"></i> Stock Information</h5>
            </div>
            <div class="card-body">
                <div class="alert alert-success">
                    <i class="fas fa-check-circle me-2"></i>
                    <strong>Good Stock:</strong> {{ $product->quantity > 10 ? 'Yes' : 'No' }}
                </div>
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Low Stock:</strong> {{ $product->quantity > 0 && $product->quantity <= 10 ? 'Yes' : 'No' }}
                </div>
                <div class="alert alert-danger">
                    <i class="fas fa-times-circle me-2"></i>
                    <strong>Out of Stock:</strong> {{ $product->quantity == 0 ? 'Yes' : 'No' }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection