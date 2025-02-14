<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class SiteController extends Controller
{
    public function index()
    {
        $produtos = Produto::paginate(3);//este objecto passa os produtos por páginas e pode informar o nº de pag
        
        return view("site/home", compact("produtos"));
    }

    public function details($slug) 
    {
        $produto = Produto::where("slug", $slug)->first();//filtrar dados do BD para trazer apenas um registro

        return view("site/details", compact("produto"));
    }

    public function categoria($id){

        //filtrar todos os produtos que pertencem a uma categoria
        $produtos = Produto::where("id_categoria", $id)->paginate(3);//com paginação
        $categoria = Categoria::find($id);//vai pegar um registro atraves da variavel que esta como parametro  
        return view("site/categoria", compact("produtos", "categoria"));

    }
}
