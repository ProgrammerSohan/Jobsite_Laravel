<?php

namespace App\Http\Controllers\Jobs;

use App\Models\Job\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Job\JobSaved;

class JobsController extends Controller
{

    public function single($id){
        $job = Job::find($id);

        //getting related jobs
        $relatedJobs = Job::where('category_id',$job->category_id)
         ->where('id', '!=', $id)
         ->take(5)
         ->get();

         $relatedJobsCount = Job::where('category_id',$job->category_id)
         ->where('id', '!=', $id)
         ->take(5)
         ->count();

        return view('jobs.single',compact('job', 'relatedJobs','relatedJobsCount'));

    }

    public function saveJob(Request $request){

        $saveJob = JobSaved::create([
            'job_id' => $request->job_id,
            'user_id' => $request->user_id,
            'job_image'=> $request->job_image,
            'job_title'=> $request->job_title,
            'job_region'=> $request->job_region,
            'job_type' => $request->job_type,
            'company'  => $request->company
        ]);

        if($saveJob){
            return redirect('/jobs/single/'.$request->job_id.'')->with('save','Job save successfully!');
        }


    }


}
