<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PelMedicalCertification extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pel_medical_certification',function($table){
			$table->increments('id');
			$table->string('emp_id');

			$table->string('active');
			$table->string('certificate_class');
			$table->string('basis_for_issuance');

			$table->string('effective_date');
			$table->string('effective_month');
			$table->string('effective_year');

			$table->string('expiration_date');
			$table->string('expiration_month');
			$table->string('expiration_year');

			$table->string('examination_date');
			$table->string('examination_month');
			$table->string('examination_year');

			$table->string('medical_examiner');
			$table->string('medical_limitation');
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
		Schema::drop('pel_medical_certification');
	}

}
