@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="card col-4 text-center m-3">
                <h2>{{ $post['titolo'] }}</h2>
                <img src="{{asset('storage/' . $post['immagine'])}}" alt="cover">

                {{-- @dd($post['immagine']) --}}

                <p>{{ $post['descrizione'] }}</p>
                <a href="{{ $post['link'] }}">{{ $post['link'] }}</a>

                @if ($post->type)                
                    <p>{{ $post->type->type_name }}</p>
                @endif

            </div>
            
            <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Elimina</button>
            </form>
        </div>
    </div>


@endsection