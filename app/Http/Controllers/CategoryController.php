<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $categories =Category::all();
        return view('categories.index',[
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $request->validate([
            'name' => 'required',
        ]);

        Category::create([
            'name' =>$request->name,
            
        ]);
        return redirect()->route('categories.index')->with('success',"Categorie ajoutée avec succes ");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
          $category =Category::find($id);
        return view('categories.show',[
            'category' => $category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category =Category::find($id);
        return view('categories.edit',[
            'category' => $category,
        ]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $request->validate([
            'name' => 'required|max:225',
        ]);

       Category::find($id)->update([
        'name'=>$request->name,
        'description'=>$request->description,


       ]);
       return back()->with('success',"categorie ajoutée avec succés");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         Category::find($id)->delete();
      return redirect()->route('categories.index')->with('success',"categorie supprimée  avec success");
    }
}
