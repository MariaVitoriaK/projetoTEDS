<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('diretores', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('nacionalidade');
            ///     $table->foreign('filmes_id')
            ///       ->references('id')->on('filmes')
            ///      ->onDelete('cascade');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('diretores');
    }
};
