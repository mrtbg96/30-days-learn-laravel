<?php

use App\Models\Job;
use App\Models\Tag;
use App\Models\User;
use App\Models\Employer;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JobController;
use App\Http\Controllers\AuthController;

// Home
Route::get('/', function () {
    $userCount = User::all()->count();
    $employerCount = Employer::all()->count();
    $jobCount = Job::all()->count();
    $tagCount = Tag::all()->count();

    $counts = [
        'users' => $userCount,
        'employers' => $employerCount,
        'jobs' => $jobCount,
        'tags' => $tagCount
    ];

    return view('home', [
        'counts' => $counts
    ]);
})->name('home');

// Redirect /login to /auth/login
Route::redirect('/login', '/auth/login')
    ->name('login');

// Auth    
Route::prefix('/auth')->name('auth.')->group( function () {
    // Log In
    Route::get('/login', [AuthController::class, 'login'])
        ->name('login');

    // DoLogin    
    Route::post('/login', [AuthController::class, 'doLogin'])
        ->name('doLogin');

    // Register    
    Route::get('/register', [AuthController::class, 'register'])
        ->name('register');
    
    // DoRegister
    Route::post('/register', [AuthController::class, 'doRegister'])
        ->name('doRegister');
     
    // Log Out    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Jobs
Route::prefix('/jobs')->name('jobs.')->group( function () {
    // Index
    Route::get('/', [JobController::class, 'index'])
        ->name('index');

    // Create    
    Route::get('/create', [JobController::class, 'create'])->name('create')
        ->middleware('auth');

    // Store 
    Route::post('/', [JobController::class, 'store'])
        ->name('store')
        ->middleware('auth');

    // Show 
    Route::get('/{job}', [JobController::class, 'show'])
        ->name('show');

    // Edit    
    Route::get('/{job}/edit', [JobController::class, 'edit'])
        ->name('edit')
        ->middleware('auth')
        ->can('edit', 'job');

    // Update    
    Route::put('/{job}', [JobController::class, 'update'])
        ->name('update')
        ->middleware('auth')
        ->can('edit', 'job');

    // Destroy    
    Route::delete('/{job}', [JobController::class, 'destroy'])
        ->name('destroy')
        ->middleware('auth')
        ->can('edit', 'job');
});

// Contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
