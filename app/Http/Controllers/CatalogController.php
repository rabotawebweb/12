<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catalogs = Catalog::latest()->paginate(3);
        return view('catalogs.index',compact('catalogs'))->with('i', (request()->input('page', 1) - 1) * 3);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('catalogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:150',
			'comment' => 'required|max:500'
        ]);
  
        Catalog::create($request->all());
   
        return redirect()->route('catalogs.index')->with('success','Catalog created successfully.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Catalog $catalog)
    {
        return view('catalogs.show',compact('catalog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Catalog $catalog)
    {
        return view('catalogs.edit',compact('catalog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Catalog $catalog)
    {
        $request->validate([
            'name' => 'required|max:150',
			'comment' => 'required|max:500'
        ]);
		
		$data = $request->all();
		if($request->hidden && Auth::user()->id == 1)
			$data['show'] = $request->hidden == 2 ? true : false;
  
        $catalog->update($data);
  
        return redirect()->route('catalogs.index')->with('success','Catalog updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catalog $catalog)
    {
        $catalog->delete();
  
        return redirect()->route('catalogs.index')->with('success','Catalog deleted successfully');
    
    }
}
