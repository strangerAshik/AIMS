<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiaAction extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sia_action', function(Blueprint $table)
		{
			$table->increments('id');
			
			$table->string('program_type');
			$table->string('sia_number');
			$table->string('team_members');
			$table->string('event');
			$table->string('objective');
			$table->string('iats_code');
			$table->string('organization');
			$table->string('location');
			$table->string('date');
			$table->string('time');
			$table->string('flight_number');
			$table->string('departure_airfield');
			$table->string('arrival_airfield');
			$table->string('aircraft_mms');
			$table->string('aircraft_registration_no');
			$table->string('pic');
			$table->longText('pel_numbers');

			$table->longText('critical_element');
			$table->longText('sia_by_area');
			
			$table->string('other_personal_inspected',1000);
			$table->string('has_finding');
			//$table->string('findings');
			$table->string('result');
			$table->string('has_edp');
			//$table->string('corrective_action_plan');
			$table->longText('hazard_identification');
			$table->longText('initial_risk');
			$table->string('determine_risk');
			$table->longText('violation_of_safety_standard');
			$table->longText('safety_risk_management');
			$table->string('determine_severity');
			$table->string('determine_likelihood');
			//$table->string('final_risk_determination');
			$table->longText('risk_statement',1000);
			$table->string('has_safety_concern');
			$table->string('lack_of_effective_implementation');
			

			$table->string('approve');
			$table->string('warning');
			$table->string('safety_performance_indicator');
			$table->string('safety_performance_target');

			$table->string('row_creator');
			$table->string('row_updator');
			$table->string('soft_delete');
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
		Schema::drop('sia_action');
	}

}
