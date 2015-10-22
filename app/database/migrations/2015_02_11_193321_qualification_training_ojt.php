<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QualificationTrainingOjt extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qualification_training_ojt',function($table){
			//Training/Workshop 
			$table->increments('id');
			$table->integer('emp_id');
			$table->string('category');
			//training
			$table->string('type_of_training');
			$table->string('training_course');
			$table->string('subject');
			//ojt
			$table->string('training_task');
			//workshop
			$table->string('topic');
			
			$table->string('major_area');
			$table->string('instructor');
			$table->string('institute');
			$table->string('location');
			$table->string('proof');
			$table->string('pdf');
			$table->string('certification');
			$table->string('duration');
			$table->string('verify',10);
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
		Schema::drop('qualification_training_ojt');
	}

}
