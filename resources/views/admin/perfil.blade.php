@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
    <h1>Mi Perfil</h1>
@stop

@section('content')
    <form class="card" method="POST" action="{{ route('perfil.update', $user->id) }}">
        @csrf
        @method('put')
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <label for="name" class="form-label">Nombres</label>
                    <input class="form-control" id="name" type="text" name="name" value="{{ $user->name }}" />
                </div>
                <div class="col">
                    <label for="lastname" class="form-label">Apellidos</label>
                    <input class="form-control" id="lastname" type="text" name="lastname"
                        value="{{ $user->lastname }}" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" id="email" type="text" name="email" value="{{ $user->email }}" />
                </div>
                <div class="col">
                    <label class="form-label">Rol</label>
                    <input class="form-control" type="text" name="rol" value="{{ $user->rol }}" disabled />
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Actualizar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
