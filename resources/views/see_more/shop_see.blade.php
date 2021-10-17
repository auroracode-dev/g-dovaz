@extends('layouts.layout')

@section('title', 'Tienda ver mas')

@section('content')
    <section class="section see_more">
        <img src="{{ $product->url_path }}">
        <div>
            <div>
                <h2 class="subtitle">{{ $product->title }}</h2>
                <div class="text">{!! $product->description !!}</div>
                <h3>${{ $product->price }}</h3>
            </div>
            <div class="section_publications see_more-buttoms">
                <a href="{{ url()->previous() }}"><button>Volver</button></a>
                <a href="#"><button>Comprar</button></a>
           
            </div>
        </div>
    </section>
@endsection
