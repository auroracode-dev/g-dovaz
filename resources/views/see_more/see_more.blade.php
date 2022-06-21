@extends('layouts.layout')

@section('title', $post->title)

<body>
    <div class="content">
        @section('content')

            <!------------------------------Creacion de Las Secciones------------------------------>
            <h2 class="section subtitle"><strong>{{ $post->title }}</strong></h2>
            <section class="section">
                <img src="{{ $post->url_path }}">
                <div class="text">{!! $post->content !!}</div>
                <div class="section_publications" style="margin-left: 3em;">
                    <a href="{{ url()->previous() }}"><button>Volver</button></a>
                </div>
            </section>
        @endsection
