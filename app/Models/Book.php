<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\BookScope;

class Book extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'id', 'name', 'year', 'comment', 'image', 'author_id', 'user_id', 'catalogs', 'show'
    ];
	
	protected $casts = [
        'catalogs' => 'json'
    ];
	

    protected static function booted(): void
    {
        static::addGlobalScope(new BookScope);
    }
	
	
	public function author()
    {
		return $this->belongsTo(Author::class);
    }
	
	public function user()
    {
		return $this->belongsTo(User::class);
    }
	
	public function sections()
    {
		foreach($this->catalogs as $key => $item) 
			$list[] = Catalog::find($key)->name;
			
		return implode(', ', $list);
    }
	
}
