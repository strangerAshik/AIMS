<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiaCorrectiveAction extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sia_corrective_action', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('finding_number');
			$table->string('sia_number');
			$table->longText('currective_action');
			$table->string('revived_date');
			$table->string('concern_authority_officer');
			$table->longText('regulation_mitigation');
			$table->string('regulation_mitigation_date');
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
		Schema::drop('sia_corrective_action');
	}

}
