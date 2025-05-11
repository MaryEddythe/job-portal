@extends('layouts.app')

@section('title', 'Browse Jobs')

@section('content')
<div class="hero-section">
    <div class="container">
        <h1>Find Your Dream Job</h1>
        <p>Explore thousands of job opportunities and take the next step in your career.</p>
        <form action="{{ route('jobs.index') }}" method="GET" class="row g-2 justify-content-center mt-4">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Job title, keywords, or company" value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <input type="text" name="location" class="form-control" placeholder="Location" value="{{ request('location') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-dark w-100">Search</button>
            </div>
        </form>
    </div>
</div>

<div class="container mt-5">
    <h2 class="mb-4">Featured Jobs</h2>
    @if($jobs->count() > 0)
        <div class="row g-4">
            @foreach($jobs as $job)
                <div class="col-md-4">
                    <div class="card job-card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $job->title }}</h5>
                            <p class="card-subtitle text-muted mb-2">{{ $job->company }}</p>
                            <p class="text-muted small mb-3">
                                <i class="fas fa-map-marker-alt me-1"></i>{{ $job->location }}<br>
                                <i class="fas fa-dollar-sign me-1"></i>{{ $job->salary }}<br>
                                <i class="far fa-calendar-alt me-1"></i>Posted {{ $job->created_at->diffForHumans() }}
                            </p>
                            <p class="card-text">{{ Str::limit($job->description, 100) }}</p>
                        </div>
                        <div class="card-footer bg-white d-flex justify-content-between">
                            <a href="{{ route('jobs.show', $job) }}" class="btn btn-outline-primary btn-sm">View Details</a>
                            <a href="{{ route('applications.create', $job) }}" class="btn btn-primary btn-sm">Apply Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $jobs->links() }}
        </div>
    @else
        <div class="alert alert-info text-center">
            <i class="fas fa-info-circle me-2"></i> No jobs found. Please try a different search or check back later.
        </div>
    @endif
</div>
@endsection