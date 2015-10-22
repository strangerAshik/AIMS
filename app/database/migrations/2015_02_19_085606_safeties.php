<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Safeties extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('safeties',function($table){
			//language
			$table->increments('id');
			$table->integer('user_id');
			$table->string('assigned_inspector');
			$table->string('corrective_status');
			$table->string('initial_risk_analysis');
			$table->string('type_of_issue');
			$table->string('published_practice');
			$table->string('regulation');
			$table->string('job_aid');
			$table->string('questions');
			$table->string('organization');
			$table->string('aircraft_registration');
			$table->string('pel_number');
			$table->string('provided_to');
			$table->string('receipt_date');			
			$table->string('curative_priority');
			$table->string('target_date');
			$table->string('target_month');
			$table->string('target_year');
			$table->string('eir');
			$table->string('final_res_date');
			$table->string('final_res_month');
			$table->string('final_res_year');
			$table->string('final_res_inspector');
			$table->string('final_res_method');
			$table->string('residual_risk');
			$table->string('safety_concern');			
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
		Schema::drop('safeties');
	}

}
