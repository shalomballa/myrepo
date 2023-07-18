<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 100);
			$table->string('email', 50)->unique();
			$table->string('password', 250);
			$table->tinyInteger('user_type');
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}