<?php

namespace App\Http\Controllers;
use App\Models\Cuisine;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function homePage(){
        $cuisines = Cuisine::latest()->paginate(4);
        return view('welcome',compact('cuisines'));
    }

    public function show($id){
        $cuisine = Cuisine::find($id);
        return view('view-cuisine',compact('cuisine'));
    }

    public function edit(string $id){
        $user = User::find($id);
        return view('username-update',compact('user'));
    }
    public function update(Request $request, string $id){
        $this->validate($request,[
            'username' => ['required', 'string', 'max:255', 'unique:users'],
        ]);

        $user = User::find($id);
        $user->username = $request->username;
        $user->save();
        return redirect()->route('homepage');
    }
}
