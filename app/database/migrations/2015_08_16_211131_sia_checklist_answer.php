<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiaChecklistAnswer extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sia_checklist_answer', function(Blueprint $table)
		{
			$table->increments('id');
			
			//$table->string('checklist_number');
			$table->string('checklist_name');
			$table->string('checklist_type');
			$table->string('section');
			$table->string('question');
			$table->string('yes');
			$table->string('no');
			$table->string('na');
			$table->string('nc');

			
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
		Schema::drop('sia_checklist_answer');
	}

}
