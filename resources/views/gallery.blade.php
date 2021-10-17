@extends('layouts.layout')

@section('title', 'Galeria')

@section('content')

    <!----------------------------Creacion de Las Secciones-------------------------------->
    <div class="justify_section">
        <div class="shot_justify">
            <h2 class="section subtitle">Galeria</h2>
            <section class="section shot_content">
                @foreach ($products as $product)
                    <div class="products letters">
                        <img src="{{ $product->url_path }}" alt="{{ $product->title }}">                            
                        <p>{{ $product->title }}</p>
                        <h3>{{ $product->price }}</h3>
                        <a href="{{ route('gallery_see', $product) }}"><button>Ver mas</button></a>
                    </div>
                @endforeach

            </section>
        </div>
        <!---------------------------Elavoracion Del Aside------------------------------------->
        <div class="aside_justify">
            <section class="section aside">
                <p>Publicaciones Recientes</p>
                <ul>
                    @foreach ($ultimes as $ultime)                        
                    <li><a href="{{ route('gallery_see', [$product = $ultime]) }}">{{$ultime->title}}</a></li>
                    @endforeach
                </ul>
            </section>
            @include('layouts.aside')
        </div>

    </div>

@endsection
