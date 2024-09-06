<?php

use App\Models\Employer;
use App\Models\Job;

//AAA - Arrange, Act, Assert
it('belongs to an employer', function () {

    //Creating instances of the Job and Employer classes
    $employer = Employer::factory()->create();
    $job = Job::factory()->create([
        'employer_id' => $employer['id']
    ]);

    //Checking whether the employer method for the job object is equivalent to the employer object
    expect($job->employer->is($employer))->toBeTrue();
});


it('can have tags', function () {
    $job = Job::factory()->create();

    $job->tag('Frontend');

    expect($job->tags)->toHaveCount(1);
});
