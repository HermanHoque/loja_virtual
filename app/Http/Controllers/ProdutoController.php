<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Str;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id(); // Obtém o ID do usuário logado
        $produtos = Produto::where('id_user', $userId)->paginate(5);
        $categorias = Categoria::all();

        if (Auth::check()) {
            return view("admin.produtos", compact("produtos", "categorias"));
        } else {
            return redirect()->route('site.index');
        }
        
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produto = $request->all(); 
        if ($request->imagem) {
            $path = $request->imagem->store("produtos"); //receber o path e colocar em uma subpasta 'produtos' do laravel
            $produto["imagem"] =  $path;
        }

        $produto["slug"] = Str::slug($request->nome);//Gerar um slog para o produto

        $produto = Produto::create($produto);

        return redirect()->route("admin.produtos")->with("sucesso", "Produto Cadastrado com Sucesso!!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->route("admin.produtos")->with("sucesso","Produto removido com sucesso!!");
    }
}
