<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItsOjtTrainee extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('itsOjt_trainee',function($table){
			$table->increments('id');			
			
			$table->string('emp_tracker');
			$table->string('employee_id');
			$table->string('employee_name');
			$table->string('employees_speciality');
			$table->string('hire_date');
			$table->string('current_position');

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
		Schema::drop("itsOjt_trainee");
	}

}
