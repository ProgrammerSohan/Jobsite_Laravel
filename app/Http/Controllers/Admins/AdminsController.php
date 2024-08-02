<?php

namespace App\Http\Controllers\Admins;

use App\Models\Job\Job;
use App\Models\Category;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use App\Models\Job\Application;
use App\Http\Controllers\Controller;

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

}
