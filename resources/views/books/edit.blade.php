@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <h1>Editar Libro</h1>

    <form action="{{route('books.update',$book->id)}}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
        <label class="form-label">Título</label>
        <input type="text" name="name" class="form-control" value="{{$book->name}}">
        </div>

        <div class="mb-3">
            <label>Año publicación</label>
            <input type="number" name="publication_year" min="1900" max="2099" step="1" class="form-control" value="{{$book->publication_year}}">
        </div>

        <div class="mb-3">
            <label class="form-label">Autores</label>
            @foreach($authors as $author)
                <div class="form-check">
                    <input type="checkbox" name="authors[]" value="{{$author->id}}" class="form-check-input" {{$book->authors->contains($author->id) ? 'checked': ''}}>
                    <label class="form-check-label">{{$author->name}}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{route('books.index')}}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection