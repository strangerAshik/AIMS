<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DocumentControllers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('document_controllers',function($table){
			$table->increments('id');
			$table->integer('user_id');
			$table->string('active');
			$table->string('record_id');
			$table->string('control_number');
			$table->string('safety_issue');
			$table->string('document_date');
			$table->string('document_month');
			$table->string('document_year');
			$table->string('document_type');
			$table->string('technical_area');
			$table->string('signed_by');
			$table->string('inspector');
			$table->string('organization');
			$table->string('project_number');
		
			$table->string('aircraft_registration');
			$table->string('pel_number');
			$table->string('employee_id');
			$table->string('investigation_number');
			$table->string('subject');
			$table->string('summary_or_keyword');
			
			$table->string('pdf');
				
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
		Schema::drop('document_controllers');
	}

}
