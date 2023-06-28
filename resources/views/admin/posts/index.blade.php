@extends('layouts.app')

@section('content')

    <h1 class="text-center pb-2 pt-3">Projects</h1>

    <div class="text-center my-3">
        <a class="btn btn-primary" href="{{route('admin.posts.create')}}">Crea Progetto</a>
    </div>

    <div class="container">
        <div class="row">        
                @foreach ($posts as $elem)
                    <div class="card col-4 text-center m-3">
                        <a class="text-decoration-none text-dark" href="{{route('admin.posts.show', $elem)}}">
                            <h2>{{ $elem->titolo }}</h2>
                        </a>
                        <a class="btn btn-primary" href="{{route('admin.posts.edit', $elem)}}">Modifica</a>
                    </div>
                @endforeach
        </div>
    </div>

@endsection