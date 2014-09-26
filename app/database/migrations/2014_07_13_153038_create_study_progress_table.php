<?php

use Illuminate\Database\Migrations\Migration;

class CreateStudyProgressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('studyProgress', function($table){
            $table->increments('id');
            $table->integer('member_id')->length(10)->unsigned();
            $table->integer('study_id')->length(10)->unsigned();
            $table->integer('teacher_id')->length(10)->unsigned();
            $table->date('study_date');
        });

        Schema::table('studyProgress', function($table) {
            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('study_id')->references('id')->on('studies');
            $table->foreign('teacher_id')->references('id')->on('users');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema:drop('studyProgress');
	}

}