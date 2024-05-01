<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    public function index()
    {
        $subcategories = DB::table('subcategories')->get();
        return view('new_recipe', compact('subcategories'));
    }
    public function save(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'ingredients' => ['required', 'string'],
            'cooking_steps' => ['required', 'string'],
        ]);
        $path=$request->file('recipe_photo')->store('uploads', 'public');
        DB::table('photo')->insert([
            'photo' => $path,
        ]);
        DB::table('recipes')->insert([
            'name' => request('name'),
            'ingredients' => request('ingredients'),
            'cooking_steps' => request('cooking_steps'),
            'subcategories_id' =>request('subcategory'),
            'users_id' => '1',
            'created_at' => now(),
            'photo_id' => DB::table('photo')->max('id'),
        ]);
        return view('welcome',['path'=>$path]);
    }
    public function show()
    {
        $photo = DB::table('photo')->get();
        return view('recipe_list', compact('photo'));
    }
}


