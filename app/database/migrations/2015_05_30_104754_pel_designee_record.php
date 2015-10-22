<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PelDesigneeRecord extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pel_designee_record',function($table){
			$table->increments('id');

			$table->string('emp_id');
			$table->string('active');
			$table->string('designation_type');
			$table->string('designation_category');
			$table->string('business_address');
			$table->string('organization');
			$table->string('aircraft');

			$table->string('effective_date');
			$table->string('effective_month');
			$table->string('effective_year');

			$table->string('expiration_date');
			$table->string('expiration_month');
			$table->string('expiration_year');

			$table->string('function');
			$table->string('limitation');
			$table->string('file');
			
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
		Schema::drop('pel_designee_record');
	}

}
