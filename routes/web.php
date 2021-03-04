<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
use App\Book;
use App\Author;
Route::group(['middleware'=>['auth']], function () {
	Route::get('/book/add', function () {
		$authors=Author::get();
		return view('book.form',['authors'=>$authors]);
	});
	Route::post('/book/save', function (Request $request) {
		$validation = $request->validate([
			'titulo'=>'required|string|max:255',
			'paginas'=>'required|numeric|gt:0',
			'autor'=>'nullable',
		]);
		


		$titulo=$request->post('titulo');
		$paginas=$request->post('paginas');

		$author_form=$request->post('autor');

		$livro=new Book;
		$livro->titulo=$titulo;
		$livro->paginas=$paginas;

		if($author_form !=0){
		//$author=Author::find($author_form);
			$livro->autor=$author_form;
		}
		if ($request->has('img')){
			$file=$request->file('img');
			$filename=$file->getClientOriginalName();
			$path= Storage::disk('public')->putFileAs(
				Auth::user()->id,$file,$filename
			);
			$livro->img=$path;
		}
		$livro->save();
		return redirect()->to(url('/book'));

	})->middleware('password.confirm');

	Route::get('/book/edit/{id}', function ($id) {
		if(Gate::allows('update-book')){
			$book = Book::find($id);
			$authors=Author::get();
			return view('book.edit', [
				'book'=>$book,
				'authors'=>$authors]);
		}else{
			//retornar p user q e proibido o acesso
			return back()->withErrors(['auth'=>'Usuário não autorizado']); 
		}
		
	});

	Route::post('/book/update/{id}', function (Request $request, $id) {
		$titulo = $request->post('titulo');
		$paginas = $request->post('paginas');

		$author_form=$request->post('autor');

		$book=Book::find($id);
		$book->titulo = $titulo;
		$book->paginas = $paginas;

		if($author_form==0){
			$book->autor=NULL;
		}else{
			$book->autor=$author_form;
		}
		if ($request->has('img')){
			$file=$request->file('img');
			$filename=$file->getClientOriginalName();
			$path= Storage::disk('public')->putFileAs(
				Auth::user()->id,$file,$filename
			);
			$book->img=$path;
		}
		$book->save();
		return redirect()->to(url('/book'));
	});
	Route::get('/book/destroy/{id}', function (Request $request,$id) {
		Gate::authorize('delete-book');
		$book = Book::find($id);
		$book->delete();
		return redirect()->to(url('/book'));
	})->middleware('password.confirm');

});

//fimmmmmmmmmmmmmmmmm



Route::get('/book', function () {
	$lista = Book::get(); //select * from books
	return view('book.home',['books'=>$lista]);
})->name('bookshome');



Route::get('/book/show/{id}', function ($id) {
	$book = Book::find($id);
	return view('book.show', ['book'=>$book]);
});

Route::get('/',function(){
	return view('welcome');
}
); //o @ representa q é uma função q tá no controlador

Route::post('/salvar','BookController@store');

Route::resource('authors','AuthorController'); //especifica que terão várias rotas p esse controller (é controlador de recursos)


//configuracoes para logon com google:
Route::get('auth/google','Auth\loginController@redirectToProvider')->name('google');
Route::get('auth/google/callback','Auth\loginController@handleProviderCallback');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

