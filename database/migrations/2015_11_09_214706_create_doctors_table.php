<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name',30);
            $table->string('tel',10);
            $table->string('city',15);
            $table->string('specialty',20);
            $table->text('address');
            $table->string('location_geo',45);
            
            $table->integer('profile_id')->unsigned();
	    	$table->foreign('profile_id')
			  ->references('id')
			  ->on('profiles')
			  ->onDelete('restrict')
			  ->onUpdate('restrict');

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctors', function(Blueprint $table) {
			$table->dropForeign('doctors_profile_id_foreign');
		});
        Schema::drop('doctors');
    }
}
