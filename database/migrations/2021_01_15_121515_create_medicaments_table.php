<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicaments', function (Blueprint $table) {
          $table->id();
          $table->string('nom');
          $table->timestamps();
      });
      $array = array(
          ['id'=>'1','nom'=>'ASPEGIC','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'2','nom'=>'ATARAX','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'3','nom'=>'ALODONT','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'4','nom'=>'ART','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'5','nom'=>' ANTARENE ','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'6','nom'=>' AERIUS ','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'7','nom'=>'AUGMENTIN','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'8','nom'=>'ADVIL','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'9','nom'=>'AMLOR','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'10','nom'=>'APROVEL','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'11','nom'=>'BIOCALYPTOL','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'12','nom'=>'BETADINE','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'13','nom'=>'CLAMOXYL','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'14','nom'=>'CRESTOR','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'15','nom'=>'CELESTENE','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'16','nom'=>'COVERSYL','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'17','nom'=>'COAPROVEL','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'18','nom'=>'DOLIPRANE','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'19','nom'=>'DAFALGAN','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'20','nom'=>'DAFLON','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'21','nom'=>'DEXERYL','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'22','nom'=>'DEROXAT','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'23','nom'=>'DIAMICRON','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'24','nom'=>'DERINOX','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'25','nom'=>'DEBRIDAT','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'26','nom'=>'EUPANTOL','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'27','nom'=>'ENDOTELON','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'28','nom'=>"HEXAQUINE",'created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'29','nom'=>'INIPOMP','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'30','nom'=>'KARDEGIC','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'31','nom'=>'KETUM','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'32','nom'=>'LYSANXIA','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'33','nom'=>'MEDIATOR','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'34','nom'=>'MOTILIUM','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'35','nom'=>'NASONEX','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'36','nom'=>'PARACETAMOL TEVA','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'37','nom'=>'PYOSTACINE','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'38','nom'=>'RIVOTRIL','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'39','nom'=>'RHINOFLUIMUCIL','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'40','nom'=>'SPECIAFOLDINE','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'41','nom'=>'STILNOX','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'42','nom'=>'TOPALGIC','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'43','nom'=>'TIORFAN','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'44','nom'=>'VASTAREL','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'45','nom'=>'XANAX','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'46','nom'=>'XYZALL','created_at'=>new \dateTime,'updated_at'=>new \dateTime],
          ['id'=>'47','nom'=>'ZALDIAR','created_at'=>new \dateTime,'updated_at'=>new \dateTime]);
      DB::table('medicaments')->insert($array);
  }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicaments');
    }
}
