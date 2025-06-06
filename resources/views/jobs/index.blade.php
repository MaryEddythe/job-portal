@extends('layouts.app')

@section('title', 'Browse Jobs')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/jobs.css') }}">
@endpush
@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title">Find Your Dream Job</h1>
                <p class="hero-subtitle">Search thousands of jobs from top companies and take<br>the next step in your career journey</p>
            </div>
            
            <div class="hero-search-card">
                <div class="search-header">
                    <form action="{{ route('jobs.index') }}" method="GET" class="search-form-card">
                        <div class="search-form-row">
                            <div class="search-input-group flex-2">
                                <i class="fas fa-search search-icon"></i>
                                <input type="text" name="search" class="search-input" 
                                    placeholder="Search jobs by title, keyword, or company" 
                                    value="{{ request('search') }}">
                            </div>
                            <div class="search-input-group">
                                <i class="fas fa-map-marker-alt location-icon"></i>
                                <input type="text" name="location" class="search-input" 
                                    placeholder="City, state, or 'Remote'" 
                                    value="{{ request('location') }}">
                            </div>
                            <button type="submit" class="search-submit-card">
                                Search Jobs
                                <span class="search-arrow">→</span>
                            </button>
                        </div>
                    </form>
                    <a href="{{ route('jobs.create') }}" class="post-job-btn">
                        <i class="fas fa-plus-circle"></i>
                        Post a Job
                    </a>
                </div>
                
                <div class="hero-job-types">
                    <span class="job-type-link">Remote</span>
                    <span class="job-type-link">Full-time</span>
                    <span class="job-type-link">Part-time</span>
                    <span class="job-type-link">Contract</span>
                    <span class="job-type-link">Internship</span>
                </div>
            </div>
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
                    <h4>
                        JOB TYPE
                        <button class="clear-filter">Clear</button>
                    </h4>
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
                    <h4>
                        LOCATION
                        <button class="clear-filter">Clear</button>
                    </h4>
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
                    <h4>
                        COMPANY
                        <button class="clear-filter">Clear</button>
                    </h4>
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
@endsection