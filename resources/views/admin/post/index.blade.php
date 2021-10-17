@extends('adminlte::page')

@section('title', 'Publicaciones')

@section('content_header')
    <div class="d-flex aling-items-center">
        <h1>Tus Publicaciones</h1> <a href="{{ route('posts.create') }}" class="mx-4 btn btn-primary">Nueva
            publicación</a>
    </div>
@stop

@section('content')
    <table class="table table-striped border">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th style="width: 600px;" scope="col">Titulo</th>
                <th scope="col">Categoria</th>
                <th scope="col">Tipo</th>
                <th scope="col">Fecha de publicación</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->category }}</td>
                    <td>{{ $post->type }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td style="font-size: 1.3rem" class="text-center d-flex justify-center">
                        <a href="{{ route('posts.edit', $post->id) }}" class="mr-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="text-danger ml-2"
                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $post->id }}').submit();">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        <form id="delete-form-{{ $post->id }}" action="{{ route('posts.destroy', $post->id) }}"
                            method="POST" style="display: none;">
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
