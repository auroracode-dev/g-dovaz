<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>G-Dovaz - @yield('title')</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='{{ asset('css/style.css') }}'>
    <link href="https://fonts.googleapis.com/css2?family=Paprika&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <div class="content">

        <!------------------------------Creacion De Titulo----------------------------------------->
        <header>
            <img class="branding" src="{{ asset('img/branding.png') }}">

            <!------------------------------Creacion Del Menu-------------------------------------------->
            <div class="menu">
                <nav>
                    <ul>
                        <li class="menu_li_Active"><a href="{{ route('index') }}">Inicio</a></li>
                        <li><a href="{{ route('post') }}">Publicaciones</a></li>
                        <li><a href="{{ route('news') }}">Proyectos</a></li>
                        <li><a href="{{ route('news') }}">Noticias</a></li>
                        <li><a href="{{ route('shop') }}">Tienda</a></li>
                    </ul>
                </nav>
            </div>
            @yield('banner')
        </header>
        @yield('content')
        <!------------------------------Elavoracion Del Footer------------------------------>
        <footer class="footer">
            <p>&copy2021 Estrategias Educativas - Todos los derechos reservados</p>
        </footer>
    </div>

    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
