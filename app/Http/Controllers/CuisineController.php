<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Cuisine;
class CuisineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // show individual user cuisine 
        $userId = Auth::id();
        // return $userId;
        $cuisines = Cuisine::where('user_id',$userId)->get();
        return view('user-cuisine',compact('cuisines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create-cuisine');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'cuisine_name'=>['required', 'string', 'max:255', 'unique:cuisines'],
            'image'=>'required',
            'continent_id'=>'required',
            'recipe'=>'required',
            'steps'=>'required'
        ]);
        $image = $request->image->hashName();
        $request->image->move(public_path('cuisine-image'),$image);

        Cuisine::create([
            'cuisine_name'=>$request->cuisine_name,
            'image'=> $image,
            'user_id'=> $request->user_id,
            'continent_id'=> $request->continent_id,
            'recipe'=>$request->recipe,
            'steps'=> $request->steps
        ]);
        return redirect()->route('cuisine.create')->with('message','Cuisine has been added');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cuisine = Cuisine::find($id);
        return view('view-cuisine',compact('cuisine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cuisine = Cuisine::find($id);
        $cuisineImage = $cuisine->image;
        unlink(public_path('cuisine-image/'.$cuisineImage));
        $cuisine->delete();
        return redirect()->route('cuisine.index')->with('message','cuisine deleted');
    }
}
