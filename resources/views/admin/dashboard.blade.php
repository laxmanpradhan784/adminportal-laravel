@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Products</h5>
                <h2 class="card-text">{{ $totalProducts ?? 0 }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Users</h5>
                <h2 class="card-text">{{ $totalUsers ?? 0 }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Contacts</h5>
                <h2 class="card-text">{{ $totalContacts ?? 0 }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Sliders</h5>
                <h2 class="card-text">{{ $totalSliders ?? 0 }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Recent Products</h5>
            </div>
            <div class="card-body">
                @if(isset($recentProducts) && $recentProducts->count() > 0)
                <div class="list-group">
                    @foreach($recentProducts as $product)
                    <div class="list-group-item">
                        <div class="d-flex justify-content-between">
                            <div>
                                <strong>{{ $product->name }}</strong><br>
                                <small>Price: ${{ number_format($product->price, 2) }}</small>
                            </div>
                            <span class="badge bg-{{ $product->status ? 'success' : 'danger' }}">
                                {{ $product->status ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-muted">No products found.</p>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Recent Contacts</h5>
            </div>
            <div class="card-body">
                @if(isset($recentContacts) && $recentContacts->count() > 0)
                <div class="list-group">
                    @foreach($recentContacts as $contact)
                    <div class="list-group-item">
                        <div class="d-flex justify-content-between">
                            <div>
                                <strong>{{ $contact->subject }}</strong><br>
                                <small>{{ $contact->name }} ({{ $contact->email }})</small>
                            </div>
                            <span class="badge bg-{{ $contact->status == 'unread' ? 'warning' : 'success' }}">
                                {{ ucfirst($contact->status) }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-muted">No contact messages.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection