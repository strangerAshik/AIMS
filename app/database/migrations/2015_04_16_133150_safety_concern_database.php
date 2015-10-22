<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SafetyConcernDatabase extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sc_primary_inspection',function($table){
			$table->increments('id');
			
			$table->string('inspection_number');
			$table->string('inspection_title');
			$table->string('lead_inspector');
			$table->string('team_members');
			$table->string('type_of_inspection');
			$table->string('against_organization');
			
			$table->string('row_creator');
			$table->string('row_updator');
			$table->integer('approve');
			$table->integer('warning');
			$table->integer('soft_delete');
			$table->timestamps();
		});
		
		
		Schema::create('sc_corrective_action',function($table){
			$table->increments('id');
			
			$table->string('safety_issue_number');
			$table->string('currective_action');
			$table->string('revived_date');
			$table->string('revived_month');
			$table->string('revived_year');
			$table->string('concern_authority_officer');
			$table->string('regulation_mitigation');
			$table->string('regulation_mitigation_date');
			$table->string('regulation_mitigation_month');
			$table->string('regulation_mitigation_year');
			$table->string('corrective_action_file');
			
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
		Schema::drop('sc_primary_inspection');
	//Schema::drop('sc_safety_concern');
		Schema::drop('sc_corrective_action');
		
	}

}
