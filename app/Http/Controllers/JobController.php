<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the jobs.
     */
    public function index(Request $request)
    {
        $query = Job::query()->where('status', 'active');
        
        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }
        
        // Filter by job type
        if ($request->has('job_type') && $request->job_type) {
            $query->where('job_type', $request->job_type);
        }
        
        // Sort results
        $query->orderBy('created_at', 'desc');
        
        $jobs = $query->paginate(10);
        
        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new job.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created job in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'salary' => 'required|string|max:255',
            'job_type' => 'required|in:Full-time,Part-time,Contract,Internship,Remote',
            'email' => 'required|email|max:255',
            'deadline' => 'required|date|after:today',
        ]);
        
        $validated['status'] = 'active';
        
        Job::create($validated);
        
        return redirect()->route('jobs.index')
            ->with('success', 'Job posted successfully!');
    }

    /**
     * Display the specified job.
     */
    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified job.
     */
    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    /**
     * Update the specified job in storage.
     */
    public function update(Request $request, Job $job)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'salary' => 'required|string|max:255',
            'job_type' => 'required|in:Full-time,Part-time,Contract,Internship,Remote',
            'email' => 'required|email|max:255',
            'deadline' => 'required|date',
            'status' => 'required|in:active,closed',
        ]);
        
        $job->update($validated);
        
        return redirect()->route('jobs.index')
            ->with('success', 'Job updated successfully!');
    }

    /**
     * Remove the specified job from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();
        
        return redirect()->route('jobs.index')
            ->with('success', 'Job deleted successfully!');
    }
}