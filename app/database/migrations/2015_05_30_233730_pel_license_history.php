<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PelLicenseHistory extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pel_license_history',function($table){

			$table->increments('id');
			$table->string('emp_id');

			$table->string('active');
			$table->string('effective_date');
			$table->string('effective_month');
			$table->string('effective_year');

			$table->string('certificate_type');
			$table->string('historical_event');
			$table->string('results');
			$table->string('organization');
			$table->string('designation_number');
			$table->string('investigation_number');
			$table->string('accident_number');
			$table->string('memo_notes');
			$table->string('file');
			
			$table->string('approve',10);
			$table->string('warning',10);
			$table->string('row_creator');
			$table->string('row_updator');
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
		Schema::drop('pel_license_history');
	}

}
