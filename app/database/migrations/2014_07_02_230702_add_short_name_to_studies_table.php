<?php

use Illuminate\Database\Migrations\Migration;

class AddShortNameToStudiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('studies', function($table)
        {
            $table->string('shortName');
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
            $table->dropColumn('shortName');
        });
	}

}