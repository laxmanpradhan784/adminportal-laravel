@extends('userside.layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="container py-4">
    <!-- Profile Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="fas fa-user-circle fa-5x text-primary"></i>
                    </div>
                    <h2 class="mb-2">{{ Auth::user()->name }}</h2>
                    <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                    <div class="mt-2">
                        <span class="badge bg-success">Active Account</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Details -->
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Profile Details</h5>
                </div>
                <div class="card-body">
                    <!-- Name -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Full Name</label>
                        </div>
                        <div class="col-md-8">
                            <p class="mb-0">{{ Auth::user()->name }}</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Email Address</label>
                        </div>
                        <div class="col-md-8">
                            <p class="mb-0">{{ Auth::user()->email }}</p>
                        </div>
                    </div>

                    <!-- Account Type -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Account Type</label>
                        </div>
                        <div class="col-md-8">
                            <p class="mb-0">
                                @if(Auth::user()->role == 'admin')
                                    <span class="badge bg-danger">Administrator</span>
                                @else
                                    <span class="badge bg-primary">Regular User</span>
                                @endif
                            </p>
                        </div>
                    </div>

                    <!-- Member Since -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Member Since</label>
                        </div>
                        <div class="col-md-8">
                            <p class="mb-0">{{ Auth::user()->created_at->format('F d, Y') }}</p>
                        </div>
                    </div>

                    <!-- Last Login -->
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Last Login</label>
                        </div>
                        <div class="col-md-8">
                            <p class="mb-0">
                                @if(Auth::user()->last_login_at)
                                    {{ Auth::user()->last_login_at->format('M d, Y h:i A') }}
                                @else
                                    First login
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 10px;
    }
    
    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #eee;
        padding: 15px 20px;
    }
    
    .card-body {
        padding: 25px;
    }
    
    .form-label {
        color: #495057;
    }
    
    p {
        color: #212529;
        font-size: 16px;
    }
    
    .badge {
        font-size: 0.9em;
        padding: 5px 12px;
    }
</style>
@endsection