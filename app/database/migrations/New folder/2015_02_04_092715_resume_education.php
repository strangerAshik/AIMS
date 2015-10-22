<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ResumeEducation extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resume_education',function($table){
		//education
			$table->increments('id');
			$table->integer('emp_id');
			$table->string('level');
			$table->string('discipline');
			$table->string('specialization');
			$table->string('name_of_degree');
			$table->string('institute');
			$table->string('pussing_year');
			$table->string('grade');
			$table->string('out_of');
			$table->string('division');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('resume_education');
	}

}
