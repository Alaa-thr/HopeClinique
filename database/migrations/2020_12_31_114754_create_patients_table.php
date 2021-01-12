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
          $table->bigInteger('Num_Secrurite_Social')->unique();
          $table->date('date_naiss');
          $table->string('maladie_chronique')->nullable();
          $table->string('allergie')->nullable();
          $table->string('antecedent')->nullable();
          $table->string('commentaire')->nullable();
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
