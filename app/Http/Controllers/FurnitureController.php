<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use Illuminate\Http\Request;

class FurnitureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('furniture.index',
        [
            'lifurniture' => 'active',
            'furnitures' => Furniture::orderBy('model')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('furniture.create',['lifurniture' => 'active']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $validated = $request->validate ([
            'model'  => 'required|unique:furniture|max:50|min:4',
            'price' => 'required|numeric|gte:0|lte:99999.999',
        ]);
        $object = new Furniture($request-all());
        try {
            $result = $object->save();
            //$furniture->fill($request->all());
            //$result = $furniture->save();
            return redirect('furniture')->with(['message' => 'The furniture has been updated.']);
        } catch(\Exception $e) {
       return back()->withInput()->withErrors(['message' => 'The furniture has not been updated.']);
        }
    }
    /**
     * Display the specified resource.
     */

   /* public function show(Furniture $furniture)
    {
            return view('furniture.index',['lifurniture' => 'active',
                                                'furnitures' => $furniture]);
    }
      */


    public function show($id){
        // dd($id);
        $furniture = Furniture::find($id);
        if($furniture === null){
            abort(404);
        }
        return view('furniture.show',['lifurniture' => 'active',
                                                'furnitures' => $furniture]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Furniture $furniture)
    {
        return view('furniture.edit',['lifurniture' => 'active',
        'furnitures' => $furniture]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Furniture $furniture) {      
       
        $validated = $request->validate ([
            'model'  => 'required|max:50|min:4|unique:furniture,model,' . $furniture->id,
            'price' => 'required|numeric|gte:0.01|lte:99999.99',
        ]);
        try {
            $result = $furniture->update($request->all());
            //$furniture->fill($request->all());
            //$result = $furniture->save();
            return redirect('furniture')->with(['message' => 'The furniture has been updated.']);
        } catch(\Exception $e) {
       return back()->withInput()->withErrors(['message' => 'The furniture has not been updated.']);
        }
         
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Furniture $furniture)
    {
        //
    }
}
