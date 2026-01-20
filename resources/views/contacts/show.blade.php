@extends('layouts.app')

@section('title', 'Contact Message Details')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <i class="fas fa-envelope-open"></i> Message Details
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Messages
        </a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle"></i> Message Information
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <table class="table table-borderless">
                            <tr>
                                <th width="40%">Message ID:</th>
                                <td><strong>#{{ $contact->id }}</strong></td>
                            </tr>
                            <tr>
                                <th>Name:</th>
                                <td>{{ $contact->name }}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>
                                    <a href="mailto:{{ $contact->email }}" class="text-decoration-none">
                                        <i class="fas fa-envelope me-1"></i> {{ $contact->email }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>Subject:</th>
                                <td><strong>{{ $contact->subject }}</strong></td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <table class="table table-borderless">
                            <tr>
                                <th width="40%">Status:</th>
                                <td>
                                    <form method="POST" action="{{ route('contacts.status.update', $contact) }}" class="d-inline">
                                        @csrf
                                        <select name="status" class="form-select form-select-sm d-inline w-auto" 
                                                onchange="this.form.submit()">
                                            <option value="unread" {{ $contact->status == 'unread' ? 'selected' : '' }}>Unread</option>
                                            <option value="read" {{ $contact->status == 'read' ? 'selected' : '' }}>Read</option>
                                            <option value="replied" {{ $contact->status == 'replied' ? 'selected' : '' }}>Replied</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <th>Sent Date:</th>
                                <td>{{ $contact->created_at->format('F d, Y h:i A') }}</td>
                            </tr>
                            <tr>
                                <th>Last Updated:</th>
                                <td>{{ $contact->updated_at->format('F d, Y h:i A') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="mt-4">
                    <h5 class="border-bottom pb-2 mb-3">
                        <i class="fas fa-comment-dots"></i> Message Content
                    </h5>
                    <div class="message-content p-3 bg-light rounded">
                        {!! nl2br(e($contact->message)) !!}
                    </div>
                </div>
                
                <div class="mt-4">
                    <h5 class="border-bottom pb-2 mb-3">
                        <i class="fas fa-reply"></i> Quick Actions
                    </h5>
                    <div class="btn-group" role="group">
                        <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" 
                           class="btn btn-success">
                            <i class="fas fa-reply"></i> Reply via Email
                        </a>
                        <form action="{{ route('contacts.destroy', $contact) }}" 
                              method="POST" 
                              class="d-inline"
                              onsubmit="return confirm('Are you sure you want to delete this message?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash"></i> Delete Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 mt-4 mt-lg-0">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0"><i class="fas fa-user-circle"></i> Contact Information</h5>
            </div>
            <div class="card-body">
                <div class="text-center mb-3">
                    <div class="contact-avatar mb-3">
                        <i class="fas fa-user fa-4x text-primary"></i>
                    </div>
                    <h5>{{ $contact->name }}</h5>
                    <p class="text-muted">{{ $contact->email }}</p>
                </div>
                
                <div class="contact-actions">
                    <a href="mailto:{{ $contact->email }}" class="btn btn-outline-primary btn-sm w-100 mb-2">
                        <i class="fas fa-envelope me-2"></i> Send Email
                    </a>
                    <button onclick="copyToClipboard('{{ $contact->email }}')" 
                            class="btn btn-outline-secondary btn-sm w-100 mb-2">
                        <i class="fas fa-copy me-2"></i> Copy Email
                    </button>
                </div>
            </div>
        </div>
        
        <div class="card shadow-sm mt-3">
            <div class="card-header bg-warning text-white">
                <h5 class="mb-0"><i class="fas fa-history"></i> Message Timeline</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled timeline">
                    <li class="mb-3">
                        <i class="fas fa-paper-plane text-primary me-2"></i>
                        <strong>Message Sent:</strong>
                        <div class="text-muted small">{{ $contact->created_at->format('M d, Y h:i A') }}</div>
                    </li>
                    <li class="mb-3">
                        <i class="fas fa-eye text-info me-2"></i>
                        <strong>Last Viewed:</strong>
                        <div class="text-muted small">{{ $contact->updated_at->format('M d, Y h:i A') }}</div>
                    </li>
                    <li>
                        <i class="fas fa-clock text-muted me-2"></i>
                        <strong>Time Since:</strong>
                        <div class="text-muted small">{{ $contact->created_at->diffForHumans() }}</div>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="card shadow-sm mt-3">
            <div class="card-header bg-danger text-white">
                <h5 class="mb-0"><i class="fas fa-exclamation-triangle"></i> Danger Zone</h5>
            </div>
            <div class="card-body">
                <p class="text-muted small mb-3">Once deleted, this message cannot be recovered.</p>
                <form action="{{ route('contacts.destroy', $contact) }}" 
                      method="POST" 
                      onsubmit="return confirm('⚠️ Are you absolutely sure? This will permanently delete the message!')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger w-100">
                        <i class="fas fa-trash"></i> Delete Permanently
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        alert('Email copied to clipboard: ' + text);
    }, function(err) {
        console.error('Could not copy text: ', err);
    });
}
</script>

<style>
.message-content {
    font-size: 1.1em;
    line-height: 1.6;
    white-space: pre-wrap;
}
.contact-avatar {
    width: 100px;
    height: 100px;
    margin: 0 auto;
    background: #f8f9fa;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 3px solid #e9ecef;
}
.timeline li {
    position: relative;
    padding-left: 20px;
}
.timeline li:before {
    content: '';
    position: absolute;
    left: 0;
    top: 5px;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: #6c757d;
}
.btn-group .btn {
    margin: 0 5px;
}
</style>
@endsection