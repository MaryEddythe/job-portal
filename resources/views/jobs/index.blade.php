@extends('layouts.app')

@section('title', 'Browse Jobs')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">Find your dream job</h1>
            <form action="{{ route('jobs.index') }}" method="GET" class="search-form">
                <div class="search-inputs">
                    <div class="search-input-group">
                        <div class="input-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <input type="text" name="search" class="search-input" 
                               placeholder="Job title or keywords" 
                               value="{{ request('search') }}">
                    </div>
                    <div class="search-input-group">
                        <div class="input-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <input type="text" name="location" class="search-input" 
                               placeholder="Location" </div>
                               value="{{ request('location') }}">
                    </div>
                    <button type="submit" class="search-submit">
                        <span>Find Jobs</span>
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Main Content -->
<div class="main-content">
    <div class="container">
        <div class="content-grid">
            <!-- Sidebar Filters -->
            <aside class="filters-sidebar">
                <div class="filters-header">
                    <h3>Filters</h3>
                    <button class="clear-all">Clear All</button>
                </div>
                
                <div class="filter-group">
                    <h4>JOB TYPE</h4>
                    <button class="clear-filter">Clear</button>
                    <div class="filter-options">
                        <label class="filter-option">
                            <input type="checkbox" name="job_type[]" value="all">
                            <span>All (284)</span>
                        </label>
                        <label class="filter-option">
                            <input type="checkbox" name="job_type[]" value="full-time">
                            <span>Full Time (146)</span>
                        </label>
                        <label class="filter-option">
                            <input type="checkbox" name="job_type[]" value="part-time">
                            <span>Part Time (32)</span>
                        </label>
                        <label class="filter-option">
                            <input type="checkbox" name="job_type[]" value="contract">
                            <span>Contract (18)</span>
                        </label>
                        <label class="filter-option">
                            <input type="checkbox" name="job_type[]" value="internship">
                            <span>Internship (81)</span>
                        </label>
                        <label class="filter-option">
                            <input type="checkbox" name="job_type[]" value="freelance">
                            <span>Freelance (7)</span>
                        </label>
                    </div>
                </div>

                <div class="filter-group">
                    <h4>LOCATION</h4>
                    <button class="clear-filter">Clear</button>
                    <div class="filter-options">
                        <label class="filter-option">
                            <input type="checkbox" name="location[]" value="chicago">
                            <span>Chicago, IL (284)</span>
                        </label>
                        <label class="filter-option">
                            <input type="checkbox" name="location[]" value="niles">
                            <span>Niles, IL (64)</span>
                        </label>
                        <label class="filter-option">
                            <input type="checkbox" name="location[]" value="oak-brook">
                            <span>Oak Brook, IL (39)</span>
                        </label>
                    </div>
                </div>

                <div class="filter-group">
                    <h4>COMPANY</h4>
                    <button class="clear-filter">Clear</button>
                    <div class="filter-options">
                        <label class="filter-option">
                            <input type="checkbox" name="company[]" value="all">
                            <span>All (284)</span>
                        </label>
                        <label class="filter-option">
                            <input type="checkbox" name="company[]" value="abbott">
                            <span>Abbott (32)</span>
                        </label>
                        <label class="filter-option">
                            <input type="checkbox" name="company[]" value="deloitte">
                            <span>Deloitte Solutions (18)</span>
                        </label>
                    </div>
                </div>
            </aside>

            <!-- Job Listings -->
            <main class="job-listings">
                <div class="upload-resume-banner">
                    <div class="banner-content">
                        <i class="fas fa-file-upload"></i>
                        <div>
                            <h4>Upload your resume</h4>
                            <p>We'll match you with the best jobs. Right job, Right away!</p>
                        </div>
                    </div>
                </div>

                <div class="results-header">
                    <span class="results-count">284 results found</span>
                    <div class="sort-options">
                        <label>Sort By:</label>
                        <select name="sort">
                            <option value="date">Date Posted</option>
                            <option value="relevance">Relevance</option>
                            <option value="salary">Salary</option>
                        </select>
                    </div>
                </div>

                @if($jobs->count() > 0)
                    <div class="jobs-grid">
                        @foreach($jobs as $job)
                            <div class="job-card">
                                <div class="job-header">
                                    <div class="company-logo">
                                        <i class="fas fa-building"></i>
                                    </div>
                                    <div class="job-info">
                                        <h3 class="job-title">{{ $job->title }}</h3>
                                        <p class="company-name">{{ $job->company }} • {{ $job->location }}</p>
                                    </div>
                                    <button class="save-job">
                                        <i class="far fa-bookmark"></i>
                                        Save Job
                                    </button>
                                </div>
                                
                                <div class="job-details">
                                    <div class="job-meta">
                                        <span class="experience">Experience: 3 to 5 Years</span>
                                        <span class="job-type">Job Type: {{ $job->job_type }}
                                <div class="job-details">
                                    <div class="job-meta">
                                        <span class="experience">Experience: 3 to 5 Years</span>
                                        <span class="job-type">Job Type: {{ $job->job_type ?? 'Full-Time' }}</span>
                                        <span class="salary">Salary: {{ $job->salary }}</span>
                                    </div>
                                    <p class="job-description">{{ Str::limit($job->description, 120) }}</p>
                                    <div class="job-footer">
                                        <span class="posted-time">Posted {{ $job->created_at->diffForHumans() }}</span>
                                        <div class="job-actions">
                                            <a href="{{ route('jobs.show', $job) }}" class="btn-details">View Details</a>
                                            <a href="{{ route('applications.create', $job) }}" class="btn-apply">Apply Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="pagination-wrapper">
                        {{ $jobs->links() }}
                    </div>
                @else
                    <div class="no-results">
                        <i class="fas fa-search"></i>
                        <h3>No jobs found</h3>
                        <p>Try adjusting your search criteria or check back later for new opportunities.</p>
                    </div>
                @endif
            </main>

            <!-- Right Sidebar -->
            <aside class="right-sidebar">
                <div class="subscription-card">
                    <h4>Be the first to see new jobs in <span class="location-highlight">Chicago, IL</span></h4>
                    <form class="subscription-form">
                        <input type="email" placeholder="steve.scoffe34@gmail.com" class="email-input">
                        <button type="submit" class="subscribe-btn">Subscribe Now</button>
                    </form>
                    <p class="subscription-note">Not interested? <a href="#">Hide now</a></p>
                </div>

                <div class="popular-companies">
                    <h4>Popular in <span class="location-highlight">Chicago</span></h4>
                    <div class="companies-list">
                        <div class="company-item">
                            <img src="/placeholder.svg?height=24&width=24" alt="Workday">
                            <span>Workday</span>
                            <small>23 Jobs</small>
                        </div>
                        <div class="company-item">
                            <img src="/placeholder.svg?height=24&width=24" alt="Salesforce">
                            <span>Salesforce</span>
                            <small>18 Jobs</small>
                        </div>
                        <div class="company-item">
                            <img src="/placeholder.svg?height=24&width=24" alt="Marriott">
                            <span>Marriott International</span>
                            <small>15 Jobs</small>
                        </div>
                        <div class="company-item">
                            <img src="/placeholder.svg?height=24&width=24" alt="CarMax">
                            <span>CarMax</span>
                            <small>12 Jobs</small>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
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