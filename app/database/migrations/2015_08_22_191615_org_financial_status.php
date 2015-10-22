<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrgFinancialStatus extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create('org_financial_status',function($table){
			$table->increments('id');			
			$table->string('org_number');
			$table->string('org_name');

			$table->string('effective_date');
			$table->string('paid_up_capital');
			$table->string('authorized_capital');
			$table->string('asset_during_last_audit');
			$table->string('caab_charges_License_fee');
			$table->string('caab_charges_renewal_fee');
			$table->string('outstanding_charge');
			$table->string('aeronautical_charge');
			$table->string('nonaeronautical_charge');
			$table->string('review_date');
			

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
		Schema::drop('org_financial_status');
	}

}
