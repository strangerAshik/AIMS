<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiaProgram extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sia_program', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('sia_number');
			$table->string('related_sia');
			$table->string('certificate_number');
			$table->string('org_name');
			$table->string('sia_by_area',1000);
			$table->string('event');
			$table->longText('specific_purpose');
			$table->string('date');
			$table->string('end_date');
			$table->string('time');
			$table->string('location');
			$table->longText('team_members');
			$table->longText('remarks',1000);
			
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
		Schema::drop('sia_program');
	}

}
