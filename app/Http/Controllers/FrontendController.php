<?php

namespace App\Http\Controllers;
use App\Models\Cuisine;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function homePage(){
        $cuisines = Cuisine::latest()->get();
        return view('welcome',compact('cuisines'));
    }

    public function show($id){
        $cuisine = Cuisine::find($id);
        return view('view-cuisine',compact('cuisine'));
    }
}
