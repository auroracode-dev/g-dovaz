@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
    <h1>Cambiar Contraseña</h1>
@stop

@section('content')
    <form class="card m-auto" method="POST" action="{{ route('perfil.update_password', $user->id) }}"
        style="width: 38rem;">
        @csrf
        @method('put')
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <label for="password" class="form-label">Nueva Contraseña</label>
                    <input class="form-control" id="password" type="password" name="password" /> <i
                        class="fas fa-view"></i>
                    <button class="btn btn-primary mt-2" type="submit">Actualizar</button>
                </div>
            </div>
        </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
