<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function show()
    {
        $categories=DB::table('categories')
            ->select('id','name')
            ->get();
        $subcategories=DB::table('subcategories')
            ->select('id','name','categories_id')
            ->get();
        return view('category', compact('subcategories','categories'));
    }

    public function search(Request $request){
        $search = $request->input('search');
        $subcategories=DB::table('subcategories')
            ->select('id','name','categories_id')
            ->where('name','LIKE',"%{$search}%")
            ->get();
        $categories=DB::table('categories')
            ->select('id','name')
            ->get();
        return view('category', compact('subcategories','categories'));
    }
     public function showlist(string $id)
    {
        $subcategories=DB::table('subcategories')
            ->select('id','name','categories_id')
            ->where('id',$id)
            ->get();
        $recipes=DB::table('recipes')
            ->select('id','name','photo_id','likes_counter','subcategories_id')
            ->get();
        $photos = DB::table('photo')
            ->get();
        return view('recipe_subcategory_list', compact('id','recipes','photos'));
    }

    
}
