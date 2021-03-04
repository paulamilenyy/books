@extends('base.base')
@section('conteudo')
<div class="w3-container w3-teal">
	<h1>Cadastro de autores</h1>
</div>
<br>

<div class="w3-col w3-container m9 l11 s1"> 

	<form action="{{route('authors.store')}}" method="post"><!--nesse action usou o nome da rota, olha ele no cmd-->
		@csrf
		<div>
			<label>NOME</label>
			<input type="text" name="nome" value="{{old('nome')}}">
			@error('nome')
				<div class="alert alert-success col-sm-4">
					<strong>
							{{$message}}
					</strong> 
				</div>
			@enderror
		</div>
		<div>
			<label>EMAIL</label>
			<input type="text" name="email" value="{{old('email')}}">
			@error('email')
				<div class="alert alert-success col-sm-4">
					<strong>
							{{$message}}
					</strong> 
				</div>
			@enderror
		</div>
		<button class="w3-button w3-teal">enviar</button>
	</form>
</div>
@endsection 