<?php

namespace App\Http\Controllers;

use App\Models\Job;

use App\Jobs\SendJobPostedMail;

use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(6);

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(): RedirectResponse
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required'],
            'salary' => ['required']
        ]);

        $job = Job::create([
            'employer_id' => 1,
            'title' => request('title'),
            'description' => request('description'),
            'salary' => request('salary')
        ]);

        SendJobPostedMail::dispatch($job);

        return redirect()
            ->route('jobs.index')
            ->with('success', 'Job was successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job): View
    {
        return view('jobs.show', [
            'job' => $job
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job): View
    {
        return view('jobs.edit', [
            'job' => $job
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Job $job): RedirectResponse
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required'],
            'salary' => ['required']
        ]);

        $job->update([
            'title' => request('title'),
            'description' => request('description'),
            'salary' => request('salary')
        ]);

        return redirect()
            ->back()
            ->with('success', 'Job was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job): RedirectResponse
    {
        $job->delete();

        return redirect()
            ->route('jobs.index')
            ->with('success', 'Job was successfully updated!');
    }
}
