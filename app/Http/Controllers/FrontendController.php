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
}
