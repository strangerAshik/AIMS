<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ScFinalization extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sc_finalization',function($table){
			$table->increments('id');
			
			
			$table->string('safety_issue_number');
			$table->string('final_resolution_date');
			$table->string('final_inspector');
			$table->string('final_method');
			$table->string('residual_risk');
			$table->string('status_result');
			$table->string('edp_number');
			$table->string('closing_note');

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
		Schema::drop('sc_finalization');
	}

}
