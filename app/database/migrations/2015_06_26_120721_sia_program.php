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
			$table->string('org_name');
			$table->string('event');
			$table->string('specific_purpose');
			$table->string('date');
			$table->string('time');
			$table->string('team_members');
			$table->string('remarks',1000);
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
