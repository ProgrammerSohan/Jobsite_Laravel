<?php

namespace App\Http\Controllers\Admins;

use App\Models\Job\Job;
use App\Models\Category;
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

          $categories = Category::all();

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


}
