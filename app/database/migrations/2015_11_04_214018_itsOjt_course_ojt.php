<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItsOjtCourseOjt extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('itsOjt_course_ojt',function($table){
			$table->increments('id');
			
			
			$table->string('its_course_number');
			$table->string('its_job_task_no');
			$table->string('title');
			$table->string('approval_date');
			$table->string('comments');
			$table->string('inspector_type');
			$table->string('training_category');
			$table->string('frequency');
			$table->string('associative_faa_job_task_no');
			$table->string('regulation_reference');
			$table->string('caa_forms');
			$table->string('guidance_materials_referance',5000);
			$table->string('task_description',5000);
			$table->longText('job_performance_subtasks',15000);

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
		Schema::drop("ItsOjt_course_ojt");
	}

}
