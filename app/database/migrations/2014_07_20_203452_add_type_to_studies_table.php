<?php

use Illuminate\Database\Migrations\Migration;

class AddTypeToStudiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('studies', function($table)
        {
            $table->integer('type');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('studies', function($table)
        {
            $table->integer('remember_token');
        });
	}

}