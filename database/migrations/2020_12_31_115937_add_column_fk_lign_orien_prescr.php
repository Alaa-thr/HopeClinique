<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnFkLignOrienPrescr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ligne_prescriptions', function (Blueprint $table) {
          $table->foreign('prescription_id')->references('id')->on('prescriptions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ligne_prescriptions', function (Blueprint $table) {
          $table->dropForeign('prescriptions_prescription_id_foreign');
          $table->dropForeign(['prescription_id']);
        });
    }
}
