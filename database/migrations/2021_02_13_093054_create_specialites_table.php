<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialites', function (Blueprint $table) {
          $table->id();
          $table->string('nom');
          $table->string('avatar');
          $table->timestamps();
        });
        $array = array(['id'=>'1','nom'=>'Anesthésiologie','avatar'=>'','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'2','nom'=>'Cardiologie','avatar'=>'','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'3','nom'=>'chirurgie','avatar'=>'','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'4','nom'=>'dermatologie','avatar'=>'','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'5','nom'=>'Dentiste','avatar'=>'','created_at'=>new \dateTime,'updated_at'=>new \dateTime]);
        DB::table('specialites')->insert($array);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialites');
    }
}
