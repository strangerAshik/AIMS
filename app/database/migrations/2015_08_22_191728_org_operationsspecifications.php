<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrgOperationsspecifications extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('org_operations_specifications',function($table){
			$table->increments('id');			
			$table->string('org_number');
			$table->string('org_name');

			$table->string('isuue_date');
			$table->string('aircraft_model');
			$table->string('registration_mark');
			$table->string('type_class_of_ops');
			$table->string('category');
			$table->string('area_of_operation');
			//$table->string('outstanding_charge');
			$table->string('special_limitations');

			$table->string('dangerous_goods');
			$table->string('dangerous_goods_sa');
			$table->string('dangerous_goods_remarks');
			
			$table->string('low_visibility_operations');
			$table->string('low_visibility_operations_sa');
			$table->string('low_visibility_operations_remarks');

			$table->string('approach_and_landing');
			$table->string('approach_and_landing_sa');
			$table->string('approach_and_landing_remarks');

			$table->string('take_off');
			$table->string('take_off_sa');
			$table->string('take_off_remarks');

			$table->string('rvsm');
			$table->string('rvsm_sa');
			$table->string('rvsm_remarks');

			$table->string('etops');
			$table->string('etops_sa');
			$table->string('etops_remarks');

			$table->string('mnps');
			$table->string('mnps_sa');
			$table->string('mnps_remarks');

			$table->string('navigation_specification_for_pbn_ops');
			$table->string('navigation_specification_for_pbn_ops_sa');
			$table->string('navigation_specification_for_pbn_ops_remarks');
			
			$table->string('continuing_airworthiness');
			$table->string('continuing_airworthiness_sa');
			$table->string('continuing_airworthiness_remarks');

			$table->string('other');
			$table->string('other_sa');
			$table->string('other_remarks');

			
			

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
		Schema::drop('org_operations_specifications');
	}

}
