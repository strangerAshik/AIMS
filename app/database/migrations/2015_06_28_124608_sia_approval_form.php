<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiaApprovalForm extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sia_approval', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('sia_number');
			
			$table->string('approved_by');
			$table->string('designation');
			$table->date('approval_date');
			$table->string('approval_note');
			
			$table->string('approve');
			$table->string('warning');
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
		Schema::drop('sia_approval');
	}

}
