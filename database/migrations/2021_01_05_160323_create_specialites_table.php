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
          $table->timestamps();
        });
        $array = array(['id'=>'1','nom'=>'Allergologie','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'2','nom'=>'Andrologie','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'3','nom'=>'Cardiologie','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'4','nom'=>'Chirurgie','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'5','nom'=>'Dermatologie','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'6','nom'=>'Endocrinologie','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'7','nom'=>'Gastroentérologie','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'8','nom'=>'Gériatrie','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'9','nom'=>'Gynécologie','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'10','nom'=>'Néonatologie','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'11','nom'=>'Neurologie','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'12','nom'=>'Odontologie','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'13','nom'=>'Oncologie','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'14','nom'=>'Orthopédie','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'15','nom'=>'Pédiatrie','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'16','nom'=>'Psychiatrie','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'17','nom'=>'Radiologie','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'18','nom'=>'Rhumatologie','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'19','nom'=>'Urologie','created_at'=>new \dateTime,'updated_at'=>new \dateTime]);
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
