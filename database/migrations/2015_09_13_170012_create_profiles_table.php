<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('last_name',15);
            $table->string('first_name',15);
            $table->string('gender',5);
            $table->date('birthday');
            $table->double('size');
            $table->double('weight');
            $table->string('color_eye',10);
            $table->string('color_hair',10);
            $table->string('blood',3);
            $table->string('province',20);
            $table->string('city',10);
            $table->string('tel_mobile',20);
            $table->string('tel_home',20);
            $table->text('address');
            $table->string('fonction',15);
            $table->string('img',20);
            $table->tinyInteger('profil_status')->default(1);
            $table->date('expiration_date');
            $table->softDeletes();

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profiles');
    }
}
