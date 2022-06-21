@extends('adminlte::page')

@section('title', 'Publicaciones')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content_header')
    <div class="d-flex aling-items-center">
        <h1>Actualizar publicación</h1>
    </div>
@stop

@section('content')
    <form id="form" action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @method('put')
        <button type="submit" id="submit" class="btn btn-primary mb-3">Actualizar publicación</button>

        <div class="row">
            <div class="col">

                <!-- This input save the index of the user -->
                <input type="number" value={{ $post->user->id }} hidden name="user_id">

                <div class="form-group">
                    <label for="title" class="form-label">Titulo</label>
                    <input type="text" value="{{ $post->title }}" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="banner" class="form-label">Banner</label>
                    <input type="file" id="banner" name="banner" class="form-control-file">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="category" class="form-label">Categoria</label>
                    <select id="category" class="form-control" name="category_id">
                        @foreach ($categories as $category)
                            <option @if ($category->id == $post->category->id) selected @endif value="{{ $category->id }}">
                                {{ $category->category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="type" class="form-label">Tipo de publicación</label>
                    <select id="type" class="form-control" name="type">
                        <option @if ($post->type == 'news') selected @endif value="news">Noticia</option>
                        <option @if ($post->type == 'project') selected @endif value="project">Proyecto</option>
                        <option @if ($post->type == 'blog') selected @endif value="blog">Blog</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="prueba" class="col form-group">
                <!-- This textarea save post content -->
                <textarea hidden id="body" name="content">{!! $post->content !!}</textarea>
                <label for="body" class="form-label">Contenido</label>
                <div id="editor" class="bg-white">
                    {!! $post->content !!}
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
