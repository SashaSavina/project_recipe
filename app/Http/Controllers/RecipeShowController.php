<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecipeShowController extends Controller
{
    public function show(string $id)
    {
        $recipes=DB::table('recipes')
            ->where('id','=',$id)
            ->get();
        $photos = DB::table('photo')
            ->select('id','path')
            ->get();
        $subcategories = DB::table('subcategories')
            ->get();
       $userId = auth()->id();
       $Count_like=DB::table('recipes_saved_by_user');
       $isLiked = DB::table('recipes_saved_by_user')
        ->where('recipes_id', $id)
        ->where('users_id', $userId)
        ->exists();

        return view('one_recipe', compact('recipes','photos','subcategories','isLiked'));
    }


    public function search(Request $request){
        $search = $request->input('search');
        dd($search);
    }

}
