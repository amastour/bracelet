<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiseasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diseases', function(Blueprint $table) {
		$table->increments('id');
		$table->timestamps();
        $table->string('name',15);
        $table->string('level',15);
        $table->text('notes');
        $table->text('prohibitions');;
		
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
        Schema::table('diseases', function(Blueprint $table) {
			$table->dropForeign('diseases_profile_id_foreign');
		});
		Schema::drop('diseases');
    }
}
