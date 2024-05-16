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

        return view('one_recipe', compact('recipes','photos','subcategories'));
    }


    public function search(Request $request){
        $search = $request->input('search');
        dd($search);
    }

}
