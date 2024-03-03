<?php

namespace App\Http\Controllers;

use App\Models\Job\Job;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // $jobs = Job::select()->take(10)->orderby('id','desc')->get();
       // $wehave = Job::select()->take(8)->orderBy('id','desc')->get();
       $jobs = Job::orderBy('id','desc')->paginate(10);
       $totalJobs= Job::all()->count();
        $wehave = Job::orderBy('id','desc')->paginate(8);
        $carousel = Job::select()->take(50)->orderBy('id', 'desc')->get();

        return view('home', compact('jobs','totalJobs','wehave','carousel'));
    }

    public function about()
    {

        return view('pages.about');
    }

    public function contact()
    {

        return view('pages.contact');
    }


}
