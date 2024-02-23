<?php

namespace App\Http\Controllers\Jobs;

use App\Models\Job\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobsController extends Controller
{
    
    public function single($id){
        $job = Job::find($id);
        return view('jobs.single',compact('job'));
        
    }

    
}
