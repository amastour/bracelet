<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBraceletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bracelets', function(Blueprint $table) {
		$table->increments('id');
		$table->timestamps();
		$table->integer('code_id');
		$table->string('pin');
		$table->string('puk');
		$table->string('code_qr');
		$table->date('link_date');
		$table->integer('profile_id')->unsigned();
		$table->foreign('profile_id')
			  ->references('id')
			  ->on('profiles')
			  ->onDelete('restrict')
			  ->onUpdate('restrict');
			  
	    $table->integer('type_id')->unsigned();
		$table->foreign('type_id')
			  ->references('id')
			  ->on('types')
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
        Schema::table('bracelets', function(Blueprint $table) {
			$table->dropForeign('bracelets_profile_id_foreign');
			$table->dropForeign('bracelets_type_id_foreign');
		});
		Schema::drop('bracelets');
    }
}
