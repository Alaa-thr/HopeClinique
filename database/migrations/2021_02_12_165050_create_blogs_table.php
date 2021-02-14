<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */          

    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('medecin_id')->nullable();
          $table->foreign('medecin_id')->references('id')->on('medecins')->onDelete('SET NULL');
          $table->string('title');
          $table->string('description');
          $table->string('avatr')->default(NULL);
          $table->string('nom_medecin')->nullable()->default(NULL);
          $table->string('prenom_medecin')->nullable()->default(NULL);
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
        Schema::dropIfExists('blogs');
    }
}
