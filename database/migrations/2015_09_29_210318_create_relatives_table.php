<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relatives', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('last_name',15);
            $table->string('first_name',15);
            $table->string('tel_mobile',10);
            $table->string('tel_home',10);
            $table->string('location_geo',45);
            $table->string('relationship',15);
            
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
        Schema::table('relatives', function(Blueprint $table) {
			$table->dropForeign('relatives_profile_id_foreign');
		});
        Schema::drop('relatives');
    }
}
