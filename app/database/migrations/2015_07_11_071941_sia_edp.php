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
			$table->string('date');
			$table->string('sia_number');
			
			$table->string('finding_number');
			$table->string('sc_number');

			$table->string('severity_level');
			$table->string('severity_explanation',2000);
			$table->string('likelihood_level');
			$table->string('likelihood_explanation',2000);
			$table->string('level_of_risk');
			$table->string('type_of_action');
			$table->string('deviation_procedure');
			$table->string('if_yes_explain_deviation_procedure',2000);
			
			$table->string('remedial_action');

			$table->string('written_explanation',2000);
			$table->string('recommendation_for_legal_enf',2000);
			$table->string('edp_peocess_outcome_requested');
			$table->string('if_yes_explain_outcome_requested',2000);
			
			$table->string('remedial_measure',2000);

			$table->string('enforcement_decision_outcome');
			$table->string('enforcement_action',2000);
			$table->string('enforcement_action_file');

			$table->string('admin_opinion',2000);
			$table->string('admin_opinion_file');
			
			$table->string('legal_opinion',2000);
			$table->string('legal_opinion_file');
			

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
