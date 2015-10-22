<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminTracking extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()  
	{
		Schema::create('admin_trackings',function($table){
			//language
			$table->increments('id');
			$table->integer('user_id');
			$table->string('admin_track');
			$table->string('initial_risk');			
			$table->string('completion_status');	
			$table->string('assigned_to');		
			$table->string('start_date');		
			$table->string('start_month');		
			$table->string('start_year');		
			$table->string('target_date');		
			$table->string('target_month');		
			$table->string('target_year');		
			$table->string('complete_date');		
			$table->string('complete_month');		
			$table->string('complete_year');		
			$table->string('organization');		
			$table->string('pel_number');		
			$table->string('aircraft_registration');		
				
			$table->string('other_entry');		
			$table->string('tracking_for');		
			$table->string('action_taken');		
			$table->string('record_id');		
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
		Schema::drop('admin_trackings');
	}

}
