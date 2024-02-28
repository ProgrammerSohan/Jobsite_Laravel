<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Job\Job;

class CategoriesController extends Controller
{
  /*  public function singleCategory($name){
        $category = Category::find($name);

        return view('categories.single', compact('category'));
    }*/
    public function singleCategory($name){
    $jobs = Job::join('categories', 'jobs.category_id', '=', 'categories.id')
        ->where('categories.name', $name) // Use $name instead of $id
        ->select('jobs.*', 'categories.name as category_name')
        ->orderBy('jobs.created_at', 'desc')
        ->take(5)
        ->get();

    return view('categories.single', compact('jobs','name'));


    }//end method

}
