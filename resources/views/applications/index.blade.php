@extends('layouts.app')

@section('title', 'Applications')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h1>Job Applications</h1>
    </div>
</div>

@if($applications->count() > 0)
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Job Title</th>
                            <th>Applicant</th>
                            <th>Email</th>
                            <th>Date Applied</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $application)
                            <tr>
                                <td>{{ $application->id }}</td>
                                <td>{{ $application->job->title }}</td>
                                <td>{{ $application->name }}</td>
                                <td>{{ $application->email }}</td>
                                <td>{{ $application->created_at->format('M d, Y') }}</td>
                                <td>
                                    @if($application->status == 'pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif($application->status == 'reviewing')
                                        <span class="badge bg-info">Reviewing</span>
                                    @elseif($application->status == 'accepted')
                                        <span class="badge bg-success">Accepted</span>
                                    @elseif($application->status == 'rejected')
                                        <span class="badge bg-danger">Rejected</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('applications.show', $application) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="d-flex justify-content-center mt-4">
        {{ $applications->links() }}
    </div>
@else
    <div class="alert alert-info">
        <i class="fas fa-info-circle me-2"></i> No applications found.
    </div>
@endif
@endsection