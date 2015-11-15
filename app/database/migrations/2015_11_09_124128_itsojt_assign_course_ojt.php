<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItsojtAssignCourseOjt extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('itsojt_assign_course_ojt',function($table){
			$table->increments('id');			
			
		
			$table->string('emp_tracker');
			//$table->string('employee_name');
			$table->string('itscn');
			$table->string('job_task_no');
			$table->string('formal_or_ojt');

			$table->string('row_creator');
			$table->string('row_updator');
			$table->integer('approve');
			$table->integer('warning');
			$table->integer('soft_delete');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('itsojt_assign_course_ojt');
	}

}
