@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <div class="d-flex aling-items-center">
        <h1>Tus Productos</h1> <a href="{{ route('products.create') }}" class="mx-4 btn btn-primary">Nueva
            publicación</a>
    </div>
@stop

@section('content')
    <table class="table table-striped border">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th style="width: 500px;" scope="col">Titulo</th>
                <th scope="col">Precio</th>
                <th style="width: 150px;" scope="col">Preview</th>
                <th class="text-center" scope="col">File</th>
                <th scope="col">Categoria</th>
                <th class="text-center" scope="col">Fecha de publicación</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->title }}</td>
                    <td>${{ $item->price }}</td>
                    <td class=""><img class="img-fluid" src="{{ $item->url_path }}"
                            alt="{{ $item->title }}"></td>
                    <td class="text-center"><a href="{{ route('products.download', $item->id) }}"><i class="fas fa-download"></i></a></td>
                    <td>{{ $item->category->category }}</td>
                    <td class="text-center">{{ $item->created_at }}</td>
                    <td style="font-size: 1.3rem" class="text-center d-flex justify-center">
                        <a href="{{ route('products.edit', $item->id) }}" class="mr-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="text-danger ml-2"
                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        <form id="delete-form-{{ $item->id }}" action="{{ route('products.destroy', $item->id) }}"
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
