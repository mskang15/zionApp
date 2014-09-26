<?php

use Illuminate\Database\Migrations\Migration;

class CreateSnippetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('snippets', function($table){
			$table->increments('id');
			$table->string('name');
			$table->text('code');
			$table->string('slug');
			$table->string('lang');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('snippets');
	}

}