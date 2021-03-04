<!--MOSTRA TODOS OS LIVROS-->
@extends('base.base')

@section('conteudo')
<div class="w3-container w3-teal">
	<h1>Lista de livros <a href="{{url('/book/add')}}">
		<button class="w3-button w3-xlarge w3-circle w3-teal">+</button>
	</a></h1>
	@error('auth')
	<div class="alert alert-success col-sm-4">
		<strong>
			{{$message}}
		</strong> 
	</div>
	@enderror
</div>
<br>
<div class="w3-col w3-container m9 l11 s1">  
	<table class="w3-table w3-hoverable">
		<thead class="w3-light-grey">
			<tr>
				<th>Título</th>
				<th>Páginas</th>
				<th>Autor</th>
				<th>Editar</th>
				<th>Excluir</th>
			</tr>
		</thead>
		<tbody>
			@if(count($books)>0)
			@foreach($books as $book)
			<tr>
				<td><a href="{{url('/book/show',['id'=>$book->id])}}">{{$book->titulo}}</a></td>  <!--pega os dados, pelo modelo, q estao no banco-->
				<td>{{$book->paginas}}</td>
				<td>
					@if($book->autor==NULL)
					sem autor
					@else
					{{$book->author->nome}}
					@endif
				</td>
				<td>
					<a href="{{url('/book/edit',['id'=>$book->id])}}"><span class="material-icons">edit</span></a>
				</td>
				<td>
					<form action="{{url('/book/destroy',['id'=>$book->id])}}">
						@csrf
						<button style="border: none; cursor: pointer;background-color: transparent;"><span class="material-icons">delete</span></button>
					</form>
				</td>
			</tr>
			@endforeach
			@else
			<tr>
				<td>sem dadoss</td>
			</tr>
			@endif
		</tbody>
	</table>
</div>


@endsection 