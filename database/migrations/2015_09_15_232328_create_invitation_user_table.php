<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitationUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('invitation_user', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('invitation_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('invitation_id')->references('id')->on('users')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');

            $table->foreign('user_id')->references('id')->on('invitations')
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
        Schema::table('invitation_user', function(Blueprint $table) {
            $table->dropForeign('invitation_user_invitation_id_foreign');
            $table->dropForeign('invitation_user_user_id_foreign');
        });

        Schema::drop('invitation_user');
    }
}
