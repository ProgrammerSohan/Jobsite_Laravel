<?php

namespace App\Http\Controllers;

use App\Models\Job\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $duplicates = DB::table('searches')
        ->select('keyword', DB::raw('COUNT(*) as `count`'))
        ->groupBy('keyword')
        ->havingRaw('COUNT(*) > 1')
        ->take(4)
        ->orderBy('count', 'asc')
        ->get();


        //print_r($duplicates);

       // $jobs = Job::select()->take(10)->orderby('id','desc')->get();
       // $wehave = Job::select()->take(8)->orderBy('id','desc')->get();
       $jobs = Job::orderBy('id','desc')->paginate(10);
       $totalJobs= Job::all()->count();
        $wehave = Job::orderBy('id','desc')->paginate(8);
        $carousel = Job::select()->take(50)->orderBy('id', 'desc')->get();

        return view('home', compact('jobs','totalJobs','wehave','carousel','duplicates','serializedDuplicates'));
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
