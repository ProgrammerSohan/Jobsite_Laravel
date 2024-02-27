<?php

namespace App\Http\Controllers\Jobs;

use App\Models\Job\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Job\Application;
use App\Models\Job\JobSaved;
use Illuminate\Support\Facades\Auth;

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

         //save job
         $savedJob = JobSaved::where('job_id', $id)
         ->where('user_id', Auth::user()->id)
         ->count();

         //verifying if user applied to job
         $appliedJob = Application::where('user_id',Auth::user()->id)
         ->where('job_id', $id)
         ->count();
        return view('jobs.single',compact('job', 'relatedJobs','relatedJobsCount','savedJob','appliedJob'));

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

    public function jobApply(Request $request){

        if($request->cv == 'No CV'){

  return redirect('/jobs/single/'.$request->job_id.'')->with('apply','upload your CV first in the profile page');

        }else {
            $applyJob = Application::create([
                'cv' => Auth::user()->cv,
                'job_id' => $request->job_id,
                'user_id' => Auth::user()->id,
                'job_image'=> $request->job_image,
                'job_title'=> $request->job_title,
                'job_region'=> $request->job_region,
                'job_type' => $request->job_type,
                'company'  => $request->company
            ]);
            if($applyJob){
                return redirect('/jobs/single/'.$request->job_id.'')->with('applied','You have applied to this job successfully!');
            }

        }

    }


}
