<?php

use Illuminate\Database\Migrations\Migration;

class AddOrderToStudiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('studies', function($table)
        {
            $table->integer('order');
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
            $table->dropColumn('order');
        });
	}

}