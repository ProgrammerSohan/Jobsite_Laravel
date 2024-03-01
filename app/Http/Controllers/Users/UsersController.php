<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Models\Job\JobSaved;
use Illuminate\Http\Request;
use App\Models\Job\Application;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use Symfony\Component\HttpFoundation\File\File;
use File;

class UsersController extends Controller
{
     public function profile(){
        $profile = User::find(Auth::user()->id);

        return view('users.profile',compact('profile'));

     }

     public function applications(){
        $applications = Application::where('user_id', '=',Auth::user()->id)
        ->get();
        return view('users.applications', compact('applications'));
     }

     public function savedJobs(){
        $savedJobs = JobSaved::where('user_id', '=',Auth::user()->id)
        ->get();
        return view('users.savedjobs', compact('savedJobs'));
     }

     public function editDetails(){
      //$userDetails = User::where('id','=', Auth::user()->id)  ->get();
      $userDetails = User::find(Auth::user()->id);


      return view('users.editdetails', compact('userDetails'));
   }

   public function updateDetails(Request $request){

        $userDetailsUpdate = User::find(Auth::user()->id);
         $userDetailsUpdate->update([
            "name"     => $request->name,
            "password" => $request->password,
            "job_title"=> $request->job_title,
             "bio"     => $request->bio,
             "facebook"=> $request->facebook,
             "twitter" => $request->twitter,
             "linkedin"=> $request->linkedin,

            ]);

         if($userDetailsUpdate){
            return redirect('/users/edit-details/')->with('update','User details updated successfully!');
        }

      //  return view('users.');
   }

    public function editCV(){


       return view('users.editcv');
    }

    public function updateCV(Request $request){

     $oldCV = User::find(Auth::user()->id);
      //$file_path = public_path('assets/cvs/'.$OldCV);
     // unlink($file_path);*/
      if(File::exists(public_path('assets/cvs/' . $oldCV->cv))){
          File::delete(public_path('assets/cvs/' . $oldCV->cv));
      } else{
         
      }

       $destinationPath = 'assets/cvs/';
       $mycv = $request->cv->getClientOriginalName();
       $request->cv->move(public_path($destinationPath), $mycv);

       $oldCV->update([
          "cv" => $mycv

       ]);

       return redirect('/users/profile')->with('update', 'CV Updated Successfully');
    }


}
