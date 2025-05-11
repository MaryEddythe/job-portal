@extends('layouts.app')

@section('title', 'Application Details')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('applications.index') }}">Applications</a></li>
                <li class="breadcrumb-item active" aria-current="page">Application #{{ $application->id }}</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-4 text-end">
        <form action="{{ route('applications.update-status', $application) }}" method="POST" class="d-inline">
            @csrf
            @method('PATCH')
            <div class="input-group">
                <select name="status" class="form-select">
                    <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="reviewing" {{ $application->status == 'reviewing' ? 'selected' : '' }}>Reviewing</option>
                    <option value="accepted" {{ $application->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                    <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
                <button type="submit" class="btn btn-primary">Update Status</button>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Application Details</h4>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $application->job->title }}</h5>
                <h6 class="card-subtitle mb-3 text-muted">{{ $application->job->company }}</h6>
                
                <div class="mb-4">
                    <h5>Applicant Information</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Name:</strong> {{ $application->name }}</p>
                            <p><strong>Email:</strong> {{ $application->email }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Phone:</strong> {{ $application->phone }}</p>
                            <p><strong>Applied:</strong> {{ $application->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <h5>Cover Letter</h5>
                    <div class="card-text">
                        @if($application->cover_letter)
                            {!! nl2br(e($application->cover_letter)) !!}
                        @else
                            <p class="text-muted">No cover letter provided.</p>
                        @endif
                    </div>
                </div>
                
                <div class="mb-4">
                    <h5>Resume</h5>
                    <a href="{{ asset('storage/' . $application->resume) }}" class="btn btn-outline-primary" target="_blank">
                        <i class="fas fa-file-pdf me-1"></i> View Resume
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header bg-light">
                <h5 class="mb-0">Application Status</h5>
            </div>
            <div class="card-body">
                <div class="text-center mb-3">
                    @if($application->status == 'pending')
                        <div class="badge bg-warning text-dark p-2 fs-6 w-100">Pending</div>
                    @elseif($application->status == 'reviewing')
                        <div class="badge bg-info p-2 fs-6 w-100">Reviewing</div>
                    @elseif($application->status == 'accepted')
                        <div class="badge bg-success p-2 fs-6 w-100">Accepted</div>
                    @elseif($application->status == 'rejected')
                        <div class="badge bg-danger p-2 fs-6 w-100">Rejected</div>
                    @endif
                </div>
                
                <div class="d-grid gap-2">
                    <a href="mailto:{{ $application->email }}" class="btn btn-outline-primary">
                        <i class="fas fa-envelope me-1"></i> Email Applicant
                    </a>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header bg-light">
                <h5 class="mb-0">Job Details</h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-building me-2"></i>Company:</span>
                        <span class="fw-bold">{{ $application->job->company }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-map-marker-alt me-2"></i>Location:</span>
                        <span class="fw-bold">{{ $application->job->location }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-briefcase me-2"></i>Job Type:</span>
                        <span class="fw-bold">{{ $application->job->job_type }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="far fa-calendar-alt me-2"></i>Deadline:</span>
                        <span class="fw-bold">{{ $application->job->deadline->format('M d, Y') }}</span>
                    </li>
                </ul>
                
                <div class="d-grid gap-2 mt-3">
                    <a href="{{ route('jobs.show', $application->job) }}" class="btn btn-outline-secondary">
                        <i class="fas fa-eye me-1"></i> View Job
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <a href="{{ route('applications.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back to Applications
        </a>
    </div>
</div>
@endsection