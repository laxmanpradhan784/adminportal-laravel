@extends('layouts.app')

@section('title', 'Sliders Management')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <i class="fas fa-images"></i> Sliders Management
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('sliders.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Slider
        </a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th width="5%">ID</th>
                        <th width="25%">Title</th>
                        <th width="20%">Image</th>
                        <th width="10%">Order</th>
                        <th width="15%">Status</th>
                        <th width="25%" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sliders as $slider)
                    <tr>
                        <td><strong>#{{ $slider->id }}</strong></td>
                        <td>
                            <div class="fw-bold">{{ $slider->title }}</div>
                            @if($slider->description)
                                <small class="text-muted">{{ Str::limit($slider->description, 50) }}</small>
                            @endif
                        </td>
                        <td>
                            @if($slider->image)
                                <div class="position-relative" style="width: 120px; height: 60px;">
                                    <img src="{{ Storage::url($slider->image) }}" 
                                         alt="{{ $slider->title }}"
                                         class="img-thumbnail w-100 h-100 object-fit-cover">
                                    <a href="{{ Storage::url($slider->image) }}" 
                                       target="_blank" 
                                       class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-50 text-white text-decoration-none">
                                        <i class="fas fa-search-plus"></i>
                                    </a>
                                </div>
                            @else
                                <span class="badge bg-secondary">No Image</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-info fs-6">{{ $slider->order }}</span>
                        </td>
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
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="{{ route('sliders.show', $slider) }}" 
                                   class="btn btn-info btn-sm" 
                                   title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('sliders.edit', $slider) }}" 
                                   class="btn btn-warning btn-sm" 
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('sliders.destroy', $slider) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this slider?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <div class="empty-state">
                                <i class="fas fa-images fa-4x text-muted mb-3"></i>
                                <h4>No Sliders Found</h4>
                                <p class="text-muted">Get started by creating your first slider.</p>
                                <a href="{{ route('sliders.create') }}" class="btn btn-primary mt-3">
                                    <i class="fas fa-plus"></i> Create First Slider
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($sliders->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $sliders->links() }}
        </div>
        @endif
    </div>
</div>

<style>
.empty-state {
    text-align: center;
    padding: 40px 20px;
}
.empty-state i {
    opacity: 0.5;
}
.img-thumbnail {
    transition: transform 0.3s;
}
.img-thumbnail:hover {
    transform: scale(1.05);
}
.btn-group .btn {
    margin: 0 2px;
}
</style>
@endsection