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

        //gráfico 1 - usuários 
        $usersDados = User::select([
            DB::raw("YEAR(created_at) as ano"),
            DB::raw("count(*) as total"),

        ])->groupBy("ano")->orderBy("ano","asc")->get();

        //preparar arrays
        $ano = [];
        $total = [];
        foreach ($usersDados as $userDado) {
            $ano[] = $userDado->ano;
            $total[] = $userDado->total;
        }

        //formatar para chart js
        $userLabel = "'Comparativo de cadastro de usuários'";
        $userAno = implode(",", $ano) ?? null;
        $userTotal = implode(",", $total) ?? null;


        //grafico 2 - categorias
        $catsDados = Categoria::with("produtos")->get();//pegar a tabela produtos do BD relacionada

        //preparar array para graficos 2
        $catNome = []; // Inicializa a variável
        $catTotal = []; // Inicializa a variável
        foreach ($catsDados as $catDado) {
            $catNome[] = "'".$catDado->nome."'";
            $catTotal[] = $catDado->produtos->count(); //contar os produtos
        }

        //formatar para chart js do grafico 2
        $catLabel = implode(",", $catNome);
        $catTotal = implode(",", $catTotal);

        if (Auth::check()) { //se estiver logado
            return view("admin/dashboard", compact("users", "userLabel", "userAno", "userTotal", "catLabel", "catTotal", "produtoTotal"));

        } else {
            return redirect()->route('site.index');
       
        }
    }
}
