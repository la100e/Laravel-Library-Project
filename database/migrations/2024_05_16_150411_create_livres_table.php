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
        Schema::create('livres', function (Blueprint $table) {
            $table->id();
            $table->string('isbn');
            $table->string('titre');
            $table->double('prix');
            $table->integer('quantite');
            $table->text('description');
            $table->integer('auteur_id');
            $table->integer('categorie_id');
            $table->string('image');
            $table->foreign('auteur_id')->references('id')->on('auteurs');
            $table->foreign('categorie_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livres');
    }
};
