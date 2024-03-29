<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>DeliFeria</title>
  <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/5xCxH1j/DELIFERIALOGO.png">
</head>
<body>
<nav class="navbar navbar-expand-lg">        
        <div class="container">
            <a class="navbar-brand" href="{{action('UsuarioController@show', $usuario->id)}}"> <img src="https://i.ibb.co/5xCxH1j/DELIFERIALOGO.png" class="logo"
                    alt="logo sitio"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <ion-icon name="menu-sharp"></ion-icon>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item letra" id='ver_productos'>
                        <h2>
                            <a class="nav-link" href="{{action('MainController@ver_productos_comprador', $usuario->id)}}">Ver productos</a>                            
                        </h2>
                    </li>
                    <li class="nav-item letra" id="cuenta">
                        <h2>
                            <a class="nav-link" aria-current="page" href="{{action('UsuarioController@actualizar_view', $usuario->id)}}">Cuenta</a>
                        </h2>
                    </li>
                    <li class="nav-item letra" id="cuenta">
                        <h2>
                            <a class="nav-link" aria-current="page" href="{{action('MainController@ver_carrito', $usuario->id)}}">Carrito</a>
                        </h2>
                    </li>
                    <li class="nav-item letra salir"  id="salida">
                        <h2>
                            <a class="nav-link" href="/">Salir</a>
                        </h2>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <h1>Lista de productos</h1>
        @forelse ($productos as $producto)
        <div>
        <h3>{{$producto->nombre}}</h3>
        <p>{{$producto->descripcion}}</p>
        <p>Precio: ${{$producto->precio}}</p>
        <p>Stock: {{$producto->stock}}</p>
         </div>
         @empty
         <p> No tiene productos ingresados</p>
         @endforelse
    </div>
</body>
</html>

<style>
    body{
        background-color: #52B69A;
        height: auto;
        font-family: noto-serif;
    }
    .container-fluid {
        background-color: #B5E48C;
        width: 50%;
        margin-top: 1%;
    }

    .logo {
        min-width: 120px;
        max-width: 140px;
    }

    .logo2 {
        min-width: 120px;
        max-width: 140px;
    }

    a{
        color: black;
    }
    h1{
        text-align: center;
        font-weight: bold;
    }
    .row{
        background-color: #B5E48C;
    }
    label{
        margin-left: 15%;
        padding: 0;
        font-weight: bold;
        display:block;
        font-size: 20px;
    }
    select, input{
        margin-left: 5%;
        width: 80%;
        margin-bottom: 1%;
    }
    .boton{
        margin:10%;
        width:30vh;
    }
    input[type="submit"] {
        border: none;
        outline: none;
        height: 4%;
        background: #117CF6;
        color: #fff;
        font-size: 18px;
        border-radius: 20px;
        display:block;
    }

    .navbar-toggler { font-size: 40px;}
    .navbar-toggler:focus { outline:none}
    .nav-link{
        border: solid;
        border-color: #52B69A;
        border-radius: 20px;
        background-color: #117CF6;
        color:white;
    }

    .nav-link:hover {
        color: #1a1a1a
    }

    .navbar {
        background-color: #B5E48C;
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .05);
        min-height: 100px;
    } 

</style>
