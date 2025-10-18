<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use DB; 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $users = User::all()->count();
        $id_user =  Auth::id(); //id do user logado
        $produtoTotal = Produto::where("id_user", $id_user)->count();//contar os produtos

        //grafico - categorias
        $catsDados = Categoria::with("produtos")->get();
        
       /*  $catsDados = Categoria::whereHas('produtos', function ($query) use ($id_user) {
            $query->where('id_user', $id_user);
        })->with('produtos')->get(); *///pegar a tabela produtos do BD relacionada

        //preparar array para graficos 
        $catNome = []; // Inicializa a variável
        $catTotal = []; // Inicializa a variável
        foreach ($catsDados as $catDado) {
            $catNome[] = "'".$catDado->nome."'";
            $catTotal[] = $catDado->produtos->count(); //contar os produtos
        }

        //formatar para chart js do grafico 
        $catLabel = implode(",", $catNome);
        $catTotal = implode(",", $catTotal);

        if (Auth::check()) { //se estiver logado
            return view("admin/dashboard", compact("users", "catLabel", "catTotal", "produtoTotal"));

        } else {
            return redirect()->route('site.index');
        
        }
    }
}
