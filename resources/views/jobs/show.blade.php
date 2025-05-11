@extends('layouts.app')

@section('title', $job->title)

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('jobs.index') }}">Jobs</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $job->title }}</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('applications.create', $job) }}" class="btn btn-primary">
            <i class="fas fa-paper-plane me-1"></i> Apply Now
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-body">
                <h1 class="card-title">{{ $job->title }}</h1>
                <h5 class="card-subtitle mb-3 text-muted">{{ $job->company }}</h5>
                
                <div class="mb-4">
                    <span class="badge bg-primary me-2">{{ $job->job_type }}</span>
                    <span class="text-muted me-3"><i class="fas fa-map-marker-alt me-1"></i>{{ $job->location }}</span>
                    <span class="text-muted me-3"><i class="fas fa-money-bill-wave me-1"></i>{{ $job->salary }}</span>
                    <span class="text-muted"><i class="far fa-calendar-alt me-1"></i>Deadline: {{ $job->deadline->format('M d, Y') }}</span>
                </div>
                
                <div class="mb-4">
                    <h5>Job Description</h5>
                    <div class="card-text">
                        {!! nl2br(e($job->description)) !!}
                    </div>
                </div>
                
                <div class="mb-4">
                    <h5>Requirements</h5>
                    <div class="card-text">
                        {!! nl2br(e($job->requirements)) !!}
                    </div>
                </div>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('applications.create', $job) }}" class="btn btn-primary">
                        <i class="fas fa-paper-plane me-1"></i> Apply for this Job
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header bg-light">
                <h5 class="mb-0">Job Overview</h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-building me-2"></i>Company:</span>
                        <span class="fw-bold">{{ $job->company }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-map-marker-alt me-2"></i>Location:</span>
                        <span class="fw-bold">{{ $job->location }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-briefcase me-2"></i>Job Type:</span>
                        <span class="fw-bold">{{ $job->job_type }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-money-bill-wave me-2"></i>Salary:</span>
                        <span class="fw-bold">{{ $job->salary }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="far fa-calendar-alt me-2"></i>Deadline:</span>
                        <span class="fw-bold">{{ $job->deadline->format('M d, Y') }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="far fa-clock me-2"></i>Posted:</span>
                        <span class="fw-bold">{{ $job->created_at->diffForHumans() }}</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header bg-light">
                <h5 class="mb-0">Contact Information</h5>
            </div>
            <div class="card-body">
                <p><i class="fas fa-envelope me-2"></i>{{ $job->email }}</p>
                
                <div class="d-grid gap-2">
                    <a href="mailto:{{ $job->email }}" class="btn btn-outline-primary">
                        <i class="fas fa-envelope me-1"></i> Send Email
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('jobs.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i> Back to Jobs
            </a>
            
            <div>
                <a href="{{ route('jobs.edit', $job) }}" class="btn btn-outline-primary me-2">
                    <i class="fas fa-edit me-1"></i> Edit
                </a>
                <form action="{{ route('jobs.destroy', $job) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this job?')">
                        <i class="fas fa-trash-alt me-1"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection