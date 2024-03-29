<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carro de compra</title>
  <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/5xCxH1j/DELIFERIALOGO.png">
  <link rel="stylesheet" href="estilo.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:ital@1&display=swap" rel="stylesheet">   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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

  <div class="wrapper">
    <div class="container">
      <div class="row">
        <div class="col-xs-8">
          <div class="panel panel-info">
            <div class="panel-heading">
              <div class="panel-title">
                <div class="row">
                  <div class="col-xs-6">
                    <h5><span class="glyphicon glyphicon-shopping-cart"></span> Carrito de compra</h5>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="panel-body">
              
              <div style="padding-left:50px">

                <table class="table table-hover shopping-cart-wrap" style="width:100%">
                    <thead class="text-muted">
                        <tr>
                            <th scope="col" width="120">Producto</th>
                            <th scope="col" width="80">Descripcion</th>
                            <th scope="col" width="80">Precio</th>
                            <th scope="col" width="80">Cantidad</th>
                            <th scope="col" width="100" class="center">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <tr>
                          <div class="container" style="padding-top:20px">

                              <td>
                                  <figure class="media">
                                      <figcaption class="media-body">   
                                      </figcaption>
                                  </figure>
                            
                                  <h6 class="title text-truncate"> Producto 1 </h6>
                                    
                                    <dl class="param param-inline small">
                              </td>
                              <td>
                                    <dd>Descripcion del producto 1 </dd>
                                    </dl>
                                          
                              </td>
                              <td> 
                                  <div class="price-wrap"> 
                                      <var class="precio"> CLP 3700 </var> 
                                      <small class="text-muted"></small> 
                                  </div> 
                              </td>
                              <td> 
                                  <div class="price-wrap"> 
                                      <var class="precio"> 1</var> 
                                      <small class="text-muted"></small> 
                                  </div> 
                              </td>
                              <td class="center">  
                                  <a href="#" class="btn botonborrar " type=""> X </a>
                              </td>

                          </div>
                          
                        </tr>
                        <tr>
                          <div class="container" style="padding-top:20px">
                              <td>
                                  <figure class="media">
                                     
                                      <figcaption class="media-body">   
                                      </figcaption>
                                  </figure>
                            
                                  <h6 class="title text-truncate"> Producto 2 </h6>
                                    
                                    <dl class="param param-inline small">
                              </td>
                              <td>
                                    <dd>Descripcion del producto 2 </dd>
                                    </dl>
                                          
                              </td>
                              <td> 
                                  <div class="price-wrap"> 
                                      <var class="precio"> CLP 4300 </var> 
                                      <small class="text-muted"></small> 
                                  </div> 
                              </td>
                              <td> 
                                  <div class="price-wrap"> 
                                      <var class="precio"> 2</var> 
                                      <small class="text-muted"></small> 
                                  </div> 
                              </td>
                              <td class="center">  
                                  <a href="#" class="btn botonborrar " type=""> X </a>
                              </td>
      
                          </div>
                          
                        </tr>
                        

                      
                    </tbody>  
                </table>
                        <hr>
                          
              </div>
            </div>
              <hr>

            </div>
            <div class="panel-footer">
              <div class="row text-center">
                <div class="col-xs-9">
                  <h4 class="text-right">Total <strong>$12300 CLP</strong></h4>
                </div>
                <div class="col-xs-6">
                  <input type="submit" class="btn btn-primary" value="Continuar comprando">
                  <input type="submit" class="btn btn-primary" value="Ir a Pago">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>

<style>

  body {
    background-color: #52B69A;
    height: auto;
    font-family: 'Zilla Slab', serif;
    }
  .wrapper{
    padding:0;
    margin-right: 25%;
    margin-left: 25%;
    margin-top: 2%;
    margin-bottom: 2%;
    min-height: 91vh;
    overflow:auto;
    background-color: #B5E48C;
  }
  .logo {
        min-width: 120px;
        max-width: 140px;
    }

    .logo2 {
        min-width: 120px;
        max-width: 140px;
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