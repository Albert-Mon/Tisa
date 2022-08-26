<!DOCTYPE html>
<html>
  <head>
    <title> Laravel 8 | Productos </title>
    <meta http-equip="Content-Type" content="text/html; charset=utf-8">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>
      .card{
        margin: 10px 5px 20px 5px;
      }
      .nav{
        background-color: #EEE;
      }
    </style>
  </head>
  <body>
    <br>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Nayeli</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Menú
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                <li><a class="dropdown-item" href="/index">Formulario</a></li>
                <li><a class="dropdown-item" href="/productos">Carrito</a></li>
                <li><a class="dropdown-item" href="/qrcode">QrCode</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <br>
    <nav class="nav justify-content-end">
      @if(session('carrito'))
        <a class="nav-link" href="{{ url('carrito') }}">
          El carrito contenido: {{count(session('carrito')) }} Articulos
        </a>
      @else
        <a class="nav-link" href="#">
          El carrito contenido:0 Articulos
        </a>
      @endif
    </nav>
    <br><br>

    <div class="container">
      @if($message = Session::get('success'))
        <div class="alert alert-success alert-block">
          <strong> {{ $message }} </strong>
        </div>
      @endif
        <div class="row">
          @foreach($productos as $producto)
            <div class="col-sm-4">
              <div class="card" style="width: 18rem;">
                <img src="{{ asset('img/'.$producto->img) }}" class="card-img-top" alt="..." height="300">
                <div class="card-body">
                  <h5 class="card-title"><b>N°.</b>{{ $producto->id }} - {{ $producto->nombre }}</h5>
                  <p class="card-text">
                    <b>Existencias:</b> {{ $producto->cantidad }}<br>
                    <b>Costo (c/u):</b> ${{ $producto->costo }}
                  </p>
                  <a href="{{ url('agregar/'.$producto->id) }}" class="btn btn-primary" role="button">Agregar</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>

      <footer class="bd-footer bg-light">
        <div class="container">
          <div class="row">
            <div>
              <ul class="list-unstyled small text-muted">
                <li class="mb-2">
                  Desaarrollo para <a href="http://utvt.edomex.gob.mex/">UTVT</a>, Noveno cuatrimestre de IDGS-93, 2021. &#169;
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>

  </body>

</html>
