<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password', 60)->nullable();
            $table->string('confirmation_code');
            $table->boolean('confirmed')->default(config('access.users.confirm_email') ? false : true);
            $table->string('last_name');
            $table->string('first_name');
            $table->string('gender',5);
            $table->date('birthday');
            $table->string('tel',20);
            $table->string('province',20);
            $table->string('city',10);
            $table->text('address');
            $table->string('insert_ip',15);
            $table->date('last_login');
            $table->date('last_visit');
            $table->tinyInteger('user_status')->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
