@extends('layouts.layout')

@section('title', 'Inicio')

    @section('banner')
        <!------------------------------Imagen Del Header------------------------------>
        <div class="img_header">
            @if (isset($site_init->site_banner))
                <img src="{{ Storage::url($site_init->site_banner) }}"/>
            @endif
        </div>
    @endsection

        @section('content')

            <!------------------------------Creacion de Las Secciones------------------------------>
                @if (isset($site_init->first_section_title))
                    <h2 class="section subtitle">{{ $site_init->first_section_title }}</h2>
                @endif
                <section class="section">
                    @if (isset($site_init->img_first_section))
                        <img src="{{ $site_init->url_path }}" alt="{{ $site_init->first_section_title }}">
                    @endif
                    @if (isset($site_init->first_description))
                        <p class="text">{{ $site_init->first_description }}</p>
                    @endif
                </section>
                @if (isset($site_init->second_section_title))
                    <h2 class="section subtitle">{{ $site_init->second_section_title }}</h2>
                @endif
                <section class="section">
                    @if (isset($site_init->second_description))
                        <p class="text">{{ $site_init->second_description }}</p>
                    @endif
                </section>
                @if (isset($site_init->whatsapp) and isset($site_init->facebook) and isset($site_init->twitter))
                    <h2 class="section subtitle">Redes Sociales</h2>
                    <section class="section">
                        <div class="section_redes">
                            @if (isset($site_init->whatsapp))
                                <a href="{{ $site_init->whatsapp }}"><img src="{{ asset('img/whatsapp.png') }}"></a>
                            @endif
                            @if (isset($site_init->facebook))
                                <a href="{{ $site_init->facebook }}"><img src="{{ asset('img/facebook.png') }}"></a>
                            @endif
                            @if (isset($site_init->twitter))
                                <a href="{{ $site_init->twitter }}"><img src="{{ asset('img/twitter.png') }}"></a>
                            @endif
                        </div>
                    </section>
                @endif
        @endsection