@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-6">

            <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Titolo --}}
                <label for="titolo" class="form-label">Titolo</label>
                <input type="text" class="form-control @error ('titolo') is-invalid @enderror" id="titolo" name="titolo">
                
                @error('titolo')             
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                
                {{-- Immagine --}}
                <label for="immagine" class="form-label">Immagine</label>
                <input type="file" class="form-control @error ('immagine') is-invalid @enderror" id="immagine" name="immagine">

                @error('immagine')             
                <div class="alert alert-danger">{{$message}}</div>
                @enderror

                {{-- Link --}}
                <label for="link" class="form-label">Link</label>
                <input type="text" class="form-control @error ('link') is-invalid @enderror" id="link" name="link">

                @error('link')             
                <div class="alert alert-danger">{{$message}}</div>
                @enderror

                {{-- Descrizione --}}
                <label for="descrizione" class="form-label">Descrizione</label>
                <input type="text" class="form-control @error ('descrizione') is-invalid @enderror" id="descrizione" name="descrizione">

                @error('descrizione')             
                <div class="alert alert-danger">{{$message}}</div>
                @enderror

                {{-- obiettivi --}}
                <label for="obiettivi" class="form-label">Obiettivi</label>
                <input type="text" class="form-control @error ('obiettivi') is-invalid @enderror" id="obiettivi" name="obiettivi">

                @error('obiettivi')             
                <div class="alert alert-danger">{{$message}}</div>
                @enderror

                {{-- Types --}}
                <div>
                    <label for="type" class="form-label">Tipologia</label>
                    <select name="type_id" id="type" class="form-select">
                        <option value="">--Scegli--</option>

                        @foreach ($types as $elem)
                            <option value="{{$elem->id}}">{{$elem->type_name}}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Technologies --}}
                <div class="form-group py-4">

                    @foreach ($technologies as $elem)

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                            name="technologies[]"
                            value="{{$elem->id}}"
                            id="post-checkbox-{{$elem->id}}">
                            <label class="form-check-label" for="post-checkbox-{{$elem->id}}">{{$elem->name}}</label>
                        </div>

                    @endforeach
                </div>

                <button type="submit" class=" d-block btn btn-primary">Invia</button>
            </form>
        </div>
    </div>
</div>

@endsection