<?php

namespace App\Http\Controllers\Admins;

use App\Models\Job\Job;
use App\Models\Category;
use File;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use App\Models\Job\Application;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{

    public function viewLogin(){

        return view("admins.view-login");
      }//end method

      public function checkLogin(Request $request){
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            
            return redirect() -> route('admins.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);
      }//end method

      public function index(){

        $jobs = Job::select()->count();
        $categories = Category::select()->count();
        $admins = Admin::select()->count();
        $applications = Application::select()->count();

        return view("admins.index", compact('jobs','categories','admins','applications'));

      }//end method

      public function admins(){
        $admins = Admin::all();
        return view("admins.all-admins", compact('admins'));

      }//end method

      public function createAdmins(){
        
        return view("admins.create-admins");

      }//end method

      public function storeAdmins(Request $request){

              Request()->validate([
                "name" => "required|max:40",
                "email"=> "required|max:40",
                "password"=> "required",
              ]);
          
              $createAdmins= Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
              ]);

             // return view("admins.create-admins");
             if($createAdmins){
              return redirect('admin/all-admins/')->with('create', 'Admin created successfully!!');

             }

      }//end method

      public function displayCategories(){

         // $categories = Category::all();
         $categories = Category::orderBy('id','desc')->paginate(5);

          return view("admins.display-categories", compact('categories'));
      }//end method

      public function createCategories(){

          return view("admins.create-categories");

      }//end method

      public function storeCategories(Request $request){

          Request()->validate([
             "name"=> "required|max:40",
          ]);

          $createCategory = Category::create([
             'name' => $request->name,
          ]);
          if($createCategory){
            return redirect('admin/display-categories')->with('create','Category created successfully!');

          }
      }//end method

      public function editCategories($id){

        $category = Category::find($id);
        return view("admins.edit-categories",compact('category'));

      }//end method

      public function updateCategories(Request $request,$id){

        Request()->validate([
          "name" => "required|max:40",

        ]);

        $categoryUpdate = Category::find($id);
        $categoryUpdate->update([
           "name" => $request->name,
        ]);

        if($categoryUpdate){
          return redirect('/admin/display-categories/')->with('update','Category updated successfully');
        }

      }//end method

      public function deleteCategories($id){

        $deleteCategory = Category::find($id);
        $deleteCategory->delete();

        if($deleteCategory){

          return redirect('/admin/display-categories/')->with('delete','Category deleted successfully!');
        }

      }//end method

      //jobs
      public function allJobs(){

         // $jobs = Job::all();
          $jobs= Job::orderBy('id','desc')->paginate(3);
          return view('admins.all-jobs', compact('jobs'));

      }//end method

      public function createJobs(){

        $categories = Category::all();

          return view('admins.create-jobs', compact('categories'));
      }//end method

      public function storeJobs(Request $request){

        Request()->validate([
            "job_title" => "required|max:40",
            "job_region" => "required|max:40",
            "company" => "required",
            "job_type" => "required",
            "vacancy" => "required",
            "experience" => "required",
            "salary" => "required",
            "gender" => "required",
            "application_deadline" => "required",
            "jobdescription" => "required",
            "responsibilities" => "required",
            "education_experience" => "required",
            "otherbenifits" => "required",
            "category_id" => "required",
            "image" => "image",


        ]);      

        $destinationPath = 'assets/images/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);

        $createJobs = Job::create([
            'job_title' => $request->job_title,
            'job_region' => $request->job_region,
            'company'   => $request->company,
            'job_type'  => $request->job_type,
            'vacancy'   => $request->vacancy,
            'experience' => $request->experience,
            'salary'    => $request-> salary,
            'gender' => $request->gender,
            'application_deadline' => $request->application_deadline,
            'jobdescription' => $request->jobdescription,
            'responsibilities' => $request->responsibilities,
            'education_experience' => $request->education_experience,
            'otherbenifits' => $request->otherbenifits,
           // 'category' => $request->category,
            'category_id' => $request->category_id,
            'image' => $myimage,

        ]);

        if($createJobs){

          return redirect('admin/display-jobs/')->with('create','Job created successfully');
        }


      }//end method

      public function deleteJobs($id){

        $deleteJob = Job::find($id);

        if(File::exists(public_path('assets/images/' . $deleteJob->image))){
            File::delete(public_path('assets/images/' . $deleteJob->image));

        }else{

        }
        $deleteJob->delete();

        if($deleteJob){
          return redirect('admin/display-jobs/')->with('delete','Job deleted successfully!!');
        }


      }//end method


}
