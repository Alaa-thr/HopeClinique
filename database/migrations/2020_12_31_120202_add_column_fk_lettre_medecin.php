<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnFkLettreMedecin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lettre_orientations', function (Blueprint $table) {
             $table->foreign('medecin_id')->references('id')->on('medecins')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lettre_orientations', function (Blueprint $table) {
          $table->dropForeign('medecins_medecin_id_foreign');
          $table->dropForeign(['medecin_id']);
        });
    }
}
