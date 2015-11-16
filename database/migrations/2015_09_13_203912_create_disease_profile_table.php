<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiseaseProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disease_profile', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id')->unsigned();
            $table->integer('disease_id')->unsigned();
            $table->foreign('profile_id')->references('id')->on('diseases')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');

            $table->foreign('disease_id')->references('id')->on('profiles')
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
        Schema::table('disease_profile', function(Blueprint $table) {
            $table->dropForeign('disease_profile_disease_id_foreign');
            $table->dropForeign('disease_profile_profile_id_foreign');
        });

        Schema::drop('disease_profile');
    }
    
}
