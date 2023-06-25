<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuisine;
class CuisineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $data= $request->all();
        $image = $request->image->hashName();
        $request->image->move(public_path('cuisine-image'),$image);

        $data['image']=$image;
        $data['user_id']=$request->user_id;

        Cuisine::create($data);
        return redirect()->back();


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }
}
