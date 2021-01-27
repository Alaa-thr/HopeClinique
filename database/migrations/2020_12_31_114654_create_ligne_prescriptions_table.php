<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLignePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_prescriptions', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('prescription_id');
          $table->string('medicament');
          $table->integer('dose');
          $table->enum('moment_prises', ['matin', 'soir']);
          $table->string('duree_traitement');
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
        Schema::dropIfExists('ligne_prescriptions');
    }
}
