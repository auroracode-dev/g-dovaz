@extends('adminlte::page')

@section('title', 'Galleria')
@section('content_header')
    <div class="d-flex aling-items-center">
        <h1>Actualizar publicación</h1>
    </div>
@stop

@section('content')
    <form id="form" action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <button type="submit" id="submit" class="btn btn-primary mb-3">Actualizar publicación</button>

        <div class="row">
            <div class="col">

                <!-- This input save the index of the user -->
                <input type="number" value={{ $gallery->user->id }} hidden name="user_id">

                <div class="form-group">
                    <label for="title" class="form-label">Titulo</label>
                    <input type="text" value="{{ $gallery->title }}" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="img" class="form-label">Imagen</label>
                    <input type="file" id="img" name="img" class="form-control-file">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="category" class="form-label">Categoria</label>
                    <select id="category" class="form-control" name="category_id">
                        @foreach ($categories as $category)
                            <option @if ($category->id == $gallery->category->id) selected @endif value="{{ $category->id }}">
                                {{ $category->category }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="prueba" class="col form-group">
                <!-- This textarea save post content -->
                <textarea hidden id="body" name="description">{!! $gallery->description !!}</textarea>
                <label for="body" class="form-label">Descripcion del contenido</label>
                <div id="editor" class="bg-white">
                    {!! $gallery->description !!}
                </div>
            </div>
        </div>
    </form>
@stop

@section('css')
    <!-- <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> -->
@stop

@section('js')
    <script src="{{ URL::asset('js/app.js') }}">
    </script>
@stop
