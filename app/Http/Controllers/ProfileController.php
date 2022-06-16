<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index(User $user)
    {
        // $users = User::findOrFail($user);
        
        // return view('profiles.index', [
        //     'user' => $users
        // ]);
        return view('profiles.index', compact('user'));
    }

    public function edit(\App\Models\User $user){

        return view('profiles.edit', compact('user'));
    }

    public function update(\App\Models\User $user){

        $data = request()->validate([

            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ''
        ]);

        $user->profile->update($data);

        return redirect("/profile/{$user->id}");
    }
}
