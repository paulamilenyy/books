<!--MOSTRA DETALHE DE UM LIVRO-->
@extends('base.base')

@section('conteudo')
<div class="w3-container w3-teal">
	<h1>livro - id {{$book->id}}</h1>
</div>
<div class="w3-container">
	<table class="w3-table-all w3-hoverable">

		<h3>Descricao:</h3>
		@if($book->img)
			<img src="{{asset('storage/'.$book->img)}}" height="80px" width="80px">
		@endif
		<h3>Titulo: {{$book->titulo}}</h3>
		<h3>Paginas:{{$book->paginas}}</h3>
		<h3>Autor:
			@if($book->autor==NULL)
			sem autor
			@else
			{{$book->author->nome}}
			@endif
		</h3>
		

		<a href="{{url('/book')}}" ><span class="material-icons" >fast_rewind</span></a>
	</div>
</div>
@endsection 