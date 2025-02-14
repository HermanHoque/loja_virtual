<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //método para iniciar a sessão
    public function auth(Request $rqt) {
        $credenciais = $rqt->validate([
            "email" => ["required", "email"],
            "password" => ["required"],
        ],  [
            "email.required" => "O campo email é obrigatório",
            "email.email" => "O email não é válido",
            "password.required" => "O campo senha é obrigatório"
        ]
        );

        //verificar autenticação do user atraves das credenciais
        if (Auth::attempt($credenciais, $rqt->remember)) { //Se for autenticado
            
            $rqt->session()->regenerate();//criar um novo id para sessão
            return redirect()->intended("/admin/dashboard");//url da Rota 

        }else{//se não for autenticado
            return redirect()->back()->with("erro", "Email ou senha invalida");
        }
    }

    //metodo para terminar a sessão do user
    public function logout(Request $rqt)
    {
        Auth::logout();
        $rqt->session()->invalidate();
        $rqt->session()->regenerateToken();
        return redirect()->route("site.index");
    }
}
