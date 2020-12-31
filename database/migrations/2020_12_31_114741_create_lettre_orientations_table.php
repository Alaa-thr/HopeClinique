<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLettreOrientationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lettre_orientations', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('medecin_id')->nullable();
          $table->unsignedBigInteger('patient_id');
          $table->date('date');
          $table->string('contenu');
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
        Schema::dropIfExists('lettre_orientations');
    }
}
