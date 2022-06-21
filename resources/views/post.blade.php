@extends('layouts.layout')

@section('title', 'Publicaciones')

<!-----------------------------------Creacion de Las Secciones------------------------------------>
@section('content')


    <div class="justify_section">
        <div class="section_shot_justify">
            @foreach ($posts as $post)
            <h2 class="section subtitle"> <strong>{{ $post->title }}</strong></h2>
                <section class="section" style="margin-bottom: 1rem">
                    <div class="section_publications">
                        @if (isset($post->banner))
                            <img src=" {{ $post->url_path }}" alt="{{ $post->title }}">
                        @endif
                        <div class="content-posts">{{ strip_tags($post->content) }}</div>
                        <!-- <h3>Categoria: {$category->category}</h3>-->
                        <a href="{{ route('see_more', $post) }}"><button>Ver más</button></a>

                    </div>
                </section>
            @endforeach
        </div>
        <!---------------------------------Elavoracion Del Aside-------------------------------------------->
        <div class="aside_justify">
            <section class="section aside">
                <p>Publicaciones Recientes</p>
                <ul>
                    @foreach ($ultimes as $ultime)
                        <li><a href="{{ route('see_more', [($post = $ultime)]) }}">{{ $ultime->title }}</a></li>
                    @endforeach
                </ul>
            </section>
            @include('layouts.aside')
        </div>
    </div>
@endsection
