<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecipeEditController extends Controller
{
    public function index(string $id)
    {
        $recipes=DB::table('recipes')
            ->where('id','=',$id)
            ->get();
        $photos = DB::table('photo')
            ->select('id','path')
            ->get();
        $subcategories = DB::table('subcategories')
            ->get();
        return view('recipe_edit', compact('recipes','photos','subcategories'));
    }
    public function edit(Request $request,string $id)
    {
        if ($request->hasFile('recipe_photo')) {
            $path = $request->file('recipe_photo')->store('uploads', 'public');
            DB::table('photo')->updateOrInsert([
                'path' => $path,
            ]);
        }
                DB::table('recipes')->where('id','=',$id)->update([
                    'name' => request('name'),
                    'ingredients' => request('ingredients'),
                    'cooking_steps' => request('cooking_steps'),
                    'subcategories_id' => request('subcategory'),
                    'cooking_time' => request('cooking_time'),
                    'users_id' => Auth::id(),
                    'created_at' => now(),
                    'photo_id' => DB::table('photo')->max('id'),
                ]);
        $recipes=DB::table('recipes')
            ->where('id','=',$id)
            ->get();
        $photos = DB::table('photo')
            ->select('id','path')
            ->get();
        $subcategories = DB::table('subcategories')
            ->get();

        return redirect('/show/recipes');
    }

    public function like(Request $request, string $id)
{
    $userId = auth()->id();
    
    $existingLike = DB::table('recipes_saved_by_user')
        ->where('recipes_id', $id)
        ->where('users_id', $userId)
        ->first();
    
    if ($existingLike) {
        DB::table('recipes_saved_by_user')
            ->where('recipes_id', $id)
            ->where('users_id', $userId)
            ->delete();
       DB::table('recipes')->where('id', $id)->decrement('likes_counter');
    } else {
        DB::table('recipes_saved_by_user')->insert([
            'recipes_id' => $id,
            'users_id' => $userId,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('recipes')->where('id', $id)->increment('likes_counter');
    }

    return redirect()->back();
}


    public function isLikedByUser($user)
    {
        return $this->likes_counter->contains('user_id', $user->id);

    }
}
