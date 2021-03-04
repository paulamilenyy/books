<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use Illuminate\Support\Facades\Validator;
use Auth;
use Gate;

class AuthorController extends Controller
{
    //ESSE É UM CONTROLLER RESOURCE
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth')->except(['index','show']);//se quiser aplicar p todas rotas tira isso
        //$this->middleware('password.confirm')->only(['store','update','destroy']);
       // $this->authorizeResource(Author::class, 'author');
    }
    public function index()
    {
        $authors=Author::paginate(10); //select * from authors
        return view('authors.home',['authors'=>$authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation= Validator::make($request->all(),[
            'nome'=>'required|max:25',
            'email'=>'required|email|unique:users'
        ]);
        if($validation->fails()){
            return back()
                ->withErrors($validation)
                ->withInput($request->all());
        }
        $nome=$request->post('nome');
        $email=$request->post('email');
        $author=new Author;
        $author->nome=$nome;
        $author->email=$email;
        $author->user_id=Auth::user()->id;
        $author->save();
        return redirect()->to(route('authors.index'));
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //$author= Author::find($id);
        return view('authors.show',['author'=>$author]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
       // $author=Author::find($id);
        if(Gate::allows('update-author',$author)){
            return view('authors.edit',['author'=>$author]);
        }else{
            return back()->withErrors(['auth'=>'Esse registro n e seu']);
        }
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //busca no bd para autor
        $author=Author::find($id);
        //pega informacoes do form
        $nome=$request->post('nome');
        $email=$request->post('email');
        //atualiza o registro
        $author->nome=$nome;
        $author->email=$email;
        $author->user_id=Auth::user()->id;
        //operacao realizada no bd
        $author->save();
        return redirect()->to(route('authors.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author=Author::find($id);
        $author->delete();
        return redirect()->to(route('authors.index'));

    }
}
