<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>@yield("title", "essa é a pagina layout")</title>
</head>
<body>
    
    <!--O materialize trabalha com class-->

    <!--menu categoria (dropdown)-->
    <ul id="dropdown1" class="dropdown-content">
      @foreach ($categoriasMenu as $catM)
        <li><a href="{{ route("site.categoria", $catM->id) }}">{{$catM->nome}}</a></li>
      @endforeach
    </ul>

    <!--menu opções do user (dropdown)-->
    <ul id="dropdown2" class="dropdown-content">
        <li><a href="{{route("admin.dashboard")}}">Dashboard</a></li>
        <li><a href="{{route("login.logout")}}">Sair</a></li>
      
    </ul>

    <!--menu da aplicação-->
    <nav class="" style="background-color: #0AB6F8">
        <div class="nav-wrapper container">
          <a href="#" class="brand-logo center">Loja Virtual</a>
          <ul id="nav-mobile" class="left">
            
            <li><a href="{{ route("site.index") }}"><strong>Home</strong></a></li>

            <li><a href="" class="dropdown-trigger" data-target="dropdown1"><strong>Categorias</strong><i class="material-icons right">expand_more</i></a></li>
          </ul>

          @auth
            <ul  id="nav-mobile" class="right">
              <li><a href="{{ route('site.carrinho') }}"><strong>Carrinho</strong> <span class=" new badge blue" data-badge-caption="">{{\Cart::getContent()->count()}}</span> </a></li>
              <li><a href="" class="dropdown-trigger" data-target="dropdown2">{{ Str::ucfirst(auth()->user()->firstName) }}<i class="material-icons right">expand_more</i></a></li>
            </ul>
          @else
            <ul  id="nav-mobile" class="right">
              <li><a href="{{ route('site.carrinho') }}"><strong>Carrinho</strong> <span class=" new badge blue" data-badge-caption="">{{\Cart::getContent()->count()}}</span> </a></li>
              <li><a href="{{route("login.form")}}"><strong>Login</strong><i class="material-icons right">lock</i></a></li>
            </ul>

          @endauth

        </div>
    </nav>

    <div style="padding-bottom: 20px"></div>

    @yield("conteudo")
     <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
      //Dropdown ......init...... 
      var elemdrop = document.querySelectorAll(".dropdown-trigger");
      var instanceDrop = M.Dropdown.init(elemdrop, {
          coverTrigger: false,
          constrainWidth: false
      });
    </script>
    
</body>
</html>