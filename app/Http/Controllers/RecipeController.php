<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        DB::table('recipes')->insert([
            'name' => request('name'),
            'ingredients' => request('ingredients'),
            'cooking_steps' => request('cooking_steps'),
            'subcategories_id' =>request('subcategories_id'),
            'users_id' => '1',
        ]);
        return redirect('/');
    }
}
