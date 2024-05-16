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
