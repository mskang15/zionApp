<?php

use Illuminate\Database\Migrations\Migration;

class AddCreatedByToMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
//        Schema::table('members', function($table)
//        {
//            $table->integer('created_by');
//        });

        Schema::table('members', function($table) {
            $table->foreign('created_by')->references('id')->on('users');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('members', function($table)
        {
            $table->integer('created_by');
        });
	}

}