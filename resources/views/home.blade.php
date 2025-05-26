@extends('layouts.app')

@section('title', 'JobSearch - Find Your Dream Job')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush
@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title">Find your design<br>dream job</h1>
                <p class="hero-subtitle">Discover thousands of job opportunities and take the next step in your career journey.</p>
            </div>
            <div class="hero-illustration">
                <div class="illustration-container">
                    <div class="cloud cloud-1"></div>
                    <div class="cloud cloud-2"></div>
                    <div class="paper-plane"></div>
                    <div class="design-tool"></div>
                </div>
            </div>
        </div>
        
        <!-- Search Form -->
        <div class="search-container">
            <form action="{{ route('jobs.index') }}" method="GET" class="search-form">
                <div class="search-inputs">
                    <div class="input-group">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" name="search" class="search-input" 
                               placeholder="Job Title or Keywords" 
                               value="{{ request('search') }}">
                    </div>
                    <div class="input-divider"></div>
                    <div class="input-group">
                        <i class="fas fa-map-marker-alt location-icon"></i>
                        <input type="text" name="location" class="search-input" 
                               placeholder="Bucharest, Romania" 
                               value="{{ request('location') }}">
                    </div>
                    <button type="submit" class="search-btn">Find Jobs</button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Latest Postings Section -->
<section class="latest-postings">
        <div class="container">
            <h2 class="section-title">Latest Jobs</h2>
            <div class="jobs-grid">
                <div class="job-card featured">
                    <div class="job-content">
                        <h3 class="job-title">UX Researcher</h3>
                        <p class="job-company">Microsoft • Romania</p>
                        <div class="job-meta">
                            <span class="job-location">
                                <i class="fas fa-map-marker-alt"></i>
                                Bucharest, Romania
                            </span>
                            <span class="job-type">Full-time</span>
                        </div>
                        <p class="job-description">Lead user research initiatives and drive product decisions...</p>
                        <div class="job-footer">
                            <span class="job-salary">$75k - $95k</span>
                            <a href="#" class="btn-apply">Apply Now</a>
                        </div>
                    </div>
                </div>
                
                <div class="job-card">
                    <div class="job-content">
                        <h3 class="job-title">UX/UI Designer</h3>
                        <p class="job-company">Google • Romania</p>
                        <div class="job-meta">
                            <span class="job-location">
                                <i class="fas fa-map-marker-alt"></i>
                                Bucharest, Romania
                            </span>
                            <span class="job-type">Full-time</span>
                        </div>
                        <p class="job-description">Create intuitive and beautiful user experiences...</p>
                        <div class="job-footer">
                            <span class="job-salary">$65k - $85k</span>
                            <a href="#" class="btn-apply">Apply Now</a>
                        </div>
                    </div>
                </div>
                
                <div class="job-card">
                    <div class="job-content">
                        <h3 class="job-title">User Experience Specialist</h3>
                        <p class="job-company">Adobe • Romania</p>
                        <div class="job-meta">
                            <span class="job-location">
                                <i class="fas fa-map-marker-alt"></i>
                                Cluj-Napoca, Romania
                            </span>
                            <span class="job-type">Remote</span>
                        </div>
                        <p class="job-description">Shape the future of creative software through user research...</p>
                        <div class="job-footer">
                            <span class="job-salary">$70k - $90k</span>
                            <a href="#" class="btn-apply">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="view-all-container">
                <a href="#" class="btn-view-all">View All Jobs</a>
            </div>
        </div>
    </section>

<!-- Features Section -->
<section class="features-section">
    <div class="container">
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-search"></i>
                </div>
                <h3>Smart Job Search</h3>
                <p>Find the perfect job with our advanced search filters and AI-powered recommendations.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Top Companies</h3>
                <p>Connect with leading companies and startups looking for talented professionals like you.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>Career Growth</h3>
                <p>Access resources and opportunities to advance your career and achieve your professional goals.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to find your dream job?</h2>
            <p>Join thousands of professionals who have found their perfect career match.</p>
            <div class="cta-buttons">
                <a href="{{ route('jobs.index') }}" class="btn-primary">Browse Jobs</a>
                <a href="#" class="btn-secondary">Create Account</a>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="main-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>JobSearch</h3>
                <p>Your gateway to finding the perfect career opportunity.</p>
            </div>
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('jobs.index') }}">Jobs</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>For Job Seekers</h4>
                <ul>
                    <li><a href="#">Browse Jobs</a></li>
                    <li><a href="#">Career Advice</a></li>
                    <li><a href="#">Resume Builder</a></li>
                    <li><a href="#">Salary Guide</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>For Employers</h4>
                <ul>
                    <li><a href="#">Post a Job</a></li>
                    <li><a href="#">Find Candidates</a></li>
                    <li><a href="#">Pricing</a></li>
                    <li><a href="#">Resources</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} JobSearch. All rights reserved.</p>
        </div>
    </div>
</footer>
@endsection