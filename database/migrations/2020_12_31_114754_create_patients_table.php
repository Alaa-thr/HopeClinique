<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
          $table->id();
          $table->string('nom');
          $table->string('prenom');
          $table->integer('Num_Secrurite_Social')->unique();
          $table->date('date_naiss');
          $table->string('maladie_chronique');
          $table->string('allergie');
          $table->string('antecedent');
          $table->string('commentaire');
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
        Schema::dropIfExists('patients');
    }
}
