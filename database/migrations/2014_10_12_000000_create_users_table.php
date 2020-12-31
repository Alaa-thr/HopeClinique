<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->enum('user_roles', ['adminM', 'medecin','secretaire']);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(array('id'=>'1','email'=>'hope.clinique@gmail.com','phone'=>'0500000000','user_roles'=>'adminM',
          'password'=>Hash::make('0123456789'),'created_at'=>new \dateTime,
          'updated_at'=>new \dateTime));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
