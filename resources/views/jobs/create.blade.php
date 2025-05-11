@extends('layouts.app')

@section('title', 'Post a Job')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
        <div class="card-header">
                <h5 class="card-title mb-0">Post a Job</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('jobs.store') }}" method="POST">
                    @csrf
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
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Post Job</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection