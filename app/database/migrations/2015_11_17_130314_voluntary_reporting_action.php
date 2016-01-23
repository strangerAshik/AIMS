<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VoluntaryReportingAction extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('voluntary_reporting_action',function($table){
			$table->increments('id');			
			
		
			$table->string('report_id');
			$table->string('action_details',5000);
			$table->string('file');
			$table->string('notify');
			
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
		Schema::drop('voluntary_reporting_action');
	}

}
