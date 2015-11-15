<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItsOjtFormalOjtCourseStatus extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Itsojt_formal_ojt_course_status',function($table){
			$table->increments('id');			
			
			$table->string('itscn');
			$table->string('ojt_task_no');
			$table->string('emp_tracker');
			$table->string('level');
			$table->string('instructor');
			$table->string('supervisor');
			$table->string('manager');
			$table->string('start_date');
			$table->string('completion_date');
			$table->string('validity_date');
			$table->string('certificate');
			$table->string('completion_status');
			$table->string('notes');
			$table->string('review_comment');

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
		Schema::drop("ItsOjt_formal_Ojt_course_status");
	}

}
