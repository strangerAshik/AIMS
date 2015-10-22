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
			$table->string('sia_number');
			$table->string('finding',2000);
			$table->string('target_date');
			$table->string('corrective_action_plan',2000);
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
