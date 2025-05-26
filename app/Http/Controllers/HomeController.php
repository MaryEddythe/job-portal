<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestJobs = Job::where('status', 'active')
                         ->orderBy('created_at', 'desc')
                         ->take(4)
                         ->get();
                         
        return view('home', compact('latestJobs'));
    }
}
