@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar libro</h1>
    <form action="{{ route('libros.update', $libro->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $libro->titulo }}" required>
        </div>
        <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" name="autor" id="autor" class="form-control" value="{{ $libro->autor }}" required>
        </div>
        <div class="form-group">
            <label for="anio_publicacion">Año de publicación</label>
            <input type="number" name="anio_publicacion" id="anio_publicacion" class="form-control" value="{{ $libro->anio_publicacion }}" required>
        </div>
        <div class="form-group">
            <label for="genero">Género</label>
            <select name="genero" id="genero" class="form-control" required value="{{ $libro->genero }}">
                @foreach($generos as $genero)
                <option value="{{ $genero }}" @if($libro->genero == $genero) selected @endif>{{ $genero }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="editorial">Editorial</label>
            <select name="editorial" id="editorial" class="form-control">
                <option value="">Seleccione una editorial</option>
                @foreach($editoriales as $key => $editorial)
                <option value="{{ $key }}">{{ $editorial }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="5" required>{{ $libro->descripcion }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
