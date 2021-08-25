<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('users');
            $table->string('titre_fiche')->nullable();
            $table->string('duree_fiche')->nullable();
            $table->string('classe_fiche')->nullable();
            $table->string('matiere_fiche')->nullable();
            $table->string('nom_module')->nullable();
            $table->string('nom_lecon')->nullable();
            $table->integer('nb_eleves')->nullable();
            $table->string('outils_didactiques')->nullable();
            $table->string('obj_pedag')->nullable();
            $table->string('obj_spec')->nullable();
            $table->string('competence')->nullable();
            $table->string('requis_fiche')->nullable();
            $table->string('contenu_fiche')->nullable();
            $table->string('evaluation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fiches');
    }
}