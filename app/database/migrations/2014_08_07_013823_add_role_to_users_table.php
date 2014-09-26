<?php

use Illuminate\Database\Migrations\Migration;

class AddRoleToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->enum('role', array('teacher','admin'))->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table)
        {
            $table->dropColumn('role');
        });
    }

}