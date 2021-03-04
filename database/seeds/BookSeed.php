<?php

use Illuminate\Database\Seeder;
use App\Book;
use App\Author;
class BookSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Book::class,10)->create();
        factory(Book::class,10)
        	->create()
        	->each(function($book){
        		$author=Author::all()->random();
        		$book->author()->associate($author);
        		$book->save();
        	});
    }
}
