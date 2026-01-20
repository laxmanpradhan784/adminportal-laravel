@extends('layouts.app')

@section('title', 'Contact Messages')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <i class="fas fa-envelope"></i> Contact Messages
    </h1>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card bg-primary text-white">
            <div class="card-body text-center">
                <h6 class="card-title">Total Messages</h6>
                <h3 class="card-text">{{ $contacts->total() }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-warning text-white">
            <div class="card-body text-center">
                <h6 class="card-title">Unread</h6>
                <h3 class="card-text">{{ $contacts->where('status', 'unread')->count() }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success text-white">
            <div class="card-body text-center">
                <h6 class="card-title">Read</h6>
                <h3 class="card-text">{{ $contacts->where('status', 'read')->count() }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-info text-white">
            <div class="card-body text-center">
                <h6 class="card-title">Replied</h6>
                <h3 class="card-text">{{ $contacts->where('status', 'replied')->count() }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th width="5%">ID</th>
                        <th width="15%">Name</th>
                        <th width="20%">Email</th>
                        <th width="25%">Subject</th>
                        <th width="15%">Status</th>
                        <th width="15%">Date</th>
                        <th width="10%" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $contact)
                    <tr>
                        <td><strong>#{{ $contact->id }}</strong></td>
                        <td>{{ $contact->name }}</td>
                        <td>
                            <a href="mailto:{{ $contact->email }}" class="text-decoration-none">
                                <i class="fas fa-envelope me-1"></i> {{ $contact->email }}
                            </a>
                        </td>
                        <td>
                            <strong>{{ $contact->subject }}</strong>
                            <div class="text-muted small">{{ Str::limit($contact->message, 50) }}</div>
                        </td>
                        <td>
                            @if($contact->status == 'unread')
                                <span class="badge bg-warning">
                                    <i class="fas fa-envelope"></i> Unread
                                </span>
                            @elseif($contact->status == 'read')
                                <span class="badge bg-info">
                                    <i class="fas fa-envelope-open"></i> Read
                                </span>
                            @else
                                <span class="badge bg-success">
                                    <i class="fas fa-reply"></i> Replied
                                </span>
                            @endif
                        </td>
                        <td>{{ $contact->created_at->format('M d, Y') }}</td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="{{ route('contacts.show', $contact) }}" 
                                   class="btn btn-info btn-sm" 
                                   title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('contacts.destroy', $contact) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Delete this message?')">
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
                        <td colspan="7" class="text-center py-5">
                            <div class="empty-state">
                                <i class="fas fa-envelope fa-4x text-muted mb-3"></i>
                                <h4>No Contact Messages</h4>
                                <p class="text-muted">No messages have been received yet.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($contacts->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $contacts->links() }}
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
.btn-group .btn {
    margin: 0 2px;
}
</style>
@endsection