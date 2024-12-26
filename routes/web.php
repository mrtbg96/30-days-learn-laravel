<?php

use App\Models\Job;
use App\Models\Tag;
use App\Models\User;
use App\Models\Employer;

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
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->simplePaginate(6);

    return view('jobs', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('job', [
        'job' => $job
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});
