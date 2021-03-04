@extends('base.base')

@section('conteudo')
<div class="w3-container w3-teal">
	<h1>Cadastro de livros</h1>
</div>
<div class="w3-container">
	<table class="w3-table-all w3-hoverable">
		<form action="{{url('/book/save')}}" method="post" enctype="multipart/form-data">
			@csrf
			@if($errors->any())
			<div class="alert alert-success col-sm-4">
				<strong>
					@foreach($errors->all() as $error)
					<li>
						{{$error}}
					</li>

					@endforeach
				</strong> 
			</div>
			@endif
			<div class="form-group">
				<label>titulo</label>
				<input type="text" name="titulo">
				@if($errors->has('titulo'))
				<div class="alert alert-success col-sm-4">
					<strong>
						{{$errors->first('titulo')}}
					</strong> 
				</div>
				@endif
			</div>
			<div class="form-group">
				<label>PAGINAS</label>
				<input type="text" name="paginas">
				@error('paginas')
				<div class="alert alert-success col-sm-4">
					<strong>
						{{$message}}
					</strong> 
				</div>
				@enderror
			</div>
			<div class="form-group ">
				<label>autor</label>
				<select name="autor">
					<option value="0">
						sem autor
					</option>
					@foreach($authors as $author)
					<option value="{{$author->id}}">
						{{$author->nome}}
					</option>
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
			<a href="{{url('/book')}}" ><span class="material-icons" >fast_rewind</span></a>
		</form>
	</div>
</div>
@endsection 