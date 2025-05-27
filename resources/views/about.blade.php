@extends('layouts.app')

@section('title', 'About Us')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endpush

@section('content')
<div class="about-hero">
    <div class="container">
        <div class="about-hero-content">
            <h1>Connecting Talent with Opportunity</h1>
            <p>Empowering careers and businesses through innovative job matching technology</p>
        </div>
    </div>
</div>

<div class="about-stats">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <span class="stat-number">2M+</span>
                <span class="stat-label">Active Users</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">150K</span>
                <span class="stat-label">Companies</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">500K</span>
                <span class="stat-label">Jobs Posted</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">98%</span>
                <span class="stat-label">Success Rate</span>
            </div>
        </div>
    </div>
</div>

<section class="about-section">
    <div class="container">
        <div class="about-grid">
            <div class="about-content">
                <h2>Our Mission</h2>
                <p>We're on a mission to transform how people find jobs and companies hire talent. Through our innovative platform, we're making the job search and hiring process more efficient, transparent, and successful for everyone involved.</p>
                
                <div class="features-grid">
                    <div class="feature-item">
                        <i class="fas fa-search"></i>
                        <h3>Smart Matching</h3>
                        <p>AI-powered job matching technology that connects the right talent with the right opportunities.</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-shield-alt"></i>
                        <h3>Verified Companies</h3>
                        <p>All companies are thoroughly vetted to ensure a safe and reliable job search experience.</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-chart-line"></i>
                        <h3>Career Growth</h3>
                        <p>Resources and tools to help you advance in your career journey.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="team-section">
    <div class="container">
        <h2>Our Leadership Team</h2>
        <div class="team-grid">
            <div class="team-member">
                <div class="member-photo">
                    <img src="https://via.placeholder.com/150" alt="CEO">
                </div>
                <h3>John Smith</h3>
                <span class="member-role">CEO & Founder</span>
            </div>
            <div class="team-member">
                <div class="member-photo">
                    <img src="https://via.placeholder.com/150" alt="CTO">
                </div>
                <h3>Sarah Johnson</h3>
                <span class="member-role">CTO</span>
            </div>
            <div class="team-member">
                <div class="member-photo">
                    <img src="https://via.placeholder.com/150" alt="COO">
                </div>
                <h3>Michael Brown</h3>
                <span class="member-role">COO</span>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to Get Started?</h2>
            <p>Join millions of job seekers and employers who trust our platform</p>
            <div class="cta-buttons">
                <a href="#" class="btn-primary">Create Account</a>
                <a href="{{ route('jobs.index') }}" class="btn-secondary">Browse Jobs</a>
            </div>
        </div>
    </div>
</section>
@endsection
