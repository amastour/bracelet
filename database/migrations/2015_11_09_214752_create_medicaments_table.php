<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicaments', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name',15);
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
        Schema::table('medicaments', function(Blueprint $table) {
			$table->dropForeign('medicaments_profile_id_foreign');
		});
        Schema::drop('medicaments');
    }
}
