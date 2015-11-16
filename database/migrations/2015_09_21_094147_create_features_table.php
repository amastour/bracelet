<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function(Blueprint $table) {
		$table->increments('id');
		$table->timestamps();
		$table->string('color',10);
		$table->double('size');
		$table->double('width');
		$table->integer('stock_dispo');
		$table->string('img_url');
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
        Schema::table('features', function(Blueprint $table) {
			$table->dropForeign('features_type_id_foreign');
		});
		Schema::drop('features');
    }
}
