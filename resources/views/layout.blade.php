<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Kanban</title>

    <!-- Bootstrap core CSS -->
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/main.css" />
  
    <!-- Custom styles for this template -->
    <!-- <link href="starter-template.css" rel="stylesheet"> -->


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries 
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
    
</head>
<body>

    <div class="header-menu">
    <nav role="navigation" class="navbar navbar-default">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{ route('usuarios.index') }}" class="navbar-brand"><i class="glyphicon glyphicon-grain"></i>Kanban</a>
        </div>
        
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                
                
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Históricos<b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="{{ route('historicos.create') }}"><h5>Ingresar</h5></a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('historicos.index') }}">Ver</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Tallas<b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="{{ route('tallas.create') }}">Ingresar</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('tallas.index') }}">Ver</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Equipos<b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="{{ route('equipos.create') }}">Ingresar</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('equipos.index') }}">Ver</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Usuarios<b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="{{ route('usuarios.create') }}">Ingresar</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('usuarios.index') }}">Ver</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Privilegios</a></li>
                </li>
                
            </ul>
            <li><a href="{{ route('proyectos.index') }}">Proyecto</a></li>
            
        </div>
    </nav>
    </div>
    
    

    <div class="container">
        @yield('header')
        @yield('content')
       
    </div><!-- /.container -->
     <footer class="navbar navbar-default footer">
      <div class="container">
        <p class="text-muted">Proyecto Kanban. By Aplicados</p>
      </div>
    </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->

</body>
</html>
