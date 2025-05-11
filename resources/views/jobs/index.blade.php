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
                <button type="submit" class="btn btn-primary w-100">Search</button>
            </div>
        </form>
    </div>
</div>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Featured Jobs</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#postJobModal">Post a Job</button>
    </div>

    @if($jobs->count() > 0)
        <div class="row g-4">
            @foreach($jobs as $job)
                <div class="col-md-4">
                    <div class="card job-card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-container bg-light text-primary rounded-circle d-flex justify-content-center align-items-center me-3" style="width: 50px; height: 50px;">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <div>
                                    <h5 class="card-title fw-bold mb-0">{{ $job->title }}</h5>
                                    <p class="card-subtitle text-muted small">{{ $job->company }}</p>
                                </div>
                            </div>
                            <p class="text-muted small mb-3">
                                <i class="fas fa-map-marker-alt me-1 text-primary"></i>{{ $job->location }}<br>
                                <i class="fas fa-dollar-sign me-1 text-success"></i>{{ $job->salary }}<br>
                                <i class="far fa-calendar-alt me-1 text-warning"></i>Posted {{ $job->created_at->diffForHumans() }}
                            </p>
                            <p class="card-text">{{ Str::limit($job->description, 100) }}</p>
                        </div>
                        <div class="card-footer bg-light d-flex justify-content-between align-items-center">
                            <a href="{{ route('jobs.show', $job) }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-info-circle me-1"></i>Details
                            </a>
                            <a href="{{ route('applications.create', $job) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-paper-plane me-1"></i>Apply
                            </a>
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

<!-- Post Job Modal -->
<div class="modal fade" id="postJobModal" tabindex="-1" aria-labelledby="postJobModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="postJobModalLabel">Post a Job</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('jobs.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Job Form -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Job Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="company" class="form-label">Company</label>
                        <input type="text" class="form-control" id="company" name="company" required>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" name="location" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="requirements" class="form-label">Requirements</label>
                        <textarea class="form-control" id="requirements" name="requirements" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="salary" class="form-label">Salary</label>
                        <input type="text" class="form-control" id="salary" name="salary" required>
                    </div>
                    <div class="mb-3">
                        <label for="job_type" class="form-label">Job Type</label>
                        <select class="form-select" id="job_type" name="job_type" required>
                            <option value="Full-time">Full-time</option>
                            <option value="Part-time">Part-time</option>
                            <option value="Contract">Contract</option>
                            <option value="Internship">Internship</option>
                            <option value="Remote">Remote</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Contact Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="deadline" class="form-label">Application Deadline</label>
                        <input type="date" class="form-control" id="deadline" name="deadline" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Post Job</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection