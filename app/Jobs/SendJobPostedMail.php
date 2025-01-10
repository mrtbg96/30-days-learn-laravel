<?php

namespace App\Jobs;

use App\Models\Job;

use App\Mail\JobPosted;

use Illuminate\Support\Facades\Mail;

use Illuminate\Foundation\Queue\Queueable;

use Illuminate\Contracts\Queue\ShouldQueue;

class SendJobPostedMail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Job $jobListing)
    {
        $this->jobListing = $jobListing;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $jobListing = $this->jobListing;

        Mail::to($jobListing->employer->user)->send(new JobPosted($jobListing));
    }
}
