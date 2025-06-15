<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('filmes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);

            // FK para generos
            $table->unsignedBigInteger('genero_id');
            $table->foreign('genero_id')
                ->references('id')->on('generos')
                ->onDelete('cascade');

            // FK para diretores
            $table->unsignedBigInteger('diretor_id');
            $table->foreign('diretor_id')
                ->references('id')->on('diretores')
                ->onDelete('cascade');

            $table->string('ano');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');

            //Lista de Favoritos
            $table->boolean('is_favorito')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('filmes');
    }
};
