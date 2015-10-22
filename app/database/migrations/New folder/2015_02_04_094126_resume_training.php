<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ResumeTraining extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resume_training',function($table){
			//Training/Workshop 
			$table->increments('id');
			$table->integer('emp_id');
			$table->string('tw_title');
			$table->string('tw_institute_name');
			$table->string('tw_major_topic');
			$table->string('tw_duration');
			$table->string('tw_year');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('resume_training');
	}

}
