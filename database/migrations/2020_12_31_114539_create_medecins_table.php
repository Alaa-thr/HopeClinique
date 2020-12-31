<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedecinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medecins', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('user_id');
          $table->string('nom');
          $table->string('prenom');
          $table->string('specialite');
          $table->boolean('isAdmin')->default(0);
          $table->timestamps();
        });
        DB::table('medecins')->insert(array('id'=>'1','user_id'=>'1','nom'=>'Admin','prenom'=>'Admin','specialite'=>'none','isAdmin'=>'1','created_at'=>new \dateTime,'updated_at'=>new \dateTime));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medecins');
    }
}
