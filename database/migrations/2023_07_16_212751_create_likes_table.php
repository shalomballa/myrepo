<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLikesTable extends Migration {

	public function up()
	{
		Schema::create('likes', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('likeable_id');
			$table->tinyInteger('likeable_type');
			$table->integer('user_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('likes');
	}
}