
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>App Usuarios</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->     
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height">
            
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        
                        <a class="nav-link" href="{{ route('usuarios.index') }}">Usuarios</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                       
                            Cerrar sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                   
                        <a href="{{ route('login') }}">Iniciar Sesión</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registro</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <img src="images/home_cats.svg" alt="home">
                <div class="title m-b-md">
                    App Usuarios
                </div>
                    <div class="row">
                        <p style="font-size: 20px;">
                            He creado esta app, durante el curso online de pildorasinformaticas sobre Laravel en youtube. En ella podemos crear, listar, actualizar y eliminar usuarios. Para acceder al listado de usuarios, hay que registrarse o iniciar sesión más arriba. Luego se redireccionará al listado de usuarios existentes, donde podremos crear un nuevo usuario o editar, eliminar alguno en concreto.
                        </p>
                    </div>               
                </div>
               
                
            </div>
        </div>
    </body>
</html>
