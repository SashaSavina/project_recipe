<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
    $users=DB::table('users')
            ->where('id',Auth::user()->id)
            ->get();
        $recipe = DB::table('recipes')
            ->get();
        return view('profile', compact('users','recipe'));
    } else {
      return view('entrance');
    }
}

    public function index(string $id)
    {
        $users=DB::table('users')
            ->where('id','=',$id)
            ->get();
        return view('profile_edit', compact('users'));
    }


    public function edit(Request $request,string $id)
    {
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('uploads', 'public');
            DB::table('users')->updateOrInsert([
                'photo' => $path,
            ]);
        }
        DB::table('users')->where('id','=',$id)->update([
            'name' => request('name'),
            'email' => request('email'),
            'phone_number' => request('phone_number'),
            'password' => bcrypt(request('password')),
        ]);
        $users=DB::table('users')
            ->where('id',Auth::user()->id)
            ->get();
        $recipe = DB::table('recipes')
            ->get();
       return redirect('/show/profile');
    }
}
