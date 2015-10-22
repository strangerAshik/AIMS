<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PelGeneralInfo extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pel_general_info',function($table){
			$table->increments('id');
			$table->string('emp_id');
			$table->string('active');

			$table->string('license_type');
			$table->string('license_rating');
			
			$table->string('issued_date');
			$table->string('issued_month');
			$table->string('issued_year');

			$table->string('expiration_date');
			$table->string('expiration_month');
			$table->string('expiration_year');

			$table->string('old_certificate_number');
			$table->string('basis_for_issuance');
			$table->string('category');
			$table->string('class');
			$table->string('ratings');
			$table->string('endorsement');
			$table->string('limitations');
			
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
		Schema::drop('pel_general_info');
	}

}
