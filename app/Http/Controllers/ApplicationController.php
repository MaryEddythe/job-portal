<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Show the application form for a job.
     */
    public function create(Job $job)
    {
        if ($job->status !== 'active' || $job->deadline < now()) {
            return redirect()->route('jobs.show', $job)
                ->with('error', 'This job is no longer accepting applications.');
        }
        
        return view('applications.create', compact('job'));
    }

    /**
     * Store a new application.
     */
    public function store(Request $request, Job $job)
    {
        if ($job->status !== 'active' || $job->deadline < now()) {
            return redirect()->route('jobs.show', $job)
                ->with('error', 'This job is no longer accepting applications.');
        }
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'nullable|string',
        ]);
        
        // Store resume file
        $resumePath = $request->file('resume')->store('resumes', 'public');
        $validated['resume'] = $resumePath;
        
        // Create application
        $job->applications()->create($validated);
        
        return redirect()->route('applications.success')
            ->with('success', 'Your application has been submitted successfully!');
    }

    /**
     * Display application success page.
     */
    public function success()
    {
        return view('applications.success');
    }

    /**
     * Display a listing of applications.
     */
    public function index()
    {
        $applications = Application::with('job')->latest()->paginate(10);
        return view('applications.index', compact('applications'));
    }

    /**
     * Display the specified application.
     */
    public function show(Application $application)
    {
        return view('applications.show', compact('application'));
    }

    /**
     * Update application status.
     */
    public function updateStatus(Request $request, Application $application)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,reviewing,accepted,rejected',
        ]);
        
        $application->update($validated);
        
        return redirect()->back()
            ->with('success', 'Application status updated successfully!');
    }
}