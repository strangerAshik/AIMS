<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiaSms extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()

	{
		Schema::create('sia_sms',function($table){
			$table->increments('id');
			$table->string('sia_number');
			
			$table->longText('hazard_identification');
			$table->longText('initial_risk');
			$table->string('determine_severity');
			$table->string('determine_likelihood');
			$table->string('determine_risk');
			$table->longText('violation_of_safety_standard');
			$table->longText('safety_risk_management');
			$table->longText('risk_statement');
			$table->longText('safety_performance_indicator');
			$table->longText('safety_performance_target');
			$table->longText('lack_of_effective_implementation');


			
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
		Schema::drop('sia_sms');
	}

}
