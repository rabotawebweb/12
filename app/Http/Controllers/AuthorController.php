<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Country;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::latest()->paginate(3);
        return view('authors.index',compact('authors'))->with('i', (request()->input('page', 1) - 1) * 3);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		$countries = Country::get();
        return view('authors.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:150',
			'comment' => 'max:500'
        ]);
  
        Author::create($request->all());
   
        return redirect()->route('authors.index')->with('success','Author created successfully.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('authors.show',compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
		$countries = Country::get();
        return view('authors.edit',compact('author', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|max:150',
			'comment' => 'max:500'
        ]);
  
        $author->update($request->all());
  
        return redirect()->route('authors.index')->with('success','Author updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
  
        return redirect()->route('authors.index')->with('success','Author deleted successfully');
    
    }
}
