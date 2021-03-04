@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                <div>
                    <a href="{{url('/book')}}"><img src="https://img.icons8.com/bubbles/100/000000/books.png"/>livros</a>
                    <a href="{{route('authors.index')}}"><img src="https://img.icons8.com/bubbles/100/000000/edit-user.png"/>autores</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
