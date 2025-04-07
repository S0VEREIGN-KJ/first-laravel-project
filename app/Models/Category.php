<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     public function index()
    {
        $categories = DB::table('categories')->get(); 
        $categories = Category::all(); 
 
        return view('home', ['categories' => $allCategories]);
    }
}