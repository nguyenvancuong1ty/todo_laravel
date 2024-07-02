<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\Job\JobPostRequest;
use App\Http\Requests\Job\JobUpdateRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::all();
        return view("job/index",['jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getCreate()
    {
        return view("job/create");
    }

    public function postCreate(JobPostRequest $request)
    {
        $validated = $request->validated();
        $job = new Job();
        $job->title = $validated["title"];
        $job->descriptions = $validated["descriptions"];
        $job->save();

        session()->flash('success', 'Job created succesfully');

        return redirect('/jobs');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = Job::find((int)$id);
        return view("job/update")->with('job', $job);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobUpdateRequest $request, string $id)
    {
        $validated = $request->validated();
        $job = Job::find((int)$id);
        $job->title = $validated["title"];
        $job->descriptions = $validated["descriptions"];
        $job->save();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
