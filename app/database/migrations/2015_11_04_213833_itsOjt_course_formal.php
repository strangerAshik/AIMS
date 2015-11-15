<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItsOjtCourseFormal extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ItsOjt_course_formal',function($table){
			$table->increments('id');
			
			
			$table->string('its_course_number');
			$table->string('its_course_title');
			$table->string('training_profile');
			$table->string('training_category');
			$table->string('sequence');
			$table->string('course_length');
			$table->string('course_objective');
			$table->string('course_description');
			$table->string('course_content',5000);
			$table->string('prerequisites');
			$table->string('revision_date');
			$table->string('course_manager');
			$table->string('phone');
			$table->string('associated_caa_training_courses');

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
		Schema::drop('ItsOjt_course_formal');
	}

}
