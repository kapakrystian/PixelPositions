<?php

namespace App\Http\Controllers;

use App\Models\Job;

class SearchController extends Controller
{
    public function __invoke()
    {
        /**
         * In job table search all of jobs which have got a 'q' value in their title.
         */
        $jobs = Job::query()
            ->with(['employer', 'tags'])
            ->where('title', 'LIKE', '%' . request('q') . '%')
            ->get();

        return view('results', ['jobs' => $jobs]);
    }
}
