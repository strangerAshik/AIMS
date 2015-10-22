<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PelAccademy extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pel_accademy',function($table){
		//education
			$table->increments('id');

			$table->string('emp_id');
			$table->string('level');
			$table->string('name_of_degree');
			$table->string('discipline');
			$table->string('specialization');			
			$table->string('institute');
			$table->string('pussing_year');
			$table->string('standard');
			$table->string('grade_division');
			$table->string('out_of');

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
		Schema::drop('pel_accademy');
	}

}
