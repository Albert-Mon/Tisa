<!DOCTYPE html>
<html class='no-js' lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <title>Tisa</title>
    <meta content='lab2023' name='author'>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
    <link href="{{asset('assets/stylesheets/application-a07755f5.css')}}" rel="stylesheet" type="text/css" /><link href="{{asset('//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/images/favicon.ico')}}" rel="icon" type="image/ico" />

  </head>
  <body class='main page'>
    <!-- Navbar -->
    <div class='navbar navbar-default' id='navbar'>
      <a class='navbar-brand' href='#'>
        <i><img src="archivos/tisa.png" height="40" width="40"></img></i>
        TISA
      </a>
      <ul class='nav navbar-nav pull-right'>
        <li class='dropdown user'>
          <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
            <i class='icon-user'></i>
            <strong>JSalir</strong>
            <img class="img-rounded" src=" " />
            <b class='caret'></b>
          </a>
          <ul class='dropdown-menu'>
            <li>
              <a href="login2">Sign out</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <div id='wrapper'>
      <!-- Sidebar -->
      <section id='sidebar'>
        <i class='icon-align-justify icon-large' id='toggle'></i>
        <ul id='dock'>
          <li class='launcher'>
            <i class='icon-file-text-alt'></i>
            <a href="reporteadmin">Administradores</a>
          </li>
          <li class='launcher'>
            <i class='icon-file-text-alt'></i>
            <a href="reporteempleados">Empleados</a>
          </li>
          <li class='launcher'>
            <i class='icon-file-text-alt'></i>
            <a href="reportesoftware">Software</a>
          </li>
          <li class='launcher'>
            <i class='icon-file-text-alt'></i>
            <a href="ReporteAsignaciones">Asignaciones</a>
          </li>
          <li class='launcher'>
            <i class='icon-file-text-alt'></i>
            <a href="ConsultarReportes">Reportes</a>
          </li>
        </ul>
        <div data-toggle='tooltip' id='beaker' title='Made by lab2023'></div>
      </section>
      <!-- Tools -->
      <section id='tools'>
        <ul class='breadcrumb' id='breadcrumb'>
          <li class='title'>Forms</li>
        </ul>
        <div id='toolbar'>

        </div>
      </section>
      <!-- Content -->
      <div id='content'>
        <div class='panel panel-default'>

            @yield('contenido')

          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <!-- Javascripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    <!-- Google Analytics -->
    <script>
      var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
      g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
  </body>
</html>
