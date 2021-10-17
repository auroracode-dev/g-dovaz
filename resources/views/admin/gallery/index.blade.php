@extends('adminlte::page')

@section('title', 'Galeria')

@section('content_header')
    <div class="d-flex aling-items-center">
        <h1>Tu Galeria</h1> <a href="{{ route('gallery.create') }}" class="mx-4 btn btn-primary">Nueva
            publicación</a>
    </div>
@stop

@section('content')
    <table class="table table-striped border">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th style="width: 600px;" scope="col">Titulo</th>
                <th class="text-center" scope="col">Categoria</th>
                <th class="text-center" scope="col">Descargar</th>
                <th style="width: 150px;" scope="col">Preview</th>
                <th scope="col">Fecha de publicación</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gallery as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->title }}</td>
                    <td class="text-center">{{ $item->category->category }}</td>
                    <td class="text-center"><a href="{{ route('gallery.download', $item->id) }}"><i class="fas fa-download"></i></a></td>
                    <td><img class="img-fluid" src="{{ $item->url_path }}" alt="{{ $item->title }}"></td>
                    <td>{{ $item->created_at }}</td>
                    <td style="font-size: 1.3rem" class="text-center d-flex justify-center">
                        <a href="{{ route('gallery.edit', $item->id) }}" class="mr-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="text-danger ml-2"
                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        <form id="delete-form-{{ $item->id }}" action="{{ route('gallery.destroy', $item->id) }}"
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
