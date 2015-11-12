
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Pantera Mu Web">
    <meta name="author" content="scofield">
    <link rel="icon" href="">

    <title>Pantera Mu Web</title>

    <!-- Bootstrap core CSS -->
    <!--  <link href="/pantera/public/css/bootstrap.min.css" rel="stylesheet"> -->
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"> </script>

    <link href="/pantera/public/css/bootstrap-rosa.css" rel="stylesheet">
    <script src="/pantera/public/js/bootstrap.min.js"></script>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>

  <body>
<div class="container">

      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="{!! action('HomeController@index') !!}">Home</a></li>
            
            <li role="presentation"><a href="{!! action('RankingController@index') !!}">Ranking</a></li>

            @if(Cookie::get('loggedd'))
            <li role="presentation"><a href="{!! action('PanelController@index') !!}">Painel</a></li>
            @else
            <li role="presentation"><a href="{!! action('RegisterController@index') !!}">Cadastro</a></li>
            <li role="presentation"><a href="{!! action('LoginController@index') !!}">Login</a></li>
            @endif

          </ul>
        </nav>
        <h3 class="text-muted">PMW - Pantera Mu Web</h3>
      </div>

      @yield('content')

</div>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
