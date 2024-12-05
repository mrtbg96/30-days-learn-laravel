<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job {

    public static function all(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Software Team Lead',
                'description' => 'Lead, mentor, and manage a team of software developers, fostering a collaborative and productive work environment.',
                'salary' => '$60.000'
            ],
            [
                'id' => 2,
                'title' => 'Full Stack Developer',
                'description' => 'Design, develop, and maintain web and mobile applications with robust front-end and back-end functionality.',
                'salary' => '$40.000'
            ],
            [
                'id' => 3,
                'title' => 'Backend Developer',
                'description' => 'Design, develop, and maintain backend services, APIs, and microservices. Implement server-side logic to ensure high performance, responsiveness, and reliability.',
                'salary' => '$35.000'
            ],
            [
                'id' => 4,
                'title' => 'Data Analyst',
                'description' => 'Gather, clean, and validate data from various sources to ensure accuracy and completeness.',
                'salary' => '$30.000'
            ]
        ];
    }

    public static function find(int $id): array
    {
        $job = Arr::first(static::all(), fn($job) => $job['id'] == $id);

        if (! $job) {
            abort(404);
        }

        return $job;
    }
}