<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaladieschroniquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maladieschroniques', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->timestamps();
          });
          $array = array(['id'=>'1','nom'=>'Allergologie','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
              ['id'=>'2','nom'=>'Maladies cardiovasculaires ','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
              ['id'=>'3','nom'=>'Cancers','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
              ['id'=>'4','nom'=>'Maladies endocriniennes','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
              ['id'=>'5','nom'=>'Maladies respiratoires et ORL','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
              ['id'=>'6','nom'=>'Système digestif','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
              ['id'=>'7','nom'=>'Rhumatologiques','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
              ['id'=>'8','nom'=>'Neurologiques','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
              ['id'=>'9','nom'=>'Musculaires','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
              ['id'=>'10','nom'=>'Rénales','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
              ['id'=>'11','nom'=>'La peau','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
              ['id'=>'12','nom'=>'Des yeux','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
              ['id'=>'13','nom'=>'Du sang','created_at'=>new \dateTime,'updated_at'=>new \dateTime]);
          DB::table('maladieschroniques')->insert($array);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maladieschroniques');
    }
}
