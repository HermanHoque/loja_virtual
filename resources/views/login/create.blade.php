<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{$error}}   <br>     
        @endforeach
    
    @endif

    <form action="{{ route('users.store') }}" method="post"> 
        @csrf
        Nome: <br> <input type="text" name="firstName" id="" required> <br>
        Sobrenome: <br> <input type="text" name="lastName" id="" required> <br>
        Email: <br> <input type="email" name="email" id="" required> <br>
        Senha: <br> <input type="password" name="password" id="" required> <br>
        <button type="submit">Cadastrar</button>
    </form>
    
</body>
</html>