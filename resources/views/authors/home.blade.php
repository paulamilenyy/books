@extends('base.base')

@section('conteudo')
<div class="w3-container w3-teal">
	<h1>Lista de autores <a href="{{route('authors.create')}}">
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
				<td>Nome</td>
				<td>Email</td>
				<td>Created_at</td>
				<td>Updated_at</td>
				<td>Editar</td>
				<td>Excluir</td>
			</tr>
		</thead>
		<tbody>
			@if(count($authors)>0)
			@foreach($authors as $author)
			<tr>
				<td><a href="{{route('authors.show',['author'=>$author->id])}}">{{$author->nome}}</a></td>
				<td>{{$author->email}}</td>
				<td>{{$author->created_at}}</td>
				<td>{{$author->updated_at}}</td>
				<td>
					 @can('update-author',$author) 
						<a href="{{route('authors.edit',['author'=>$author->id])}}"><span class="material-icons">edit</span></a>
					@else 
						<button disabled><span class="material-icons">edit</span></button>
					@endcan 
				</td>
				<td>
					@can('delete-author',$author) 
					<form action="{{route('authors.destroy',['author'=>$author->id])}}" method="post">
						@csrf
						@method('DELETE')
						<button style="border: none; cursor: pointer;background-color: transparent;"><span class="material-icons">delete</span></button>
					</form>
					
					@else
						<button disabled><span class="material-icons">delete</span></button>
					@endcan
				</td>
			</tr>
			@endforeach
			@else
			<tr>
				<td>Nenhum autor cadastrado  -----  <a href="{{route('authors.create')}}">adicionar</a> </td>
			</tr>


			@endif
		</tbody>
	</table>
	
	{{$authors->links()}}

</div>


@endsection 