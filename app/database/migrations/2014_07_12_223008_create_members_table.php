<?php

use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('members', function($table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('branch');
            $table->date('baptism_date');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('members');
	}

}