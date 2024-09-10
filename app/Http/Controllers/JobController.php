<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    public function index()
    {
        /**
         * Group all of the elements from job table by featured value
         * and safe them into two different table in one nested array.
         * The latest job should be show on the list top position.
         * Eager loading the employer and tags table from database.
         */
        $jobs = Job::latest()->with(['employer', 'tags'])->get()->groupBy('featured');

        /**
         * First item in nested table is unfeatured jobs, the second is featured.
         */
        return view('jobs.index', [
            'featuredJobs' => $jobs[1],
            'jobs' => $jobs[0],
            'tags' => Tag::all()
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        /**
         * Request data validation.
         */
        $attributes = $request->validate([
            'title' => ['required'],
            'salary' => ['required'],
            'location' => ['required'],
            'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
            'url' => ['required', 'active_url'],
            'tags' => ['nullable']

        ]);

        /**
         * If request has got a featured value,
         * set up a true for featured key in attributes array.
         */
        $attributes['featured'] = $request->has('featured');

        /**
         * Delete a tag key from attributes array before to pass into create method.
         */
        $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, 'tags'));

        /**
         * Check the tags key exists in attributes array and isn't null.
         * After that explode array and use every single tag like a parameter in tag method for the Job model.
         */
        if ($attributes['tags'] ?? false) {
            foreach (explode(',', $attributes['tags']) as $tag) {
                $job->tag($tag);
            }
        }

        return redirect('/');
    }
}
