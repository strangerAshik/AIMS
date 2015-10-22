<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PelAccaThesisProject extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pel_acca_thesis',function($table){
		//education
			$table->increments('id');

			$table->integer('emp_id');
			$table->string('level');
			$table->string('type');			
			$table->string('title');			
			$table->string('institute');
			$table->string('duration');

			$table->string('approve',10);
			$table->string('warning',10);
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
		Schema::drop('pel_acca_thesis');
	}

}
