<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->text("descricao");
            $table->double("preco", 10, 2);
            $table->string("slug");//para URL
            $table->string("imagem")->nullable();
            //criar a chave estrangeira
            $table->unsignedBigInteger("id_user");
            $table->foreign("id_user")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");
            //criar a chave estrangeira
            $table->unsignedBigInteger("id_categoria");//criar a chave estrangeira
            $table->foreign("id_categoria")->references("id")->on("categorias")->onDelete("cascade")->onUpdate("cascade");

            $table->timestamps();// cria duas colunas um de data de criacão e um de atualização
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
