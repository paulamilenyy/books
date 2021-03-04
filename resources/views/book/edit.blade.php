@extends('base.base')

@section('conteudo')
<div class="w3-container w3-teal">
	<h1>Editar livro</h1>
</div>
<div class="w3-container">
	<table class="w3-table-all w3-hoverable">
		<form action="{{url('/book/update',['id'=>$book->id])}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label>Título</label>
				<input type="text" name="titulo" value="{{$book->titulo}}">
			</div>
			<div class="form-group">
				<label>Páginas</label>
				<input type="text" name="paginas" value="{{$book->paginas}}">
			</div>
			<div class="form-group">
				<label>Autor</label>
				<select name="autor">
					<option value="0">
						sem autor
					</option>
					@foreach($authors as $author)
						@if($author->id ==  $book->autor){
							<option value="{{$author->id}}" selected>
								{{$author->nome}}
							</option>
							@else
							<option value="{{$author->id}}">
								{{$author->nome}}
							</option>
						@endif
					}
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Capa') }}</label>
				<div class="col-md-6">
					<input type="file" name="img" id="img" class="custm-file-input" onchange="this.nextElementSibling.innerText=this.files[0].name">
				</div>
			</div>

			<p><button class="w3-button w3-teal">enviar</button></p>
			<a href="{{url('/book')}}"><span class="material-icons" >fast_rewind</span></a>
		</form>
	</div>
	
</div>
@endsection 