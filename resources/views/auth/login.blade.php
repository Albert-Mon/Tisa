<!DOCTYPE html>
<html class='no-js' lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <title>Sign in</title>
    <meta content='lab2023' name='author'>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
    <link href="assets/stylesheets/application-a07755f5.css" rel="stylesheet" type="text/css" /><link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/images/favicon.ico" rel="icon" type="image/ico" />

  </head>
  <body class='login'>
    <div class='wrapper'>
      <div class='row'>
        <div class='col-lg-12'>
          <div class='brand text-center'>
            <h1>
              <div class='logo-icon'>
                <i class='icon-beer'></i>
              </div>
              TISA
            </h1>
          </div>
        </div>
      </div>
      <div class='row'>
        <div class='col-lg-12'>
          <form action="{{ route('validar') }}" method="POST">

              {{ csrf_field() }}

            <fieldset class='text-center'>

                 <div class='form-group'>
                <label for="correo"> Ingresa Correo:
                  @if ($errors->first('email'))
                  <p class='text-danger'>{{$errors->first('email')}}
                  @endif
                </label>
                <input class='form-control' placeholder='E-Mail' type='email' name="email" id="email" value="">
              </div>

              <div class='form-group'>
                <label for="pass"> Contraseña:
                  @if ($errors->first('password'))
                  <p class='text-danger'>{{$errors->first('password')}}
                  @endif
                </label>
                <input class='form-control' placeholder='Contraseña' type='password' name="password" id="password" value="">
              </div>

              <div class='text-center'>
                <div class='checkbox'>
                  <label>
                    <input type='checkbox'>
                    Remember me on this computer
                  </label>
                </div>
                    <input type="submit" value="Sign In" class="btn btn-success btn-block btn-lg" tabindex="7" title="Sing  In">
                <br>
                <a href="{{ route('password.request') }}">Forgot password?</a>

              </div>
            </fieldset>
          </form>
          <br><br>
          @if(Session::has('mensaje'))
          <div class="alert alert-danger">{{ Session::get('mensaje') }}</div>
          @endif
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
