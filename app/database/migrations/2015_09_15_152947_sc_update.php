<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ScUpdate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	
	public function up()
	{
	   Schema::create('sc_safety_concern',function($table){
			$table->increments('id');
			
			
			$table->string('safety_issue_number');
			$table->string('title');
			$table->string('sia_number');
			
			
			$table->string('finding_number');
			$table->longText('inspector_observation',2000);
			$table->longText('safety_concern',2000);
			$table->string('sc_critical_element');
			$table->string('sc_area');
			$table->longText('witness_statement',2000);
			$table->string('upload_evidence');
			$table->string('upload_checklist');
			$table->longText('question',2000);
			$table->longText('answer',2000);
			$table->string('type_of_concern');
			$table->string('type_of_issue');
			$table->longText('best_practice',2000);
			$table->string('poi_or_responsible');
			$table->string('assigned_inspector');
			$table->string('issue_finding_date');
			$table->string('issue_finding_local_time');
			$table->string('place_or_airport');
			$table->string('responsible_pels');
			$table->string('aircraft_msn');
			$table->string('aircraft_rgistration_number');
			$table->string('corrective_priority');
			$table->string('target_date');
			$table->longText('risk_statement',2000);
			$table->string('risk_Probability');
			$table->string('risk_severity');
			$table->string('cvr_statement');
			$table->string('risk_assesment_from_matrix');
			$table->string('risk_action');
			$table->string('risk_management');
			
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
		Schema::drop('sc_safety_concern');	
	}

}
