<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
		
		$authors = Author::get();
		$catalogs = Catalog::get();
		
        $query = Book::query();
		
		if($request->name)
            $query->where('name', 'like', "%{$request->name}%");
		
		if($request->author)
			$query->where('author_id', "{$request->author}");
		
		if($request->catalog)
			$query->whereJsonContains('catalogs', ["{$request->catalog}" => '1']);
		
		$books = $query->simplePaginate(2);

        return view('search.index', compact('books', 'authors', 'catalogs'));
    }
	
}
