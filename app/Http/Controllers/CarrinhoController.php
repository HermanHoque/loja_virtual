<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function carrinhoLista()
    {
        $itens = \Cart::getContent();
        //dd($itens);

        return view("site/carrinho", compact("itens"));
    }

    //Metodo para adicionar no carrinho (via post)
    public function adicionacarrinho(Request $rq)
    {
        \Cart::add([
            "id" => $rq->id,
            "name" => $rq->name,
            "price" => $rq->price,
            "quantity" => abs($rq->qnt),
            "attributes" => array(
                "image" => $rq->img
            )
        ]);

        return redirect()->route("site.carrinho")->with("Sucesso", "Produto adicionado com sucesso!");
    }


    public function removecarrinho(Request $rq){
        \Cart::remove($rq);
        return redirect()->route("site.carrinho")->with("Sucesso","Produto removido do carrinho com sucesso!");
    }

    public function atualizacarrinho(Request $rq){
        \Cart::update($rq->id, [
            "quantity" => [
                "relative" =>false,
                "value" => abs($rq->qnt),
            ]
        ]);
        return redirect()->route("site.carrinho")->with("Sucesso2","Produto atualizado com sucesso!");
    }


    public function limparcarrinho(){
        \Cart::clear();
        return redirect()->route("site.carrinho")->with("Aviso", "Carrinho limpo com sucesso!");
    }
}
