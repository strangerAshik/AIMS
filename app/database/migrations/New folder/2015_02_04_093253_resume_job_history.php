<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ResumeJobHistory extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resume_job_history',function($table){
			//Employment Details / job history 
			//$table->string('job_status');
			$table->increments('id');
			$table->integer('emp_id');
			$table->string('org_name');
			$table->string('org_type');
			$table->string('org_address');
			$table->string('major_responsibilities');
			$table->string('start_day');
			$table->string('start_month');
			$table->string('start_year');
			$table->string('end_day');
			$table->string('end_month');
			$table->string('end_year');
			$table->string('supervisor_name');
			$table->string('supervisor_phone');
			//$table->string('salary');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('resume_job_history');
	}

}
