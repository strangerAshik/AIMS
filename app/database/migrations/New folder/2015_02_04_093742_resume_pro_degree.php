<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ResumeProDegree extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resume_pro_degree',function($table){
				//Professional Degree 
			$table->increments('id');
			$table->integer('emp_id');
			$table->string('pro_degree');
			$table->string('pro_degree_institute');
			$table->string('pro_degree_duration');
			$table->string('pro_degree_grade');
			$table->string('pro_degree_major_area');
			$table->string('pro_degree_year');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('resume_pro_degree');
	}

}
