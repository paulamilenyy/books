@extends('base.base')
@section('conteudo')
<div class="w3-container w3-teal">
	<h1>Edição de autores</h1>
</div>
<br>

<div class="w3-col w3-container m9 l11 s1"> 

	<form action="{{route('authors.update',['author'=>$author->id])}}" method="post">
		@csrf
		@method('PUT')
		<div>
			<label>NOME</label>
			<input type="text" name="nome" value="{{$author->nome}}">
		</div>
		<div>
			<label>EMAIL</label>
			<input type="text" name="email" value="{{$author->email}}">
		</div>
		<button class="w3-button w3-teal">enviar</button>
	</form>
</div>
@endsection 