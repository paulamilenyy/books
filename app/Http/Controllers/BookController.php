<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
class BookController extends Controller
{
	public function index() {
    	//relacionado à primeira rota
		return view ('welcome');
	}

	public function store(Request $request){
		$texto=$request->post('titulo');
		$book = new Book;
		$book->titulo=$texto;
		$book->paginas=10;
		$book->save();

		return redirect()->to(url('/'));

	}
}
