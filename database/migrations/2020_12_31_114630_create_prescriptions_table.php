<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('medecin_id')->nullable();
          $table->unsignedBigInteger('patient_id');
          $table->date('date');
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
        Schema::dropIfExists('prescriptions');
    }
}
