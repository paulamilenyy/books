@extends('base.base')
@section('conteudo')
<div class="w3-container w3-teal">
	<h1>Exibição de autor</h1>
</div>
<div class="w3-container">
	<table class="w3-table-all w3-hoverable">
		<p>mostrando autor...</p>
		<p>Autor de ID {{$author->id}}</p>
		<p>Descrição</p>
		<p>Nome: {{$author->nome}}</p>
		<p>Email: {{$author->email}}</p>
		<h3>Livros</h3>
		<ul>
			
				@if(count($author->books)>0)
					@foreach($author->books as $livro)
						<li>
							<a href="{{url('/book/show',['id'=>$livro->id])}}">
								{{$livro->titulo}}
							</a>
							
						</li>
					@endforeach
				@endif
			
		</ul>
		<a href="{{route('authors.index')}}">voltar</a>
		
	</div>
</div>
@endsection 