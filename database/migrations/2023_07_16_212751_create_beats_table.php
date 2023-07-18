<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBeatsTable extends Migration {

	public function up()
	{
		Schema::create('beats', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('slug', 10)->unique();
			$table->string('title', 25);
			$table->string('premium_file', 100);
			$table->string('free_file', 100);
		});
	}

	public function down()
	{
		Schema::drop('beats');
	}
}