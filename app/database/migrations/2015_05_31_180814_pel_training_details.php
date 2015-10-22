<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PelTrainingDetails extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pel_training_details',function($table){
			$table->increments('id');
			$table->string('emp_id');
			$table->string('name_of_the_course');
			$table->string('name_of_the_institute');

			$table->string('start_date');			
			$table->string('start_month');
			$table->string('start_year');
			
			$table->string('end_date');			
			$table->string('end_month');
			$table->string('end_year');

			$table->string('certificate_issue_date');			
			$table->string('certificate_issue_month');
			$table->string('certificate_issue_year');

			$table->string('expiration_date');			
			$table->string('expiration_month');
			$table->string('expiration_year');

			$table->string('duration');
			$table->string('file');
			$table->string('approved_by');
			
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
		Schema::drop('pel_training_details');
	}

}
