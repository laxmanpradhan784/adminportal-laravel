@extends('layouts.app')

@section('title', 'Slider Details')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <i class="fas fa-image"></i> Slider Details
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('sliders.edit', $slider) }}" class="btn btn-warning me-2">
            <i class="fas fa-edit"></i> Edit
        </a>
        <a href="{{ route('sliders.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Sliders
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <h5 class="text-muted mb-3">Basic Information</h5>
                        <table class="table table-borderless">
                            <tr>
                                <th width="40%">ID:</th>
                                <td><strong>#{{ $slider->id }}</strong></td>
                            </tr>
                            <tr>
                                <th>Title:</th>
                                <td>{{ $slider->title }}</td>
                            </tr>
                            <tr>
                                <th>Description:</th>
                                <td>{{ $slider->description ?: 'No description' }}</td>
                            </tr>
                            <tr>
                                <th>Display Order:</th>
                                <td>
                                    <span class="badge bg-info fs-6">{{ $slider->order }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>
                                    @if($slider->status)
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
                                <td>{{ $slider->created_at->format('F d, Y h:i A') }}</td>
                            </tr>
                            <tr>
                                <th>Updated At:</th>
                                <td>{{ $slider->updated_at->format('F d, Y h:i A') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                @if($slider->image)
                <div class="mt-4">
                    <h5 class="text-muted mb-3">Slider Image</h5>
                    <div class="text-center">
                        <div class="position-relative d-inline-block">
                            <img src="{{ Storage::url($slider->image) }}" 
                                 alt="{{ $slider->title }}"
                                 class="img-fluid rounded shadow" 
                                 style="max-height: 400px;">
                            <a href="{{ Storage::url($slider->image) }}" 
                               target="_blank"
                               class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-25 text-white text-decoration-none">
                                <div class="bg-dark bg-opacity-75 p-3 rounded">
                                    <i class="fas fa-expand me-2"></i> View Full Size
                                </div>
                            </a>
                        </div>
                        <div class="mt-3">
                            <a href="{{ Storage::url($slider->image) }}" 
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
                    <a href="{{ route('sliders.edit', $slider) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit Slider
                    </a>
                    
                    <form action="{{ route('sliders.destroy', $slider) }}" 
                          method="POST" 
                          class="d-grid"
                          onsubmit="return confirm('Are you sure you want to delete this slider? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Delete Slider
                        </button>
                    </form>
                    
                    <a href="{{ route('sliders.create') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i> Create New Slider
                    </a>
                    
                    <a href="{{ route('sliders.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-list"></i> View All Sliders
                    </a>
                </div>
            </div>
        </div>
        
        <div class="card shadow-sm mt-3">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-chart-line"></i> Status Information</h5>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Active Status:</strong> This slider will be displayed on the website.
                </div>
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Inactive Status:</strong> This slider will be hidden from the website.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection