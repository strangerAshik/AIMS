<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiaEdp extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('edp_primary', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('edp_number');
			$table->string('title');
			$table->string('date');
			$table->string('sia_number');
			
			$table->string('finding_number');
			$table->string('sc_number');

			$table->string('severity_level');
			$table->longText('severity_explanation',2000);
			$table->string('likelihood_level');
			$table->longText('likelihood_explanation',2000);
			$table->string('level_of_risk');
			$table->string('type_of_action');
			$table->string('deviation_procedure');
			$table->longText('if_yes_explain_deviation_procedure',2000);
			
			$table->longText('remedial_action');

			$table->longText('written_explanation',2000);
			$table->longText('recommendation_for_legal_enf',2000);
			$table->string('edp_peocess_outcome_requested');
			$table->longText('if_yes_explain_outcome_requested',2000);
			
			$table->longText('remedial_measure',2000);

			$table->string('enforcement_decision_outcome');
			$table->longText('enforcement_action',2000);
			$table->string('enforcement_action_file');

			$table->longText('admin_opinion',2000);
			$table->string('admin_opinion_file');
			
			$table->longText('legal_opinion',2000);
			$table->string('legal_opinion_file');
			

			$table->string('approve');
			$table->string('warning');
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
		Schema::drop('edp_primary');
	}

}
