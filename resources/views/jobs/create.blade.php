@extends('layouts.app')

@section('title', 'Post a Job')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/jobs.css') }}">
@endpush

@section('content')
<div class="create-job-wrapper">
    <div class="container">
        <div class="step-progress">
            <div class="step-item active" data-step="1">
                <div class="step-circle">1</div>
                <div class="step-label">Company Details</div>
            </div>
            <div class="step-item" data-step="2">
                <div class="step-circle">2</div>
                <div class="step-label">Job Information</div>
            </div>
            <div class="step-item" data-step="3">
                <div class="step-circle">3</div>
                <div class="step-label">Job Terms</div>
            </div>
        </div>

        <form action="{{ route('jobs.store') }}" method="POST" class="step-form" id="createJobForm">
            @csrf
            <!-- Step 1: Company Details -->
            <div class="step-content active" data-step="1">
                <h3>Company Details</h3>
                <p class="step-description">Tell us about your company</p>
                
                <div class="form-group">
                    <label for="company">Company Name</label>
                    <input type="text" class="form-control" id="company" name="company" required>
                </div>

                <div class="form-group">
                    <label for="location">Company Location</label>
                    <input type="text" class="form-control" id="location" name="location" required>
                </div>

                <div class="form-group">
                    <label for="email">Contact Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                
                <div class="step-buttons">
                    <button type="button" class="btn-next">Continue</button>
                </div>
            </div>

            <!-- Step 2: Job Information -->
            <div class="step-content" data-step="2">
                <h3>Job Information</h3>
                <p class="step-description">Describe the position and requirements</p>
                
                <div class="form-group">
                    <label for="title">Job Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="form-group">
                    <label for="description">Job Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="requirements">Requirements</label>
                    <textarea class="form-control" id="requirements" name="requirements" rows="4" required></textarea>
                </div>

                <div class="step-buttons">
                    <button type="button" class="btn-prev">Previous</button>
                    <button type="button" class="btn-next">Continue</button>
                </div>
            </div>

            <!-- Step 3: Job Terms -->
            <div class="step-content" data-step="3">
                <h3>Job Terms</h3>
                <p class="step-description">Set employment terms and conditions</p>
                
                <div class="form-group">
                    <label for="job_type">Employment Type</label>
                    <select class="form-control" id="job_type" name="job_type" required>
                        <option value="">Select job type</option>
                        <option value="Full-time">Full-time</option>
                        <option value="Part-time">Part-time</option>
                        <option value="Contract">Contract</option>
                        <option value="Internship">Internship</option>
                        <option value="Remote">Remote</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="salary">Salary Range</label>
                    <input type="text" class="form-control" id="salary" name="salary" required>
                </div>

                <div class="form-group">
                    <label for="deadline">Application Deadline</label>
                    <input type="date" class="form-control" id="deadline" name="deadline" required>
                </div>

                <div class="step-buttons">
                    <button type="button" class="btn-prev">Previous</button>
                    <button type="submit" class="btn-submit">Post Job</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('createJobForm');
    const steps = form.querySelectorAll('.step-content');
    const progressSteps = document.querySelectorAll('.step-item');
    
    // Next buttons
    form.querySelectorAll('.btn-next').forEach(button => {
        button.addEventListener('click', function() {
            const currentStep = this.closest('.step-content');
            const nextStep = currentStep.nextElementSibling;
            
            currentStep.classList.remove('active');
            nextStep.classList.add('active');
            
            // Update progress indicator
            const nextStepNum = parseInt(nextStep.dataset.step);
            updateProgress(nextStepNum);
        });
    });
    
    // Previous buttons
    form.querySelectorAll('.btn-prev').forEach(button => {
        button.addEventListener('click', function() {
            const currentStep = this.closest('.step-content');
            const prevStep = currentStep.previousElementSibling;
            
            currentStep.classList.remove('active');
            prevStep.classList.add('active');
            
            // Update progress indicator
            const prevStepNum = parseInt(prevStep.dataset.step);
            updateProgress(prevStepNum);
        });
    });
    
    function updateProgress(stepNum) {
        progressSteps.forEach(step => {
            const stepNumber = parseInt(step.dataset.step);
            if (stepNumber <= stepNum) {
                step.classList.add('active');
            } else {
                step.classList.remove('active');
            }
        });
    }
});
</script>
@endpush
@endsection