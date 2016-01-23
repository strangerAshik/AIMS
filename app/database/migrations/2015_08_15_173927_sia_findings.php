<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiaFindings extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sia_findings', function(Blueprint $table)
		{
			$table->increments('id');
			
			$table->string('finding_number');
			$table->string('title');
			$table->string('sia_number');
			$table->lognText('finding');
			$table->string('target_date');
			$table->lognText('corrective_action_plan');
			$table->string('upload_file');

			
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
		Schema::drop('sia_findings');
	}

}
