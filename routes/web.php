<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home page
Route::get('/', [JobController::class, 'index'])->name('home');

// Job routes
Route::resource('jobs', JobController::class);

// Application routes
Route::get('/jobs/{job}/apply', [ApplicationController::class, 'create'])->name('applications.create');
Route::post('/jobs/{job}/apply', [ApplicationController::class, 'store'])->name('applications.store');
Route::get('/applications/success', [ApplicationController::class, 'success'])->name('applications.success');
Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
Route::get('/applications/{application}', [ApplicationController::class, 'show'])->name('applications.show');
Route::patch('/applications/{application}/status', [ApplicationController::class, 'updateStatus'])->name('applications.update-status');

// About page
Route::view('/about', 'about')->name('about');