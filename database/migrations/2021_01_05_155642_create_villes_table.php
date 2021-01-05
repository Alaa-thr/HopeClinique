<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->timestamps();
        });
        $array = array(['id'=>'1','nom'=>'Adrar','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'2','nom'=>'Chlef','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'3','nom'=>'Laghouat','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'4','nom'=>'Oum El Bouaghi','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'5','nom'=>'Batna','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'6','nom'=>'Béjaïa','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'7','nom'=>'Biskra','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'8','nom'=>'Béchar','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'9','nom'=>'Blida','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'10','nom'=>'Bouira','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'11','nom'=>'Tamanrasset','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'12','nom'=>'Tébessa','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'13','nom'=>'Tlemcen','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'14','nom'=>'Tiaret','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'15','nom'=>'Tizi Ouzou','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'16','nom'=>'Alger','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'17','nom'=>'Djelfa','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'18','nom'=>'Jijel','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'19','nom'=>'Sétif','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'20','nom'=>'Saïda','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'21','nom'=>'Skikda','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'22','nom'=>'Sidi Bel Abbès','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'23','nom'=>'Annaba','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'24','nom'=>'Guelma','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'25','nom'=>'Constantine','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'26','nom'=>'Médéa','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'27','nom'=>'Mostaganem','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'28','nom'=>"M'Sila",'created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'29','nom'=>'Mascara','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'30','nom'=>'Ouargla','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'31','nom'=>'Oran','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'32','nom'=>'El Bayadh','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'33','nom'=>'Illizi','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'34','nom'=>'Bordj Bou Arreridj','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'35','nom'=>'Boumerdès','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'36','nom'=>'El Tarf','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'37','nom'=>'Tindouf','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'38','nom'=>'Tissemsilt','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'39','nom'=>'El Oued','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'40','nom'=>'Khenchela','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'41','nom'=>'Souk Ahras','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'42','nom'=>'Tipaza','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'43','nom'=>'Mila','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'44','nom'=>'Defla','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'45','nom'=>'Naâma','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'46','nom'=>'Aïn Témouchent','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'47','nom'=>'Ghardaïa','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
            ['id'=>'48','nom'=>'Relizane','created_at'=>new \dateTime,'updated_at'=>new \dateTime]);
        DB::table('villes')->insert($array);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('villes');
    }
}
