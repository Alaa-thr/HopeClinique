<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdvs', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('medecin_id')->nullable();
          $table->unsignedBigInteger('patient_id');
          $table->date('date');
          $table->time('heure_debut');
          $table->time('heure_fin');
          $table->string('motif');
          $table->string('nom_medecin')->default(NULL);
          $table->string('prenom_medecin')->default(NULL);
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
        Schema::dropIfExists('rdvs');
    }
}
