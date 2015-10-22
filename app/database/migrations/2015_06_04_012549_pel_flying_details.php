<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PelFlyingDetails extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pel_flying_details',function($table){
			$table->increments('id');
			$table->string('emp_id');
			
			$table->string('date');
			$table->string('month');
			$table->string('year');

			$table->string('local_time');
			$table->string('sun_rise');
			$table->string('sun_set');
			$table->string('flight_number');
			$table->string('pairing');
			$table->string('departure_airfield');
			$table->string('arrival_airfield');
			$table->string('off_block');
			$table->string('on_block');
			$table->string('flight');
			$table->string('pic_p1');
			$table->string('co_pilot_p2');
			$table->string('relief_pilot_r');
			$table->string('dual');
			$table->string('instructor');
			$table->string('examiner');
			$table->string('night');
			$table->string('ifr');
			$table->string('sim_instructor');
			$table->string('cross_country');
			$table->string('approach_landing');
			$table->string('flight_time_view_only');
			
			$table->string('date_1');
			$table->string('month_1');
			$table->string('year_1');

			$table->string('date_2');
			$table->string('month_2');
			$table->string('year_2');

			$table->string('date_3');
			$table->string('month_3');
			$table->string('year_3');

			$table->string('flight_time_limits');
			$table->string('aircraft_msn');
			$table->string('aircraft_registration_number');

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
		Schema::drop('pel_flying_details');
	}

}
