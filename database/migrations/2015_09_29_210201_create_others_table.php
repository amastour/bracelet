<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOthersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('others', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('label',45);
            $table->text('notes');
            
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
        Schema::table('others', function(Blueprint $table) {
			$table->dropForeign('others_profile_id_foreign');
		});
        Schema::drop('others');
    }
}
