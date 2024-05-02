<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecipeShowController extends Controller
{
    public function show()
    {
        $recipes=DB::table('recipes')
            ->select('name','photo_id')
            ->get();
        $photos = DB::table('photo')
            ->get();
        return view('recipe_list', compact('recipes','photos'));
    }
}
