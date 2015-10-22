<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EdpApproval extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('edp_approval', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('edp_number');
			
			$table->string('approved_by');
			$table->string('designation');
			$table->string('approval_date');			
			$table->string('approval_note');
			
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
		Schema::drop('edp_approval');
	}

}
