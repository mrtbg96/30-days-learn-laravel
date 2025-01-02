<?php

use App\Models\Job;
use App\Models\Tag;
use App\Models\User;
use App\Models\Employer;

use App\Http\Controllers\JobController;

use Illuminate\Support\Facades\Route;

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

Route::resource('jobs', JobController::class);

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
