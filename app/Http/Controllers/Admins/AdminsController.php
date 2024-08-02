<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Admin;
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

        return view("admins.index");

      }//end method

      public function admins(){
        $admins = Admin::all();
        return view("admins.all-admins", compact('admins'));

      }//end method



}
