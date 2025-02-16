<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>
    <!-- Importando o Materialize CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        body {
            background-color: #f5f5f5; /* Cor de fundo suave para o body */
            padding: 20px;
        }
        .card {
            padding: 20px;
            margin-top: 50px;
            background-color: white; /* Garantindo que o card seja branco */
            border-radius: 8px; /* Bordas arredondadas para o card */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra suave */
        }
        .btn {
            width: 100%;
            margin-top: 20px;
        }
        .input-field {
            margin-bottom: 20px; /* Espaçamento entre os campos */
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col s12 m8 offset-m2 l6 offset-l3">
                <div class="card">
                    <h4 class="center-align">Cadastro</h4>

                    @if ($errors->any())
                        <div class="card-panel red lighten-2">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        <div class="input-field">
                            <input type="text" name="firstName" id="firstName" class="validate" required>
                            <label for="firstName">Nome</label>
                        </div>
                        <div class="input-field">
                            <input type="text" name="lastName" id="lastName" class="validate" required>
                            <label for="lastName">Sobrenome</label>
                        </div>
                        <div class="input-field">
                            <input type="email" name="email" id="email" class="validate" required>
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field">
                            <input type="password" name="password" id="password" class="validate" required>
                            <label for="password">Senha</label>
                        </div>
                        <button type="submit" class="btn waves-effect waves-light">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Importando o Materialize JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        // Inicializa os componentes do Materialize (como inputs)
        document.addEventListener('DOMContentLoaded', function() {
            M.updateTextFields(); // Atualiza os campos de texto para garantir que os labels funcionem corretamente
        });
    </script>
</body>
</html>