loja virtual

para rodar o projeto deve instalar o composer no terminal,
se você esta usando o programa Laragon o composer já vem instalado por padrão então é só abrir o terminal do Laragon e digitar os seguintes comandos:

1- digite composer global require laravel/installer (caso não tenha o Framework laravel instalado)

3- cria uma base de dados manualmente com o nome "loja" e depois digite 
no terminar raiz do projeto o comando composer install (para instalar as dependencias do projeto)

4- digite copy .env.example .env (para criar o arquivo .env)

5- digite php artisan key:generate

6 - digite php artisan migrate (para criar as tabelas automaticamente)

7 - digite php artisan db:seed (para inserir dados na tabela categorias)

caso esteja a usar o Xampp ou outro programa você deve instalar o composer primeiro e depois seguir os passos acima.
