<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::latest()->paginate(5);
        return view('books.index',compact('books'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		$catalogs = Catalog::get();
		$authors = Author::get();
		
        return view('books.create',compact('catalogs', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:150',
			'year' => 'required|numeric|min:111|max:2222',
			'comment' => 'required|max:2000',
			'imagefile' => 'file|mimes:jpg,png|max:500',
        ]);
		
		$fileName = '';
		if($request->imagefile)
		{
			$fileName = Auth::user()->id . '_' . time() . '.'. $request->imagefile->extension();
			$request->imagefile->move(public_path('file'), $fileName);
		}		
		
		$data = $request->all();
		$data['user_id'] = Auth::user()->id;
		$data['image'] = $fileName;
  
        Book::create($data);
   
        return redirect()->route('books.index')->with('success','Book created successfully.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
		if(Auth::user()->id != 1 || Auth::user()->id != $book->user_id)
			return redirect()->route('books.index')->with('warning','Book NOT edit');
		
		$catalogs = Catalog::get();
		$authors = Author::get();
        return view('books.edit',compact('book', 'catalogs', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required|max:150',
			'year' => 'required|numeric|min:111|max:2222',
			'comment' => 'required|max:2000',
			'imagefile' => 'file|mimes:jpg,png|max:500',
        ]);
		
		$data = $request->all();
		if($request->imagefile)
		{
			$fileName = Auth::user()->id . '_' . time() . '.'. $request->imagefile->extension();
			$request->imagefile->move(public_path('file'), $fileName);
			$data['image'] = $fileName;
		}
		
		if($request->hidden && Auth::user()->id == 1)
			$data['show'] = $request->hidden == 2 ? true : false;
  
        $book->update($data);
  
        return redirect()->route('books.index')->with('success','Book updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
		if(Auth::user()->id == 1)
		{
			$book->delete();
			return redirect()->route('books.index')->with('success','Book deleted successfully');
		} else {
			return redirect()->route('books.index')->with('warning','Book NOT deleted');
		}
    
    }
}
