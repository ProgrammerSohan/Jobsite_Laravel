<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function singleCategory($name){
        $category = Category::find($name);

        return view('categories.single', compact('category'));
    }

}
