<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>   
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Custom CSS-->
    <link rel="stylesheet" href="{{asset("css/style.css")}}">

 
    
</head>
<body>
     
   
      

    <!-- Dropdown Structure -->
 <ul id='dropdown2' class='dropdown-content'>     
    <li><a href="{{ route('site.index') }}">Home</a></li>
    <li><a href="{{ route('login.logout') }}">Sair</a></li> 
  </ul>


  <nav style="background-color: #0AB6F8;">
      <div class="nav-wrapper container" style="margin-bottom: 10px">
          <h4 class="center brand-logo"><strong>Loja Virtual</strong></h4>    
        <ul class="right ">                                 
            <li class="hide-on-med-and-down"><a href="#" onclick="fullScreen()"><i class="material-icons">settings_overscan</i> </a> </li>
            <li><a href="#" class="dropdown-trigger" data-target='dropdown2'>{{ Str::ucfirst(auth()->user()->firstName) }} <i class="material-icons right">expand_more</i> </a></li>     
        </ul>
        <a href="#" data-target="slide-out" class="sidenav-trigger left  show-on-large"><i class="material-icons">menu</i></a>
      </div>
    </nav>
  

  <ul id="slide-out" class="sidenav " >
    <li><div class="user-view">
      <div class="">
       <h4><strong>Menu Admin</strong></h4>
      </div>
       <hr>
     </div></li> 

      <li><a href="{{  route('admin.dashboard') }}"><i class="material-icons">dashboard</i>Dashboard</a></li>
      <li><a href="{{ route('admin.produtos') }}"><i class="material-icons">playlist_add_circle</i>Produtos</a></li>
      <li><a href="{{ route('login.logout') }}"><i class="material-icons">logout</i>Sair</a></li>
  </ul>

    @yield('conteudo')



    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="{{asset("js/chart.js")}}" ></script>
    <script src="{{asset("js/main.js")}}"></script>
    @stack('graficos')
    

</body>
</html>