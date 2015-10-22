<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PelPersonalInfo extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pel_personal_info',function($table){
		
			$table->increments('id');

			$table->string('emp_id');
			$table->string('title');
			$table->string('first_name');
			$table->string('middle_name');
			$table->string('last_name');
			$table->string('mother_name');
			$table->string('father_name');
			$table->string('mailing_address');
			$table->string('parmanent_address');
			$table->string('telephone_work');
			$table->string('telephone_residence');
			$table->string('mobile_no');
			$table->string('nationality');
			$table->string('national_id');
			$table->string('sex');
			$table->string('blood_group');
			$table->string('date_of_birth');
			$table->string('month_of_birth');
			$table->string('year_of_birth');
			$table->string('photo');
			$table->string('verify',10);

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
		Schema::drop('pel_personal_info');
	}

}
