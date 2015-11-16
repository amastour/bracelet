<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name',20);
            $table->date('op_date');
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
        Schema::table('operations', function(Blueprint $table) {
			$table->dropForeign('operations_profile_id_foreign');
		});
        Schema::drop('operations');
    }
}
