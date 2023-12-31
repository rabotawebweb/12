<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::latest()->paginate(3);
        return view('countries.index',compact('countries'))->with('i', (request()->input('page', 1) - 1) * 3);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100'
        ]);
  
        Country::create($request->all());
   
        return redirect()->route('countries.index')->with('success','Country created successfully.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        return view('countries.show',compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        return view('countries.edit',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Country $country)
    {
        $request->validate([
            'name' => 'required|max:100'
        ]);
  
        $country->update($request->all());
  
        return redirect()->route('countries.index')->with('success','Country updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        $country->delete();
  
        return redirect()->route('countries.index')->with('success','Country deleted successfully');
    
    }
}
