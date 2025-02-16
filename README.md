loja virtual

para rodar o projeto deve instalar o composer no terminal,
se você esta usando o programa Laragon o composer já vem instalado por padrão então é só abrir o terminal do Laragon e digitar os seguintes comandos:

1- digite composer global require laravel/installer (caso não tenha o Framework laravel instalado)

3- Importa a base de dados "loja_BD" localizada no repositório e depois digite 
no terminar raiz do projeto o comando copy .env.example .env (para criar o arquivo .env)

4- digite composer install (para instalar as dependencias do projeto)

5- digite php artisan key:generate

caso esteja a usar o Xampp ou outro programa você deve instalar o composer primeiro e depois seguir os passos acima.
