<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllergiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergies', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->timestamps();
          });
          $array = array(['id'=>'1','nom'=>'Allergologie','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
              ['id'=>'2','nom'=>'Alimentaires','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
              ['id'=>'3','nom'=>'Médicamenteuses','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
              ['id'=>'4','nom'=>'Venins','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
              ['id'=>'5','nom'=>'Aux Acariens','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
              ['id'=>'6','nom'=>'Animaux','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
              ['id'=>'7','nom'=>'Pollen','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
              ['id'=>'8','nom'=>'Soleil','created_at'=>new \dateTime,'updated_at'=>new \dateTime]);
          DB::table('allergies')->insert($array);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('allergies');
    }
}
