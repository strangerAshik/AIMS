<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QualificationEmployment extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qualification_emplyment',function($table){
			//employment 
			$table->increments('id');
			$table->integer('emp_id');
			$table->string('organisation_name');
			$table->string('organisation_type');
			$table->string('organisation_address');
			$table->string('designation');
			$table->string('responsibility');
			$table->string('start_date');
			$table->string('start_month');
			$table->string('start_year');
			$table->string('end_date');
			$table->string('end_month');
			$table->string('end_year');
			$table->string('supervisor_name');
			$table->string('supervisor_phone');
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
		Schema::drop('qualification_emplyment');
	}

}
