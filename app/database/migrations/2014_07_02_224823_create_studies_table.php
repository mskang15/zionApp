<?php

use Illuminate\Database\Migrations\Migration;

class CreateStudiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('studies', function($table){
            $table->increments('id');
            $table->string('studyTitle');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('studies');
	}

}