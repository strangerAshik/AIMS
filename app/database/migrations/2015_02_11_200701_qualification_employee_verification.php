<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QualificationEmployeeVerification extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qualification_employee_verification',function($table){
			$table->increments('id');
			$table->integer('emp_id');
			$table->string('name');
			$table->string('entry_date');
			$table->string('entry_month');
			$table->string('entry_year');
			$table->string('active');
			$table->string('termination_date');
			$table->string('termination_month');
			$table->string('termination_year');
			$table->string('position');
			$table->string('assigned_task');
			$table->string('assigned_by');
			$table->string('note');
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
		Schema::drop('qualification_employee_verification');
	}

}
