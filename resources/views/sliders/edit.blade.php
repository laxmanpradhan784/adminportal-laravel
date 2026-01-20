@extends('layouts.app')

@section('title', 'Edit Slider')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <i class="fas fa-edit"></i> Edit Slider
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('sliders.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Sliders
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('sliders.update', $slider) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="title" class="form-label">Slider Title *</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" name="title" value="{{ old('title', $slider->title) }}" 
                                   placeholder="Enter slider title" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" 
                                      rows="3" placeholder="Enter slider description">{{ old('description', $slider->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="order" class="form-label">Display Order</label>
                            <input type="number" class="form-control @error('order') is-invalid @enderror" 
                                   id="order" name="order" value="{{ old('order', $slider->order) }}" 
                                   min="0" placeholder="0">
                            @error('order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status *</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                <option value="1" {{ old('status', $slider->status) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $slider->status) == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label for="image" class="form-label">Slider Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                   id="image" name="image" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Leave empty to keep current image</small>
                            
                            @if($slider->image)
                            <div class="mt-3">
                                <p class="mb-2">Current Image:</p>
                                <div class="position-relative d-inline-block">
                                    <img src="{{ Storage::url($slider->image) }}" 
                                         alt="{{ $slider->title }}"
                                         class="img-thumbnail" style="max-width: 200px;">
                                    <a href="{{ Storage::url($slider->image) }}" 
                                       target="_blank"
                                       class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-50 text-white text-decoration-none">
                                        <i class="fas fa-search-plus"></i>
                                    </a>
                                </div>
                            </div>
                            @endif
                            
                            <div class="mt-3 text-center" id="imagePreviewContainer" style="display: none;">
                                <p class="text-muted mb-2">New Image Preview:</p>
                                <img id="imagePreview" class="img-thumbnail" style="max-width: 300px; max-height: 200px;">
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('sliders.index') }}" class="btn btn-outline-secondary me-md-2">
                                    <i class="fas fa-times"></i> Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Slider
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 mt-4 mt-lg-0">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-info-circle"></i> Slider Details</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <strong>ID:</strong> #{{ $slider->id }}
                    </li>
                    <li class="mb-2">
                        <strong>Created:</strong> {{ $slider->created_at->format('M d, Y') }}
                    </li>
                    <li class="mb-2">
                        <strong>Last Updated:</strong> {{ $slider->updated_at->format('M d, Y') }}
                    </li>
                    <li class="mb-2">
                        <strong>Current Status:</strong>
                        @if($slider->status)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </li>
                    @if($slider->image)
                    <li class="mb-2">
                        <strong>Image:</strong> 
                        <a href="{{ Storage::url($slider->image) }}" target="_blank" class="text-decoration-none">
                            View Full Image
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
// Image preview for new image
document.getElementById('image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const previewContainer = document.getElementById('imagePreviewContainer');
    const previewImage = document.getElementById('imagePreview');
    
    if (file) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImage.src = e.target.result;
            previewContainer.style.display = 'block';
        }
        
        reader.readAsDataURL(file);
    } else {
        previewContainer.style.display = 'none';
    }
});
</script>
@endsection