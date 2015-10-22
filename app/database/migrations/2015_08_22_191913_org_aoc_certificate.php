<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrgAocCertificate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('org_aoc_certificate',function($table){
			$table->increments('id');			
			$table->string('org_number');
			$table->string('org_name');

			$table->string('active');
			$table->string('aoc_certificate_type');
			$table->string('aoc_no');
			$table->string('certify_by');
			$table->string('certificate_for');
			$table->string('points_of_contact_name_address');
			$table->string('issued_date');
			$table->string('initial_issued_date');
			$table->string('expiration_date');
			$table->string('certificate_issued_by');
			$table->string('remarks');
			
			$table->string('row_creator');
			$table->string('row_updator');
			$table->integer('approve');
			$table->integer('warning');
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
		Schema::drop('org_aoc_certificate');
	}

}
