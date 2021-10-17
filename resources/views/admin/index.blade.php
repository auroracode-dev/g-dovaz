@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <form class="card" enctype="multipart/form-data" method="POST" action="{{ route('site_init', $data->id) }}">
        @csrf
        @method('put')
        <h2 class="card-header">Inicio de la pagína</h2>
        <div class="card-body">

            <h4 class="w-100 mb-2">Primera Sección</h4>
            <div class="form-group">
                <label for="first-title" class="form-label">Titulo</label>
                <input value="{{ $data->first_section_title }}" id="first-title" class="form-control mb-2"
                    name="first_section_title" />

                <label for="img-first-section" class="form-label">Imagen (JPEG, JPG, PNG Y GIF)</label>
                <input type="file" class="form-control-file" id="img-first-section" name="img_first_section" />

                <label for="first-description" class="form-label">Contenido</label>
                <textarea id="first-description" class="form-control" style="min-height: 200px;"
                    name="first_description">{{ $data->first_description }}</textarea>
            </div>

            <h4 class="w-100 mb-2">Segunda Sección</h4>
            <div class="form-group">
                <label for="second-title" class="form-label">Titulo</label>
                <input value="{{ $data->second_section_title }}" class="form-control mb-2" name="second_section_title"
                    id="second-title" />
                <label for="second-description" class="form-label">Contenido</label>
                <textarea class="form-control" style="min-height: 200px;"
                    name="second_description">{{ $data->second_description }}</textarea>
            </div>

            <h2 class="card-title mb-2">Redes</h2>
            <div class="form-group row w-100">
                <div class="col-7">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <label class="input-group-text border border-secondary"><i class="fab fa-twitter"></i></label>
                        </div>
                        <input value="{{ $data->twitter }}" class="form-control border border-secondary"
                            placeholder="https://twitter.com/aurora_code" type="text" name="twitter" />
                    </div>

                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <label class="input-group-text border border-secondary"><i class="fab fa-facebook"></i></label>
                        </div>
                        <input value="{{ $data->facebook }}" class="form-control border border-secondary"
                            placeholder="https://www.facebook.com/aurora_code" type="text" name="facebook" />
                    </div>

                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <label class="input-group-text border border-secondary"><i class="fab fa-whatsapp"></i></label>
                        </div>
                        <input value="{{ $data->whatsapp }}" class="form-control border border-secondary"
                            placeholder="Enlace a whatsapp" type="text" name="whatsapp" />
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg align-self-center">Actualizar</button>
                </div>
            </div>
        </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
