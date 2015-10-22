<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PelSimulator extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pel_simulator',function($table){
			$table->increments('id');
			$table->string('emp_id');

			$table->string('date');
			$table->string('month');
			$table->string('year');

			$table->string('model');
			$table->string('registration');
			$table->string('location');
			$table->string('other_crew_instructor');
			$table->string('type_of_instruction');
			$table->string('FFS_HR');
			$table->string('FNPT_1_HR');
			$table->string('FNPT_II_HR');
			$table->string('CSS_HR');
			$table->string('instruction_HR');
			$table->string('exam_HR');
			
			$table->string('approve',10);
			$table->string('warning',10);
			$table->string('row_creator');
			$table->string('row_updator');
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
		Schema::drop('pel_simulator');
	}

}
