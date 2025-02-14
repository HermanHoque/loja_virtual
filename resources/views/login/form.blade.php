<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    @if ($mensagem = Session::get("erro"))
    {{$mensagem}}

    @endif

    @if ($errors->any())
    @foreach ($errors->all() as $error)
        {{$error}}   <br>     
    @endforeach

    @endif

    <form action="{{route('login.auth')}}" method="post"> 
    @csrf
    Email: <br> <input type="email" name="email" id="" required> <br>
    Senha: <br> <input type="password" name="password" id="" required> <br>
    <a href="{{ route('login.create') }}">Criar conta</a> <br>
    <button type="submit">Entrar</button>
    </form>
</body>
</html>
