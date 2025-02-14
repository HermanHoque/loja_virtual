<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriasSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            ['nome' => 'Roupas', 'descricao' => 'Vestuário masculino, feminino e infantil'],
            ['nome' => 'Acessórios', 'descricao' => 'Brincos, colares, pulseiras e outros acessórios'],
            ['nome' => 'Calçados', 'descricao' => 'Sapatos, tênis e sandálias'],
            ['nome' => 'Eletrônicos', 'descricao' => 'Celulares, notebooks e acessórios eletrônicos'],
            ['nome' => 'Livros', 'descricao' => 'Livros de diversos gêneros e autores'],
            ['nome' => 'Móveis', 'descricao' => 'Sofás, mesas, cadeiras e móveis em geral'],
            ['nome' => 'Cosméticos', 'descricao' => 'Produtos de beleza e cuidados pessoais'],
            ['nome' => 'Brinquedos', 'descricao' => 'Jogos e brinquedos para crianças'],
            ['nome' => 'Esportes', 'descricao' => 'Artigos esportivos e equipamentos'],
            ['nome' => 'Alimentos', 'descricao' => 'Produtos alimentícios e bebidas'],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
