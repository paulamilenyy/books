<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function books(){
    	return $this->hasmany(Book::class,'autor','id');
    	//1 autor tem muitos livros associados a ele
    }
    /*
    books()
	select titulo from authors, books
	where books.autor=9
    */
}
