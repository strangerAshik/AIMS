<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QualificationAircraft extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qualification_aircraft',function($table){
			//language
			$table->increments('id');
			$table->integer('emp_id');
			$table->string('active');
			$table->string('qualification_type');
			$table->string('total_hours');
			$table->string('aircraft_mm');
			$table->string('aircraft_msm');
			$table->string('completion_date');
			$table->string('completion_month');
			$table->string('completion_year');
			$table->string('status');
			$table->string('institute');
			$table->string('instructor');
			$table->string('proof');
			$table->string('pdf');
			$table->string('certification');
			$table->string('verify',10);
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
		Schema::drop('qualification_aircraft');
	}

}
