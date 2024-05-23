<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecipesShowController extends Controller
{
    public function show()
    {
        $recipes=DB::table('recipes')
            ->select('id','name','photo_id','likes_counter')
            ->get();
        $photos = DB::table('photo')
            ->get();
        return view('recipe_list', compact('recipes','photos'));
    }

    public function myshow()
    {
        $recipes=DB::table('recipes')
            ->select('id','name','users_id','photo_id','likes_counter')
            ->get();
        $photos = DB::table('photo')
            ->get();
        return view('myrecipe_list', compact('recipes','photos'));
    }

     public function showsave()
    {
        $recipes=DB::table('recipes')
            ->join('recipes_saved_by_user', 'recipes_saved_by_user.recipes_id', '=', 'recipes.id' )
            ->select('recipes.id','name','photo_id','likes_counter','recipes_saved_by_user.users_id')
            ->get(); 
        $photos = DB::table('photo')
            ->get();
        return view('saverecipes', compact('recipes','photos'));
    }

    public function search(Request $request){
        $search = $request->input('search');
        $recipes=DB::table('recipes')
            ->where('name','LIKE',"%{$search}%")
            ->get();
        $photos = DB::table('photo')
            ->get();
        return view('recipe_list', compact('recipes','photos'));
    }
}
