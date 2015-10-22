<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ResumeOthersMembership extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resume_others_membership',function($table){
			//Professional membership
			$table->increments('id');
			$table->integer('emp_id');
			$table->string('mem_organigation');
			$table->string('mem_degignation');
			$table->string('mem_no');
			$table->string('mem_start_year');
			$table->string('mem_status');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('resume_others_membership');
	}

}
