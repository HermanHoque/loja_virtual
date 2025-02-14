<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable =[
        "nome",
        "descricao",
        "preco",
        "imagem",
        "slug",
        "id_user",
        "id_categoria",
    ];

    protected $table = "produtos";

    //retornar informações do usuario que o produto pertence (ligar tabelas ou relacionamento)
    public function user()
    {
        return $this->belongsTo(User::class, "id_user");
    }

    //retornar informações da categori do produto (ligar tabelas ou relacionamento)

    public function categoria(){
        return $this->belongsTo(Categoria::class, "id_categoria");
    }
}
