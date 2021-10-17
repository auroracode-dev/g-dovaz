@extends('layouts.layout')

@section('title', 'Inicio')

<body>
    <div class="content">
        @section('content')

            <!------------------------------Creacion de Las Secciones------------------------------>
            @foreach ($site_init as $site_inits)
                @if (isset($site_inits->first_section_title))
                    <h2 class="section subtitle">{{$site_inits->first_section_title}}</h2>
                @endif
            <section class="section">
                    @if (isset($site_inits->img_first_section))
                <img src="{{$site_inits->url_path}}" alt="{{$site_inits->first_section_title}}">
                @endif
                @if (isset($site_inits->first_description))
                <p class="text">{{$site_inits->first_description}}</p>
                @endif
            </section>
            @if (isset($site_inits->second_section_title))
            <h2 class="section subtitle">{{$site_inits->second_section_title}}</h2>
        @endif
            <section class="section">
                @if (isset($site_inits->second_description))
                <p class="text">{{$site_inits->second_description}}</p>
            @endif  
            </section>
            <h2 class="section subtitle">Redes Sociales</h2>
            <section class="section">
                <div class="section_redes">
                    @if (isset($site_inits->whatsapp))                        
                    <a href="{{$site_inits->whatsapp}}"><img src="{{asset('img/whatsapp.png')}}"></a>
                    @endif
                    @if (isset($site_inits->facebook))                        
                    <a href="{{$site_inits->facebook}}"><img src="{{asset('img/facebook.png')}}"></a>
                    @endif
                    @if (isset($site_inits->twitter))                        
                    <a href="{{$site_inits->twitter}}"><img src="{{asset('img/twitter.png')}}"></a>
                    @endif
                </div>
            </section>
            @endforeach
    </div>

    @endsection
